@extends('v1.careepick.dashboard.layouts.js-master')
@section('content')
    <style>
        .uploading-outer img.uploaded-image {
            position: absolute;
            top: 0;
            left: 0;
            max-width: 100%;
            max-height: 120px;
            /* Adjust height as needed */
            border-radius: 5px;
        }

        .uploadButton .uploadButton-button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            height: 120px;
            width: 104px;
            border-radius: 5px;
            transition: 0.3s;
            margin: 0;
            color: #1b2032;
            font-size: 16px;
            border: 2px dashed #ced4e1;
        }
    </style>

    <div class="upper-title-box">
        <h3>My Resume</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>My Profile</h4>
                        <div class="d-flex justify-content-sm-end">
                            <a href="{{ route('show-resume') }}" class="btn btn-primary m-3" target="_blank">
                                <i class="ri-add-line align-bottom me-1"></i>
                                View Resume
                            </a>
                        </div>
                    </div>

                    <div class="widget-content">
                        <form class="default-form" method="POST" action="{{ route('js-add-general-info') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @foreach ($jobSeekerData as $key => $jsData)
                                <div class="row">
                                    {{-- <div class="form-group col-lg-12 col-md-12">
                                        <div class="uploading-outer">
                                            <!-- Display the image here -->
                                            <img src="{{ asset($jsData->jobseeker_image) }}" class="uploaded-image"
                                                alt="Jobseeker Image">
                                            <div class="uploadButton">
                                                <input class="uploadButton-input" type="file" name="jobseeker_image"
                                                    accept="image/*" id="upload" />
                                                <label class="uploadButton-button ripple-effect" for="upload">Update
                                                    Image</label>
                                                <span class="uploadButton-file-name"></span>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="jobseeker_name" value="{{ $jsData->jobseeker_name }}"
                                            placeholder="Mr. X" />
                                        <input type="hidden" name="jobseeker_id" value="{{ $jsData->id }}" />
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="jobseeker_mail" value="{{ $jsData->jobseeker_mail }}"
                                            placeholder="xx@xx.xx" />
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="jobseeker_dob" value="{{ $jsData->jobseeker_dob }}"
                                            class="form-control input-custom-style" placeholder="YYYY-MM-DD">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Religion <span class="text-danger">*</span></label>
                                        <select id="" name="jobseeker_religion" class="form-control chosen-select">
                                            <option value="-1">Select Religion</option>
                                            <option value="Islam"
                                                {{ $jsData->jobseeker_religion == 'Islam' ? 'selected' : '' }}>Islam
                                            </option>
                                            <option value="Buddhism"
                                                {{ $jsData->jobseeker_religion == 'Buddhism' ? 'selected' : '' }}>Buddhism
                                            </option>
                                            <option value="Christianity"
                                                {{ $jsData->jobseeker_religion == 'Christianity' ? 'selected' : '' }}>
                                                Christianity</option>
                                            <option value="Hinduism"
                                                {{ $jsData->jobseeker_religion == 'Hinduism' ? 'selected' : '' }}>Hinduism
                                            </option>
                                            <option value="Jainism"
                                                {{ $jsData->jobseeker_religion == 'Jainism' ? 'selected' : '' }}>Jainism
                                            </option>
                                            <option value="Judaism"
                                                {{ $jsData->jobseeker_religion == 'Judaism' ? 'selected' : '' }}>Judaism
                                            </option>
                                            <option value="Sikhism"
                                                {{ $jsData->jobseeker_religion == 'Sikhism' ? 'selected' : '' }}>Sikhism
                                            </option>
                                            <option value="Others"
                                                {{ $jsData->jobseeker_religion == 'Others' ? 'selected' : '' }}>Others
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select id="" name="jobseeker_gender" class="form-control chosen-select">
                                            <option value="-1">Select Gender</option>
                                            <option value="Male"
                                                {{ $jsData->jobseeker_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female"
                                                {{ $jsData->jobseeker_gender == 'Female' ? 'selected' : '' }}>Female
                                            </option>
                                            <option value="Others"
                                                {{ $jsData->jobseeker_gender == 'Others' ? 'selected' : '' }}>Others
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Marital Status <span class="text-danger">*</span></label>
                                        <select id="" name="jobseeker_marital_status"
                                            class="form-control chosen-select">
                                            <option value="-1">Select Status</option>
                                            <option value="Married"
                                                {{ $jsData->jobseeker_marital_status == 'Married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="Unmarried"
                                                {{ $jsData->jobseeker_marital_status == 'Unmarried' ? 'selected' : '' }}>
                                                Unmarried</option>
                                            <option value="Single"
                                                {{ $jsData->jobseeker_marital_status == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Divorced"
                                                {{ $jsData->jobseeker_marital_status == 'Divorced' ? 'selected' : '' }}>
                                                Divorced</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Primary Mobile <span class="text-danger">*</span></label>
                                        <input type="text" name="jobseeker_phone_no_1"
                                            value="{{ $jsData->jobseeker_phone_no_1 }}" placeholder="01*********" />
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Secondary Mobile</label>
                                        <input type="text" name="jobseeker_phone_no_2"
                                            value="{{ $jsData->jobseeker_phone_no_2 }}" placeholder="01*********" />
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>National Id</label>
                                        <input type="text" name="jobseeker_nid_no"
                                            value="{{ $jsData->jobseeker_nid_no }}" placeholder="" />
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" name="jobseeker_address"
                                            value="{{ $jsData->jobseeker_address }}"
                                            placeholder="Ex: Dhaka, Bangladesh" />
                                    </div>

                                    {{-- About Yourself --}}
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Career Summary <span class="text-danger">*</span></label>
                                        <textarea name="jobseeker_career_summary">{{ $jsData->jobseeker_career_summary }}</textarea>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4></h4>
                    </div>

                    <div class="widget-content">
                        <div class="row">
                            <!-- Resume / Work & Experience -->
                            <div class="form-group col-lg-12 col-md-12">
                                <div class="resume-outer theme-blue">
                                    @if (session('add-work-xp-message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('add-work-xp-message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="upper-title">
                                        <h4>Work & Experience</h4>
                                        <a href="JavaScript:Void(0);" class="add-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#addWorkExperience"><span class="icon flaticon-plus"></span>
                                            Add
                                            Work</a>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach ($jobSeekerExperiencesData as $key => $workXpData)
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name">{{ ++$key }}</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{ $workXpData->designation }}</h3>
                                                        <span>{{ $workXpData->organization_name }}</span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <span class="year">{{ $workXpData->workingTime }}</span>
                                                        <div class="edit-btns">
                                                            <button class="workXpEditBtn" data-id="{{ $workXpData->id }}"><span class="la la-pencil"></span></button>
                                                            <button><a href="{{ route('js-delete-work-experience', ['id' => $workXpData->id]) }}"><span class="la la-trash"></span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    {{ $workXpData->responsibilities }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Resume / Education -->
                            <div class="form-group col-lg-12 col-md-12">
                                @if (session('add-education-message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('add-education-message') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="resume-outer">
                                    <div class="upper-title">
                                        <h4>Education</h4>
                                        <a href="JavaScript:Void(0);" class="add-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#addEducation"><span class="icon flaticon-plus"></span> Add
                                            Education</a>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach ($jobSeekerEducationsData as $key => $educationsData)
                                        <div class="resume-block">
                                            <div class="inner" style="padding-bottom: 0px">
                                                <span
                                                    class="name">{{ $educationsData->educationLevel->level_icon }}</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{ $educationsData->educationLevel->level_name }} in
                                                            {{ $educationsData->educationSubject->subject_name }}</h3>
                                                        <p style="margin-bottom: 0px">
                                                            {{ $educationsData->institute_name }},
                                                            {{ $educationsData->educationDegreeTitle->degree_initial_form }}
                                                        </p>
                                                        @if ($educationsData->cgpa != null && $educationsData->education_institute_type_id == 4)
                                                            <p>CGPA:
                                                                {{ $educationsData->cgpa }}/{{ $educationsData->scale }}
                                                            </p>
                                                        @elseif($educationsData->cgpa != null)
                                                            <p>GPA:
                                                                {{ $educationsData->cgpa }}/{{ $educationsData->scale }}
                                                            </p>
                                                        @elseif($educationsData->marks != null)
                                                            <p>Marks: {{ $educationsData->marks }}%</p>
                                                        @endif
                                                    </div>
                                                    <div class="edit-box">
                                                        <span class="year">
                                                            @if ($educationsData->duration != null)
                                                                {{ $educationsData->year_of_passing - $educationsData->duration }}
                                                                -
                                                            @endif
                                                            {{ $educationsData->year_of_passing }}
                                                        </span>
                                                        <div class="edit-btns">
                                                            <button><a href="{{ route('js-fetch-education', ['id' => $educationsData->id]) }}"><span class="la la-pencil"></span></a></button>
                                                            <button><a href="{{ route('js-delete-education', ['id' => $educationsData->id]) }}"><span class="la la-trash"></span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="text">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Proin a ipsum tellus. Interdum et
                                                    malesuada fames ac ante<br> ipsum primis in faucibus.
                                                </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- <div class="form-group col-lg-6 col-md-12">
                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="attachments[]"
                                            accept="image/*, application/pdf" id="upload" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Add
                                            Portfolio</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Resume / Certifications -->
                            <div class="form-group col-lg-12 col-md-12">
                                <!-- Resume / Certifications -->
                                <div class="resume-outer theme-yellow">
                                    @if (session('add-certification-message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('add-certification-message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="upper-title">
                                        <h4>Certifications</h4>
                                        <a href="JavaScript:Void(0);" class="add-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#addCertification"><span class="icon flaticon-plus"></span>
                                            Certifications</a>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach ($jobSeekerCertificationData as $key => $certificationData)
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name">{{ ++$key }}</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{ $certificationData->certification_name }}</h3>
                                                        <span>{{ $certificationData->certification_institution }}</span>
                                                        <span></span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <span class="year">{{ $certificationData->certified_month }} ,
                                                            {{ $certificationData->certified_year }}</span>
                                                        <div class="edit-btns">
                                                            <button class="certificationEditBtn" data-id="{{ $certificationData->id }}"><span class="la la-pencil"></span></button>
                                                            <button><a href="{{ route('js-delete-certification', ['id' => $certificationData->id]) }}"><span class="la la-trash"></span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Resume / Research Papers -->
                            <div class="form-group col-lg-12 col-md-12">
                                <div class="resume-outer theme-yellow">
                                    @if (session('add-publications-message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('add-publications-message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="upper-title">
                                        <h4>Research paper/Publications</h4>
                                        <a href="JavaScript:Void(0);" class="add-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#addResearchPapers"><span class="icon flaticon-plus"></span>
                                            Research paper/Publications</a>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach ($jobSeekerResearchPapersData as $key => $publicationData)
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name">{{ ++$key }}</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{ $publicationData->research_paper_subject }}</h3>
                                                        @if ($publicationData->research_paper_url != null)
                                                            <span>Publication link:
                                                                {{ $publicationData->research_paper_url }}</span>
                                                        @endif
                                                        <span></span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <div class="edit-btns">
                                                            <button class="publicationEditBtn" data-id="{{ $publicationData->id }}"><span class="la la-pencil"></span></button>
                                                            <button><a href="{{ route('js-delete-publications', ['id' => $publicationData->id]) }}"><span class="la la-trash"></span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    {{ $publicationData->research_paper_summary }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Resume / Language Proficiency -->
                            <div class="form-group col-lg-12 col-md-12">
                                <div class="resume-outer theme-yellow">
                                    @if (session('add-languages-message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('add-languages-message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="upper-title">
                                        <h4>Language Proficiency</h4>
                                        <a href="JavaScript:Void(0);" class="add-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#addLanguage"><span class="icon flaticon-plus"></span>
                                            Language Proficiency</a>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach ($jobSeekerLanguagesData as $key => $languageData)
                                        <div class="resume-block">
                                            <div class="inner" style="padding-bottom: 0px; padding-left: 20px;">
                                                {{-- <span class="name">{{ ++$key }}</span> --}}
                                                <div class="title-box" style="margin-bottom: 0px">
                                                    <div class="info-box">
                                                        <h3>{{ $languageData->language->language_name }} -
                                                            {{ $languageData->proficiency }}</h3>
                                                    </div>
                                                    <div class="edit-box">
                                                        <div class="edit-btns">
                                                            <button class="languageEditBtn" data-id="{{ $languageData->id }}"><span class="la la-pencil"></span></button>
                                                            <button><a href="{{ route('js-delete-langugaes', ['id' => $languageData->id]) }}"><span class="la la-trash"></span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Resume / Skills -->
                            <div class="form-group col-lg-12 col-md-12">
                                <div class="resume-outer theme-yellow">
                                    @if (session('add-skill-message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('add-skill-message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="upper-title">
                                        <h4>Skills</h4>
                                        <a href="JavaScript:Void(0);" class="add-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#addSkills"><span class="icon flaticon-plus"></span>
                                            Skills</a>
                                    </div>
                                    <!-- Resume BLock -->

                                        <div class="resume-block">
                                            <div class="inner" style="padding-bottom: 0px; padding-left: 20px;">
                                                <div class="title-box" style="margin-bottom: 0px">
                                                    <div class="info-box">
                                                        <h3></h3>
                                                        @foreach ($jobSeekerSkillsData as $key => $skilldata)
                                                            <span class="badge rounded-pill bg-primary" style="color: white;">
                                                                {{ $skilldata->skills->skill_name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('v1.careepick.dashboard.job-seeker.resume.add.education-modal')
        @include('v1.careepick.dashboard.job-seeker.resume.add.experience-modal')
        @include('v1.careepick.dashboard.job-seeker.resume.add.certificate-modal')
        @include('v1.careepick.dashboard.job-seeker.resume.add.researchpaper-modal')
        @include('v1.careepick.dashboard.job-seeker.resume.add.language-modal')
        @include('v1.careepick.dashboard.job-seeker.resume.add.skills-modal')

        {{-- // var schoolAndCollegeData = {!! json_encode($schoolAndCollegeData) !!}; --}}

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            function showImagePreview(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function() {
                    var img = document.getElementById('imagePreview');
                    img.src = reader.result;
                    img.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    @include('v1.careepick.dashboard.job-seeker.ajax.resume-builder.education')
@endsection
