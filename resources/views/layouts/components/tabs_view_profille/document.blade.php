<div class="tab-pane fade" id="document" role="tabpanel">
    <div class="card mb-5 mb-xl-10">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
            data-bs-target="#kt_docs_card_document">
            <h3 class="card-title">Documents</h3>
            <div class="card-toolbar rotate-180">
                <i class="ki-duotone ki-down fs-1"></i>
            </div>
        </div>
        <div id="kt_docs_card_document" class="collapse show ">
            <div class="card-body p-9">
                <div class="row">
                    @foreach ($documents as $document )
                    <div class=" col-lg-4 col-6 mb-5 mb-xl-2">
                        <div class="border border-gray-500 border-1 border-dashed rounded p-5 ">
                            <div class=" text-center mb-4">
                                <span class="badge badge-outline badge-success fs-4">{{$document->type??''}}</span>
                            </div>
                            @if (pathinfo($document->document_url, PATHINFO_EXTENSION) == 'pdf')
                            <a class="d-block overlay"
                                href="{{$document->document_url}}" target="_blank">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center text-center bgi-size-cover card-rounded min-w-100px min-h-100px mb-4">
                                    <img src="assets/media/logos/adobe.png" class="mx-auto rounded"
                                        alt="PDF" height="100" width="120">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="fas fa-eye fs-2x text-white">
                                    </i>
                                </div>
                            </a>
                            @else
                            <a class="d-block overlay" data-fslightbox="document"
                                href="{{$document->document_url}}">
                                <div
                                    class="overlay-wrapper bgi-no-repeat bgi-position-center text-center bgi-size-cover card-rounded min-w-100px min-h-100px mb-4">
                                    <img src="{{$document->document_url}}" class="mx-auto rounded"
                                        alt="" height="100" width="100">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="fas fa-eye fs-2x text-white">
                                    </i>
                                </div>
                            </a>
                            @endif
                            <div class="fs-4 fw-bold  text-center"> {{$document->name??'-'}}</div>
                            <div class="fw-semibold fs-6 text-gray-500 text-center mb-7">Expires
                                at : {{$document->validate_date??'-'}}</div>
                            <div class="text-center">
                                <button class="btn btn-sm btn-secondary me-2"
                                    style="width: 70px; height: 40px;">Edit</button>

                                <a class="btn btn-sm btn-danger "
                                    style="width: 70px; height: 40px;"
                                    onclick="ConfirmationDelete({{ $document->id }},'{{ $document->name }}','delete-document')">Delete</a>
                                <form action="{{ route('document.delete', $document->id) }}"
                                    id="delete-document-{{ $document->id }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-4 col-6 text-center">
                        <div class="border border-primary border-1 border-dashed rounded p-5 bg-light-primary ">
                            <img src="../assets/media/illustrations/sketchy-1/4.png" alt=""
                                class="img-fluid w-75 ">
                            <p class="text-gray-500 "> Add New Your Document!</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_document">+ New</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="new_document">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Document</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <form id="kt_modal_add_user_form" class="form" action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 fw-bold mb-2">Document Type</label>
                            <select class="form-select" data-placeholder="Select an option" name="type">
                                <option disabled selected>Select Type </option>
                                <option value="CV">CV</option>
                                <option value="KTP">KTP</option>
                                <option value="SIM">SIM</option>
                                <option value="NPWP">NPWP</option>
                                <option value="IJAZAH">IJAZAH</option>
                                <option value="KARTU KELUARGA">KARTU KELUARGA</option>
                                <option value="PAKLARING">PAKLARING</option>
                                <option value="CERTIFICATE">CERTIFICATE</option>
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 fw-bold mb-2">Document Name <span class="fs-8">(optional)</span></label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter your New Document Name" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 fw-bold mb-2">Expired Date <span class="fs-8">(optional)</span></label>
                            <input type="date" name="validate_date" class="form-control mb-3 mb-lg-0" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 fw-bold mb-2">Document File</label>
                            <input type="file" name="document" class="form-control " />
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-users-modal-action="cancel">Discard</button>
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