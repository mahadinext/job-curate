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
                            class="primary-2-bg w-10 h-05 me-2"></span>{{ $heroSection['sub_title'] }}</h6>
                    <h1 class="mb-4">{{ $heroSection['title'] }}</span></h1>
                    <p class="fs-5">{{ $heroSection['description'] }}</p>
                    <div class="lios-vrst">
                        <ul>
                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">{{ $counts['count']['total_job'] }}</span><span class="primary-2-cl">M</span></h2>
                                    <h6>Active Jobs</h6>
                                </div>
                            </li>

                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">{{ $counts['count']['total_employer'] }}</span><span class="primary-2-cl">K</span></h2>
                                    <h6>Startups</h6>
                                </div>
                            </li>

                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">{{ $counts['count']['total_employee'] }}</span><span class="primary-2-cl">K</span></h2>
                                    <h6>Talents</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="hero-search-wrap">
                        <div class="hero-search">
                            <h1>Grow Your Career with <span class="text-primary">Job Curate</span></h1>
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
    {{-- <section class="min">
        <div class="container">

            <div class="row justify-content-center mb-2">
                <div class="col-xl-4 col-lg-7 col-md-10 text-center">
                    <div class="center mb-4">
                        <h5 class="fw-medium lh-lg">Join over {{ $counts['count']['total_employer'] }} companies around the world that trust the <span
                                class="text-primary">Job Curate</span> platforms</h5>
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
    <div class="clearfix"></div> --}}
    <!-- ============================ Our Partners End ================================== -->

    <!-- ============================ Top Job Categories Start ================================== -->
    <section class="gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Explore Top Categories</h2>
                        {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p> --}}
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
                                    <h4 class="fs-5"><a href="{{ route('fetch-job-by-category', ['id' => $data->id]) }}">{{ Str::limit(strip_tags($data->category_name), 18) }}</a></h4>
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
                        <h2>Latest Jobs</h2>
                        {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p> --}}
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-xl-3 gx-3 gy-4">

                <!-- Single Item -->
                @foreach($latestJobsData as $data)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="job-instructor-layout border">
                            <div class="left-tags-capt">
                                <span class="featured-text">vacancy: {{ $data->vacancy }}</span>
                                {{-- <span class="urgent">Urgent</span> --}}
                            </div>
                            <div class="brows-job-type"><span class="enternship"><i class="fa-regular fa-clock"></i> {{ $data->deadline }}</span></div>
                            <div class="job-instructor-thumb">
                                {{-- <a href="job-detail.html"><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid" alt=""></a> --}}
                            </div>
                            <div class="job-instructor-content">
                                <div class="jbs-job-employer-wrap"><span>{{ Str::limit(strip_tags($data->company_name), 20) }}<span></span></span></div>
                                <h4 class="instructor-title"><a href="job-detail.html">{{ Str::limit(strip_tags($data->job_title), 20) }}</a></h4>
                                <div class="instructor-skills">
                                    {{ Str::limit(strip_tags($data->skillsString), 35) }}
                                </div>
                            </div>
                            <div class="jbs-grid-job-apply-btns px-3 py-3">
                                <div class="jbs-btn-groups">
                                    <div class="jbs-sng-blux">
                                        <div class="jbs-grid-package-title smalls">
                                            @if($data->salary != null)
                                                <h5>৳{{ $data->salary }}</h5>
                                            @else
                                                <h5>৳ {{ $data->salary_type_name }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="jbs-sng-blux">
                                        <a href="JavaScript:Void(0);" class="btn btn-sm btn-light-primary px-4">View</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="job-instructor-footer">
                                <div class="instructor-students">
                                    @if($data->salary != null)
                                        <h5 class="instructor-scount">৳{{ $data->salary }}</h5>
                                    @else
                                        <h5 class="instructor-scount">৳ {{ $data->salary_type_name }}</h5>
                                    @endif
                                </div>
                                <div class="instructor-corses">
                                    <span class="c-counting">6 Open</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                @endforeach

                <div>
                    <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
                        <a class="btn btn-primary btn-md fw-medium px-4" href="{{ route('browse-job') }}">View All</a>
                    </div>
                </div>

                <!-- Single Item -->
                {{-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
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
                </div> --}}

            </div>

        </div>
    </section>
    <!-- ============================ Featured Jobs End ================================== -->

    <section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                    <div class="call-action-wrap">
                        <div class="sec-heading center">
                            <h2 class="lh-base mb-3 text-light">Find The Perfect Job<br>on Job Curate That is Superb
                                For You</h2>
                            {{-- <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus
                                qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                molestias</p> --}}
                        </div>
                        <div class="call-action-buttons mt-3">
                            <a href="{{ route('js-signin') }}"
                                class="btn btn-lg btn-dark fw-medium px-xl-5 px-lg-4 me-2">Upload resume</a>
                            <a href="{{ route('jp-signin') }}"
                                class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">Join Our
                                Team</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
