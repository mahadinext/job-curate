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
                    <div class="side-widget-blocks">

                        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="fs-bold fs-5 mb-0">Search Filter</h4>
                            <div class="ssh-header">
                                <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
                                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button"
                                    class="collapsed _filter-ico ml-2"><i class="fa-solid fa-filter"></i></a>
                            </div>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                            <div class="search-inner">
                                <div class="side-widget-inner">

                                    <div class="form-group">
                                        <label>Search By Keyword</label>
                                        <div class="form-group-inner">
                                            <input type="text" class="form-control" placeholder="Search by keywords...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Job Category</label>
                                        <div class="form-group-inner">
                                            <select>
                                                <option value="0">Choose category</option>
                                                <option value="1">Health & Medical</option>
                                                <option value="2">Bank & Advisory</option>
                                                <option value="3">Design & UI</option>
                                                <option value="4">Development</option>
                                                <option value="5">Automotive Jobs</option>
                                                <option value="6">Software & Consultancy</option>
                                                <option value="7">Other Services</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Radius in Miles</label>
                                        <div class="form-group-inner">
                                            <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="my_range"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Experience Level</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="d1" class="form-check-input" name="ADA"
                                                            type="checkbox" checked="">
                                                        <label for="d1" class="form-check-label">Beginner (54)</label>
                                                    </li>
                                                    <li>
                                                        <input id="d2" class="form-check-input" name="Parking"
                                                            type="checkbox">
                                                        <label for="d2" class="form-check-label">1+ Year (32)</label>
                                                    </li>
                                                    <li>
                                                        <input id="d3" class="form-check-input" name="Coffee"
                                                            type="checkbox">
                                                        <label for="d3" class="form-check-label">2 Year (09)</label>
                                                    </li>
                                                    <li>
                                                        <input id="d4" class="form-check-input" name="Mother"
                                                            type="checkbox">
                                                        <label for="d4" class="form-check-label">3+ Year (16)</label>
                                                    </li>
                                                    <li>
                                                        <input id="d5" class="form-check-input" name="Outdoor"
                                                            type="checkbox">
                                                        <label for="d5" class="form-check-label">4+ Year (17)</label>
                                                    </li>
                                                    <li>
                                                        <input id="d6" class="form-check-input" name="Pet"
                                                            type="checkbox">
                                                        <label for="d6" class="form-check-label">5+ Year (22)</label>
                                                    </li>
                                                    <li>
                                                        <input id="d7" class="form-check-input" name="Beauty"
                                                            type="checkbox">
                                                        <label for="d7" class="form-check-label">10+ Year
                                                            (32)</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Job Type</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="e2" class="form-check-input" name="jtype"
                                                            type="radio">
                                                        <label for="e2" class="form-check-label">Full time</label>
                                                    </li>
                                                    <li>
                                                        <input id="e3" class="form-check-input" name="jtype"
                                                            type="radio">
                                                        <label for="e3" class="form-check-label">Part Time</label>
                                                    </li>
                                                    <li>
                                                        <input id="e4" class="form-check-input" name="jtype"
                                                            type="radio" checked="">
                                                        <label for="e4" class="form-check-label">Contract
                                                            Base</label>
                                                    </li>
                                                    <li>
                                                        <input id="e5" class="form-check-input" name="jtype"
                                                            type="radio">
                                                        <label for="e5" class="form-check-label">Internship</label>
                                                    </li>
                                                    <li>
                                                        <input id="e6" class="form-check-input" name="jtype"
                                                            type="radio">
                                                        <label for="e6" class="form-check-label">Regular</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Job Lavel</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="f1" class="form-check-input" name="ADA"
                                                            type="checkbox" checked="">
                                                        <label for="f1" class="form-check-label">Team Leader</label>
                                                    </li>
                                                    <li>
                                                        <input id="f2" class="form-check-input" name="Parking"
                                                            type="checkbox">
                                                        <label for="f2" class="form-check-label">Manager</label>
                                                    </li>
                                                    <li>
                                                        <input id="f3" class="form-check-input" name="Coffee"
                                                            type="checkbox">
                                                        <label for="f3" class="form-check-label">Junior</label>
                                                    </li>
                                                    <li>
                                                        <input id="f4" class="form-check-input" name="Coffee"
                                                            type="checkbox">
                                                        <label for="f4" class="form-check-label">Senior</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Posted Date</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="l1" class="form-check-input" name="hour"
                                                            type="checkbox" checked="">
                                                        <label for="l1" class="form-check-label">Last Hour</label>
                                                    </li>
                                                    <li>
                                                        <input id="l2" class="form-check-input" name="days"
                                                            type="checkbox">
                                                        <label for="l2" class="form-check-label">Last 24
                                                            hour</label>
                                                    </li>
                                                    <li>
                                                        <input id="l3" class="form-check-input" name="week"
                                                            type="checkbox">
                                                        <label for="l3" class="form-check-label">Last Week</label>
                                                    </li>
                                                    <li>
                                                        <input id="l4" class="form-check-input" name="month"
                                                            type="checkbox">
                                                        <label for="l4" class="form-check-label">Last 30
                                                            Days</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-1">
                                        <button type="button"
                                            class="btn btn-lg btn-primary fs-6 fw-medium full-width">Search job</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->

                <!-- Job List Wrap -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Shorting Box -->
                    <div class="row justify-content-center mb-4">
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
                    </div>
                    <!-- Shorting Wrap End -->

                    <!-- Start All List -->
                    <div class="row justify-content-start gx-3 gy-4">

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-4.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Software &
                                            Consultancy</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Swap Technology</a>
                                        </h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>California, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">06
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-5.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Photo Edditing
                                            Tools</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Photoshop</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>New York, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">16
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-6.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Web Browser &
                                            Tech</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Firefox</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>Denver, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">03
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-7.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Business
                                            Directory</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Airbnb</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>London, UK</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">08
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-8.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Message & Video
                                            Reelas</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Snapchat</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>London, UK</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">07
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-9.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Portfolio
                                            Showcase</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Dribbble Inc</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>New York, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">05
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-10.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Chat & Video
                                            Calling</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Skype</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>Canada, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">10
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-11.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Software &
                                            Consultancy</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Google Inc</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>London, UK</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">06
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-4.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Software &
                                            Consultancy</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Swap Technology</a>
                                        </h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>California, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">06
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-5.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Photo Edditing
                                            Tools</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Photoshop</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>New York, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">16
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-6.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Web Browser &
                                            Tech</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Firefox</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>Denver, USA</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">03
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="emp-grid-blocs border">

                                <div class="emp-grid-thumbs">
                                    <a href="employer-detail.html">
                                        <figure><img src="{{ URL::asset('assets/img/l-7.png') }}" class="img-fluid" alt=""></figure>
                                    </a>
                                </div>

                                <div class="emp-grid-captions">
                                    <div class="emplors-job-types-wrap"><span class="text-sm-muted">Business
                                            Directory</span></div>
                                    <div class="emplors-job-title-wrap mb-1">
                                        <h4><a href="employer-detail.html" class="emplors-job-title">Airbnb</a></h4>
                                    </div>
                                    <div class="emplors-job-mrch-lists">
                                        <div class="single-mrch-lists">
                                            <span><i class="fa-solid fa-location-dot me-1"></i>London, UK</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="emp-grid-footrs">
                                    <div class="emp-flexio"><span class="label px-4 py-2 text-primary bg-light-primary">08
                                            Open position</span></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- End All Job List -->

                    <!-- Pagination -->
                    <div class="row">
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
                    </div>

                </div>
                <!-- Job List Wrap End-->

            </div>
        </div>
    </section>
    <!-- ============================ All List Wrap ================================== -->
@endsection
