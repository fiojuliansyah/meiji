<!--begin::Modal - Add status-->
<div class="modal fade" id="kt_modal_add_status" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_status_header">
                <h2 class="fw-bold">Add New status</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 ">
                <form id="kt_modal_add_status_form" class="form" action="{{ route('status.store') }}" method="POST" >
                    @csrf
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_status_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_status_header"
                        data-kt-scroll-wrappers="#kt_modal_add_status_scroll" data-kt-scroll-offset="300px">

                        <div class="row mb-7">
                            <div class="col-4">
                                <label class="required fw-semibold fs-6 mb-2">Choose Color</label>
                                <select name="color" id="color"  class="form-select">
                                    <option value="light">Light</option>
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                    <option value="success">Success</option>
                                    <option value="info">Info</option>
                                    <option value="warning">Warning</option>
                                    <option value="danger">Danger</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <label class="required fw-semibold fs-6 mb-2">Status</label>
                                <input type="text" name="status" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Enter status Name" />
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-6 text-ceneter">
                                <label class="required fw-semibold fs-6 mb-2">Bulk Notif</label>
                                <select name="is_dpass" id="is_dpass"  class="form-select">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-statuses-modal-action="cancel">Discard</button>
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