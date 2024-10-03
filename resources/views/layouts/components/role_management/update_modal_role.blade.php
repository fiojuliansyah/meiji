 <!--begin::Modal - Update role-->
 <div class="modal fade" id="kt_modal_update_role-{{ $role->id }}" tabindex="-1"
     aria-hidden="true">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-dialog-centered mw-750px">
         <!--begin::Modal content-->
         <div class="modal-content">
             <!--begin::Modal header-->
             <div class="modal-header">
                 <!--begin::Modal title-->
                 <h2 class="fw-bold">Update Role</h2>
                 <!--end::Modal title-->
                 <!--begin::Close-->
                 <div class="btn btn-icon btn-sm btn-active-icon-primary"
                     data-bs-dismiss="modal">
                     <i class="ki-duotone ki-cross fs-1">
                         <span class="path1"></span>
                         <span class="path2"></span>
                     </i>
                 </div>
                 <!--end::Close-->
             </div>
             <!--end::Modal header-->
             <!--begin::Modal body-->
             <div class="modal-body scroll-y mx-5 my-7">
                 <!--begin::Form-->
                 <form id="kt_modal_update_role_form" class="form"
                     action="{{ route('roles.update', $role->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <!--begin::Scroll-->
                     <div class="d-flex flex-column scroll-y me-n7 pe-7"
                         id="kt_modal_update_role_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_update_role_header"
                         data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
                         data-kt-scroll-offset="300px">
                         <!--begin::Input group-->
                         <div class="fv-row mb-10">
                             <!--begin::Label-->
                             <label class="fs-5 fw-bold form-label mb-2">
                                 <span class="required">Role name</span>
                             </label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <input class="form-control form-control-solid"
                                 placeholder="Enter a role name" name="name"
                                 value="{{ $role->name }}" />
                             <!--end::Input-->
                         </div>
                         <!--end::Input group-->
                         <!--begin::Permissions-->
                         <div class="fv-row">
                             <!--begin::Label-->
                             <label class="fs-5 fw-bold form-label mb-2">Role
                                 Permissions</label>
                             <!--end::Label-->
                             <!--begin::Table wrapper-->
                             <div class="table-responsive">
                                 <!--begin::Table-->
                                 <table class="table align-middle table-row-dashed fs-6 gy-5">
                                     <!--begin::Table body-->
                                     <tbody class="text-gray-600 fw-semibold">
                                         <!--begin::Table row-->
                                         @foreach ($permissions as $category => $categories)
                                         <tr>
                                             <!--begin::Label-->
                                             <td class="text-gray-800">
                                                 {{ ucfirst($category) }}
                                             </td>
                                             <!--end::Label-->
                                             <!--begin::Options-->
                                             <td>
                                                 <!--begin::Wrapper-->
                                                 <div class="d-flex">

                                                     @foreach ($categories as $permission)
                                                     <!--begin::Checkbox-->
                                                     <label
                                                         class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                         <input class="form-check-input"
                                                             type="checkbox"
                                                             value="{{ $permission->name }}"
                                                             name="permissions[]"
                                                             {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} />
                                                         <span
                                                             class="form-check-label">{{ $permission->mock }}</span>
                                                     </label>
                                                     <!--end::Checkbox-->
                                                     @endforeach
                                                 </div>
                                                 <!--end::Wrapper-->
                                             </td>
                                             <!--end::Options-->
                                         </tr>
                                         @endforeach
                                         <!--end::Table row-->
                                     </tbody>
                                     <!--end::Table body-->
                                 </table>
                                 <!--end::Table-->
                             </div>
                             <!--end::Table wrapper-->
                         </div>
                         <!--end::Permissions-->
                     </div>
                     <!--end::Scroll-->
                     <!--begin::Actions-->
                     <div class="text-center pt-15">
                         <button type="reset" class="btn btn-light me-3"
                             data-kt-roles-modal-action="cancel">Discard</button>
                         <button type="submit" class="btn btn-primary"
                             data-kt-roles-modal-action="submit">
                             <span class="indicator-label">Submit</span>
                             <span class="indicator-progress">Please wait...
                                 <span
                                     class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                         </button>
                     </div>
                     <!--end::Actions-->
                 </form>
                 <!--end::Form-->
             </div>
             <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
     </div>
     <!--end::Modal dialog-->
 </div>
 <!--end::Modal - Update role-->