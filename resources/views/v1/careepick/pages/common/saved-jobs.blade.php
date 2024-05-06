@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title primary-bg-dark" style="background:url(assets/img/bg2.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Saved Jobs</h2>
                    <div class="breadcrumbs light">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('js-saved-jobs') }}">Saved Jobs</a></li>
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

                <div class="col-lg-12 col-md-12 col-sm-12">

                    @if($jobsData == null || empty($jobsData))
                        <h3>Sorry, No saved jobs found.</h3>
                    @else
                        <div class="row justify-content-center gx-3 gy-4">
                            @foreach($jobsData as $key => $data)
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified">
                                                    <a href="{{ route('job-detail', ['slug' => $data->slug]) }}">
                                                        <figure><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid" alt=""></figure>
                                                    </a>
                                                </div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap mb-2">
                                                        <span class="label text-success bg-light-success">
                                                            <i class="fa-regular fa-clock"></i> {{ $data->job_nature_name }}
                                                        </span>
                                                    </div>
                                                    <div class="jbs-job-title-wrap mb-2">
                                                        <h4>
                                                            <a href="{{ route('job-detail', ['slug' => $data->slug]) }}" class="jbs-job-title">{{ $data->job_title }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="jbs-job-mrch-lists mb-2">
                                                        <div class="single-mrch-lists">
                                                            <span>{{ $data->company_name }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $data->job_location }}</span>.<span>Deadline: {{ $data->deadline }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs">
                                                    <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                    <h5 class="jbs-list-pack">
                                                        @if($data->salary != null)
                                                            {{ $data->salary }}<span class="patype">\Tk</span>
                                                        @else
                                                            {{ $data->salary_type_name }}
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="{{ route('job-detail', ['slug' => $data->slug]) }}" class="btn btn-md btn-primary px-3">View Detail</a>
                                            </div>
                                        </div>
                                        <div class="jbs-grid-job-edrs m-0">
                                            <div class="jbs-grid-job-edrs-group">
                                                @foreach($data->job_skills as $key1 => $skillData)
                                                    <span>{{ $skillData }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
