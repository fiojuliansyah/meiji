@extends('layouts.guest.app')

@section('content')
<section class="section-box mt-30">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                <div class="content-page">
                    <div class="box-filters-job">
                        <div class="row">
                            <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing <strong>41-60
                                    </strong>of <strong>944 </strong>jobs</span></div>
                            <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                <div class="display-flex2">
                                    <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                                        <div class="dropdown dropdown-sort">
                                            <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                data-bs-display="static"><span>12</span><i
                                                    class="fi-rr-angle-small-down"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-light"
                                                aria-labelledby="dropdownSort">
                                                <li><a class="dropdown-item active" href="#">10</a></li>
                                                <li><a class="dropdown-item" href="#">12</a></li>
                                                <li><a class="dropdown-item" href="#">20</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-border"><span class="text-sortby">Sort by:</span>
                                        <div class="dropdown dropdown-sort">
                                            <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                data-bs-display="static"><span>Newest Post</span><i
                                                    class="fi-rr-angle-small-down"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-light"
                                                aria-labelledby="dropdownSort2">
                                                <li><a class="dropdown-item active" href="#">Newest Post</a></li>
                                                <li><a class="dropdown-item" href="#">Oldest Post</a></li>
                                                <li><a class="dropdown-item" href="#">Rating Post</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-view-type"><a class="view-type" href="jobs-list.html"><img
                                                src="/fe_assets/imgs/template/icons/icon-list.svg" alt="jobBox"></a><a
                                            class="view-type" href="jobs-grid.html"><img
                                                src="/fe_assets/imgs/template/icons/icon-grid-hover.svg"
                                                alt="jobBox"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($careers as $career)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card-grid-2 hover-up">
                                <div class="card-grid-2-image-left"><span class="flash"></span>
                                    <div class="image-box"><img
                                            src="{{ $career->departement->img_url ?? 'assets/media/logos/logo-meiji-1.png' }}"
                                            alt="jobBox"></div>
                                    <div class="right-info"><a class="name-job"
                                            href="company-details.html">{{ $career->name }}</a><span
                                            class="location-small">{{ $career->location->name }}</span></div>
                                </div>
                                <div class="card-block-info">
                                    <h6><a href="job-details.html">{{ $career->departement->name }}</a></h6>
                                    <div class="mt-5"><span
                                            class="card-briefcase">{{ $career->type->name }}</span><span
                                            class="card-time">{{ $career->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="font-sm color-text-paragraph mt-15" style="text-align:justify;display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{!! $career->description !!} </div>
                                    <div class="card-2-bottom mt-30">
                                        <div class="row">
                                            <div class="col-lg-7 col-7"><span
                                                    class="card-text-price fs-6">Rp.{{ number_format($career->salary, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="col-lg-5 col-5 text-end">
                                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                    data-bs-target="#ModalApplyJobForm">Apply now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="paginations">
                    <ul class="pager">
                        <li><a class="pager-prev" href="#"></a></li>
                        <li><a class="pager-number" href="#">1</a></li>
                        <li><a class="pager-number" href="#">2</a></li>
                        <li><a class="pager-number" href="#">3</a></li>
                        <li><a class="pager-number" href="#">4</a></li>
                        <li><a class="pager-number" href="#">5</a></li>
                        <li><a class="pager-number active" href="#">6</a></li>
                        <li><a class="pager-number" href="#">7</a></li>
                        <li><a class="pager-next" href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="sidebar-shadow none-shadow mb-30">
                    <div class="sidebar-filters">
                        <div class="filter-block head-border mb-30">
                            <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
                        </div>
                        <div class="filter-block mb-30">
                            <div class="form-group select-style select-style-icon">
                                <select class="form-control form-icons select-active">
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->name }}">{{ $location->name }}</option>
                                    @endforeach
                                </select><i class="fi-rr-marker"></i>
                            </div>
                        </div>
                        <div class="filter-block mb-20">
                            <h5 class="medium-heading mb-15">Departement</h5>
                            <div class="form-group">
                                <ul class="list-checkbox">
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox" checked="checked"><span
                                                class="text-small">All</span><span class="checkmark"></span>
                                        </label><span class="number-item">{{ $totalCareers }}</span>
                                    </li>
                                    @foreach ($departements as $departement)
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span
                                                class="text-small">{{ $departement->name }}</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">{{ $departement->careers_count }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter-block mb-20">
                            <h5 class="medium-heading mb-25">Salary Range</h5>
                            <div class="list-checkbox pb-20">
                                <div class="row position-relative mt-10 mb-20">
                                    <div class="col-sm-12 box-slider-range">
                                        <div id="slider-range"></div>
                                    </div>
                                    <div class="box-input-money">
                                        <input class="input-disabled form-control min-value-money" type="text"
                                            name="min-value-money" disabled="disabled" value="{{ $minSalary }}">
                                        <input class="form-control min-value" type="hidden" name="min-value"
                                            value="{{ $minSalary }}">
                                    </div>
                                </div>
                                <div class="box-number-money">
                                    <div class="row mt-30">
                                        <div class="col-sm-6 col-6"><span
                                                class="font-sm color-brand-1"> {{number_format($minSalary, 0, ',', '.')}} </span></div>
                                        <div class="col-sm-6 col-6 text-end"><span
                                                class="font-sm color-brand-1"> {{number_format($maxSalary, 0, ',', '.')}}</span></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-10">Experience Level</h5>
                            <div class="form-group">
                                <ul class="list-checkbox">
                                    @foreach ($levels as $level)
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span
                                                class="text-small">{{ $level->name }}</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">{{ $level->careers_count }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-10">Onsite</h5>
                            <div class="form-group">
                                <ul class="list-checkbox">
                                    @foreach ($placements as $placement)
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span
                                                class="text-small">{{ $placement->placement }}</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">{{ $placement->count }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="filter-block mb-20">
                            <h5 class="medium-heading mb-15">Job type</h5>
                            <div class="form-group">
                                <ul class="list-checkbox">
                                    @foreach ($types as $type)
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span
                                                class="text-small">{{ $type->name }}</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">{{ $type->careers_count }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-box mt-50 mb-50">
    <div class="container">
        <div class="text-start">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">News and Blog</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news,
                updates and tips</p>
        </div>
    </div>
    <div class="container">
        <div class="mt-50">
            <div class="box-swiper style-nav-top">
                <div class="swiper-container swiper-group-3 swiper">
                    <div class="swiper-wrapper pb-70 pt-5">
                        <div class="swiper-slide">
                            <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                <div class="text-center card-grid-3-image"><a href="#">
                                        <figure><img alt="jobBox"
                                                src="/fe_assets/imgs/page/homepage1/img-news1.png"></figure>
                                    </a></div>
                                <div class="card-block-info">
                                    <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a>
                                    </div>
                                    <h5><a href="blog-details.html">21 Job Interview Tips: How To Make a Great
                                            Impression</a></h5>
                                    <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the
                                        world&amp;rsquo;s most sustainable healthcare company by creating high-quality
                                        healthcare products in iconic, sustainable packaging.</p>
                                    <div class="card-2-bottom mt-20">
                                        <div class="row">
                                            <div class="col-lg-6 col-6">
                                                <div class="d-flex"><img class="img-rounded"
                                                        src="/fe_assets/imgs/page/homepage1/user1.png" alt="jobBox">
                                                    <div class="info-right-img"><span
                                                            class="font-sm font-bold color-brand-1 op-70">Sarah
                                                            Harding</span><br><span
                                                            class="font-xs color-text-paragraph-2">06 September</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end col-6 pt-15"><span
                                                    class="color-text-paragraph-2 font-xs">8 mins to read</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                <div class="text-center card-grid-3-image"><a href="#">
                                        <figure><img alt="jobBox"
                                                src="/fe_assets/imgs/page/homepage1/img-news2.png"></figure>
                                    </a></div>
                                <div class="card-block-info">
                                    <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">Events</a>
                                    </div>
                                    <h5><a href="blog-details.html">39 Strengths and Weaknesses To Discuss in a Job
                                            Interview</a></h5>
                                    <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the
                                        world&amp;rsquo;s most sustainable healthcare company by creating high-quality
                                        healthcare products in iconic, sustainable packaging.</p>
                                    <div class="card-2-bottom mt-20">
                                        <div class="row">
                                            <div class="col-lg-6 col-6">
                                                <div class="d-flex"><img class="img-rounded"
                                                        src="/fe_assets/imgs/page/homepage1/user2.png" alt="jobBox">
                                                    <div class="info-right-img"><span
                                                            class="font-sm font-bold color-brand-1 op-70">Steven
                                                            Jobs</span><br><span
                                                            class="font-xs color-text-paragraph-2">06 September</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end col-6 pt-15"><span
                                                    class="color-text-paragraph-2 font-xs">6 mins to read</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                <div class="text-center card-grid-3-image"><a href="#">
                                        <figure><img alt="jobBox"
                                                src="/fe_assets/imgs/page/homepage1/img-news3.png"></figure>
                                    </a></div>
                                <div class="card-block-info">
                                    <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a>
                                    </div>
                                    <h5><a href="blog-details.html">Interview Question: Why Dont You Have a Degree?</a>
                                    </h5>
                                    <p class="mt-10 color-text-paragraph font-sm">Learn how to respond if an
                                        interviewer asks you why you dont have a degree, and read example answers that
                                        can help you craft</p>
                                    <div class="card-2-bottom mt-20">
                                        <div class="row">
                                            <div class="col-lg-6 col-6">
                                                <div class="d-flex"><img class="img-rounded"
                                                        src="/fe_assets/imgs/page/homepage1/user3.png" alt="jobBox">
                                                    <div class="info-right-img"><span
                                                            class="font-sm font-bold color-brand-1 op-70">Wiliam
                                                            Kend</span><br><span
                                                            class="font-xs color-text-paragraph-2">06 September</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end col-6 pt-15"><span
                                                    class="color-text-paragraph-2 font-xs">9 mins to read</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="text-center"><a class="btn btn-brand-1 btn-icon-load mt--30 hover-up"
                    href="blog-grid.html">Load More Posts</a></div>
        </div>
    </div>
</section>
<section class="section-box mt-50 mb-20">
    <div class="container">
        <div class="box-newsletter">
            <div class="row">
                <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                        src="/fe_assets/imgs/template/newsletter-left.png" alt="joxBox"></div>
                <div class="col-lg-12 col-xl-6 col-12">
                    <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                    <div class="box-form-newsletter mt-40">
                        <form class="form-newsletter">
                            <input class="input-newsletter" type="text" value=""
                                placeholder="Enter your email here">
                            <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                        src="/fe_assets/imgs/template/newsletter-right.png" alt="joxBox"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var minSalary = <?php echo $minSalary; ?>; // Tanpa json_encode
    var maxSalary = <?php echo $maxSalary; ?>; // Tanpa json_encode
</script>
@endsection