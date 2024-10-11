<!--begin::Modal - Update task-->
<div class=" modal fade" id="kt_modal_update_user-{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_update_user_header">
                <h2 class="fw-bold">{{$user->name}} </h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-4">
                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_update_user_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_update_user_header"
                    data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">

                    <div class="row mb-7">
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible1">
                                <h3 class="card-title">Account</h3>
                                <div class="card-toolbar rotate-180">
                                    <i class="ki-duotone ki-down fs-1"></i>
                                </div>
                            </div>
                            <div id="kt_docs_card_collapsible1" class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="col-4 text-center">
                                                <style>
                                                    .image-input-placeholder {
                                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                                    }

                                                    [data-bs-theme="dark"] .image-input-placeholder {
                                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                                    }
                                                </style>
                                                <div class="image-input image-input-outline image-input-placeholder">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ $user->profile->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&font-size=0.3' }}');">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-bolder fs-5">Name <span>:</span></p>
                                                <span class="fs-5">{{$user->name}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-bolder fs-5">Email <span>:</span></p>
                                                <span class="fs-5">{{$user->email}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-bolder fs-5">Phone <span>:</span></p>
                                                <span class="fs-5">{{$user->phone}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-bolder fs-5">Role <span>:</span></p>
                                                <span class="fs-5">{{ $user->getRoleNames()->implode(', ') ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible2">
                                <h3 class="card-title">Profile</h3>
                                <div class="card-toolbar rotate-180">
                                    <i class="ki-duotone ki-down fs-1"></i>
                                </div>
                            </div>
                            <div id="kt_docs_card_collapsible2" class="collapse show">
                                <div class="card-body">
                                    <div class="fv-row mb-2">
                                        <label class="fw-semibold fs-6 mb-2">NIK</label>
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$user->profile->nik}}" disabled />
                                    </div>
                                    <div class="fv-row mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Birth Place</label>
                                        <input type="text" class="form-control form-control-solid mb-3 mb-lg-0"
                                            value="{{$user->profile->birth_place}}" disabled />
                                    </div>
                                    <div class="fv-row mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Birth Date</label>
                                        <input type="date" class="form-control form-control-solid mb-3 mb-lg-0"
                                            value="{{$user->profile->birth_date}}" disabled />
                                    </div>
                                    <div class="fv-row mb-2">
                                        <label class="fw-semibold fs-6 mb-2">Gender</label>
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$user->profile->gender}}" disabled />
                                    </div>
                                    <div class="fv-row mb-2">
                                        <label class="fw-semibold fs-6 mb-2">
                                            <Address></Address>
                                        </label>
                                        <textarea class="form-control form-control-solid mb-3 mb-lg-0" disabled> {{$user->profile->address}}</textarea>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible3">
                                <h3 class="card-title">Document</h3>
                                <div class="card-toolbar rotate-180">
                                    <i class="ki-duotone ki-down fs-1"></i>
                                </div>
                            </div>
                            <div id="kt_docs_card_collapsible3" class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($user->documents as $document )
                                        <div class=" col-lg-4 col-6 mb-5 mb-xl-2">
                                            <div class="border border-gray-500 border-1 border-dashed rounded p-5 ">
                                                <!--begin::Number-->
                                                <div class=" text-center mb-4">
                                                    <span class="badge badge-outline badge-success fs-4">{{$document->type??''}}</span>
                                                </div>
                                                @if (pathinfo($document->document_url, PATHINFO_EXTENSION) == 'pdf')
                                                <a class="d-block overlay"
                                                    href="{{$document->document_url}}" target="_blank">
                                                    <!--begin::Image-->
                                                    <div
                                                        class="overlay-wrapper bgi-no-repeat bgi-position-center text-center bgi-size-cover card-rounded min-w-100px min-h-100px mb-4">
                                                        <img src="assets/media/logos/adobe.png" class="mx-auto rounded"
                                                            alt="PDF" height="100" width="120">
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="fas fa-eye fs-2x text-white">
                                                        </i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                @else
                                                <a class="d-block overlay" href="{{$document->document_url}}" target="_blank">
                                                    <!--begin::Image-->

                                                    <div
                                                        class="overlay-wrapper bgi-no-repeat bgi-position-center text-center bgi-size-cover card-rounded min-w-100px min-h-100px mb-4">
                                                        <img src="{{$document->document_url}}" class="mx-auto rounded"
                                                            alt="" height="100" width="100">
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="fas fa-eye fs-2x text-white">
                                                        </i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                @endif
                                                <div class="fs-4 fw-bold  text-center"> {{$document->name??'-'}}</div>

                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-500 text-center mb-7">Expires
                                                    at : {{$document->validate_date??'-'}}</div>
                                                <!--end::Label-->
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal - Update task-->