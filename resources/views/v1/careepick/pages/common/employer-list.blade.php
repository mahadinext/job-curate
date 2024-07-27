@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title primary-bg-dark" style="background:url(assets/img/bg2.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Employer Grid Style 01</h2>
                    <div class="breadcrumbs light">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Home</a></li>
                                <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Employer</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employer Grid 01</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All List Wrap ================================== -->
    <section>
        <div class="container">
            <div class="row">

                <!-- Search Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="bg-white rounded mb-3">

                        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="fs-bold fs-5 mb-0">Search Filter</h4>
                            <div class="ssh-header">
                                <a href="{{ route('search-employer') }}" class="clear_all ft-medium text-muted">Clear All</a>
                                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button"
                                    class="collapsed _filter-ico ml-2"><i class="fa-solid fa-filter"></i></a>
                            </div>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">

                            <div class="search-inner">

                                <form method="POST" action="{{ route('filter-employer') }}" id="filter_form">
                                    @csrf
                                    <div class="filter-search-box px-4 pt-3">
                                        <div class="form-group">
                                            <label>Company <span class="text-danger">*</span></label>
                                            <select name="company_id"
                                                class="wide form-control @error('company_id') is-invalid @enderror"
                                                value="{{ old('company_id') }}">
                                                <option value="">Select Company</option>
                                                @foreach ($jobProvidersData as $key => $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="filter_wraps">
                                        <!-- Job categories Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#categories" class="ft-medium fs-md" data-bs-toggle="collapse" aria-expanded="true" role="button">Job Categories</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse show" id="categories" data-bs-parent="#categories">
                                                <div class="side-list no-border">
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    <li>
                                                                        <input id="a1" class="form-check-input" name="ADA" type="checkbox" {{ old('ADA', $oldInput['ADA'] ?? false) ? 'checked' : '' }}>
                                                                        <label for="a1" class="form-check-label">
                                                                            All Category
                                                                        </label>
                                                                    </li>
                                                                    @foreach ($jobCategoryData as $key => $data)
                                                                        <li>
                                                                            <input id="category-{{ $data->id }}" name="job_category_id[]" value="{{ $data->id }}" class="form-check-input" type="checkbox" {{ in_array($data->id, old('job_category_id', $oldInput['job_category_id'] ?? [])) ? 'checked' : '' }}>
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

                                        <!-- Job Skills Search -->
                                        <div class="single_search_boxed px-4 pt-0 br-bottom">
                                            <div class="widget-boxed-header">
                                                <h4>
                                                    <a href="#skills" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Skills</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="skills" data-bs-parent="#skills">
                                                <div class="side-list no-border">
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsBySkill as $key => $data)
                                                                        <li>
                                                                            <input id="c1-{{ $key }}" name="skill_id[]" value="{{ $data->skill_id }}" class="form-check-input jobSkill" type="checkbox" {{ in_array($data->skill_id, old('skill_id', $oldInput['skill_id'] ?? [])) ? 'checked' : '' }}>
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
                                                    <a href="#experience" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Experience</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="experience" data-bs-parent="#experience">
                                                <div class="side-list no-border">
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsByExperience as $key => $data)
                                                                        <li>
                                                                            <input id="d1-{{ $key }}" name="experience_id[]" value="{{ $data->experience_id }}" class="form-check-input jobExp" type="checkbox" {{ in_array($data->experience_id, old('experience_id', $oldInput['experience_id'] ?? [])) ? 'checked' : '' }}>
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
                                                    <a href="#jbnatures" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Job Type</a>
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
                                                                            <input id="e2-{{ $key }}" name="job_nature_id[]" value="{{ $data->job_type_id }}" class="form-check-input jobNature" type="checkbox" {{ in_array($data->job_type_id, old('job_nature_id', $oldInput['job_nature_id'] ?? [])) ? 'checked' : '' }}>
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
                                                    <a href="#jobPlace" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Job Place</a>
                                                </h4>
                                            </div>
                                            <div class="widget-boxed-body collapse" id="jobPlace" data-bs-parent="#jobPlace">
                                                <div class="side-list no-border">
                                                    <div class="single_filter_card">
                                                        <div class="card-body p-0">
                                                            <div class="inner_widget_link">
                                                                <ul class="no-ul-list filter-list">
                                                                    @foreach ($jobsByJobPlace as $key => $data)
                                                                        <li>
                                                                            <input id="f2-{{ $key }}" name="job_place_id[]" value="{{ $data->job_place_id }}" class="form-check-input jobPlace" type="checkbox" {{ in_array($data->job_place_id, old('job_place_id', $oldInput['job_place_id'] ?? [])) ? 'checked' : '' }}>
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

                </div>
                <!-- Sidebar End -->

                <!-- Job List Wrap -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Shorting Box -->
                    {{-- <div class="row justify-content-center mb-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting clearfix">
                                    <div class="left-column"><h4 class="m-0">Showing 1 - 10 of 20 Results</h4></div>
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
                    <!-- Shorting Wrap End -->

                    <!-- Start All List -->
                    <div class="row justify-content-start gx-3 gy-4">

                        @if($companyData == null || empty($companyData))
                            <h3>Sorry, No company found.</h3>
                        @else
                            @foreach($companyData as $key => $data)
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="emplors-list-box border">
                                        <div class="emplors-list-head mb-0">
                                            <div class="emplors-list-head-thunner">
                                                {{-- <div class="emplors-list-emp-thumb"><a href="employer-detail.html"><figure><img src="assets/img/l-1.png" class="img-fluid" alt=""></figure></a></div> --}}
                                                <div class="emplors-list-job-caption">
                                                    <div class="emplors-job-title-wrap mb-1"><h4><a href="{{ route('get-employer', $data['id']) }}" class="emplors-job-title">{{ $data['company_name'] }}</a></h4></div>
                                                    <div class="emplors-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span><i class="fa-solid fa-location-dot me-1"></i>{{ $data['company_address_1'] }}</span>.<span>Est: {{ $data['company_year_of_establishment'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="emplors-list-head-last">
                                                <a href="{{ route('get-employer', $data['id']) }}" class="btn btn-md btn-light-primary px-3">View Company</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <!-- End All Job List -->

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
                                    <li class="page-item active"><a class="page-link" href="JavaScript:Void(0);">3</a></li>
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

                </div>
                <!-- Job List Wrap End-->

            </div>
        </div>
    </section>
    <!-- ============================ All List Wrap ================================== -->
@endsection
