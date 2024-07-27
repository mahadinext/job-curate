@extends('v1.careepick.layouts.master')
@section('content')

    <!-- ============================ Page Title Start================================== -->
    <section class="page-head bg-cover primary-bg-dark" style="background:url(assets/img/bg2.png)no-repeat;" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-md-12">

                    <h1 class="text-white mb-4">{{ $pageContents['hero_section']['title'] }}</h1>
                    <p class="text-white mb-4">{{ $pageContents['hero_section']['description'] }}</p>
                    {{-- <button type="button" class="btn btn-primary fw-medium">Get In Touch</button> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our Story Start ================================== -->
    <section>

        <div class="container">

            <!-- row Start -->
            <div class="row align-items-center justify-content-between">

                <div class="col-lg-12 col-md-12">
                    <div class="story-wrap explore-content">

                        <h2>{{ $pageContents['body_section']['title'] }}</h2>
                        <p class="fw-light mb-4">{{ $pageContents['body_section']['description'] }}</p>
                        {{-- <button type="button" class="btn fw-medium btn-primary">Start Today Now</button> --}}
                    </div>
                </div>

                {{-- <div class="col-lg-5 col-md-6">
                    <img src="assets/img/bn-1.png" class="img-fluid" alt="">
                </div> --}}

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Our Story End ================================== -->

    <!-- ============================ Valuable Step Start ================================== -->
    <section class="primary-bg-dark">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center light">
                        <h2>Choose What You Need</h2>
                        {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p> --}}
                    </div>
                </div>
            </div>

            <div class="row align-items-center gx-4 gy-4">

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="jobstock-posted-box-y78 colored">
                        <div class="jobstock-posted-body-y78">
                            <div class="serv-ctr-title"><h2 class="primary-2-cl">01.</h2></div>
                            <div class="serv-ctr-subtitle"><h5 class="text-light">Create An Account</h5></div>
                            <div class="serv-ctr-decs"><p class="text-light opacity-75">Post A Job To Tell Us About Your Project. We'll Quickly Match You With The Right Freelancers Find Place Best. Nor again is there anyone who loves.</p></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="jobstock-posted-box-y78 colored">
                        <div class="jobstock-posted-body-y78">
                            <div class="serv-ctr-title"><h2 class="primary-2-cl">02.</h2></div>
                            <div class="serv-ctr-subtitle"><h5 class="text-light">Search Jobs</h5></div>
                            <div class="serv-ctr-decs"><p class="text-light opacity-75">Post A Job To Tell Us About Your Project. We'll Quickly Match You With The Right Freelancers Find Place Best. Nor again is there anyone who loves.</p></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="jobstock-posted-box-y78 colored">
                        <div class="jobstock-posted-body-y78">
                            <div class="serv-ctr-title"><h2 class="primary-2-cl">03.</h2></div>
                            <div class="serv-ctr-subtitle"><h5 class="text-light">Save & Apply Jobs</h5></div>
                            <div class="serv-ctr-decs"><p class="text-light opacity-75">Post A Job To Tell Us About Your Project. We'll Quickly Match You With The Right Freelancers Find Place Best. Nor again is there anyone who loves.</p></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Valuable Step End ================================== -->

@endsection
