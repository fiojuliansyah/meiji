               <!--begin::Modal - Customers - Add-->
               <div class="modal fade" id="kt_modal_update_type-{{$type->id}}" tabindex="-1" aria-hidden="true">
                   <!--begin::Modal dialog-->
                   <div class="modal-dialog modal-dialog-centered mw-650px">
                       <!--begin::Modal content-->
                       <div class="modal-content">
                           <!--begin::Form-->
                           <form class="form" action="{{route('type.update',$type->id)}}" id="kt_modal_add_customer_form" method="POST">
                               @csrf
                               @method('PUT')
                               <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                               <!--begin::Modal header-->
                               <div class="modal-header" id="kt_modal_add_customer_header">
                                   <!--begin::Modal title-->
                                   <h2 class="fw-bold">Edit type</h2>
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
                                           <label class="required fs-6 fw-semibold mb-2">type</label>
                                           <!--end::Label-->
                                           <!--begin::Input-->
                                           <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{$type->name}}" />
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