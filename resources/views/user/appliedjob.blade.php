@extends('layouts.guest.app')

@section('content')
    <div class="container py-md-5">
        <div class="row align-items-center justify-items-center mb-2">
            <div class="col-6">
                <div>
                    <h4 class="mb-0">Applied Jobs</h4>
                </div>
            </div><!--end col-->
            <div class="col-6">
                <form action="" method="GET">
                    <div class="candidate-list-widgets">
                        <div class="row justify-content-end">
                            <div class="col-lg-5">
                                <div class="selection-widget">
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
                <div class="col-lg-12 mb-4">
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
                                        class="btn btn-outline-secondary me-2 btn-sm">Job Detail</a>

                                    <!-- Periksa apakah schedule ada dan memiliki description -->
                                    @if ($applied->schedule && $applied->schedule->first() && $applied->schedule->first()->description)
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#message-applied-{{ $applied->id }}">
                                            Message
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- MODAL -->
    @foreach ($appliedCareers as $applied)
        <!-- Modal untuk setiap applicant -->
        <div class="modal fade" tabindex="-1" id="message-applied-{{ $applied->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Congratulations! You have been selected for the {{ $applied->status->status }}.
                            
                        </div>
                        <!-- Tampilkan tanggal dan waktu serta deskripsi schedule dalam textarea -->
                        @if ($applied->schedule && $applied->schedule->first())
                            <div class="mb-3 row">
                                <h6 class="text-center mb-3">Schedule {{ $applied->status->status }}</h6>
                                <div class="col-6 text-center">
                                    <label for="schedule-date" class="form-label"> Date</label>
                                    <input type="date" class="form-control form-control-sm" id="schedule-date"
                                        value="{{ $applied->schedule->first()->date }}" readonly>
                                </div>
                                <div class="col-6 text-center">
                                    <label for="schedule-time" class="form-label">Time</label>
                                    <input type="time" class="form-control form-control-sm" id="schedule-time"
                                        value="{{ $applied->schedule->first()->time }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="schedule-description" rows="3" readonly>{{ $applied->schedule->first()->description }}</textarea>
                            </div>
                        @else
                            <p>No schedule description available.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <!-- END MODAL -->
@endsection
