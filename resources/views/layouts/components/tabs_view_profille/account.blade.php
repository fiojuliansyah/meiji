<div class="tab-pane fade show active" id="account" role="tabpanel">
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
            data-bs-target="#kt_card_account">
            <h3 class="card-title">Account Detail</h3>
            <div class="card-toolbar rotate-180">
                <i class="ki-duotone ki-down fs-1"></i>
            </div>
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div id="kt_card_account" class="collapse show ">
            <div class="card-body p-6">
                <!--begin::Form-->
                <form id="kt_account_profile_details_form" class="form" action="{{route('account.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Card body-->
                    <div class="card-body p-9">

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="name"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Enter Your Name" value="{{ $user->name }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="email"
                                    class="form-control form-control-lg form-control-solid" placeholder="Company name"
                                    value="{{ $user->email }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Contact Phone</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="phone"
                                    class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                    value="{{ $user->phone }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row ">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Role</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                @if($user->is_admin == true)
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select a Role" name="role">
                                    <option></option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @else
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->getRoleNames()->first() }}" disabled>
                                @endif
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    </div>
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
            <!--end::Card body-->
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
            data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">Reset Password</h3>
            <div class="card-toolbar rotate-180">
                <i class="ki-duotone ki-down fs-1"></i>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse ">
            <div class="card-body">
                <!--begin::Form-->
                <form id="kt_account_reset_password" class="form" method="POST" action="{{route('reset-password',$user->id)}}">
                    @csrf
                    @method('PUT')
                    <!--begin::Card body-->
                    <div class="card-body pt-0 my-0 pb-4">

                        <!--begin::Input group-->
                        <div class="row ">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Reset
                                Password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="reset_password"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Enter Your New Password" value="" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-3 px-9">
                        <button type="submit" class="btn btn-primary fw-bold"
                            id="kt_account_profile_details_submit">Reset Password</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>