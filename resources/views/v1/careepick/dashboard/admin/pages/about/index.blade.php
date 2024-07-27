@extends('v1.careepick.dashboard.layouts.ad-master')
@section('content')

    <div class="upper-title-box">
        <h3>About Page</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
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

                <form method="POST" action="{{ route('ad-about-page-update') }}" enctype="multipart/form-data" class="default-form">
                    @csrf
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Hero Section</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="hero_title" value="{{ $heroSection['title'] ?? '' }}" class="from-control ajax-validation-input @error('hero_title') is-invalid @enderror" placeholder="Title">
                                @if ($errors->has('hero_title'))
                                    <span class="text-danger">{{ $errors->first('hero_title') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="hero_description" class="from-control ajax-validation-input @error('hero_description') is-invalid @enderror" id="" cols="30" rows="10">{{ $heroSection['description'] ?? '' }}</textarea>
                                @if ($errors->has('hero_description'))
                                    <span class="text-danger">{{ $errors->first('hero_description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Body Contents</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="body_title" value="{{ $bodySection['title'] ?? '' }}" class="from-control ajax-validation-input @error('body_title') is-invalid @enderror" placeholder="Title">
                                @if ($errors->has('body_title'))
                                    <span class="text-danger">{{ $errors->first('body_title') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="body_description" class="from-control ajax-validation-input @error('body_description') is-invalid @enderror" id="" cols="30" rows="10">{{ $bodySection['description'] ?? '' }}</textarea>
                                @if ($errors->has('body_description'))
                                    <span class="text-danger">{{ $errors->first('body_description') }}</span>
                                @endif
                            </div>

                            <div class="form-group my-2">
                                <button type="submit" class="btn btn-primary full-width font--bold btn-md p-3">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
