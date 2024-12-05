@extends('layouts.guest.app')

@section('content')
    <div class="container">

        <div class="row mt-4">
            <div class="col-2 d-none d-md-block ">
                <a href="{{ route('my.profile') }}"
                    class="btn btn-outline-danger w-100 my-2 {{ request()->routeIs('my.profile') ? 'active' : '' }}">
                    My Profile
                </a>
                <a href="" class="btn btn-outline-danger w-100 my-2">
                    My Calendar
                </a>
                <a href="{{ route('applied.career') }}"
                    class="btn btn-outline-danger w-100 my-2 {{ request()->routeIs('applied.career') ? 'active' : '' }}">
                    Applied Jobs
                </a>
                <a href="{{ route('jobapplication.form') }}"
                    class="btn btn-outline-danger w-100 my-2 {{ request()->routeIs('jobapplication.form') ? 'active' : '' }}">
                    Job Application Form
                </a>
            </div>

            <div class="col-md-10 p-4">
                <div class="border rounded p-3">
                    <h4 class="mb-5 text-center mt-2">Job Application Form</h4>

                    <!-- Multistep form -->
                    <form id="msform" class="mt-4">
                        <!-- Progressbar -->
                        <ul id="progressbar">
                            <li class="active">Personal Information</li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>

                        <!-- Step 1 -->
                        <fieldset class="p-md-4 p-2">
                            <h5 class="fs-title text-center  mb-2">Personal Information</h5>
                            <p class="fst-italic text-center"> Please complete all of the sections despite your endorsed
                                curriculum vitae.</p>
                            <div class="row">

                                <div class="col-lg-6 col-12 ">
                                    <label for="" class="mt-2 fw-bold">Full Name</label>
                                    <input type="text" name="name" min="30" max="50" placeholder=""
                                        class="form-control form-control-sm " required>
                                </div>
                                <div class="col-6  col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Place of Birth</label>
                                    <input type="text" name="birth_place" min="30" max="50" placeholder=""
                                        class="form-control form-control-sm " required>
                                </div>
                                <div class="col-6  col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Date of Birth</label>
                                    <input type="date" name="birth_date" min="30" max="50" placeholder=""
                                        class="form-control form-control-sm " required>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Marital Status</label>
                                    <select name="marital_status" class="form-select" required>
                                        <option></option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Nationality</label>
                                    <select name="Nationality" class="form-select" required>
                                        <option></option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>

                                    </select>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Religion</label>
                                    <select name="religion" class="form-select" required>
                                        <option></option>
                                        <option value="islam">Islam</option>
                                        <option value="christian">Christian</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddhist">Buddhist</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-6  col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Sex</label>
                                    <select name="sex" class="form-select" required>
                                        <option></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>


                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Blood Type</label>
                                    <input type="text" name="blood_type" min="30" max="50" placeholder="AB"
                                        class="form-control form-control-sm " required>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Height/Weight</label>
                                    <input type="text" name="height_weight" min="30" max="50"
                                        placeholder="height/weight" class="form-control form-control-sm " required>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Place of Origin</label>
                                    <input type="text" name="place_origin" min="30" max="50"
                                        placeholder="Jakarta Selatan" class="form-control form-control-sm " required>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Driving License</label>
                                    <input type="text" name="license" min="30" max="50"
                                        placeholder="A, A1, B, C" class="form-control form-control-sm " required>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label for="" class="mt-2 fw-bold">Transportation</label>
                                    <select name="transportation" class="form-select" required>
                                        <option></option>
                                        <option value="car">Car</option>
                                        <option value="motorcycle">Motorcycle</option>
                                        <option value="train">Train</option>
                                        <option value="bus">Bus</option>
                                        <option value="walk">Walk</option>
                                        <option value="bicycle">Bicycle</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-25">
                                <h6 class="text-center pb-5">ABOUT YOUR PARENT AND SPOUSE</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center fw-bold">
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Sex (M/F)</th>
                                                <th>Age</th>
                                                <th>Education</th>
                                                <th>Occupation</th>
                                                <th>Name of Employer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold pe-2">Father</td>
                                                <td><input type="text" name="father_name" class="form-control"
                                                        placeholder="Father's Name"></td>
                                                <td><input type="text" name="father_sex" class="form-control"
                                                        placeholder="M/F"></td>
                                                <td><input type="text" name="father_age" class="form-control"
                                                        placeholder="Age"></td>
                                                <td><input type="text" name="father_education" class="form-control"
                                                        placeholder="Father's Education"></td>
                                                <td><input type="text" name="father_occupation" class="form-control"
                                                        placeholder="Father's Occupation"></td>
                                                <td><input type="text" name="father_employer" class="form-control"
                                                        placeholder="Father's Employer"></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold pe-2">Mother</td>
                                                <td><input type="text" name="mother_name" class="form-control"
                                                        placeholder="Mother's Name"></td>
                                                <td><input type="text" name="mother_sex" class="form-control"
                                                        placeholder="M/F"></td>
                                                <td><input type="text" name="father_age" class="form-control"
                                                        placeholder="Age"></td>
                                                <td><input type="text" name="mother_education" class="form-control"
                                                        placeholder="Mother's Education"></td>
                                                <td><input type="text" name="mother_occupation" class="form-control"
                                                        placeholder="Mother's Occupation"></td>
                                                <td><input type="text" name="mother_employer" class="form-control"
                                                        placeholder="Mother's Employer"></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold pe-2">Spouse</td>
                                                <td><input type="text" name="spouse_name" class="form-control"
                                                        placeholder="Spouse's Name"></td>
                                                <td><input type="text" name="spouse_sex" class="form-control"
                                                        placeholder="M/F"></td>
                                                <td><input type="text" name="father_age" class="form-control"
                                                        placeholder="Age"></td>
                                                <td><input type="text" name="spouse_education" class="form-control"
                                                        placeholder="Spouse's Education"></td>
                                                <td><input type="text" name="spouse_occupation" class="form-control"
                                                        placeholder="Spouse's Occupation"></td>
                                                <td><input type="text" name="spouse_employer" class="form-control"
                                                        placeholder="Spouse's Employer"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <h6 class="text-center pb-5">ABOUT YOUR SIBLINGS (Brothers, Sisters)</h6>
                                <div class="table-responsive">
                                    <table class="table" id="siblingsTable">
                                        <thead class="text-center fw-bold">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Sex (M/F)</th>
                                                <th>Age</th>
                                                <th>Education</th>
                                                <th>Occupation</th>
                                                <th>Name of Employer</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold pe-2">1</td>
                                                <td><input type="text" name="sibling_name[]" class="form-control"
                                                        placeholder="Name"></td>
                                                <td><input type="text" name="sibling_sex[]" class="form-control"
                                                        placeholder="M/F"></td>
                                                <td><input type="text" name="sibling_age[]" class="form-control"
                                                        placeholder="M/F"></td>
                                                <td><input type="text" name="sibling_education[]" class="form-control"
                                                        placeholder="Education"></td>
                                                <td><input type="text" name="sibling_occupation[]"
                                                        class="form-control" placeholder="Occupation"></td>
                                                <td><input type="text" name="sibling_employer[]" class="form-control"
                                                        placeholder="Employer"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger p-2"
                                                        onclick="removeRow(this)">-</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary" onclick="addRow()">+ row</button>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <h6 class="text-center pb-5">ABOUT YOUR CHILDREN</h6>
                                <div class="table-responsive">
                                    <table class="table" id="childrenTable">
                                        <thead class="text-center fw-bold">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Sex (M/F)</th>
                                                <th>Age</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold pe-2">1</td>
                                                <td><input type="text" name="child_name[]" class="form-control"
                                                        placeholder="Name"></td>
                                                <td><input type="text" name="child_sex[]" class="form-control"
                                                        placeholder="M/F"></td>
                                                <td><input type="text" name="child_age[]" class="form-control"
                                                        placeholder="Age"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger p-2"
                                                        onclick="removeChildRow(this)">-</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-primary mt-3 " onclick="addChildRow()">+
                                            Add Row</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="currentAddress" class="fw-bold">Current Address</label>
                                        <input type="text" id="currentAddress" name="current_address"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="idAddress" class="fw-bold">ID Address</label>
                                        <input type="text" id="idAddress" name="id_address"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailAddress" class="fw-bold">E-mail Address</label>
                                        <input type="email" id="emailAddress" name="email_address"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="residenceStatus" class="fw-bold">Status of your residence</label>
                                        <select id="residenceStatus" name="residence_status"
                                            class="form-select form-select-sm">
                                            <option value="">Select Status</option>
                                            <option value="rent">Rent</option>
                                            <option value="others">Others</option>
                                            <option value="own_by_yourself">Own by Yourself</option>
                                            <option value="family_resident">Family Resident</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telephone" class="fw-bold">Telephone</label>
                                        <input type="text" id="telephone" name="telephone"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cellphone1" class="fw-bold">Cellphone 1</label>
                                        <input type="text" id="cellphone1" name="cellphone1"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cellphone2" class="fw-bold">Cellphone 2</label>
                                        <input type="text" id="cellphone2" name="cellphone2"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />

                        </fieldset>
                        <!-- Step 2 -->
                        <fieldset>
                            <h2 class="fs-title">Formal and Non Formal Education</h2>
                            <h3 class="fs-subtitle">Please provide your educational background</h3>

                            <!-- Formal Education -->
                            <h5 class="fs-title">Formal Education</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="fw-bold">
                                        <tr>
                                            <th>School Name</th>
                                            <th>Majoring</th>
                                            <th>Year (From - To)</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="elementary_school" class="form-control"
                                                    placeholder="Elementary School"></td>
                                            <td><input type="text" name="elementary_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="elementary_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="elementary_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="junior_high_school" class="form-control"
                                                    placeholder="Jr. High School"></td>
                                            <td><input type="text" name="junior_high_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="junior_high_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="junior_high_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="senior_high_school" class="form-control"
                                                    placeholder="Sr. High School"></td>
                                            <td><input type="text" name="senior_high_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="senior_high_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="senior_high_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="diploma" class="form-control"
                                                    placeholder="Academic (D3)"></td>
                                            <td><input type="text" name="diploma_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="diploma_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="diploma_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="bachelor" class="form-control"
                                                    placeholder="Bachelor (S1)"></td>
                                            <td><input type="text" name="bachelor_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="bachelor_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="bachelor_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="master" class="form-control"
                                                    placeholder="Master (S2)"></td>
                                            <td><input type="text" name="master_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="master_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="master_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="doctor" class="form-control"
                                                    placeholder="Doctor (S3)"></td>
                                            <td><input type="text" name="doctor_major" class="form-control"
                                                    placeholder="Majoring"></td>
                                            <td><input type="text" name="doctor_year" class="form-control"
                                                    placeholder="From - To"></td>
                                            <td><input type="text" name="doctor_remarks" class="form-control"
                                                    placeholder="Remarks"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Certificate / Training Program / Specialty -->
                            <h5 class="fs-title mt-4">Certificate / Training Program / Specialty</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="fw-bold">
                                        <tr>
                                            <th>Kind</th>
                                            <th>Year</th>
                                            <th>Institution</th>
                                            <th>Certified</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="certificate_kind_1" class="form-control"
                                                    placeholder="Certificate Type"></td>
                                            <td><input type="text" name="certificate_year_1" class="form-control"
                                                    placeholder="Year"></td>
                                            <td><input type="text" name="certificate_institution_1"
                                                    class="form-control" placeholder="Institution"></td>
                                            <td><select name="certificate_certified_1" class="form-select">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="certificate_kind_2" class="form-control"
                                                    placeholder="Certificate Type"></td>
                                            <td><input type="text" name="certificate_year_2" class="form-control"
                                                    placeholder="Year"></td>
                                            <td><input type="text" name="certificate_institution_2"
                                                    class="form-control" placeholder="Institution"></td>
                                            <td><select name="certificate_certified_2" class="form-select">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="certificate_kind_3" class="form-control"
                                                    placeholder="Certificate Type"></td>
                                            <td><input type="text" name="certificate_year_3" class="form-control"
                                                    placeholder="Year"></td>
                                            <td><input type="text" name="certificate_institution_3"
                                                    class="form-control" placeholder="Institution"></td>
                                            <td><select name="certificate_certified_3" class="form-select">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="certificate_kind_4" class="form-control"
                                                    placeholder="Certificate Type"></td>
                                            <td><input type="text" name="certificate_year_4" class="form-control"
                                                    placeholder="Year"></td>
                                            <td><input type="text" name="certificate_institution_4"
                                                    class="form-control" placeholder="Institution"></td>
                                            <td><select name="certificate_certified_4" class="form-select">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Language and Computer Abilities -->
                            <h5 class="fs-title mt-4">Language and Computer Abilities</h5>
                            <p>Proficiency Scale for Languages</p>
                            <div class="row">
                                <div class="col-6">
                                    <label>Language 1</label>
                                    <input type="text" name="language_1" class="form-control"
                                        placeholder="Language Name">
                                </div>
                                <div class="col-6">
                                    <label>Language 2</label>
                                    <input type="text" name="language_2" class="form-control"
                                        placeholder="Language Name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-2">
                                    <label>Computer Programs</label>
                                    <textarea name="computer_programs" class="form-control" placeholder="List of computer programs"></textarea>
                                </div>
                            </div>

                            <!-- Organizational Experiences Section -->
                            <h5 class="fs-title mt-4">Organizational Experiences</h5>
                            <div class="table-responsive">
                                <table class="table" id="organization-table">
                                    <thead class="fw-bold">
                                        <tr>
                                            <th>Organization Name</th>
                                            <th>Position</th>
                                            <th>Period</th>
                                            <th><button type="button" class="btn btn-success"
                                                    id="add-org-row">Add</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="organization_name_1" class="form-control"
                                                    placeholder="Organization Name"></td>
                                            <td><input type="text" name="organization_position_1" class="form-control"
                                                    placeholder="Position"></td>
                                            <td><input type="text" name="organization_period_1" class="form-control"
                                                    placeholder="Period"></td>
                                            <td><button type="button"
                                                    class="btn btn-danger remove-org-row">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>

                        <!-- Step 3 -->
                      <fieldset>
    <h2 class="fs-title">Personal Information and Last Remuneration</h2>
    <h3 class="fs-subtitle">Please provide your personal details and remuneration information</h3>

    <!-- Personal Information Section -->
    <h5 class="fs-title">Personal Information</h5>
    <div class="row">
        <div class="col-6">
            <label for="name">Name</label>
            <input type="text" name="personal_info[name]" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="col-6">
            <label for="occupation">Occupation</label>
            <input type="text" name="personal_info[occupation]" class="form-control" placeholder="Enter your occupation" required>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="personal_info[phone_number]" class="form-control" placeholder="Enter your phone number (excluding relatives)" required>
        </div>
    </div>

    <!-- Last Remuneration Section -->
    <h5 class="fs-title mt-4">Last Remuneration</h5>
    <div class="row">
        <div class="col-6">
            <label for="basic_salary">Basic Salary</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="last_remuneration[basic_salary]" class="form-control" placeholder="Enter amount" required>
            </div>
            <label class="mt-1">Salary Type</label>
            <select name="last_remuneration[basic_salary_type]" class="form-select" required>
                <option value="nett">Nett</option>
                <option value="gross">Gross</option>
            </select>
        </div>
        <div class="col-6">
            <label for="allowances">Allowances</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="last_remuneration[allowances]" class="form-control" placeholder="Enter amount" required>
            </div>
            <label class="mt-1">Allowances Type</label>
            <select name="last_remuneration[allowances_type]" class="form-select" required>
                <option value="nett">Nett</option>
                <option value="gross">Gross</option>
            </select>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <label for="other_benefits">Other Benefits</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="last_remuneration[other_benefits]" class="form-control" placeholder="Enter amount" required>
            </div>
            <label class="mt-1">Benefits Type</label>
            <select name="last_remuneration[other_benefits_type]" class="form-select" required>
                <option value="nett">Nett</option>
                <option value="gross">Gross</option>
            </select>
        </div>
        <div class="col-6">
            <label for="take_home_pay">Take Home Pay</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="last_remuneration[take_home_pay]" class="form-control" placeholder="Enter amount" required>
            </div>
            <label class="mt-1">Take Home Pay Type</label>
            <select name="last_remuneration[take_home_pay_type]" class="form-select" required>
                <option value="nett">Nett</option>
                <option value="gross">Gross</option>
            </select>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <label for="other_facilities">Other Facilities</label>
            <textarea name="last_remuneration[other_facilities]" class="form-control" placeholder="Other benefits or facilities you received" required></textarea>
        </div>
    </div>

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>




                        <!-- Step 4 -->
                        <fieldset>
                            <h2 class="fs-title">Average Fast Glucose</h2>
                            <h3 class="fs-subtitle">Enter your average fasting glucose level</h3>
                            <input type="number" name="fast_glucose" placeholder="Average Fast Glucose?" required>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customstyle')
    <style>
        #msform {
            width: 100%;
            text-align: ;
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            display: none;
        }

        #msform fieldset:first-of-type {
            display: block;
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step;
            display: flex;
            justify-content: space-between;
            list-style-type: none;
            padding: 0;
            position: relative;
        }

        #progressbar li {
            text-transform: uppercase;
            font-size: 12px;
            text-align: center;
            position: relative;
            flex: 1;
            color: gray;
        }

        #progressbar li.active {
            color: #27AE60;
        }

        #progressbar li::before {
            content: counter(step);
            counter-increment: step;
            width: 30px;
            height: 30px;
            background: lightgray;
            border-radius: 50%;
            display: block;
            margin: 0 auto 10px;
            line-height: 30px;
            color: #fff;
        }

        #progressbar li.active::before {
            background: #27AE60;
        }

        /* Garis konektor antar lingkaran */
        #progressbar li::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            background: lightgray;
            top: 15px;
            left: -50%;
            z-index: -1;
        }

        #progressbar li.active::after {
            background: #27AE60;
        }

        #progressbar li:first-child::after {
            content: none;
        }


        .action-button {
            background: #27AE60;
            color: white;
            border: 0 none;
            padding: 10px 20px;
            cursor: pointer;
            margin: 5px;
            border-radius: 3px;
        }
    </style>
