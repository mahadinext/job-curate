@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <section class="bg-cover primary-bg-dark" style="background:url(assets/img/bg2.png)no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title text-light">Employee</h2>
                    <span class="text-light opacity-75">Create an account</span>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Login Form Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <!-- row Start -->
            <div class="row justify-content-center">

                <!-- Single blog Grid -->
                <div class="col-xl-4 col-lg-8 col-md-12">
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-bloc-body pt-3">
                            <div class="mb-4">
                                <h4 class="modal-header-title">Welcome back! Signin to your portal here.</h4>
                            </div>
                            @if (session('signinErrorMessage'))
                                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                                    <strong>{{ session('signinErrorMessage') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('signinPageMessage'))
                                <div class="alert alert-succcess alert-dismissible fade show my-2" role="alert">
                                    <strong>{{ session('signinPageMessage') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="row gx-3 gy-4">
                                <div class="modal-login-form">
                                    <form method="POST" action="{{ route('js-signin') }}">
                                        @csrf
                                        <div class="form-floating mb-4">
                                            <input type="email" name="email" class="form-control" placeholder="name@example.com">
                                            <label>User Name</label>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            <label>Password</label>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Sign
                                                In</button>
                                        </div>

                                        <div class="modal-flex-item mb-3">
                                            <div class="modal-flex-first">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="savepassword1"
                                                        value="option1">
                                                    <label class="form-check-label" for="savepassword1">Save
                                                        Password</label>
                                                </div>
                                            </div>
                                            <div class="modal-flex-last">
                                                <a href="JavaScript:Void(0);">Forget Password?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="social-login">
                                    <ul>
                                        <li><a href="JavaScript:Void(0);" class="btn connect-fb"><i
                                                    class="fa-brands fa-facebook"></i>Facebook</a></li>
                                        <li><a href="JavaScript:Void(0);" class="btn connect-google"><i
                                                    class="fa-brands fa-google"></i>Google+</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- ============================ Login Form End ================================== -->
@endsection
