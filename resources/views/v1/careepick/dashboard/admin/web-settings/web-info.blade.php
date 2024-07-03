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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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

            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>General Information</h4>
                    </div>

                    <div class="widget-content">
                        <form method="POST" action="{{ route('web-info-update') }}" enctype="multipart/form-data" class="default-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $webInfo->title ?? '' }}" class="from-control ajax-validation-input @error('title') is-invalid @enderror" placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Meta Description <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_description" value="{{ $webInfo->meta_description ?? '' }}" class="from-control ajax-validation-input @error('meta_description') is-invalid @enderror" placeholder="Meta Description">
                                    @if ($errors->has('meta_description'))
                                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Meta Author Name <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_author_name" value="{{ $webInfo->meta_author_name ?? '' }}" class="from-control ajax-validation-input @error('meta_author_name') is-invalid @enderror" placeholder="Meta Author Name">
                                    @if ($errors->has('meta_author_name'))
                                        <span class="text-danger">{{ $errors->first('meta_author_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Meta Keywords <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_keywords" value="{{ $webInfo->meta_keywords ?? '' }}" class="from-control ajax-validation-input @error('meta_keywords') is-invalid @enderror" placeholder="Meta Keywords">
                                    @if ($errors->has('meta_keywords'))
                                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
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
