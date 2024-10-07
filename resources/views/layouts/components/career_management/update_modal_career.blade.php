               <!--begin::Modal - Customers - Add-->
               <div class="modal fade" id="kt_modal_update_career-{{$career->id}}" tabindex="-1" aria-hidden="true">
                   <!--begin::Modal dialog-->
                   <div class="modal-dialog modal-dialog-centered mw-650px">
                       <!--begin::Modal content-->
                       <div class="modal-content">
                           <!--begin::Form-->
                           <form class="form" action="{{route('career.update',$career->id)}}" id="kt_modal_add_customer_form" method="POST">
                               @csrf
                               @method('PUT')
                               <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                               <!--begin::Modal header-->
                               <div class="modal-header" id="kt_modal_add_customer_header">
                                   <!--begin::Modal title-->
                                   <h2 class="fw-bold">Edit Career</h2>
                                   <!--end::Modal title-->
                                   <!--begin::Close-->
                                   <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                       <i class="ki-duotone ki-cross fs-1">
                                           <span class="path1"></span>
                                           <span class="path2"></span>
                                       </i>
                                   </div>
                                   <!--end::Close-->
                               </div>
                               <!--end::Modal header-->
                               <!--begin::Modal body-->
                               <div class="modal-body py-10 px-lg-17">
                                   <!--begin::Scroll-->
                                   <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                                       <!--begin::Input group-->
                                       <div class="fv-row mb-7">
                                           <!--begin::Label-->
                                           <label class="required fs-6 fw-semibold mb-2">Name</label>
                                           <!--end::Label-->
                                           <!--begin::Input-->
                                           <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$career->name}}" />
                                           <!--end::Input-->
                                       </div>
                                       <!--end::Input group-->
                                       <div class="row g-9 mb-7">
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="required fs-6 fw-semibold mb-2">Departement</label>
                                               <!--end::Label-->
                                               <!--begin::Input-->
                                               <select class="form-select form-select-solid fw-bold" name="departement_id" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="false" data-dropdown-parent="#kt_modal_add_customer">
                                                   <option></option>
                                                   @foreach ($departements as $departement )
                                                   <option value="{{$departement->id}}" {{ $career->departement_id ? 'selected' : '' }}>{{$departement->slug}}</option>
                                                   @endforeach
                                               </select>
                                               <!--end::Input-->
                                           </div>
                                           <!--end::Col-->
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="required fs-6 fw-semibold mb-2">Location</label>
                                               <!--end::Label-->
                                               <!--begin::Input-->
                                               <select class="form-select form-select-solid fw-bold" name="location_id" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="false" data-dropdown-parent="#kt_modal_add_customer">
                                                   <option></option>
                                                   @foreach ($locations as $location )
                                                   <option value="{{$location->id}}" {{ $career->location_id ? 'selected' : '' }}>{{$location->slug}}</option>
                                                   @endforeach
                                               </select>
                                               <!--end::Input-->
                                           </div>
                                           <!--end::Col-->
                                       </div>
                                       <!--begin::Input group-->
                                       <!--end::Input group-->
                                       <div class="row g-9 mb-7">
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="required fs-6 fw-semibold mb-2">Type</label>
                                               <!--end::Label-->
                                               <!--begin::Input-->
                                               <select class="form-select form-select-solid fw-bold" name="type_id" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="false" data-dropdown-parent="#kt_modal_add_customer">
                                                   <option></option>
                                                   @foreach ($types as $type )
                                                   <option value="{{$type->id}}" {{ $career->type_id ? 'selected' : '' }}>{{$type->slug}}</option>
                                                   @endforeach
                                               </select>
                                               <!--end::Input-->
                                           </div>
                                           <!--end::Col-->
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="required fs-6 fw-semibold mb-2">Level</label>
                                               <!--end::Label-->
                                               <!--begin::Input-->
                                               <select class="form-select form-select-solid fw-bold" name="level_id" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="false" data-dropdown-parent="#kt_modal_add_customer">
                                                   <option></option>
                                                   @foreach ($levels as $level )
                                                   <option value="{{$level->id}}" {{ $career->level_id ? 'selected' : '' }}>{{$level->slug}}</option>
                                                   @endforeach
                                               </select>
                                               <!--end::Input-->
                                           </div>
                                           <!--end::Col-->
                                       </div>
                                       <!--begin::Input group-->
                                       <!--end::Input group-->
                                       <div class="row g-9 mb-7">
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="fs-6 fw-semibold mb-2">Salary</label>
                                               <!--end::Label-->
                                               <input type="text" name="salary" class="form-control" placeholder="5.000.000" value="{{$career->salary??''}}">
                                           </div>
                                           <!--end::Col-->
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="fs-6 fw-semibold mb-2">Placement</label>
                                               <!--end::Label-->
                                               <select class="form-select form-select-solid fw-bold" name="placement" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="false" data-dropdown-parent="#kt_modal_add_career">
                                                   <option></option>
                                                   <option value="On-Site" {{ $career->placement == 'On-Site' ? 'selected' : '' }}>On-Site</option>
                                                   <option value="Remote" {{ $career->placement == 'Remote' ? 'selected' : '' }}>Remote</option>
                                                   <option value="Hybrid" {{ $career->placement == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                               </select>
                                           </div>
                                           <!--end::Col-->
                                       </div>
                                       <!--begin::Input group-->
                                       <div class="row g-9 mb-7">
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="fs-6 fw-semibold mb-2">Experience</label>
                                               <!--end::Label-->
                                               <input type="text" name="experience" class="form-control" placeholder="1 Year" value="{{$career->experience ?? ''}}">
                                           </div>
                                           <!--end::Col-->
                                           <!--begin::Col-->
                                           <div class="col-md-6 fv-row">
                                               <!--begin::Label-->
                                               <label class="fs-6 fw-semibold mb-2">Deadline Date</label>
                                               <!--end::Label-->
                                               <input type="date" name="deadline_date" class="form-control" placeholder="OnSite" value="{{$career->deadline_date??''}}">
                                           </div>
                                           <!--end::Col-->
                                       </div>
                                       <!--begin::Input group-->
                                       <div class="fv-row mb-15">
                                           <!--begin::Label-->
                                           <label class="fs-6 fw-semibold mb-2">Description</label>
                                           <!--end::Label-->
                                           <!--begin::Input-->

                                           <textarea name="description" id="tiny_update" class="tox-target">{{$career->description}}</textarea>
                                           <!--end::Input-->
                                       </div>
                                       <!--end::Input group-->

                                   </div>
                                   <!--end::Scroll-->
                               </div>
                               <!--end::Modal body-->
                               <!--begin::Modal footer-->
                               <div class="modal-footer flex-center">
                                   <!--begin::Button-->
                                   <button type="reset" class="btn btn-light me-3">Discard</button>
                                   <!--end::Button-->
                                   <!--begin::Button-->
                                   <button type="submit" class="btn btn-primary">
                                       <span class="indicator-label">Submit</span>
                                       <span class="indicator-progress">Please wait...
                                           <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                   </button>
                                   <!--end::Button-->
                               </div>
                               <!--end::Modal footer-->
                           </form>
                           <!--end::Form-->
                       </div>
                   </div>
               </div>
               <!--end::Modal - Customers - Add-->