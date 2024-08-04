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
                    <div class="logo"><a href="{{ route('jp-dashboard') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" alt="" title=""></a>
                    </div>
                </div>

                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        <li><a href="{{ route('home') }}">Home</a></li>

                        <li><a href="{{ route('browse-job') }}">Browse Jobs</a></li>

                        <li class="dropdown">
                            <span>Pages</span>
                            <ul>
                                <li><a href="{{ route('about-us') }}">About Us</a></li>
                                <li><a href="{{ route('terms-policy') }}">Terms & Policy</a></li>
                                <li><a href="{{ route('contact-us') }}">Contacts</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('search-employee') }}">Search Employee</a></li>
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
                        <li class="active"><a href="{{ route('jp-dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
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
        <div class="logo"><a href="{{ route('jp-dashboard') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" alt="" title=""></a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="login-box">
                    <a href="{{ route('jp-profile') }}"><span class="icon-user"></span></a>
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
            <li class="active"><a href="{{ route('jp-dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            {{-- <li><a href="dashboard-company-profile.html"><i class="la la-user-tie"></i>Company Profile</a></li> --}}
            <li><a href="{{ route('job-post-page') }}"><i class="la la-paper-plane"></i>Post a New Job</a></li>
            <li><a href="{{ route('manage-jobs') }}"><i class="la la-briefcase"></i> Manage Jobs </a></li>
            <li><a href="{{ route('all-applicants') }}"><i class="la la-file-invoice"></i> All Applicants</a></li>
            {{-- <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
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
<!-- End User Sidebar -->
