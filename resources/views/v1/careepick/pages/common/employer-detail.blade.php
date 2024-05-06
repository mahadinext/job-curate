@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Header Information Start================================== -->
    <section class="primary-bg-dark position-relative">
        <div class="position-absolute top-0 start-0 opacity-50">
            <img src="{{ URL::asset('assets/img/circle.png') }}" alt="SVG" width="150">
        </div>
        <div class="position-absolute bottom-0 start-0 me-10 opacity-50">
            <img src="{{ URL::asset('assets/img/line.png') }}" alt="SVG" width="100">
        </div>
        <div class="position-absolute top-0 end-0 opacity-50">
            <img src="{{ URL::asset('assets/img/curve.png') }}" alt="SVG" width="150">
        </div>
        <div class="position-absolute bottom-0 end-0 opacity-50">
            <img src="{{ URL::asset('assets/img/circle.png') }}" alt="SVG" width="120">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="emplr-head-block">

                        <div class="emplr-head-left">
                            <div class="emplr-head-thumb">
                                <figure><img src="{{ URL::asset('assets/img/l-12.png') }}" class="img-fluid rounded" alt=""></figure>
                            </div>
                            <div class="emplr-head-caption">
                                <div class="emplr-head-caption-top">
                                    <div class="emplr-yior-1"><span class="label text-sm-muted text-light bg-warning">10
                                            Openings</span></div>
                                    <div class="emplr-yior-2">
                                        <h4 class="emplr-title text-light">Tripadvisor Inc.</h4>
                                    </div>
                                    <div class="emplr-yior-3 justify-content-start">
                                        <span class="text-light opacity-75"><i
                                                class="fa-solid fa-building-shield me-1"></i>Software</span>
                                        <span class="text-light opacity-75"><i
                                                class="fa-solid fa-location-dot me-1"></i>Canada, USA</span>
                                        <span class="text-light opacity-75"><i class="fa-solid fa-star me-1"></i>4.2 (412
                                            Reviews)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="emplr-head-right">
                            <button type="button" class="btn btn-success">Follow Now</button>
                            <button type="button" class="btn btn-outline-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#review"><i class="fa-solid fa-star me-2"></i>Write Review</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Header Information End ================================== -->

    <!-- ============================ Full Candidate Details Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <div class="row">

                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="cdtsr-groups-block">

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>About Company</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Our Award</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="row gx-3 gy-4">

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="{{ URL::asset('assets/img/award-1.png') }}" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>FIFFA Award</h6>
                                                <label>May 2014</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="{{ URL::asset('assets/img/award-2.png') }}" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>COMPRA Award</h6>
                                                <label>Dec 2017</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="{{ URL::asset('assets/img/award-4.png') }}" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>ICCPR Award</h6>
                                                <label>Apr 2022</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="{{ URL::asset('assets/img/award-3.png') }}" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>XICAGO Award</h6>
                                                <label>Jull 2022</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Company Services</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="cndts-all-skills-list">
                                    <span>WordPress Developements</span>
                                    <span>Java Developements</span>
                                    <span>HTML To WordPress</span>
                                    <span>PHP Developements</span>
                                    <span>UI/UX Design</span>
                                    <span>Laravel</span>
                                    <span>Magento 2.0</span>
                                </div>
                            </div>
                        </div>

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Portfolio</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="row gx-3 gy-3">

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="cndts-prt-block">
                                            <div class="cndts-prt-thumb">
                                                <img src="{{ URL::asset('assets/img/blog-1.jpg') }}" class="img-fluid rounded" alt="">
                                            </div>
                                            <div class="cndts-prt-link"><a href="JavaScript:Void(0);"><i
                                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="cndts-prt-block">
                                            <div class="cndts-prt-thumb">
                                                <img src="{{ URL::asset('assets/img/blog-2.jpg') }}" class="img-fluid rounded"
                                                    alt="">
                                            </div>
                                            <div class="cndts-prt-link"><a href="JavaScript:Void(0);"><i
                                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="cndts-prt-block">
                                            <div class="cndts-prt-thumb">
                                                <img src="{{ URL::asset('assets/img/blog-3.jpg') }}" class="img-fluid rounded"
                                                    alt="">
                                            </div>
                                            <div class="cndts-prt-link"><a href="JavaScript:Void(0);"><i
                                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>10 Openings</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <!-- Start All List -->
                                <div class="row justify-content-start gx-3 gy-4">

                                    <!-- Single Item -->
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb jbs-verified"><a
                                                            href="job-detail.html">
                                                            <figure><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid"
                                                                    alt=""></figure>
                                                        </a></div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap"><span
                                                                class="label text-success bg-light-success">Full
                                                                Time</span></div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4><a href="job-detail.html" class="jbs-job-title">Product
                                                                    Designer</a></h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>Tripadvisor</span>.<span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>California</span>.<span>07
                                                                    Apr 2023</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                        <h5 class="jbs-list-pack">$85K - 95K<span
                                                                class="patype">\PA</span></h5>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View
                                                        Detail</a>
                                                    <a href="JavaScript:Void(0);"
                                                        class="btn btn-md btn-primary px-3">Quick Apply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Item -->
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb"><a href="job-detail.html">
                                                            <figure><img src="{{ URL::asset('assets/img/l-2.png') }}" class="img-fluid"
                                                                    alt=""></figure>
                                                        </a></div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap"><span
                                                                class="label text-success bg-light-success">Full
                                                                Time</span></div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4><a href="job-detail.html" class="jbs-job-title">Product
                                                                    Designer</a></h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>Pinterest</span>.<span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>Allahabad</span>.<span>2
                                                                    Apr 2023</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                        <h5 class="jbs-list-pack">$90K - 100K<span
                                                                class="patype">\PA</span></h5>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View
                                                        Detail</a>
                                                    <a href="JavaScript:Void(0);"
                                                        class="btn btn-md btn-primary px-3">Quick Apply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Item -->
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb"><a href="job-detail.html">
                                                            <figure><img src="{{ URL::asset('assets/img/l-3.png') }}" class="img-fluid"
                                                                    alt=""></figure>
                                                        </a></div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap"><span
                                                                class="label text-success bg-light-success">Full
                                                                Time</span></div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4><a href="job-detail.html" class="jbs-job-title">Product
                                                                    Designer</a></h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>Shopify</span>.<span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>Canada,
                                                                    USA</span>.<span>15 March 2023</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                        <h5 class="jbs-list-pack">$90K - 115K<span
                                                                class="patype">\PA</span></h5>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View
                                                        Detail</a>
                                                    <a href="JavaScript:Void(0);"
                                                        class="btn btn-md btn-primary px-3">Quick Apply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Item -->
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb jbs-verified"><a
                                                            href="job-detail.html">
                                                            <figure><img src="{{ URL::asset('assets/img/l-4.png') }}" class="img-fluid"
                                                                    alt=""></figure>
                                                        </a></div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap"><span
                                                                class="label text-success bg-light-success">Full
                                                                Time</span></div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4><a href="job-detail.html" class="jbs-job-title">Jr.
                                                                    Laravel Developer</a></h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>Dreezoo</span>.<span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>Liverpool,
                                                                    UK</span>.<span>20 March 2023</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                        <h5 class="jbs-list-pack">$85K - 110K<span
                                                                class="patype">\PA</span></h5>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View
                                                        Detail</a>
                                                    <a href="JavaScript:Void(0);"
                                                        class="btn btn-md btn-primary px-3">Quick Apply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Item -->
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb"><a href="job-detail.html">
                                                            <figure><img src="{{ URL::asset('assets/img/l-5.png') }}" class="img-fluid"
                                                                    alt=""></figure>
                                                        </a></div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap"><span
                                                                class="label text-success bg-light-success">Enternship</span>
                                                        </div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4><a href="job-detail.html" class="jbs-job-title">Java &
                                                                    Python Developer</a></h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>Photoshop</span>.<span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>California</span>.<span>20
                                                                    Feb 2023</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                        <h5 class="jbs-list-pack">$90K - 120K<span
                                                                class="patype">\PA</span></h5>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View
                                                        Detail</a>
                                                    <a href="JavaScript:Void(0);"
                                                        class="btn btn-md btn-primary px-3">Quick Apply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Item -->
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb"><a href="job-detail.html">
                                                            <figure><img src="{{ URL::asset('assets/img/l-6.png') }}" class="img-fluid"
                                                                    alt=""></figure>
                                                        </a></div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap"><span
                                                                class="label text-success bg-light-success">Full
                                                                Time</span></div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4><a href="job-detail.html" class="jbs-job-title">Sr. Code
                                                                    Ignetor Developer</a></h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>Firefox</span>.<span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>Canada,
                                                                    USA</span>.<span>18 Feb 2023</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                        <h5 class="jbs-list-pack">$80K - 90K<span
                                                                class="patype">\PA</span></h5>
                                                    </div>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View
                                                        Detail</a>
                                                    <a href="JavaScript:Void(0);"
                                                        class="btn btn-md btn-primary px-3">Quick Apply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End All Job List -->
                            </div>
                        </div>

                        <!-- Company Review -->
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>412 Reviews</h5>
                            </div>
                            <div class="single-cdtsr-body">

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">4.7</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star-half text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>Very professional and Smart Company</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">November 15 2023</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">4.4</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star-half text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>Superb Company & Services</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">July 10 2023</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">2.3</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-regular fa-star text-warning"></i>
                                                    <i class="fa-regular fa-star text-warning"></i>
                                                    <i class="fa-regular fa-star text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>Very Bad Management</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">August 20 2023</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">4.9</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star-half text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>One of The Best Company in Canada</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">July 27 2022</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="pagfooter mx-auto mb-3">
                                <nav aria-label="Page navigation example"
                                    class="justify-content-center align-items-center">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">1</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">2</a></li>
                                        <li class="page-item active"><a class="page-link"
                                                href="JavaScript:Void(0);">3</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">4</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">5</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="JavaScript:Void(0);" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12">

                    <div class="eflorio-wrap-block mb-4">
                        <div class="eflorio-wrap-group">
                            <div class="eflorio-wrap-body">
                                <div class="eflorio-list-groups">

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-envelope-circle-check text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Email Address</label>
                                            <h6>themezhub@gmail.com</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-phone-volume text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Contact No.</label>
                                            <h6>9450 542 6325</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-layer-group text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Category</label>
                                            <h6>Applications</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-user-group text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Company Size</label>
                                            <h6>1000-1500</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-map-location-dot text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Location</label>
                                            <h6>California, USA</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-building-circle-check text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Established</label>
                                            <h6>Oct 2010</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="eflorio-wrap-footer">
                                <div class="eflorio-footer-body">
                                    <button type="button" class="btn btn-primary fw-medium full-width">View
                                        Website</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidefr-usr-block">
                        <div class="cndts-share-block">
                            <div class="cndts-share-title">
                                <h5>Share Profile</h5>
                            </div>
                            <div class="cndts-share-list">
                                <ul>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-google-plus-g"></i></a></li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- ============================ Full Candidate Details End ================================== -->
@endsection
