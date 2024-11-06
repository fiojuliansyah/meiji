@extends('layouts.app')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Applicant List</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Applicants</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    @livewire('applicant-table')
                </div>
            </div>
            <div id="kt_app_footer" class="app-footer">
                <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                    <div class="text-gray-900 order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">2024&copy;</span>
                        <a href="" class="text-gray-800 text-hover-primary">PT. Meiji Indonesian Pharmaceutical
                            Industries </a>
                    </div>
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item">
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="assets/plugins/custom/tinymce/tinymce.bundle.js"></script>

    <!-- Konten komponen Livewire -->
    <script>
        document.addEventListener("wire:load", () => {
            Livewire.hook('message.processed', (message, component) => {
                // Inisialisasi ulang dropdown setelah Livewire update
                $('[data-kt-menu]').dropdown();
            });
        });
    </script>
    <script>
        @foreach ($applicants as $applicant)
            var options{{ $applicant->id }} = {
                selector: "#tiny_update_applicant-{{ $applicant->id }}",
                height: "200"
            };

            if (KTThemeMode.getMode() === "dark") {
                options{{ $applicant->id }}["skin"] = "oxide-dark";
                options{{ $applicant->id }}["content_css"] = "dark";
            }

            tinymce.init(options{{ $applicant->id }});
        @endforeach
    </script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };


        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
    <script>
        function ConfirmationDelete(id, name) {

            Swal.fire({
                title: 'Confirmation',
                text: "Are you sure you want to delete " + name + " ?",
                icon: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'No, Cancel',
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-' + name + '-' + id).submit();
                }
            });
        }
    </script>
@endsection
