<!--begin::Modal - Add Departement-->
<div class="modal fade" id="kt_modal_update_departement-{{$departement->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_departement_header">
                <h2 class="fw-bold">Update Departement</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 ">
                <form id="kt_modal_add_departement_form" class="form" action="{{ route('departement.update',$departement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_departement_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_departement_header"
                        data-kt-scroll-wrappers="#kt_modal_add_departement_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7 pt-5 text-center">
                            <!--begin::Image input placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('svg/avatars/blank.svg');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('svg/avatars/blank-dark.svg');
                                }
                            </style>
                            <!--end::Image input placeholder-->

                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px img-fluid" style="background-image: url({{$departement->img_url ?? ''}})"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="img" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Cancel avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <!--end::Cancel button-->

                                <!--begin::Remove button-->
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::Image input-->
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Departement</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter Departement Name" value="{{$departement->name}}" />
                        </div>


                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-departements-modal-action="cancel">Discard</button>
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