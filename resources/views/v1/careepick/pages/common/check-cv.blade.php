@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Header Top Start================================== -->
    <section class="bg-cover primary-bg-dark position-relative py-4">
        <div class="position-absolute top-0 end-0 z-0">
            <img src="{{ URL::asset('assets/img/shape-3-soft-light.svg') }}" alt="SVG" width="100">
        </div>
        <div class="position-absolute top-0 start-0 me-10 z-0">
            <img src="{{ URL::asset('assets/img/shape-1-soft-light.svg') }}" alt="SVG" width="150">
        </div>
    </section>
    <!-- ============================ Header Top End ================================== -->

    <section class="gray-simple position-relative">
        <div class="position-absolute top-0 start-0 primary-bg-dark ht-200 end-0"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="jbs-blocs style_03 border-0 b-0 mb-md-4 mb-sm-4">
                        <div class="jbs-blocs-body">
                            <div class="jbs-content px-4 py-4 border-bottom">
                                <div class="jbs-head-bodys-top">
                                    <div class="jbs-roots-y1 flex-column justify-content-start align-items-start">
                                        <div class="jbs-roots-y1-last">
                                            <div class="jbs-title-iop mb-1"><h2 class="m-0 fs-2">Update your CV</h2></div>
                                        </div>
                                        <div class="jbs-roots-y6 py-1 d-flex align-items-start flex-wrap">
                                            <div class="exloip-wraps me-4 my-2">
                                                <div class="drixko-box d-flex align-items-center">
                                                    <div class="drixko-box-caps">
                                                        <span class="text-medium fw-medium">
                                                            Hello <b>{{ app('jobSeeker')->jobseeker_name }}</b>, You have not updated your resume for quite a time. In this case you can update your information below to keep employers updated about you.
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jbs-roots-action-btns my-4">
                                    <a href="{{ route('show-resume') }}" target="_blank" class="btn btn-sm btn-info">View CV</a>
                                    <a href="{{ route('resume-builder-page') }}" target="_blank" class="btn btn-sm btn-outline-primary">Update CV</a>
                                    @if ($isApplied)
                                        <a href="javascript:void(0)" class="btn btn-sm btn-info" disabled="">Applied</a>
                                    @else
                                        <a href="{{ route('js-apply-job', ['jpId' => $jpId, 'jobId' => $jobId]) }}" class="btn btn-sm btn-success">Submit CV</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
