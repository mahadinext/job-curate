@extends('v1.careepick.layouts.master')
@section('content')

    <!-- ============================ Page Title Start================================== -->
    <section class="bg-cover primary-bg-dark" style="background:url(assets/img/bg2.png)no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title text-light">Terms & Policy</h2>
                    <span class="ipn-subtitle text-light opacity-75">Check our Terms and Policies</span>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section class="gray-simple">

        <div class="container">

            <!-- row Start -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="box-block-wrap-group">

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_1']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_1']['description'] }}</p>
                            </div>
                        </div>

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_2']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_2']['description'] }}</p>
                            </div>
                        </div>

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_3']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_3']['description'] }}</p>
                            </div>
                        </div>

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_4']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_4']['description'] }}</p>
                            </div>
                        </div>

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_5']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_5']['description'] }}</p>
                            </div>
                        </div>

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_6']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_6']['description'] }}</p>
                            </div>
                        </div>

                        <div class="box-block-wrap">
                            <div class="box-block-wrap_header">
                                <h4 class="box-block-wrap_title">{{ $pageContents['section_7']['title'] }}</h4>
                            </div>

                            <div class="box-block-wrap-body">
                                <p>{{ $pageContents['section_7']['description'] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->

@endsection
