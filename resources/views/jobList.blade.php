@extends('layouts.guest.app')

@section('content')
@livewire('career-filter')
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
                            <button class="btn btn-danger text-light font-heading icon-send-letter">Subscribe</button>
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

<!-- Toast Container -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 11">
    <!-- Success Toast -->
    @if (session('success'))
    <div id="successToast" class="toast bg-opacity-50  align-items-center text-dark bg-success border-0" style="opacity: 95%;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body me-3 fw-bold text-justify">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <!-- Error Toast -->
    @if (session('error'))
    <div id="errorToast" class="toast align-items-center text-dark bg-danger border-0 error-toast" style="opacity: 95%;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body me-3 fw-bold text-justify">
                {{ session('error') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif
</div>



<!-- Toast Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successToastEl = document.getElementById('successToast');
        if (successToastEl) {
            var successToast = new bootstrap.Toast(successToastEl, {
                delay: 5000
            });
            successToast.show();
        }

        var errorToastEl = document.getElementById('errorToast');
        if (errorToastEl) {
            var errorToast = new bootstrap.Toast(errorToastEl, {
                delay: 5000
            });
            errorToast.show();
        }
    });
</script>
<script>
    var minSalary = <?php echo $minSalary; ?>; // Tanpa json_encode
    var maxSalary = <?php echo $maxSalary; ?>; // Tanpa json_encode
</script>
<script>
    $(document).ready(function() {
        $('#select2').select2();

    });
</script>


@endsection