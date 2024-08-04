@extends('v1.careepick.dashboard.layouts.js-master')
@section('content')
    <!-- Dashboard -->
    <div class="upper-title-box">
        <h3>Hi, {{ Auth::user()->name }}!!</h3>
        <div class="text">Ready to jump back in?</div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item">
                <div class="left">
                    <i class="icon flaticon-briefcase"></i>
                </div>
                <div class="right">
                    <h4>{{ App\Helper\Helper::getTotalAppliedJobCount() }}</h4>
                    <p>Applied Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-red">
                <div class="left">
                    <i class="icon la la-file-invoice"></i>
                </div>
                <div class="right">
                    <h4>{{ App\Helper\Helper::getTotalJobCount() }}</h4>
                    <p>Job Alerts</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-green">
                <div class="left">
                    <i class="icon la la-bookmark-o"></i>
                </div>
                <div class="right">
                    <h4>{{ App\Helper\Helper::getTotalShortlistedJobCount() }}</h4>
                    <p>Shortlist</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <!-- applicants Widget -->
            <div class="applicants-widget ls-widget">
                <div class="widget-title">
                    <h4>Recently Applied</h4>
                </div>
                <div class="widget-content">
                    <div class="row">
                        @php
                            $appliedJobs = App\Helper\Helper::getAppliedJobs();
                        @endphp
                        <!-- Candidate block three -->
                        @foreach ($appliedJobs as $key => $data)
                            <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="content" style="padding-left:0px">
                                        <h4 class="name"><a href="#">{{ $data->company_name }}</a></h4>
                                        <ul class="candidate-info" style="padding-left:inherit">
                                            <li class="designation">{{ $data->job_title }}</li>
                                            <li><span class="icon flaticon-map-locator"></span> {{ \Carbon\Carbon::parse($data->applied_at)->diffForHumans() }}</li>
                                            <li><span class="icon flaticon-money"></span> ৳{{ $data->salary }}</li>
                                        </ul>
                                        <ul class="post-tags" style="padding-left:inherit">
                                            @foreach($data->job_skills as $skill)
                                                <li class="time"><a href="#">{{ $skill }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
