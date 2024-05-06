@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-cover hero-header primary-bg-dark" data-overlay="0">
        <div class="position-absolute top-0 end-0 z-0">
            <img src="{{ URL::asset('assets/img/shape-3-soft-light.svg') }}" alt="SVG" width="500">
        </div>
        <div class="position-absolute top-0 start-0 me-10 z-0">
            <img src="{{ URL::asset('assets/img/shape-1-soft-light.svg') }}" alt="SVG" width="250">
        </div>
        <div
            class="container d-flex flex-column justify-content-center position-relative zindex-2 pt-sm-3 pt-md-4 pt-xl-5">

            <div class="row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <h6 class="primary-2-cl fw-medium d-inline-flex align-items-center mb-3"><span
                            class="primary-2-bg w-10 h-05 me-2"></span>Get Hot & Trending Jobs</h6>
                    <h1 class="mb-4">Find & Hire<br><span>Top Experts on Job Stock</span></h1>
                    <p class="fs-5">Getting a new job is never easy. Check what new jobs we have in store for you on
                        Job Stock.</p>
                    <div class="lios-vrst">
                        <ul>
                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">200</span><span class="primary-2-cl">M</span></h2>
                                    <h6>Active Jobs</h6>
                                </div>
                            </li>

                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">40</span><span class="primary-2-cl">K</span></h2>
                                    <h6>Startups</h6>
                                </div>
                            </li>

                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">340</span><span class="primary-2-cl">K</span></h2>
                                    <h6>Talents</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="hero-search-wrap">
                        <div class="hero-search">
                            <h1>Grow Your Career with <span class="text-primary">Job Stock</span></h1>
                        </div>
                        <div class="hero-search-content verticle-space">
                            <form method="POST" action="{{ route('filter-jobs') }}" id="filter_form">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" name="job_title" class="form-control border"
                                                    placeholder="Search Job Keywords..">
                                                <img src="{{ URL::asset('assets/img/pin.svg') }}" width="18" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Job Category</label>
                                            <select name="job_category_id[]" class="wide form-control">
                                                <option value="">Select category</option>
                                                @foreach ($jobCategoryData as $key => $data)
                                                    <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Job Type</label>
                                            <select name="job_nature_id[]" class="wide form-control">
                                                <option value="">Select job type</option>
                                                @foreach ($jobsByJobNature as $key => $data)
                                                    <option value="{{ $data->job_type_id }}">{{ $data->job_nature }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Job Place</label>
                                            <select name="job_place_id[]" class="wide form-control">
                                                <option value="">Select</option>
                                                @foreach ($jobsByJobPlace as $key => $data)
                                                    <option value="{{ $data->job_place_id }}">{{ $data->job_place }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <select name="experience_id[]" class="wide form-control">
                                                <option value="">Select</option>
                                                @foreach ($jobsByExperience as $key => $data)
                                                    <option value="{{ $data->experience_id }}">{{ $data->experience_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-dark full-width">Search Result</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="position-absolute bottom-0 start-0 z-0">
            <img src="{{ URL::asset('assets/img/shape-2-soft-light.svg') }}" alt="SVG" width="400">
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Our Partners Start ================================== -->
    <section class="min">
        <div class="container">

            <div class="row justify-content-center mb-2">
                <div class="col-xl-4 col-lg-7 col-md-10 text-center">
                    <div class="center mb-4">
                        <h5 class="fw-medium lh-lg">Join over 2,000 companies around the world that trust the <span
                                class="text-primary">Job Stock</span> platforms</h5>
                    </div>
                </div>
            </div>

            <div
                class="row align-items-center justify-content-center row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-3 gx-3 gy-3">
                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="{{ URL::asset('assets/img/brand/layar-primary.svg') }}" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="{{ URL::asset('assets/img/brand/mailchimp-primary.svg') }}" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="{{ URL::asset('assets/img/brand/fitbit-primary.svg') }}" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="{{ URL::asset('assets/img/brand/capsule-primary.svg') }}" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="{{ URL::asset('assets/img/brand/vidados-primary.svg') }}" class="img-fluid" alt="">
                    </figure>
                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Our Partners End ================================== -->

    <!-- ============================ Top Job Categories Start ================================== -->
    <section class="gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Explore Top Categories</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">


                @foreach ($jobCategoryData as $key => $data)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="fa-solid fa-file-invoice text-primary"></i>
                                    {{-- <i class="fa-solid fa-file-invoice abs-icon"></i> --}}
                                </div>
                                <div class="category-detail category-desc-text">
                                    <h4 class="fs-5"><a href="{{ route('fetch-job-by-category', ['id' => $data->id]) }}">{{ $data->category_name }}</a></h4>
                                    <p class="block">{{ $data->jobs_count }} Active Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="category-box">
                        <div class="category-desc">
                            <div class="category-icon">
                                <i class="fa-solid fa-mobile-screen-button text-primary"></i>
                                <i class="fa-solid fa-mobile-screen-button abs-icon"></i>
                            </div>
                            <div class="category-detail category-desc-text">
                                <h4 class="fs-5"><a href="browse-jobs-grid.html">Telecommunications</a></h4>
                                <p class="block">80 Active Jobs</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>

        </div>
    </section>
    <!-- ============================ Top Job Categories End ================================== -->

    <!-- ============================ Featured Jobs Start ================================== -->
    <section class="pt-2">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Featured Jobs</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-xl-3 gx-3 gy-4">

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="featured-text">Featured</span>
                            <span class="urgent">Urgent</span>
                        </div>
                        <div class="brows-job-type"><span class="enternship">Enternship</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Jr. PHP Developer</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$5K - $8K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">6 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="urgent">Urgent</span>
                        </div>
                        <div class="brows-job-type"><span class="freelanc">Freelancer</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-2.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Exp. Project manager</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$6K - $10K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">4 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="featured-text">Featured</span>
                            <span class="urgent">Urgent</span>
                        </div>
                        <div class="brows-job-type"><span class="part-time">Part Time</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-3.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Sr. WordPress Developer</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$5K - $8K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">3 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="featured-text">Featured</span>
                        </div>
                        <div class="brows-job-type"><span class="full-time">Full Time</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-4.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Jr. Laravel Developer</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$4.2K - $6K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">2 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="urgent">Urgent</span>
                        </div>
                        <div class="brows-job-type"><span class="freelanc">Freelancer</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-5.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Sr. UI/UX Designer</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$4K - $5.5K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">5 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="featured-text">Featured</span>
                            <span class="urgent">Urgent</span>
                        </div>
                        <div class="brows-job-type"><span class="part-time">Part Time</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-6.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Java & Python Developer</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$2K - $4K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">4 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="urgent">Urgent</span>
                        </div>
                        <div class="brows-job-type"><span class="full-time">FullTime</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-7.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Sr. Code Ignetor Developer</a>
                            </h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$5K - $6K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">3 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        <div class="left-tags-capt">
                            <span class="featured-text">Featured</span>
                        </div>
                        <div class="brows-job-type"><span class="enternship">Enternship</span></div>
                        <div class="job-instructor-thumb">
                            <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-8.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="job-instructor-content">
                            <h4 class="instructor-title"><a href="job-detail.html">Sr. Magento Developer</a></h4>
                            <div class="instructor-skills">
                                CSS3, HTML5, Javascript, Bootstrap, Jquery
                            </div>
                        </div>
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">$3.2K - $5K</h5>
                            </div>
                            <div class="instructor-corses">
                                <span class="c-counting">5 Open</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Featured Jobs End ================================== -->

    <!-- ============================ Top Features & Process Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="sec-heading center">
                        <h2>Features & Process</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-xl-4 gx-lg-4">

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1">
                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i
                                    class="fa-solid fa-file-shield text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>Search Job</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-paste text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>FIND JOB</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-unlock text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>Create Account</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process">
                        <div class="work-process-icon"><span><i
                                    class="fa-solid fa-user-clock text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>HIRE EMPLOYEE</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-2 order-lg-3 order-md-3">
                    <div class="eslio-pincc m-auto">
                        <img src="{{ URL::asset('assets/img/wp-iphone.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-3 order-lg-2 order-md-2">
                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i
                                    class="fa-solid fa-laptop-file text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>START WORK</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i
                                    class="fa-solid fa-business-time text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>Submit Bid</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i
                                    class="fa-solid fa-sack-dollar text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>PAY MONEY</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process">
                        <div class="work-process-icon"><span><i
                                    class="fa-regular fa-face-laugh-wink text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>HAPPY USER</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Top Features & Process End ================================== -->

    <!-- ============================ Video Help Start ================================== -->
    <section class="bg-cover" style="background:#17ac6a url(assets/img/video-bg.jpg)no-repeat;" data-overlay="4">
        <div class="ht-200"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12">

                    <div class="overlio-vedio-box">
                        <a href="#" class="play-video-btn text-primary"><i class="fa-solid fa-play"></i></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="ht-200"></div>
    </section>
    <!-- ============================ Video Help End ================================== -->

    <!-- ============================ Good Reviews By Customers ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Good Reviews By Customers</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"The best useful website"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="{{ URL::asset('assets/img/team-1.jpg') }}"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Lucia E. Nugent</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>CEO of Climber</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star deactive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"Ranking is the #1"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="{{ URL::asset('assets/img/team-2.jpg') }}"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Brenda R. Smith</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>Founder of Yeloower</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"The website is eco friendly"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="{{ URL::asset('assets/img/team-3.jpg') }}"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Brian B. Wilkerson</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>CEO of Mark Soft</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"100% save and secure website"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="{{ URL::asset('assets/img/team-4.jpg') }}"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Miguel L. Benbow</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>Founder of Mitche LTD</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star deactive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"Very developer friendly website"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="{{ URL::asset('assets/img/team-5.jpg') }}"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Hilda A. Sheppard</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>CEO of Doodle</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Good Reviews By Customers ================================== -->
@endsection
