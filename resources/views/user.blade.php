@extends('layouts.app')

@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Users List</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Users</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-filter fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Filter</button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Role:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                data-placeholder="Select option" data-allow-clear="true"
                                                data-kt-user-table-filter="Role" data-hide-search="true">
                                                <option></option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->

                                <!--begin::Add user-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i>Add User</button>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->

                            <!-- Bulk Delete Form (place it before or after the table) -->
                            <form id="bulk-delete-form" action="{{ route('user.bulk-delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>

                            <!--begin::Group actions-->

                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>

                            <!--end::Group actions-->

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table_users .form-check-input"
                                                value="" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px text-center">User</th>
                                    <th class="min-w-125px">Role</th>
                                    <th class="min-w-125px">Last login</th>
                                    <th class="min-w-125px">Two-step</th>
                                    <th class="min-w-125px">Joined Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="user_ids[]"
                                                value="{{ $user->id }}" />
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . $user->name . '&font-size=0.3' }}"
                                                        alt="{{ $user->name }}" class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                            <span>{{ $user->email }}</span>
                                        </div>
                                        <!--begin::User details-->
                                    </td>

                                    <td>{{ $user->getRoleNames()->implode(', ') ?? '' }}</td>

                                    <td>
                                        <div class="badge badge-light fw-bold">{{ $user->last_login_at }}</div>
                                    </td>
                                    <td></td>
                                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3">View Profile</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a type="button" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_user-{{ $user->id }}"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3"
                                                    onclick="ConfirmationDelete({{ $user->id }},'{{ $user->name }}')">Delete</a>
                                                <form action="{{ route('user.delete', $user->id) }}"
                                                    id="delete-{{ $user->name }}-{{ $user->id }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                <!--begin::Modal - Update task-->
                                <div class=" modal fade" id="kt_modal_update_user-{{ $user->id }}"
                                    tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <div class="modal-content">
                                            <div class="modal-header" id="kt_modal_update_user_header">
                                                <h2 class="fw-bold">Update User</h2>
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="modal-body px-5 my-7">
                                                <form id="kt_modal_update_user_form{{ $user->id }}"
                                                    class="form"
                                                    action="{{ route('users.update', $user->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                                        id="kt_modal_update_user_scroll" data-kt-scroll="true"
                                                        data-kt-scroll-activate="true"
                                                        data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_modal_update_user_header"
                                                        data-kt-scroll-wrappers="#kt_modal_update_user_scroll"
                                                        data-kt-scroll-offset="300px">
                                                        <div class="fv-row mb-7">
                                                            <label class="d-block fw-semibold fs-6 mb-5">
                                                                Avatar
                                                            </label>
                                                            <style>
                                                                .image-input-placeholder {
                                                                    background-image: url('assets/media/svg/files/blank-image.svg');
                                                                }

                                                                [data-bs-theme="dark"] .image-input-placeholder {
                                                                    background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                                                }
                                                            </style>
                                                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                                <div class="image-input-wrapper w-125px h-125px"
                                                                    style="background-image: url('{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&font-size=0.3' }}');">
                                                                </div>
                                                                <label
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                    <i class="ki-duotone ki-pencil fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="avatar_remove" value="{{ $user->avatar }}" />
                                                                </label>
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki-duotone ki-cross fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                                    <i class="ki-duotone ki-cross fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                            <div class="form-text">
                                                                Allowed file types: png, jpg, jpeg.
                                                            </div>
                                                        </div>
                                                        <div class="fv-row mb-7">
                                                            <label class="required fw-semibold fs-6 mb-2">
                                                                Full Name
                                                            </label>
                                                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="{{ $user->name }}" />
                                                        </div>
                                                        <div class="fv-row mb-7">
                                                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="{{ $user->email }}" />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                            <select class="form-select" data-control="select2"
                                                                data-placeholder="Select an option"
                                                                data-dropdown-parent="#kt_modal_update_user-{{ $user->id }}"
                                                                name="role">
                                                                <option></option>
                                                                @foreach ($roles as $role)
                                                                <option value="{{ $role->name }}"
                                                                    {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                                    {{ $role->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="text-center pt-10">
                                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal - Update task-->
                                @endforeach

                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-gray-900 order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                <a href="https://keenthemes.com" target="_blank"
                    class="text-gray-800 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
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
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->

<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Add New User</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_user_form" class="form" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter your Full Name" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter Your Email" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Password</label>
                            <div class="fv-row " data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" type="password"
                                            placeholder="Password" name="password" autocomplete="off" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="fas fa-eye-slash "></i>
                                            <i class="fas fa-eye  d-none"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3"
                                        data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &
                                    symbols.</div>
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Confirm Password</label>
                            <div class="fv-row " data-kt-password-meter="true">
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password"
                                        placeholder="Confirmation Password" name="password_confirmation"
                                        autocomplete="off" />
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="fas fa-eye-slash "></i>
                                        <i class="fas fa-eye  d-none"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select an option"
                                data-dropdown-parent="#kt_modal_add_user" name="role">
                                <option></option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Add task-->
@endsection

@section('scripts')
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />

<script>
    var hostUrl = "assets/";
</script>

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
<script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
<script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>

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


    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif
</script>

<script>
    function ConfirmationDelete(id, username) {

        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to delete " + username + " ?",
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
                document.getElementById('delete-' + username + '-' + id).submit();
            }
        });
    }
</script>
@endsection