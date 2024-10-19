<div>
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-career-table-filter="search"
                        class="form-control form-control-solid w-250px ps-12"
                        placeholder="Search Applicant" wire:model.live="search" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex d-flex flex-wrap  pb-5" data-kt-career-table-toolbar="base">
                    <div class="me-8 mt-4 align-content-center fw-bolder d-flex flex-wrap">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" value="" id="statusAll" wire:change="resetFilters()">
                            <label class="form-check-label" for="statusAll">All</label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" value="screening" id="statusScreening" wire:model.live="status">
                            <label class="form-check-label" for="statusScreening"><span class="badge badge-outline badge-dark">Screening</span></label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" value="interview" id="statusInterview" wire:model.live="status">
                            <label class="form-check-label" for="statusInterview"><span class="badge badge-outline badge-warning">Interview</span></label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" value="skill test" id="statusSkillTest" wire:model.live="status">
                            <label class="form-check-label" for="statusSkillTest"><span class="badge badge-outline badge-info">Skill Test</span></label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" value="accepted" id="statusAccepted" wire:model.live="status">
                            <label class="form-check-label" for="statusAccepted"><span class="badge badge-outline badge-success">Accepted</span></label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" value="rejected" id="statusRejected" wire:model.live="status">
                            <label class="form-check-label" for="statusRejected"><span class="badge badge-outline badge-danger">Rejected</span></label>
                        </div>
                    </div>

                    <div class="me-4 fw-bolder">
                        Departement :
                        <select class="form-select text-sm" data-placeholder="Select Status" wire:model.live="departement">
                            @foreach ($departements as $departement )
                            <option value="{{ $departement->id }}">{{$departement->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="me-4 fw-bolder text-sm">
                        Sort By :
                        <select class="form-select" data-placeholder="Select" wire:model.live="sortBy">
                            <option value="1">Newest </option>
                            <option value="2">Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-career-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-career-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-career-table-select="delete_selected">Delete Selected</button>
                    <form id="bulk-delete-form" action="{{ route('careers.bulk-delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_careers_table">
                    <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div
                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_careers_table .form-check-input"
                                        value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Career</th>
                            <th class="min-w-125px">Departement</th>
                            <th class="min-w-125px text-center" colspan="2">Status</th>
                            <th class="text-center min-w-70px">View</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($applicants as $applicant)
                        <tr>
                            <td>
                                <div
                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox"
                                        value="{{ $applicant->id }}" name="applicant_ids[]" />
                                </div>
                            </td>
                            <td>
                                <a href=""
                                    class="text-gray-800 text-hover-primary mb-1">{{ $applicant->user->name }}</a>
                            </td>

                            <td>{{ $applicant->career->name }}</td>
                            <td>{{ $applicant->career->departement->name }}</td>
                            <td>
                                <select class="form-select w-75" data-placeholder="Select Status" wire:change="updateStatus({{ $applicant->id }}, $event.target.value)">
                                    <option value="screening"
                                        {{ $applicant->status == 'screening' ? 'selected' : '' }}><i
                                            class="fas fa-eye"></i>Screening</option>
                                    <option value="interview"
                                        {{ $applicant->status == 'interview' ? 'selected' : '' }}>
                                        Interview</option>
                                    <option value="skill test"
                                        {{ $applicant->status == 'skill test' ? 'selected' : '' }}>Skill
                                        Test</option>
                                    <option value="accepted"
                                        {{ $applicant->status == 'accepted' ? 'selected' : '' }}>
                                        Accepted</option>
                                    <option value="rejected"
                                        {{ $applicant->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                            </td>
                            <td>

                                <span
                                    class="badge badge-outline 
                                        {{ $applicant->status === 'screening' ? 'badge-dark' : '' }}
                                        {{ $applicant->status === 'interview' ? 'badge-primary' : '' }}
                                        {{ $applicant->status === 'skill_test' ? 'badge-info' : '' }}
                                        {{ $applicant->status === 'accepted' ? 'badge-success' : '' }}
                                        {{ $applicant->status === 'rejected' ? 'badge-danger' : '' }}">
                                    {{ ucfirst($applicant->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-secondary text-center px-2"><i
                                        class="fa-solid fa-eye"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @if($applicants->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center my-4">
                                <div class="my-4">

                                    No data available.
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <!-- Dropdown jumlah data per halaman di pojok kiri bawah -->
                    <div class="me-8">
                        <select wire:model.live="perPage" class="form-select">
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="20">20</option>
                        </select>
                    </div>

                    <!-- Showing X of Y results -->
                    <div class="text-muted">
                        Showing {{ $applicants->firstItem() }} to {{ $applicants->lastItem() }} of {{ $applicants->total() }} results
                    </div>

                    <!-- Pagination di pojok kanan bawah -->
                    <div class="mt-3">
                        {{$applicants->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>

            </div>
        </div>
        <!--begin::Modals-->

        <!--end::Modals-->
    </div>
</div>