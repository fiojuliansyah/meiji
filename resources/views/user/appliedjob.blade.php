@extends('layouts.guest.app')

@section('content')
    <div class="container py-md-5">
        <div class="row align-items-center justify-items-center mb-2">
            <div class="col-lg-6">
                <div>
                    <h6 class="fs-16 mb-0">Applied Jobs</h6>
                </div>
            </div><!--end col-->
            <div class="col-lg-6">
                <form action="" method="GET">
                    <div class="candidate-list-widgets">
                        <div class="row justify-content-end">
                            <div class="col-lg-5">
                                <div class="selection-widget ">
                                    <select class="form-select" name="order_by" id=""
                                        aria-label="Default select example">
                                        <option value="default">Default</option>
                                        <option value="newest">Newest</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="random">Random</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @if ($appliedCareers->isEmpty())
                <div class="alert alert-warning" role="alert">
                    No Applied Job Found.
                </div>
            @endif
            @foreach ($appliedCareers as $applied)
                <div class="col-lg-12 mb-4 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-center">
                                <!-- Gambar dengan ukuran otomatis -->
                                <div class="col-auto">
                                    <img src="{{ $applied->career->departement->img_url ?? 'assets/media/logos/logo-meiji-1.png' }}"
                                        alt="jobBox" class="img-fluid">
                                </div>
                                <!-- Judul mengambil sisa ruang -->
                                <div class="col ">
                                    <h5>{{ $applied->career->name }} <span
                                            class="ms-2 text-small">({{ $applied->career->departement->name }})</span></h5>
                                    <div>
                                        <div class="right-info">
                                            <span class="card-location">{{ $applied->career->location->name }}</span>
                                            <span class="card-briefcase">{{ $applied->career->type->name }}</span>
                                            <span class="card-time">{{ $applied->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 text-md-center">
                                    <p class="fw-lighter text-muted">status : </p>
                                    <span class="badge bg-{{ $applied->status->color }} py-2">
                                        {{ ucfirst($applied->status->status) }}
                                    </span>
                                </div>
                                <div class="col py-2 py-sm-0 text-md-center">
                                    <a href="{{ route('career-detail', $applied->career->id) }}"
                                        class="btn btn-outline-secondary me-2  btn-sm">Job Detail</a>
                                    <button class="btn btn-outline-primary btn-sm">Message</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
