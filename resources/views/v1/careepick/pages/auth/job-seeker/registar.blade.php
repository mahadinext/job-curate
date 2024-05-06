@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <section class="bg-cover primary-bg-dark" style="background:url(assets/img/bg2.png)no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title text-light">Employee</h2>
                    <span class="text-light opacity-75">Create an account or signin</span>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Registar Form Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    @if(session('registrationMessage'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('registrationMessage') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-bloc-body pt-3">
                            <div class="row gx-3 gy-4">
                                <div class="modal-login-form">
                                    <form method="POST" action="{{ route('js-register.post') }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- Account Information --}}
                                        <div class="card card-h-100">
                                            <div class="card-header">
                                                <h3>Account Information</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input name="name" type="text" class="form-control" placeholder="">
                                                    </div>
                                                    <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input name="email" type="email" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                    <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                                        <label>Phone Number <span class="text-danger">*</span></label>
                                                        <input name="phone_no" type="text"
                                                            class="form-control" placeholder="">
                                                    </div>
                                                    {{-- <div class="mb-4 col-md-4 col-sm-6 col-xs-12 m-clear">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <select name="gender" class="wide form-control">
                                                            <option data-display="Select Gender">Male</option>
                                                            <option value="1">Female</option>
                                                            <option value="2">Others</option>
                                                        </select>
                                                    </div> --}}
                                                    <div class="mb-4 col-md-6 col-sm-6 col-xs-12">
                                                        <label>Password <span class="text-danger">*</span></label>
                                                        <input name="password" type="password"
                                                            class="form-control company_password" placeholder="">
                                                    </div>
                                                    {{-- <div class="mb-4 col-md-6 col-sm-6 col-xs-12">
                                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                                        <input type="password" class="form-control confirm_company_password" placeholder="">
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">
                                                Create An Account
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Registar Form End ================================== -->
@endsection
