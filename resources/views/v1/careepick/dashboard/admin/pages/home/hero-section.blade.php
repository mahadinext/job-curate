@extends('v1.careepick.dashboard.layouts.ad-master')
@section('content')

    <div class="upper-title-box">
        <h3>Home Page</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Hero Section</h4>
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
                        <form method="POST" action="{{ route('ad-home-page-hero-section-update') }}" enctype="multipart/form-data" class="default-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="sub_title" value="{{ $heroSection['sub_title'] ?? '' }}" class="from-control ajax-validation-input @error('sub_title') is-invalid @enderror" placeholder="Title">
                                    @if ($errors->has('sub_title'))
                                        <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ $heroSection['title'] ?? '' }}" class="from-control ajax-validation-input @error('title') is-invalid @enderror" placeholder="Title">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="from-control ajax-validation-input @error('description') is-invalid @enderror" id="" cols="30" rows="10">{{ $heroSection['description'] ?? '' }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
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
