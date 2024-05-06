@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title primary-bg-dark" style="background:url(assets/img/bg2.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Grid Style Job 05</h2>
                    <div class="breadcrumbs light">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Home</a></li>
                                <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Candidate</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Job Grid 05</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All List Wrap ================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row">

                <!-- Search Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="bg-white rounded mb-3">

                        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="fs-bold fs-5 mb-0">Search Filter</h4>
                            <div class="ssh-header">
                                <a href="javascript:void(0);" class="clear_all ft-medium text-muted" onclick="clearForm()">Clear All</a>
                                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button"
                                    class="collapsed _filter-ico ml-2"><i class="fa-solid fa-filter"></i></a>
                            </div>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">

                            <div class="search-inner">

                                <form method="POST" action="{{ route('filter-jobs') }}" id="filter_form">
                                    @csrf
                                    <div class="filter-search-box px-4 pt-3">
                                        <div class="form-group">
                                            <input type="text" name="job_title" class="form-control" placeholder="Search by job titles...">
                                        </div>
                                    </div>

                                    <div class="filter_wraps">
                                        <!-- Job categories Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#categories" class="ft-medium fs-md" data-bs-toggle="collapse"
                                                        aria-expanded="true" role="button">Job Categories</a>
                                                </h4>

                                            </div>
                                            <div class="widget-boxed-body collapse show" id="categories"
                                                data-bs-parent="#categories">
                                                <div class="side-list no-border">
                                                    <!-- Single Filter Card -->
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    <li>
                                                                        <input id="a1" class="form-check-input" name="ADA" type="checkbox">
                                                                        <label for="a1" class="form-check-label">
                                                                            All Category
                                                                        </label>
                                                                    </li>
                                                                    @foreach ($jobCategoryData as $key => $data)
                                                                        <li>
                                                                            <input id="category-{{ $data->id }}"  name="job_category_id[]" value="{{ $data->id }}" class="form-check-input" type="checkbox" @if($data->isSelected) checked="" @endif>
                                                                            <label for="category-{{ $data->id }}" class="form-check-label">
                                                                                {{ $data->category_name }} ({{ $data->jobs_count }})
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Job Locations Search -->
                                        {{-- <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#locations" data-bs-toggle="collapse" aria-expanded="false"
                                                        role="button" class="ft-medium fs-md collapsed">Job Locations</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="locations"
                                                data-bs-parent="#locations">
                                                <div class="side-list no-border">
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    <li>
                                                                        <input id="b1" class="form-check-input"
                                                                            name="ADA" type="checkbox" checked="">
                                                                        <label for="b1"
                                                                            class="form-check-label">Australia (21)</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <!-- Job Skills Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#skills" data-bs-toggle="collapse" aria-expanded="false"
                                                        role="button" class="ft-medium fs-md collapsed">Skills</a>
                                                </h4>

                                            </div>
                                            <div class="widget-boxed-body collapse" id="skills" data-bs-parent="#skills">
                                                <div class="side-list no-border">
                                                    <!-- Single Filter Card -->
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsBySkill as $key => $data)
                                                                        <li>
                                                                            <input id="c1-{{ $key }}" name="skill_id[]" value="{{ $data->skill_id }}" class="form-check-input jobSkill" type="checkbox">
                                                                            <label for="c1-{{ $key }}" class="form-check-label">{{ $data->skill_name }} ({{ $data->total_jobs }})</label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Experience Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#experience" data-bs-toggle="collapse" aria-expanded="false"
                                                        role="button" class="ft-medium fs-md collapsed">Experience</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="experience"
                                                data-bs-parent="#experience">
                                                <div class="side-list no-border">
                                                    <!-- Single Filter Card -->
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsByExperience as $key => $data)
                                                                        <li>
                                                                            <input id="d1-{{ $key }}" name="experience_id[]" value="{{ $data->experience_id }}" class="form-check-input jobExp" type="checkbox">
                                                                            <label for="d1-{{ $key }}" class="form-check-label">{{ $data->experience_name }} ({{ $data->total_jobs }})</label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Job types Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#jbnatures" data-bs-toggle="collapse" aria-expanded="false"
                                                        role="button" class="ft-medium fs-md collapsed">Job Type</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="jbnatures" data-bs-parent="#jbnatures">
                                                <div class="side-list no-border">
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsByJobNature as $key => $data)
                                                                        <li>
                                                                            <input id="e2-{{ $key }}" name="job_nature_id[]" value="{{ $data->job_type_id }}" class="form-check-input jobNature" type="checkbox">
                                                                            <label for="e2-{{ $key }}" class="form-check-label">{{ $data->job_nature }} ({{ $data->total_jobs }})</label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Job place Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#jobPlace" data-bs-toggle="collapse" aria-expanded="false"
                                                        role="button" class="ft-medium fs-md collapsed">Job Place</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="jobPlace" data-bs-parent="#jobPlace">
                                                <div class="side-list no-border">
                                                    <!-- Single Filter Card -->
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsByJobPlace as $key => $data)
                                                                        <li>
                                                                            <input id="f2-{{ $key }}" name="job_place_id[]" value="{{ $data->job_place_id }}" class="form-check-input jobPlace" type="checkbox">
                                                                            <label for="f2-{{ $key }}" class="form-check-label">{{ $data->job_place }} ({{ $data->total_jobs }})</label>
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

                                    <div class="form-group filter_button pt-3 pb-3 px-4">
                                        <button type="submit" class="btn btn-primary full-width">Search job</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Alert Box -->
                    <div class="alert-jbemail-box bg-cover"
                        style="background:#016551 url(assets/img/alert-bg.png)no-repeat;" overlay="0">
                        <div class="alert-bxr-wrap">
                            <div class="alert-bxr-captions mb-3">
                                <h3 class="text-light">Get The Latest Jobs Right Into Your Inbox!</h3>
                                <p class="text-light opacity-75">We just want your email address!</p>
                            </div>
                            <div class="alert-bxr-forms">
                                <form>
                                    <div class="newsltr-form">
                                        <input type="text" class="form-control" placeholder="Enter Your email">
                                        <button type="button" class="btn btn-subscribe bg-dark">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Sidebar End -->

                <div class="col-lg-8 col-md-12 col-sm-12">

                    {{-- <div class="row justify-content-center mb-5">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting clearfix">
                                    <div class="left-column">
                                        <h4 class="m-sm-0 mb-2">Showing 1 - 10 of 20 Results</h4>
                                    </div>
                                </div>
                                <div class="item-shorting-box-right">
                                    <div class="shorting-by me-2 small">
                                        <select>
                                            <option value="0">Short by (Default)</option>
                                            <option value="1">Short by (Featured)</option>
                                            <option value="2">Short by (Urgent)</option>
                                            <option value="3">Short by (Post Date)</option>
                                        </select>
                                    </div>
                                    <div class="shorting-by small">
                                        <select>
                                            <option value="0">10 Per Page</option>
                                            <option value="1">20 Per Page</option>
                                            <option value="2">50 Per Page</option>
                                            <option value="3">10 Per Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    @if($jobsData == null || empty($jobsData))
                        <h3>Sorry, No jobs found.</h3>
                    @else
                        <!-- Start All List -->
                        <div class="row justify-content-center gx-3 gy-4">
                            @foreach($jobsData as $key => $data)
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                    <div class="jbs-grid-layout border">

                                        {{-- <div class="right-tags-capt">
                                            <span class="featured-text">Featured</span>
                                            <span class="urgent">Urgent</span>
                                        </div> --}}
                                        <div class="jbs-grid-emp-head">
                                            <div class="jbs-grid-emp-thumb">
                                                <a href="{{ route('job-detail', ['slug' => $data->slug]) }}">
                                                    <figure><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid" alt="">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="jbs-grid-job-caption">
                                            <div class="jbs-job-employer-wrap"><span>{{ $data->company_name }}</span></div>
                                            <div class="jbs-job-title-wrap">
                                                <h4 class="my-2">
                                                    <a href="{{ route('job-detail', ['slug' => $data->slug]) }}" class="jbs-job-title">{{ $data->job_title }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="jbs-grid-job-info-wrap">
                                            <div class="jbs-grid-job-info">
                                                <div class="jbs-grid-single-info">
                                                    <span>
                                                        <i class="fa-solid fa-user-group"></i>{{ $data->experience_range_name }}
                                                    </span>
                                                </div>
                                                <div class="jbs-grid-single-info">
                                                    <span>
                                                        <i class="fa-regular fa-clock"></i>{{ $data->job_nature_name }}
                                                    </span>
                                                </div>
                                                <div class="jbs-grid-single-info"><span><i
                                                            class="fa-solid fa-location-dot"></i>{{ $data->job_location }}</span></div>
                                            </div>
                                        </div>
                                        <div class="jbs-grid-job-description my-2">
                                            <a href="{{ route('job-detail', ['slug' => $data->slug]) }}" style="text-decoration:none; color:black">
                                                <p>{{ Str::limit(strip_tags($data->responsibilities), 200) }}</p>
                                            </a>
                                        </div>
                                        <div class="jbs-grid-job-edrs">
                                            <div class="jbs-grid-job-edrs-group">
                                                @foreach($data->job_skills as $key1 => $skillData)
                                                    <span>{{ $skillData }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="jbs-grid-job-package-info">
                                            <div class="jbs-grid-posted">
                                                @if($data->salary != null)
                                                    <span>Salary: Tk. {{ $data->salary }}</span>
                                                @else
                                                    <span>Salary: {{ $data->salary_type_name }}</span>
                                                @endif
                                            </div>
                                            <div class="jbs-grid-posted"><span>Deadline: {{ $data->deadline }}</span></div>
                                        </div>
                                        {{-- <div class="jbs-grid-job-apply-btns">
                                            <div class="jbs-btn-groups">
                                                <a href="{{ route('job-detail', ['slug' => $data->slug]) }}" class="btn btn-md btn-light-primary px-4">View
                                                    Detail</a>
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-primary px-4">Quick Apply</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            @endforeach

                            <!-- Single Item -->
                            {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                <div class="jbs-grid-layout border">
                                    <div class="right-tags-capt">
                                        <span class="featured-text">Featured</span>
                                        <span class="urgent">Urgent</span>
                                    </div>
                                    <div class="jbs-grid-emp-head">
                                        <div class="jbs-grid-emp-thumb"><a href="job-detail.html">
                                                <figure><img src="{{ URL::asset('assets/img/l-2.png') }}" class="img-fluid" alt="">
                                                </figure>
                                            </a></div>
                                    </div>
                                    <div class="jbs-grid-job-caption">
                                        <div class="jbs-job-employer-wrap"><span>Google Inc.</span></div>
                                        <div class="jbs-job-title-wrap">
                                            <h4><a href="job-detail.html" class="jbs-job-title">Sr. Front-end Developer</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="jbs-grid-job-info-wrap">
                                        <div class="jbs-grid-job-info">
                                            <div class="jbs-grid-single-info"><span><i class="fa-solid fa-user-group"></i>1-2
                                                    Year</span></div>
                                            <div class="jbs-grid-single-info"><span><i class="fa-regular fa-clock"></i>Full
                                                    Time</span></div>
                                            <div class="jbs-grid-single-info"><span><i
                                                        class="fa-solid fa-location-dot"></i>London</span></div>
                                        </div>
                                    </div>
                                    <div class="jbs-grid-job-description">
                                        <p>Consistently create well-designed, tested code using best practices for website
                                            development, including mobile...</p>
                                    </div>
                                    <div class="jbs-grid-job-edrs">
                                        <div class="jbs-grid-job-edrs-group">
                                            <span>HTML</span>
                                            <span>CSS3</span>
                                            <span>Bootstrap</span>
                                            <span>Redux</span>
                                        </div>
                                    </div>
                                    <div class="jbs-grid-job-package-info">
                                        <div class="jbs-grid-package-title">
                                            <h5>$370<span>\Year</span></h5>
                                        </div>
                                        <div class="jbs-grid-posted"><span>26 March 2023</span></div>
                                    </div>
                                    <div class="jbs-grid-job-apply-btns">
                                        <div class="jbs-btn-groups">
                                            <a href="job-detail.html" class="btn btn-md btn-light-primary px-4">View
                                                Detail</a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-primary px-4">Quick Apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                        <!-- Pagination -->
                        {{-- <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">1</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="JavaScript:Void(0);">3</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">4</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">5</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="JavaScript:Void(0);" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div> --}}
                    @endif

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ All List Wrap ================================== -->
    <script>
        function clearForm() {
            // Reset the form
            document.getElementById("filter_form").reset();
        }
    </script>
@endsection
