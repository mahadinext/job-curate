@extends('v1.careepick.dashboard.layouts.ad-master')
@section('content')

    <div class="upper-title-box">
        <h3>Terms & Policy Page</h3>
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

                <form method="POST" action="{{ route('ad-terms-policy-page-update') }}" enctype="multipart/form-data" class="default-form">
                    @csrf
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Introduction to Privacy Policy</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_1" value="{{ $pageContents['section_1']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_1') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_1'))
                                    <span class="text-danger">{{ $errors->first('title_1') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_1" class="from-control ajax-validation-input @error('description_1') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_1']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_1'))
                                    <span class="text-danger">{{ $errors->first('description_1') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Information we collect and how we use it</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_2" value="{{ $pageContents['section_2']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_2') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_2'))
                                    <span class="text-danger">{{ $errors->first('title_2') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_2" class="from-control ajax-validation-input @error('description_2') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_2']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_2'))
                                    <span class="text-danger">{{ $errors->first('description_2') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Account information of Employer</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_3" value="{{ $pageContents['section_3']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_3') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_3'))
                                    <span class="text-danger">{{ $errors->first('title_3') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_3" class="from-control ajax-validation-input @error('description_3') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_3']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_3'))
                                    <span class="text-danger">{{ $errors->first('description_3') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Account information of Employee</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_4" value="{{ $pageContents['section_4']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_4') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_4'))
                                    <span class="text-danger">{{ $errors->first('title_4') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_4" class="from-control ajax-validation-input @error('description_4') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_4']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_4'))
                                    <span class="text-danger">{{ $errors->first('description_4') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Activity</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_5" value="{{ $pageContents['section_5']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_5') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_5'))
                                    <span class="text-danger">{{ $errors->first('title_5') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_5" class="from-control ajax-validation-input @error('description_5') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_5']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_5'))
                                    <span class="text-danger">{{ $errors->first('description_5') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Transfer of information</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_6" value="{{ $pageContents['section_6']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_6') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_6'))
                                    <span class="text-danger">{{ $errors->first('title_6') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_6" class="from-control ajax-validation-input @error('description_6') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_6']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_6'))
                                    <span class="text-danger">{{ $errors->first('description_6') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Our Terms & Policy</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title_7" value="{{ $pageContents['section_7']['title'] ?? '' }}" class="from-control ajax-validation-input @error('title_7') is-invalid @enderror" placeholder="Title" required>
                                @if ($errors->has('title_7'))
                                    <span class="text-danger">{{ $errors->first('title_7') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description_7" class="from-control ajax-validation-input @error('description_7') is-invalid @enderror" id="" cols="30" rows="10" required>{{ $pageContents['section_7']['description'] ?? '' }}</textarea>
                                @if ($errors->has('description_7'))
                                    <span class="text-danger">{{ $errors->first('description_7') }}</span>
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
