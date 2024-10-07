<!--begin::Modal - Add Departement-->
<div class="modal fade" id="kt_modal_update_location-{{$location->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_departement_header">
                <h2 class="fw-bold">Update Location</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 ">
                <form id="kt_modal_add_location_form" class="form" action="{{ route('location.update',$location->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_departement_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_departement_header"
                        data-kt-scroll-wrappers="#kt_modal_add_departement_scroll" data-kt-scroll-offset="300px">


                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Departement</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter Departement Name" value="{{$location->name}}" />
                        </div>
                        <div class="row mb-7">
                            <div class="col-6">
                                <label class="required fw-semibold fs-6 mb-2">Latitude</label>
                                <input type="text" name="latitude" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="-6.175496239065578" value="{{ explode(',', $location->latlong)[0] }}" />
                            </div>
                            <div class="col-6">
                                <label class="required fw-semibold fs-6 mb-2">Longitude</label>
                                <input type="text" name="longitude" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="106.82781560898832" value="{{ explode(',', $location->latlong)[1] }}" />
                            </div>
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