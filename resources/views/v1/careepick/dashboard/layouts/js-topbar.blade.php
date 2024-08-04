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
                    <div class="logo"><a href="{{ route('home') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" alt="" title=""></a>
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
                        <li><a href="{{ route('search-employer') }}">Search Employer</a></li>
                    </ul>
                </nav>
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">

                {{-- <button class="menu-btn">
                    <span class="count">1</span>
                    <span class="icon la la-heart-o"></span>
                </button>

                <button class="menu-btn">
                    <span class="icon la la-bell"></span>
                </button> --}}
                <style>
                    .dashboard-option .dropdown-toggle::after {
                        content: none;
                    }
                    /* .dropdown-menu a {
                        display: block;
                        padding: 0.5rem 1rem;
                        color: #333;
                        text-decoration: none;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        transition: background-color 0.3s ease;
                    } */

                    .dropdown-menu a:hover {
                        background-color: #f0f0f0;
                    }

                    /* .dropdown-menu .unread {
                        font-weight: bold;
                    } */
                </style>
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <span class="name icon la la-bell">Notification</span> <span id="unread-count" class="badge bg-danger">0</span>
                    </a>
                    <ul class="dropdown-menu" id="notification-dropdown">
                        {{-- <li><a href=""><i class="la la-bell"></i>Job Alerts</a></li> --}}
                    </ul>
                </div>


                <!-- Dashboard Option -->
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{-- <img src="{{ URL::asset('dashboard/assets/images/resource/company-6.png') }}" alt="avatar" class="thumb"> --}}
                        <span class="name">My Account</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="{{ route('js-dashboard') }}"> <i class="la la-home"></i>Dashboard</a></li>
                        {{-- <li><a href="candidate-dashboard-profile.html"><i class="la la-user-tie"></i>My Profile</a></li> --}}
                        <li><a href="{{ route('resume-builder-page') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
                        <li><a href="{{ route('all-applied-jobs') }}"><i class="la la-briefcase"></i>Applied Jobs </a></li>
                        {{-- <li><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a></li>
                        <li><a href="candidate-dashboard-shortlisted-resume.html"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li>
                        <li><a href="candidate-dashboard-cv-manager.html"><i class="la la-file-invoice"></i>CV manager</a></li>
                        <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
                        <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                        <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
                        <li><a href="dashboard-profile.html"><i class="la la-user-alt"></i>View Profile</a></li> --}}
                        <li><a href="{{ route('js-signout') }}"><i class="la la-sign-out"></i>Logout</a></li>
                        {{-- <li><a href="index.html"><i class="la la-trash"></i>Delete Profile</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="{{ route('js-dashboard') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" alt="" title=""></a>
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
            <li class="active"><a href="{{ route('js-dashboard') }}"> <i class="la la-home"></i>Dashboard</a></li>
            {{-- <li><a href="candidate-dashboard-profile.html"><i class="la la-user-tie"></i>My Profile</a></li> --}}
            <li><a href="{{ route('resume-builder-page') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
            <li><a href="{{ route('all-applied-jobs') }}"><i class="la la-briefcase"></i>Applied Jobs </a></li>
            {{-- <li><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a></li>
            <li><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a></li>
            <li><a href="candidate-dashboard-shortlisted-resume.html"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li>
            <li><a href="candidate-dashboard-cv-manager.html"><i class="la la-file-invoice"></i>CV manager</a></li>
            <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
            <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
            <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
            <li><a href="dashboard-profile.html"><i class="la la-user-alt"></i>View Profile</a></li> --}}
            <li><a href="{{ route('js-signout') }}"><i class="la la-sign-out"></i>Logout</a></li>
            {{-- <li><a href="index.html"><i class="la la-trash"></i>Delete Profile</a></li> --}}
        </ul>
    </div>
</div>
<!-- End User Sidebar -->
