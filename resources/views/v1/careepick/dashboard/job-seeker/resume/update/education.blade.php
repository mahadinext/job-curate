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

                    <div class="widget-content">
                        <form class="default-form" method="POST" action="{{ route('js-add-education') }}" enctype="multipart/form-data">
                            @csrf
                            @foreach($jsEducationData as $key => $jsEduData)
                                <div class="row gx-3 gy-4">
                                    <div class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Level of Education <span class="text-danger">*</span></label>
                                        <input type="hidden" name="education_id" value="{{ $jsEduData->id }}" class="form-control input-custom-style">
                                        <select id="education-level-select" name="education_level"
                                            data-placeholder="Education Level" class="form-control chosen-select">
                                            <option value="">Select Level</option>
                                            @foreach ($educationLevelsData as $key => $educationLevel)
                                                @php
                                                    $selected = ($jsEduData->education_level_id == $educationLevel->id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $educationLevel->id }}" {{ $selected }}>{{ $educationLevel->level_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 mb-4"
                                        id="education-degree-title-select-wrapper">
                                        <label class="py-2">Exam/Degree Title <span class="text-danger">*</span></label>
                                        <select id="education-degree-title-select" name="exam_degree_title"
                                            data-placeholder="Degree Title" class="form-control chosen-select">
                                            <option value="">Select Degree</option>
                                            @foreach ($educationDegreeTitleData as $key => $educationDegreeTitle)
                                                @php
                                                    $selected = ($jsEduData->education_degree_title_id == $educationDegreeTitle->id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $educationDegreeTitle->id }}" {{ $selected }}>{{ $educationDegreeTitle->degree_full_form }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 mb-4"
                                        id="education-degree-title-input-wrapper" style="display: none;">
                                        <label class="py-2">Exam/Degree Title <span class="text-danger">*</span></label>
                                        <input type="text" id="education-degree-title-input" value="{{ $jsEduData->education_degree_title }}"
                                            name="exam_degree_title_1" class="form-control"
                                            placeholder="Enter Degree Title">
                                    </div>

                                    <div id="major-subject-dropdown" class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Concentration/Major/Group <span class="text-danger">*</span></label>
                                        <select name="major_subject" id="major_subject" data-placeholder="Major Subject"
                                            class="form-control chosen-select">
                                            <option value="">Select Subject</option>
                                            @foreach ($educationSubjectsData as $key => $educationSubject)
                                                @php
                                                    $selected = ($jsEduData->education_subjects_id == $educationSubject->id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $educationSubject->id }}" {{ $selected }}>{{ $educationSubject->subject_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="education-board-dropdown"
                                        class="form-group col-lg-6 col-md-12 mb-4 hide">
                                        <label class="py-2">Board <span class="text-danger">*</span></label>
                                        <select name="education_board" id="education_board" data-placeholder="Education Board"
                                            class="form-control chosen-select">
                                            <option value="">Select Education Board</option>
                                            <option value="Dhaka" @if($jsEduData->education_board == "Dhaka") selected @endif>Dhaka</option>
                                            <option value="Barishal" @if($jsEduData->education_board == "Barishal") selected @endif>Barishal</option>
                                            <option value="Chattogram" @if($jsEduData->education_board == "Chattogram") selected @endif>Chattogram</option>
                                            <option value="Cumilla" @if($jsEduData->education_board == "Cumilla") selected @endif>Cumilla</option>
                                            <option value="Dinajpur" @if($jsEduData->education_board == "Dinajpur") selected @endif>Dinajpur</option>
                                            <option value="Jashore" @if($jsEduData->education_board == "Jashore") selected @endif>Jashore</option>
                                            <option value="Mymensingh" @if($jsEduData->education_board == "Mymensingh") selected @endif>Mymensingh</option>
                                            <option value="Rajshahi" @if($jsEduData->education_board == "Rajshahi") selected @endif>Rajshahi</option>
                                            <option value="Sylhet" @if($jsEduData->education_board == "Sylhet") selected @endif>Sylhet</option>
                                            <option value="Madrasah" @if($jsEduData->education_board == "Madrasah") selected @endif>Madrasah</option>
                                            <option value="Technical" @if($jsEduData->education_board == "Technical") selected @endif>Technical</option>
                                            <option value="BOU" @if($jsEduData->education_board == "BOU") selected @endif>BOU</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Institute Type <span
                                                class="text-danger">*</span></label>
                                        <select id="institution-type" name="institution_type"
                                            data-placeholder="Institute Type" class="form-control chosen-select">
                                            <option value="">Select Institute Type</option>
                                            <option value="1" @if($jsEduData->education_institute_type_id == "1") selected @endif>School</option>
                                            <option value="2" @if($jsEduData->education_institute_type_id == "2") selected @endif>College</option>
                                            <option value="3" @if($jsEduData->education_institute_type_id == "3") selected @endif>Madrasha</option>
                                            <option value="4" @if($jsEduData->education_institute_type_id == "4") selected @endif>University</option>
                                        </select>
                                    </div>

                                    <div id="institute-name" class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Institute Name <span class="text-danger">*</span></label>
                                        {{-- <select data-placeholder="Institute Name" class="chosen-select">
                                            <option>Select Institute</option>
                                            <option value="-1">Others</option>
                                            @foreach ($educationLevelsData as $key => $educationLevel)
                                                <option value="{{ $educationLevel->id }}">
                                                    {{ $educationLevel->level_name }}</option>
                                            @endforeach
                                        </select> --}}
                                        @php
                                            $institution_name = null;
                                        @endphp
                                        
                                        @if($jsEduData->school_name != null)
                                            @php $institution_name = $jsEduData->school_name @endphp
                                        @elseif($jsEduData->college_name != null)
                                            @php $institution_name = $jsEduData->college_name @endphp
                                        @elseif($jsEduData->madrasha_name != null)
                                            @php $institution_name = $jsEduData->madrasha_name @endphp
                                        @elseif($jsEduData->university_name != null)
                                            @php $institution_name = $jsEduData->university_name @endphp
                                        @endif
                                        <input type="text" id="institute-name-input" name="institution_name" value="{{ $institution_name }}"
                                            class="form-control input-custom-style" placeholder="Type Institute Name">
                                        <div id="institute-name-dropdown" class="autocomplete-items"></div>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Result <span class="text-danger">*</span></label>
                                        <select id="result-type-select" name="result_type"
                                            data-placeholder="Result Type" class="form-control chosen-select">
                                            <option value="">Select Result Type</option>
                                            @foreach ($educationResultTypeData as $key => $educationResultType)
                                                @php
                                                    $selected = ($jsEduData->education_result_type_id == $educationResultType->id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $educationResultType->id }}" {{ $selected }}>{{ $educationResultType->result_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="marks-input" class="form-group col-lg-6 col-md-12 mb-4 @if($jsEduData->marks == null) hide @endif">
                                        <label class="py-2">Marks (%) <span class="text-danger">*</span></label>
                                        <input name="exam_marks" id="exam_marks" value="{{ $jsEduData->marks }}" type="text" class="form-control input-custom-style" placeholder="">
                                    </div>

                                    <div id="cgpa-input" class="form-group col-lg-6 col-md-12 mb-4 @if($jsEduData->cgpa == null) hide @endif">
                                        <label class="py-2">CGPA <span class="text-danger">*</span></label>
                                        <input name="exam_cgpa" id="exam_cgpa" value="{{ $jsEduData->cgpa }}" type="text" class="form-control input-custom-style" placeholder="">
                                    </div>

                                    <div id="scale-input" class="form-group col-lg-6 col-md-12 mb-4 @if($jsEduData->scale == null) hide @endif">
                                        <label class="py-2">Scale <span class="text-danger">*</span></label>
                                        <input name="grade_scale" id="grade_scale" value="{{ $jsEduData->scale }}" type="text" class="form-control input-custom-style"
                                            placeholder="">
                                    </div>

                                    <div id="graduation-duration-input"
                                        class="hide form-group col-lg-6 col-md-12 mb-4 @if($jsEduData->duration == null) hide @endif">
                                        <label class="py-2">Duration <span class="text-danger">*</span></label>
                                        <input name="graduation_duration" id="graduation_duration" value="{{ $jsEduData->duration }}" type="number" class="form-control input-custom-style"
                                            placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Year of Passing <span
                                                class="text-danger">*</span></label>
                                        <select name="exam_passing_year" id="exam_passing_year" data-placeholder="Passing Year"
                                            class="form-control chosen-select">
                                            <option value="">Select Year</option>
                                            @foreach ($yearsData as $key => $year)
                                                @php
                                                    $selected = ($jsEduData->year_of_passing == $year->year) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $year->year }}" {{ $selected }}>{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group col-lg-6 col-md-12 mb-4">
                                        <label class="py-2">Achievement </label>
                                        <input name="exam_achievement" type="text" class="form-control input-custom-style" placeholder="">
                                    </div> --}}

                                    <div class="form-group mt-3">
                                        <button type="submit"
                                            class="btn btn-primary full-width font--bold btn-md">Save</button>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('v1.careepick.dashboard.job-seeker.ajax.resume-builder.education')
@endsection
