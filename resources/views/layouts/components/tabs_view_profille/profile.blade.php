 <div class="tab-pane fade" id="profile" role="tabpanel">
     <div class="card mb-5 mb-xl-10">
         <!--begin::Card header-->
         <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_detail">
             <h3 class="card-title">Profile Detail</h3>
             <div class="card-toolbar rotate-180">
                 <i class="ki-duotone ki-down fs-1"></i>
             </div>
         </div>
         <!--begin::Card header-->
         <!--begin::Card body-->
         <div id="kt_docs_card_detail" class="collapse show ">
             <div class="card-body p-9">
                 <!--begin::Form-->
            
                 <form id="kt_account_profile_details_form" class="form" action="{{route('profile.update',$profile->user_id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <!--beg in::Card body-->
                     <!--begin::Input group-->
                     <div class="row mb-6">
                         <!--begin::Label-->
                         <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                         <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8">
                             <!--begin::Image input-->
                             <div class="image-input image-input-outline" data-kt-image-input="true"
                                 style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                 <!--begin::Preview existing avatar-->
                                 <div class="image-input-wrapper w-125px h-125px"
                                     style="background-image: url('{{ $profile->avatar_url ?? 'https://ui-avatars.com/api/?name=' . $user->name . '&font-size=0.3' }}');">
                                 </div>
                                 <!--end::Preview existing avatar-->
                                 <!--begin::Label-->
                                 <label
                                     class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                     data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                     <i class="ki-duotone ki-pencil fs-7">
                                         <span class="path1"></span>
                                         <span class="path2"></span>
                                     </i>
                                     <!--begin::Inputs-->
                                     <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                     <input type="hidden" name="avatar_remove" value="{{$profile->avatar_public_id ?? ''}}" />
                                     <!--end::Inputs-->
                                 </label>
                                 <!--end::Label-->
                                 <!--begin::Cancel-->
                                 <span
                                     class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                     data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                     <i class="ki-duotone ki-cross fs-2">
                                         <span class="path1"></span>
                                         <span class="path2"></span>
                                     </i>
                                 </span>
                                 <!--end::Cancel-->
                                 <!--begin::Remove-->
                                 <span
                                     class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                     data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                     <i class="ki-duotone ki-cross fs-2">
                                         <span class="path1"></span>
                                         <span class="path2"></span>
                                     </i>
                                 </span>
                                 <!--end::Remove-->
                             </div>
                             <!--end::Image input-->
                             <!--begin::Hint-->
                             <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                             <!--end::Hint-->
                         </div>
                         <!--end::Col-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="row mb-6">
                         <!--begin::Label-->
                         <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="nik">NIK</label>
                         <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8 fv-row">
                             <input type="text" name="nik" id="nik"
                                 class="form-control form-control-lg form-control-solid" placeholder="Enter your NIK"
                                 value="{{ $profile->nik ?? '' }}" />
                         </div>
                         <!--end::Col-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="row mb-6">
                         <!--begin::Label-->
                         <label class="col-lg-4 col-form-label fw-semibold fs-6" for="birth_place">
                             <span class="required">Birth Place</span>
                         </label>
                         <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8 fv-row">
                             <input type="tel" name="birth_place"
                                 class="form-control form-control-lg form-control-solid"
                                 placeholder="Enter your Birth Place" id="birth_place"
                                 value="{{ $profile->birth_place ?? '' }}" />
                         </div>
                         <!--end::Col-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="row mb-0">
                         <!--begin::Label-->
                         <label class="col-lg-4 col-form-label fw-semibold fs-6" for="#birth_date1">
                             <span class="required">Birth date</span>
                         </label>
                         <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8 fv-row">
                             <div class="input-group input-group-solid  mb-5">
                                 <input type="date" class="form-control form-control-solid form-control-lg"
                                     placeholder="YYYY-MM-DD" id="birth_date1" name="birth_date"
                                     value="{{ $profile->birth_date ?? '' }}" />
                                 <label class="input-group-text">
                                     <i class="ki-duotone ki-calendar fs-2">
                                         <span class="path1"></span>
                                         <span class="path2"></span>
                                     </i>
                                 </label>
                             </div>

                         </div>
                         <!--end::Col-->
                     </div>
                     <!--end::Input group-->

                     <!--begin::Input group-->
                     <div class="row mb-6">
                         <!--begin::Label-->
                         <label class="col-lg-4 col-form-label required fw-semibold fs-6">Gender</label>
                         <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8 fv-row">
                             <!--begin::Input-->
                             <select class=" form-select form-select-solid form-select-lg" data-control="select2"
                                 name="gender" data-placeholder="Select a gender..">
                                 <option value="">Select a gender..</option>
                                 <option value="laki-laki"
                                     {{ $profile->gender == 'laki-laki' ? 'selected' : '' }}>
                                     Laki-laki</option>
                                 <option value="perempuan"
                                     {{ $profile->gender == 'perempuan' ? 'selected' : '' }}>
                                     Perempuan</option>
                             </select>
                             <!--end::Input-->
                         </div>
                         <!--end::Col-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="row mb-6">
                         <!--begin::Label-->
                         <label class="col-lg-4 col-form-label fw-semibold fs-6" for="#address">Address</label>
                         <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8 fv-row">
                             <div class="input-group mb-5">
                                 <textarea class="form-control form-control form-control-solid" id="#address" data-kt-autosize="true"
                                     name="address">{{ $profile->address }}</textarea>

                             </div>

                         </div>
                         <!--end::Col-->
                     </div>
                     <!--end::Input group-->


                     <!--end::Card body-->
                     <!--begin::Actions-->
                     <div class="card-footer d-flex justify-content-end py-3 px-9">
                         <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                         <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                             Changes</button>
                     </div>
                     <!--end::Actions-->
                 </form>
                 <!--end::Form-->
             </div>
         </div>
         <!--end::Card body-->
     </div>
 </div>