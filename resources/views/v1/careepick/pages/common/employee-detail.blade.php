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
                            {{-- <div class="emplr-head-thumb">
                                <figure><img src="{{ URL::asset('assets/img/l-12.png') }}" class="img-fluid rounded" alt=""></figure>
                            </div> --}}
                            <div class="emplr-head-caption">
                                <div class="emplr-head-caption-top">
                                    <div class="emplr-yior-1"><span class="label text-sm-muted text-light bg-warning">{{ $jobsData->count() }} Openings</span></div>
                                    <div class="emplr-yior-2">
                                        <h4 class="emplr-title text-light">{{ $profileData->company_name }}</h4>
                                    </div>
                                    <div class="emplr-yior-3 justify-content-start">
                                        <span class="text-light opacity-75"><i class="fa-solid fa-location-dot me-1"></i>{{ $profileData->company_address_1 }}</span>
                                    </div>
                                </div>
                            </div>
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
                                <p>{{ $profileData->company_description }}</p>
                            </div>
                        </div>

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>{{ $jobsData->count() }} Openings</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="row justify-content-start gx-3 gy-4">

                                    @foreach($jobsData as $key => $data)
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="jbs-list-box border">
                                                <div class="jbs-list-head">
                                                    <div class="jbs-list-head-thunner">
                                                        {{-- <div class="jbs-list-emp-thumb jbs-verified">
                                                            <a href="job-detail.html">
                                                                <figure><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid"
                                                                        alt=""></figure>
                                                            </a>
                                                        </div> --}}
                                                        <div class="jbs-list-job-caption">
                                                            <div class="jbs-job-types-wrap mb-2">
                                                                <span class="label text-success bg-light-success">{{ $data->job_nature_name }}</span>
                                                            </div>
                                                            <div class="jbs-job-title-wrap mb-3">
                                                                <h4><a href="{{ route('job-detail', $data->slug) }}" class="jbs-job-title">{{ $data->job_title }}</a></h4>
                                                            </div>
                                                            <div class="jbs-job-mrch-lists">
                                                                <div class="single-mrch-lists">
                                                                    <span><i class="fa-solid fa-location-dot me-1"></i>{{ $data->job_location }}</span>.<span><i class="fa-solid fa-clock me-1"></i>{{ $data->deadline }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="jbs-list-head-middle">
                                                        <div class="elsocrio-jbs">
                                                            <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                            <h5 class="jbs-list-pack">$85K - 95K<span class="patype">\PA</span></h5>
                                                        </div>
                                                    </div> --}}
                                                    <div class="jbs-list-head-last">
                                                        {{-- <a href="job-detail.html" class="btn btn-md btn-gray px-3 me-2">View Detail</a> --}}
                                                        <a href="{{ route('job-detail', $data->slug) }}" class="btn btn-md btn-primary px-3">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
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
                                            <h6>{{ $profileData->company_mail }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-phone-volume text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Contact No.</label>
                                            <h6>{{ $profileData->company_phone_no_1 }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-map-location-dot text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Location</label>
                                            <h6>{{ $profileData->company_address_1 }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-building-circle-check text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Established</label>
                                            <h6>{{ $profileData->company_year_of_establishment }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="sidefr-usr-block">
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
                    </div> --}}

                </div>

            </div>
            <!-- /row -->
        </div>
    </section>

@endsection