@endsection

@section('scripts')
    <script>
        let current = 0;
        const fieldsets = document.querySelectorAll("fieldset");
        const progressItems = document.querySelectorAll("#progressbar li");

        document.querySelectorAll(".next").forEach((btn) =>
            btn.addEventListener("click", () => {
                if (current < fieldsets.length - 1) {
                    fieldsets[current].style.display = "none";
                    current++;
                    fieldsets[current].style.display = "block";
                    updateProgress();
                }
            })
        );

        document.querySelectorAll(".previous").forEach((btn) =>
            btn.addEventListener("click", () => {
                if (current > 0) {
                    fieldsets[current].style.display = "none";
                    current--;
                    fieldsets[current].style.display = "block";
                    updateProgress();
                }
            })
        );

        function updateProgress() {
            progressItems.forEach((item, index) => {
                if (index <= current) {
                    item.classList.add("active");
                    switch (index) {
                        case 0:
                            item.innerHTML = "Personal Information";
                            break;
                        case 1:
                            item.innerHTML = "Education & Organisation";
                            break;
                        case 2:
                            item.innerHTML = "Experiences";
                            break;
                        case 3:
                            item.innerHTML = "Others";
                            break;
                    }
                } else {
                    item.classList.remove("active");
                    item.innerHTML = "";
                }
            });
        }
    </script>
    <script>
        function addRow() {
            const table = document.getElementById("siblingsTable").getElementsByTagName("tbody")[0];
            const rowCount = table.rows.length;
            const newRow = table.insertRow();

            newRow.innerHTML = `
            <td class="fw-bold pe-2">${rowCount + 1}</td>
            <td><input type="text" name="sibling_name[]" class="form-control" placeholder="Name"></td>
            <td><input type="text" name="sibling_sex[]" class="form-control" placeholder="M/F"></td>
            <td><input type="text" name="sibling_education[]" class="form-control" placeholder="Education"></td>
            <td><input type="text" name="sibling_occupation[]" class="form-control" placeholder="Occupation"></td>
            <td><input type="text" name="sibling_employer[]" class="form-control" placeholder="Employer"></td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
            </td>
        `;
        }

        function removeRow(button) {
            const row = button.parentElement.parentElement;
            row.parentElement.removeChild(row);

            // Update row numbers
            const table = document.getElementById("siblingsTable").getElementsByTagName("tbody")[0];
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[0].innerText = i + 1;
            }
        }
    </script>
    <script>
        // Fungsi untuk menambah baris baru
        function addChildRow() {
            const table = document.getElementById("childrenTable").getElementsByTagName("tbody")[0];
            const rowCount = table.rows.length;
            const newRow = table.insertRow();

            newRow.innerHTML = `
            <td class="fw-bold pe-2">${rowCount + 1}</td>
            <td><input type="text" name="child_name[]" class="form-control" placeholder="Name"></td>
            <td><input type="text" name="child_sex[]" class="form-control" placeholder="M/F"></td>
            <td><input type="text" name="child_age[]" class="form-control" placeholder="Age"></td>
            <td>
                <button type="button" class="btn btn-outline-danger p-2" onclick="removeChildRow(this)">-</button>
            </td>
        `;
        }

        // Fungsi untuk menghapus baris tertentu
        function removeChildRow(button) {
            const row = button.parentElement.parentElement; // Cari baris terkait
            row.parentElement.removeChild(row); // Hapus baris

            // Perbarui nomor urut
            const table = document.getElementById("childrenTable").getElementsByTagName("tbody")[0];
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[0].innerText = i + 1;
            }
        }
    </script>



    <!-- Script for dynamic row addition/removal -->
    <script>
        document.getElementById('add-org-row').addEventListener('click', function() {
            const table = document.getElementById('organization-table').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow(table.rows.length);

            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);
            const cell4 = newRow.insertCell(3);

            cell1.innerHTML =
                `<input type="text" name="organization_name_" class="form-control" placeholder="Organization Name">`;
            cell2.innerHTML =
                `<input type="text" name="organization_position_" class="form-control" placeholder="Position">`;
            cell3.innerHTML =
                `<input type="text" name="organization_period_" class="form-control" placeholder="Period">`;
            cell4.innerHTML = `<button type="button" class="btn btn-danger remove-org-row">Remove</button>`;

            // Add event listener for remove button
            cell4.querySelector('.remove-org-row').addEventListener('click', function() {
                table.deleteRow(newRow.rowIndex);
            });
        });

        // Event delegation to handle removing rows for dynamically added ones
        document.getElementById('organization-table').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-org-row')) {
                const row = event.target.closest('tr');
                row.parentNode.removeChild(row);
            }
        });
    </script>
@endsection
