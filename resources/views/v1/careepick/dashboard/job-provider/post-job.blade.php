@extends('v1.careepick.dashboard.layouts.jp-master')
@section('content')
    <div class="upper-title-box">
        <h3>Post a New Job!</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Post Job</h4>
                    </div>

                    <div class="widget-content">

                        {{-- <div class="post-job-steps">
                            <div class="step">
                                <span class="icon flaticon-briefcase"></span>
                                <h5>Job Detail</h5>
                            </div>

                            <div class="step">
                                <span class="icon flaticon-money"></span>
                                <h5>Package & Payments</h5>
                            </div>

                            <div class="step">
                                <span class="icon flaticon-checked"></span>
                                <h5>Confirmation</h5>
                            </div>
                        </div> --}}

                        @if(session('add-job-post-message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('add-job-post-message') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('add-job-post') }}" enctype="multipart/form-data" class="default-form">
                            @csrf
                            <div class="row">
                                <!-- Input -->
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Job Title <span class="text-danger">*</span></label>
                                    <input type="text" name="job_title" value="{{ old('job_title') }}" class="from-control ajax-validation-input @error('job_title') is-invalid @enderror" placeholder="Title">
                                    @if ($errors->has('job_title'))
                                        <span class="text-danger">{{ $errors->first('job_title') }}</span>
                                    @endif
                                </div>

                                <!-- Search Select -->
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Job Category <span class="text-danger">*</span></label>
                                    <select name="job_category_id" class="chosen-select ajax-validation-input @error('job_category_id') is-invalid @enderror">
                                        <option value="">Select Job Category</option>
                                        @foreach ($jobCategoryData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('job_category_id'))
                                        <span class="text-danger">{{ $errors->first('job_category_id') }}</span>
                                    @endif
                                </div>

                                <!-- Input -->
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Vacancy <span class="text-danger">*</span></label>
                                    <input type="number" name="vacancy" value="{{ old('vacancy') }}" class="from-control ajax-validation-input @error('vacancy') is-invalid @enderror" placeholder="">
                                    @if ($errors->has('vacancy'))
                                        <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Salary Type <span class="text-danger">*</span></label>
                                    <select name="salary_type_id" id="salary-type-dropdown" class="chosen-select ajax-validation-input @error('salary_type_id') is-invalid @enderror">
                                        <option>Select Salary Type</option>
                                        @foreach ($salaryTypeData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->type }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('salary_type_id'))
                                        <span class="text-danger">{{ $errors->first('salary_type_id') }}</span>
                                    @endif
                                </div>

                                <div id="salary-input" class="form-group col-lg-6 col-md-12">
                                    <label>Salary <span class="text-danger">*</span></label>
                                    <input type="text" name="salary" value="{{ old('salary') }}" class="from-control ajax-validation-input @error('salary') is-invalid @enderror" placeholder="">
                                    @if ($errors->has('salary'))
                                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Select Age <span class="text-danger">*</span></label>
                                    <select name="age_id" class="chosen-select ajax-validation-input @error('age_id') is-invalid @enderror">
                                        <option value="">Select Age</option>
                                        @foreach ($ageRangeData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->age }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('age_id'))
                                        <span class="text-danger">{{ $errors->first('age_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Experience Level <span class="text-danger">*</span></label>
                                    <select name="experience_id" class="chosen-select ajax-validation-input @error('experience_id') is-invalid @enderror">
                                        <option value="">Select Experience</option>
                                        @foreach ($experienceRangeData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->experience }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('experience_id'))
                                        <span class="text-danger">{{ $errors->first('experience_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Application Deadline Date <span class="text-danger">*</span></label>
                                    <input type="date" name="deadline" value="{{ old('deadline') }}" class="form-control input-custom-style ajax-validation-input @error('deadline') is-invalid @enderror" placeholder="MM/DD/YYYY">
                                    @if ($errors->has('deadline'))
                                        <span class="text-danger">{{ $errors->first('deadline') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Education <span class="text-danger">*</span></label>
                                    <textarea class="form-control input-custom-style ajax-validation-input @error('education') is-invalid @enderror" name="education" placeholder="Bachelor of Science (BSc) in Computer Science & Engineering, Bachelor of Science (BSc) in Electronics and Telecommunication Engineering, Bachelor of Science (BSc) in Information Technology" rows="3">{{ old('education') }}</textarea>
                                    @if ($errors->has('education'))
                                        <span class="text-danger">{{ $errors->first('education') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Experience Requirments <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor-classic ajax-validation-input @error('experience_requirments') is-invalid @enderror" id="experience-requirments" name="experience_requirments">
                                        {{ old('experience_requirments') }}
                                    </textarea>
                                    @if ($errors->has('experience_requirments'))
                                        <span class="text-danger">{{ $errors->first('experience_requirments') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Additional Requirments <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor-classic ajax-validation-input @error('additional_requirments') is-invalid @enderror" id="additional-requirments" name="additional_requirments">
                                        {{ old('additional_requirments') }}
                                    </textarea>
                                    @if ($errors->has('additional_requirments'))
                                        <span class="text-danger">{{ $errors->first('additional_requirments') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Responsibilities <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor-classic ajax-validation-input @error('responsibilities') is-invalid @enderror" id="responsibilities" name="responsibilities">
                                        {{ old('responsibilities') }}
                                    </textarea>
                                    @if ($errors->has('responsibilities'))
                                        <span class="text-danger">{{ $errors->first('responsibilities') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Compensation & Benefits <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor-classic ajax-validation-input @error('compensation_benefits') is-invalid @enderror" id="compensation-and-benefits" name="compensation_benefits">
                                        {{ old('compensation_benefits') }}
                                    </textarea>
                                    @if ($errors->has('compensation_benefits'))
                                        <span class="text-danger">{{ $errors->first('compensation_benefits') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Job Highlights <span class="text-danger">*</span></label>
                                    <textarea name="job_highlights" class="form-control ckeditor-classic ajax-validation-input @error('job_highlights') is-invalid @enderror" id="job-highlights">
                                        {{ old('job_highlights') }}
                                    </textarea>
                                    @if ($errors->has('job_highlights'))
                                        <span class="text-danger">{{ $errors->first('job_highlights') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Required Skills <span class="text-danger">*</span></label>
                                    <select name="skill_id[]" class="chosen-select ajax-validation-input @error('skill_id') is-invalid @enderror multiple" multiple>
                                        <option disabled>Select Skills</option>
                                        @foreach ($skillsData as $key => $data)
                                            <option value="{{ $data['id'] }}">{{ $data['skill_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('skill_id'))
                                        <span class="text-danger">{{ $errors->first('skill_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Job Nature <span class="text-danger">*</span></label>
                                    <select name="job_nature" class="chosen-select ajax-validation-input @error('job_nature') is-invalid @enderror">
                                        <option value="">Select Job Type</option>
                                        @foreach ($jobNatureData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->nature }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('job_nature'))
                                        <span class="text-danger">{{ $errors->first('job_nature') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Workplace <span class="text-danger">*</span></label>
                                    <select name="job_place" class="chosen-select ajax-validation-input @error('job_place') is-invalid @enderror">
                                        <option value="">Select workplace</option>
                                        @foreach ($jobPlaceData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->workplace }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('job_place'))
                                        <span class="text-danger">{{ $errors->first('job_place') }}</span>
                                    @endif
                                </div>

                                <!-- Input -->
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Job Location <span class="text-danger">*</span></label>
                                    <input type="text" name="job_location" value="{{ old('job_location') }}" class="from-control ajax-validation-input @error('job_location') is-invalid @enderror" placeholder="Banani, Dhaka">
                                    @if ($errors->has('job_location'))
                                        <span class="text-danger">{{ $errors->first('job_location') }}</span>
                                    @endif
                                </div>

                                <!-- Input -->
                                <div class="form-group col-lg-12 col-md-12 text-right">
                                    <button class="theme-btn btn-style-one">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('change', '#salary-type-dropdown', function() {
                    var salaryType = $("#salary-type-dropdown option:selected").val();
                    if (salaryType != 2) {
                        document.getElementById("salary-input").classList.remove("hide");
                    } else {
                        document.getElementById("salary-input").classList.add("hide");
                    }
                });
            });
        </script>

        <!-- ckeditor -->
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script> --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js"></script>
        <script src="{{ URL::asset('dashboard/assets/js/ckeditor5-init.js') }}"></script>
        <script>
            document.querySelectorAll('textarea.ckeditor-classic').forEach(textarea => {
                // Get the ID of each textarea
                const textarea_id = textarea.getAttribute('id');
                // console.log(textarea_id);
                // Call ckEditor_Generator function with textarea_id
                ckEditor_Generator(textarea_id);
            });
        </script>

    </div>
@endsection
