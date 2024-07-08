<!-- Header Span -->
<span class="header-span"></span>

<!-- Main Header-->
<header class="main-header header-shaddow">
    <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
            <!--Nav Outer -->
            <div class="nav-outer">
                <div class="logo-box">
                    <div class="logo"><a href="{{ route('ad-dashboard') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" alt="" title=""></a>
                    </div>
                </div>

                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        <li><a href="{{ route('home') }}">Home Page</a></li>

                        <li><a href="{{ route('browse-job') }}">Find Jobs</a></li>

                        <li class="dropdown">
                            <span>Pages</span>
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="faqs.html">FAQ's</a></li>
                                <li><a href="terms.html">Terms</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>

                        <!-- Only for Mobile View -->
                        <li class="mm-add-listing">
                            <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
                            <span>
                                <span class="contact-info">
                                    <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456
                                            7890</a></span>
                                    <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051,
                                        Australia.</span>
                                    <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                                </span>
                                <span class="social-links">
                                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                                    <a href="#"><span class="fab fa-twitter"></span></a>
                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                    <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                </span>
                            </span>
                        </li>
                    </ul>
                </nav>
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">

                <button class="menu-btn">
                    <span class="count">1</span>
                    <span class="icon la la-heart-o"></span>
                </button>

                <button class="menu-btn">
                    <span class="icon la la-bell"></span>
                </button>

                <!-- Dashboard Option -->
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{-- <img src="{{ URL::asset('dashboard/assets/images/resource/company-6.png') }}" alt="avatar" class="thumb"> --}}
                        <span class="name">My Account</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="{{ route('ad-dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
                        {{-- <li><a href="dashboard-company-profile.html"><i class="la la-user-tie"></i>Company Profile</a></li> --}}
                        <li><a href="{{ route('job-post-page') }}"><i class="la la-paper-plane"></i>Post a New Job</a></li>
                        <li><a href="{{ route('manage-jobs') }}"><i class="la la-briefcase"></i> Manage Jobs </a></li>
                        <li><a href="{{ route('all-applicants') }}"><i class="la la-file-invoice"></i> All Applicants</a></li>
                        {{-- <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
                        <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
                        <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
                        <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                        <li><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
                        <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
                        <li><a href="dashboard-company-profile.html"><i class="la la-user-alt"></i>View Profile</a></li> --}}
                        <li><a href="{{ route('js-signout') }}"><i class="la la-sign-out"></i>Logout</a></li>
                        {{-- <li><a href="index.html"><i class="la la-trash"></i>Delete Profile</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="{{ route('ad-dashboard') }}"><img src="{{ URL::asset('dashboard/assets/images/logo.svg') }}" alt="" title=""></a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="login-box">
                    <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                </div>

                <button id="toggle-user-sidebar"><img src="{{ URL::asset('dashboard/assets/images/resource/company-6.png') }}" alt="avatar"
                        class="thumb"></button>
                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                        class="flaticon-menu-1"></span></a>
            </div>
        </div>

    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
<!--End Main Header -->

<!-- Sidebar Backdrop -->
<div class="sidebar-backdrop"></div>

<!-- User Sidebar -->
<div class="user-sidebar">

    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="active"><a href="{{ route('ad-dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            <li><a href="{{ route('all-recruiters-page') }}"><i class="la la-paper-plane"></i>Recruiters</a></li>
            <li><a href="{{ route('all-employees-page') }}"><i class="la la-briefcase"></i>Employees </a></li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#settings-dropdown" aria-expanded="false" aria-controls="settings-dropdown">
                    <i class="la la-cog"></i> Web Settings
                </a>
                <ul id="settings-dropdown" class="navigation collapse">
                    <li><a href="{{ route('web-logo-page') }}"><i class="la la-paper-plane"></i>Web Logo</a></li>
                    <li><a href="{{ route('web-info-page') }}"><i class="la la-paper-plane"></i>Web Info</a></li>
                    <li><a href="{{ route('meta.index') }}"><i class="la la-paper-plane"></i>Meta Info</a></li>
                    <li><a href="{{ route('ad-signout') }}"><i class="la la-user"></i> Profile Settings</a></li>
                    <li><a href="{{ route('ad-signout') }}"><i class="la la-key"></i> Account Settings</a></li>
                    <li><a href="{{ route('ad-signout') }}"><i class="la la-lock"></i> Privacy Settings</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#home-page-dropdown" aria-expanded="false" aria-controls="home-page-dropdown">
                    <i class="la la-home"></i> Home Page
                </a>
                <ul id="home-page-dropdown" class="navigation collapse">
                    <li><a href="{{ route('ad-signout') }}"><i class="la la-paper-plane"></i>Hero Section</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#about-page-dropdown" aria-expanded="false" aria-controls="about-page-dropdown">
                    <i class="la la-home"></i> About Page
                </a>
                <ul id="about-page-dropdown" class="navigation collapse">
                    <li><a href=""><i class="la la-paper-plane"></i>Meta Section</a></li>
                </ul>
            </li>
            <li><a href="{{ route('ad-signout') }}"><i class="la la-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</div>
<!-- End User Sidebar -->
