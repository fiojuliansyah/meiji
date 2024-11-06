<!--begin::Modal - Update task-->
<div class="modal modal-lg fade" id="modal_applicant_update-{{ $applicant->id }}" tabindex="-1" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_update_user_header">
                <h2 class="fw-bolder">Update dan Add Schedule</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-4" >
                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_update_user_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_update_user_header"
                    data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">

                    <div class="row mb-10">
                        <label for="status" class="fw-bold mb-2">Status :</label>
                        <div class="col-6 d-flex align-items-center">
                            <select class="form-select fw-bold" data-kt-select2="false" data-placeholder="Select option"
                                data-dropdown-parent="#modal_applicant_update-{{ $applicant->id }}"
                                wire:change.prevent="updateStatus({{ $applicant->id }}, $event.target.value)">
                                <option></option>
                                @foreach ($statuses as $statuss)
                                    <option value="{{ $statuss->id }}"
                                        {{ $applicant->status_id == $statuss->id ? 'selected' : '' }}>
                                        {{ $statuss->status }}</option>
                                @endforeach
                            </select>

                            <span class="badge badge-outline badge-{{ $applicant->status->color }} ms-4">
                                {{ $applicant->status->status }}
                            </span>

                        </div>
                    </div>
                    <div class="row mb-7 border pb-6 px-4 text-md-center">
                        <p class="fs-4 fw-bolder text-center border py-2 bg-light-secondary"> Add Schedules</p>
                        <div class="col-md-6 mt-4">
                            <label for="date" class="fw-bolder mb-2">Date :</label>
                            <input type="date" class="form-control form-control-solid mb-3 mb-lg-0" id="date"
                                name="date" value="{{ $applicant->schedule->date ?? '' }}"/>
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="time" class="fw-bolder mb-2">Time :</label>
                            <input type="time" class="form-control form-control-solid mb-3 mb-lg-0" id="time"
                                name="time" value="{{ $applicant->schedule->time ?? '' }}"/>

                        </div>

                        <div class="col-md-12 mt-8" wire:ignore >
                            <label for="time" class=" fw-bolder mb-2">Description : </label>
                            <textarea name="description" id="tiny_update_applicant-{{ $applicant->id }}" class="tox-target">{{$applicant->schedule->description ?? ''}} </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Update task-->

