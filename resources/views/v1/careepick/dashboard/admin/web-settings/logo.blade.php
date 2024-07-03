@extends('v1.careepick.dashboard.layouts.ad-master')
@section('content')
    <!--datatable css-->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>

    <div class="upper-title-box">
        <h3>Manage Employees</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>General Information</h4>
                    </div>
                    <div class="widget-content">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('web-logo-update') }}" enctype="multipart/form-data" class="default-form">
                            @csrf
                            <div class="row">
                                <div class="mb-4 col-md-6 col-sm-6 col-xs-12">
                                    <label>Logo <span class="text-danger">*</span></label>
                                    <div class="custom-file-upload">
                                        <input name="company_logo" class="mt-3" type="file" id="file" />
                                        @if ($errors->has('company_logo'))
                                            <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                        @endif
                                    </div>
                                    @if($webLogo->logo)
                                        <img class="mt-3" alt="Current Logo" src="{{ asset($webLogo->logo) }}" width="64px">
                                    @endif
                                </div>
                                <div class="mb-4 col-md-6 col-sm-6 col-xs-12">
                                    <label>Favicon <span class="text-danger">*</span></label>
                                    <div class="custom-file-upload">
                                        <input name="favicon" class="mt-3" type="file" id="file" />
                                        @if ($errors->has('favicon'))
                                            <span class="text-danger">{{ $errors->first('favicon') }}</span>
                                        @endif
                                    </div>
                                    @if($webLogo->favicon)
                                        <img class="mt-3" alt="Current Favicon" src="{{ asset($webLogo->favicon) }}" width="64px">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary full-width font--bold btn-md">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
