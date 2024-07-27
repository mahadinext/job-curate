<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header change-logo">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand static-logo" href="{{ route('home') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" class="logo"
                        alt=""></a>
                <a class="nav-brand fixed-logo" href="{{ route('home') }}"><img src="{{ URL::asset('assets/img/web/logo.png') }}" class="logo"
                        alt=""></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="list-buttons">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-sign-in-alt me-2"></i>Log In</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    <li class="active"><a href="{{ route('home') }}">Home</span></a>
                    </li>

                    <li><a href="{{ route('browse-job') }}">Browse Jobs</a></li>

                    <li><a href="JavaScript:Void(0);">Pages<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('terms-policy') }}">Terms & Policy</a></li>
                            <li><a href="{{ route('contact-us') }}">Contacts</a></li>
                        </ul>
                    </li>

                    @if (isset(app('jobSeeker')->id))
                        <li><a href="{{ route('search-employer') }}">Search Employer</a></li>
                    @endif
                    
                    @if ((isset(app('jobProvider')->id)))
                        <li><a href="{{ route('search-employee') }}">Search Employee</a></li>
                    @endif
                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    @if (isset(app('jobSeeker')->id))
                        <li>
                            <a href="{{ route('js-saved-jobs') }}">Saved Jobs</a>
                        </li>
                        <li>
                            <a href="{{ route('js-dashboard') }}">Dashboard</a>
                        </li>
                    @elseif (isset(app('jobProvider')->id))
                        <li>
                            <a href="{{ route('jp-dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li>
                            {{-- <i class="fas fa-sign-in-alt me-2"></i> --}}
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login">Sign In</a>
                        </li>
                        <li>
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#register">Register</a>
                        </li>
                    @endif
                    {{-- <li class="list-buttons ms-2">
                        <a href="signup.html"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload Resume</a>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
