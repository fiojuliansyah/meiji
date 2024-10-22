@extends('layouts.guest.app')

@section('content')
<main class="main">
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="box-border-single">
                        <div class="row mt-10">
                            <div class="col-lg-8 col-md-12">
                                <h3>{{$career->name}}</h3>
                                <div class="mt-0 mb-15 mt-15"><span class="card-briefcase">{{$career->type->name}}</span><span class="card-time">{{ $career->created_at->diffForHumans() }}</span></div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-lg-end">
                                <div class="btn btn-apply-icon btn-danger text-white
                                 hover-up" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm-{{$career->id}}">Apply now</div>
                            </div>
                        </div>
                        <div class="border-bottom pt-10 pb-10"></div>
                        <div class="banner-hero banner-image-single mt-10 mb-20"><img src="/fe_assets/imgs/page/job-single-2/img.png" alt="jobBox"></div>
                        <div class="job-overview">
                            <h5 class="border-bottom pb-15 mb-30">Overview</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/industry.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description industry-icon mb-10">Departement</span><strong class="small-heading"> {{$career->departement->name}}</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/job-level.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description joblevel-icon mb-10">Job level</span><strong class="small-heading">{{$career->level->name}}</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/salary.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description salary-icon mb-10 ">Salary</span><strong class="small-heading">Rp. {{ number_format($career->salary, 0, ',', '.')??'-' }}</strong></div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/experience.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description experience-icon mb-10">Experience</span><strong class="small-heading">{{$career->experience}}</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/job-type.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Job type</span><strong class="small-heading">{{$career->type->name}}</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/deadline.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Deadline</span><strong class="small-heading">{{ \Carbon\Carbon::parse($career->deadline_date)->format('d/m/y') }}</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/updated.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Updated</span><strong class="small-heading">{{ \Carbon\Carbon::parse($career->update_at??$career->created_at)->format('d/m/y') }}</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img src="/fe_assets/imgs/page/job-single/location.svg" alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Location</span><strong class="small-heading">{{$career->location->name}}</strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single">
                            {!! $career->description !!}
                        </div>
                        <div class="single-apply-jobs">
                            <div class="row align-items-center">
                                <div class="col-md-5"><a class="btn btn-danger mr-15" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm-{{$career->id}}" href="">Apply now</a><a class="btn btn-border" href="#">Save job</a></div>
                                <div class="col-md-7 text-lg-end social-share">
                                    <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Share this</h6><a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox" src="/fe_assets/imgs/template/icons/share-fb.svg"></a><a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox" src="/fe_assets/imgs/template/icons/share-tw.svg"></a><a class="mr-5 d-inline-block d-middle" href="#"><img alt="jobBox" src="/fe_assets/imgs/template/icons/share-red.svg"></a><a class="d-inline-block d-middle" href="#"><img alt="jobBox" src="/fe_assets/imgs/template/icons/share-whatsapp.svg"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure class="w-25"><img alt="jobBox" src="/fe_assets/imgs/page/job-single/avatar.png" class="border border-rounded p-3" width="64" height=""></figure>
                                <div class="sidebar-info"><span class="sidebar-company">Location</span><span class="card-location">{{$career->location->name}}</span></div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">
                                <iframe
                                    src="https://www.openstreetmap.org/export/embed.html?bbox={{ $longitude??'' }},{{ $latitude ?? '' }}&marker={{ $latitude ?? '' }},{{ $longitude ?? '' }}"
                                    width="600" height="200" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <ul class="ul-disc">
                                <li>{{$address}}</li>
                                <li>Phone: (62-21) 21 383 388</li>
                                <li>Email: hr@meiji.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-border">
                        <h6 class="f-18">Other Careers</h6>
                        <div class="sidebar-list-job">
                            <ul>
                                @foreach ($otherCareers as $other)
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="{{route('career-detail',$other->id)}}"><img src="{{ $other->departement->img_url ?? '../assets/media/logos/logo-meiji-1.png' }}" alt="jobBox"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="{{route('career-detail',$other->id)}}">{{$other->name}}</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">{{$other->type->name}}</span><span class="card-time">{{ $other->created_at->diffForHumans() }}</span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price text-danger">Rp. {{ number_format($other->salary, 0, ',', '.') }}</h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">{{$other->location->name}}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50 mb-50">
        <div class="container">
            <div class="text-left">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Featured Jobs</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news, updates and tips</p>
            </div>
            <div class="mt-50">
                <div class="box-swiper style-nav-top">
                    <div class="swiper-container swiper-group-4 swiper">
                        <div class="swiper-wrapper pb-10 pt-5">
                            <div class="swiper-slide">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img src="/fe_assets/imgs/brands/brand-6.png" alt="jobBox"></div>
                                        <div class="right-info"><a class="name-job" href="company-details.html">Quora JSC</a><span class="location-small">New York, US</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span class="card-time">5<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="mt-30"><a class="btn btn-grey-small mr-5" href="job-details.html">PHP</a><a class="btn btn-grey-small mr-5" href="job-details.html">Android </a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$800</span><span class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm-{{$career->id}}">Apply now</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img src="/fe_assets/imgs/brands/brand-4.png" alt="jobBox"></div>
                                        <div class="right-info"><a class="name-job" href="company-details.html">Dailymotion</a><span class="location-small">New York, US</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href="job-details.html">Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="mt-30"><a class="btn btn-grey-small mr-5" href="jobs-grid.html">Typescript</a><a class="btn btn-grey-small mr-5" href="jobs-grid.html">Java</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm ">Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img src="/fe_assets/imgs/brands/brand-8.png" alt="jobBox"></div>
                                        <div class="right-info"><a class="name-job" href="company-details.html">Periscope</a><span class="location-small">New York, US</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href="job-details.html">Lead Quality Control QA</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="mt-30"><a class="btn btn-grey-small mr-5" href="job-details.html">iOS</a><a class="btn btn-grey-small mr-5" href="job-details.html">Laravel</a><a class="btn btn-grey-small mr-5" href="job-details.html">Golang</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img src="/fe_assets/imgs/brands/brand-4.png" alt="jobBox"></div>
                                        <div class="right-info"><a class="name-job" href="company-details.html">Dailymotion</a><span class="location-small">New York, US</span></div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href="job-details.html">Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="mt-30"><a class="btn btn-grey-small mr-5" href="jobs-grid.html">Typescript</a><a class="btn btn-grey-small mr-5" href="jobs-grid.html">Java</a>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next-4"></div>
                    <div class="swiper-button-prev swiper-button-prev-4"></div>
                </div>
                <div class="text-center"><a class="btn btn-grey" href="#">Load more posts</a></div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter">
                <div class="row">
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="/fe_assets/imgs/template/newsletter-left.png" alt="joxBox"></div>
                    <div class="col-lg-12 col-xl-6 col-12">
                        <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                        <div class="box-form-newsletter mt-40">
                            <form class="form-newsletter">
                                <input class="input-newsletter" type="text" value="" placeholder="Enter your email here">
                                <button class="btn  font-heading icon-send-letter btn-danger text-white">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="/fe_assets/imgs/template/newsletter-right.png" alt="joxBox"></div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.components.guest.modal')


@endsection

@section('scripts')


@endsection