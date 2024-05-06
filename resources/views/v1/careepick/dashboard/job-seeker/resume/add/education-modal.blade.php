<!-- Education Modal -->
<div class="modal fade" id="addEducation" tabindex="-1" role="dialog" aria-labelledby="addEducationModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Education</h4>
                <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-education') }}"
                            enctype="multipart/form-data" id="addEducationForm">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Level of Education <span class="text-danger">*</span></label>
                                    <select id="education-level-select" name="education_level"
                                        data-placeholder="Education Level" class="form-control chosen-select">
                                        <option value="">Select Level</option>
                                        @foreach ($educationLevelsData as $key => $educationLevel)
                                            <option value="{{ $educationLevel->id }}">
                                                {{ $educationLevel->level_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4"
                                    id="education-degree-title-select-wrapper">
                                    <label class="py-2">Exam/Degree Title <span class="text-danger">*</span></label>
                                    {{-- <select id="education-degree-title-select" name="exam_degree_title"
                                        data-placeholder="Degree Title" class="form-control chosen-select">
                                        <option value="">Select Degree</option>
                                        @foreach ($educationDegreeTitleData as $key => $educationDegreeTitle)
                                            <option value="{{ $educationDegreeTitle->id }}">
                                                {{ $educationDegreeTitle->degree_full_form }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" id="education-degree-title-input" name="exam_degree_title"
                                        class="form-control input-custom-style" placeholder="Degree Title">
                                    <div id="education-degree-title-dropdown" class="autocomplete-items" style="width:0px"></div>
                                </div>

                                {{-- <div class="form-group col-lg-6 col-md-12 mb-4"
                                    id="education-degree-title-input-wrapper" style="display: none;">
                                    <label class="py-2">Exam/Degree Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="education-degree-title-input"
                                        name="exam_degree_title_1" class="form-control"
                                        placeholder="Enter Degree Title">
                                </div> --}}

                                <div id="major-subject-div hide" class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Concentration/Major/Group <span class="text-danger">*</span></label>
                                    {{-- <select name="major_subject" id="major_subject" data-placeholder="Major Subject"
                                        class="form-control chosen-select">
                                        <option value="">Select Subject</option>
                                        @foreach ($educationSubjectsData as $key => $educationSubject)
                                            <option value="{{ $educationSubject->id }}">
                                                {{ $educationSubject->subject_name }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" id="major-subject-input" name="major_subject"
                                        class="form-control input-custom-style" placeholder="Major Subject">
                                    <div id="major-subject-dropdown" class="autocomplete-items" style="width:0px"></div>
                                </div>

                                <div id="education-board-dropdown"
                                    class="form-group col-lg-6 col-md-12 mb-4 hide">
                                    <label class="py-2">Board <span class="text-danger">*</span></label>
                                    <select name="education_board" id="education_board" data-placeholder="Education Board"
                                        class="form-control chosen-select">
                                        <option value="">Select Education Board</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Cumilla">Cumilla</option>
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Jashore">Jashore</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Madrasah">Madrasah</option>
                                        <option value="Technical">Technical</option>
                                        <option value="BOU">BOU</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Institute Type <span
                                            class="text-danger">*</span></label>
                                    <select id="institution-type" name="institution_type"
                                        data-placeholder="Institute Type" class="form-control chosen-select">
                                        <option value="">Select Institute Type</option>
                                        <option value="1">School</option>
                                        <option value="2">College</option>
                                        <option value="3">Madrasha</option>
                                        <option value="4">University</option>
                                    </select>
                                </div>

                                <div id="institute-name" class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Institute Name <span
                                            class="text-danger">*</span></label>
                                    {{-- <select data-placeholder="Institute Name" class="chosen-select">
                                        <option>Select Institute</option>
                                        <option value="-1">Others</option>
                                        @foreach ($educationLevelsData as $key => $educationLevel)
                                            <option value="{{ $educationLevel->id }}">
                                                {{ $educationLevel->level_name }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" id="institute-name-input" name="institution_name"
                                        class="form-control input-custom-style" placeholder="Type Institute Name">
                                    <div id="institute-name-dropdown" class="autocomplete-items"></div>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Result <span class="text-danger">*</span></label>
                                    <select id="result-type-select" name="result_type"
                                        data-placeholder="Result Type" class="form-control chosen-select">
                                        <option value="">Select Result Type</option>
                                        @foreach ($educationResultTypeData as $key => $educationResultType)
                                            <option value="{{ $educationResultType->id }}">
                                                {{ $educationResultType->result_type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="marks-input" class="form-group col-lg-6 col-md-12 mb-4 hide">
                                    <label class="py-2">Marks (%) <span class="text-danger">*</span></label>
                                    <input name="exam_marks" id="exam_marks" type="text" class="form-control input-custom-style" placeholder="">
                                </div>

                                <div id="cgpa-input" class="form-group col-lg-6 col-md-12 mb-4 hide">
                                    <label class="py-2">CGPA <span class="text-danger">*</span></label>
                                    <input name="exam_cgpa" id="exam_cgpa" type="text" class="form-control input-custom-style" placeholder="">
                                </div>

                                <div id="scale-input" class="form-group col-lg-6 col-md-12 mb-4 hide">
                                    <label class="py-2">Scale <span class="text-danger">*</span></label>
                                    <input name="grade_scale" id="grade_scale" type="text" class="form-control input-custom-style"
                                        placeholder="">
                                </div>

                                <div id="graduation-duration-input"
                                    class="hide form-group col-lg-6 col-md-12 mb-4 hide">
                                    <label class="py-2">Duration <span class="text-danger">*</span></label>
                                    <input name="graduation_duration" id="graduation_duration" type="number" class="form-control input-custom-style"
                                        placeholder="">
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Year of Passing <span
                                            class="text-danger">*</span></label>
                                    <select name="exam_passing_year" id="exam_passing_year" data-placeholder="Passing Year"
                                        class="form-control chosen-select">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Education Modal -->
