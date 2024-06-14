@extends('v1.careepick.dashboard.layouts.jp-master')
@section('content')
    <div class="upper-title-box">
        <h3>Post a New Job!</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <style>
        .selected-skills {
            margin-top: 10px;
        }
        .selected-skill {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 5px;
            margin-right: 5px;
            margin-bottom: 5px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

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
                                    <input type="text" id="job-category-input" name="job_category_id"
                                        class="form-control input-custom-style" placeholder="Ex: Accounting/Finance">
                                    <div id="job-category-dropdown" class="autocomplete-items" style="width:0px"></div>

                                    {{-- <select name="job_category_id" class="chosen-select ajax-validation-input @error('job_category_id') is-invalid @enderror">
                                        <option value="">Select Job Category</option>
                                        @foreach ($jobCategoryData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                        @endforeach
                                    </select> --}}
                                    @if ($errors->has('job_category_id'))
                                        <span class="text-danger">{{ $errors->first('job_category_id') }}</span>
                                    @endif
                                </div>

                                <!-- Input -->
                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Vacancy <span class="text-danger">*</span></label>
                                    <input type="number" min="1" name="vacancy" value="{{ old('vacancy') }}" class="from-control ajax-validation-input @error('vacancy') is-invalid @enderror" placeholder="">
                                    @if ($errors->has('vacancy'))
                                        <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Salary Type <span class="text-danger">*</span></label>
                                    <select name="salary_type_id" id="salary-type-dropdown" value="{{ old('salary_type_id') }}"  class="chosen-select ajax-validation-input @error('salary_type_id') is-invalid @enderror">
                                        <option value="">Select Salary Type</option>
                                        @foreach ($salaryTypeData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->type }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('salary_type_id'))
                                        <span class="text-danger">{{ $errors->first('salary_type_id') }}</span>
                                    @endif
                                </div>

                                <div id="salary-input" class="form-group col-lg-6 col-md-12 hide">
                                    <label>Salary <span class="text-danger">*</span></label>
                                    <input type="text" name="salary" value="{{ old('salary') }}" class="from-control ajax-validation-input @error('salary') is-invalid @enderror" placeholder="">
                                    @if ($errors->has('salary'))
                                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    @endif
                                </div>

                                <div id="salary-range-from" class="form-group col-lg-3 col-md-6 hide">
                                    <label>Salary From<span class="text-danger">*</span></label>
                                    <input type="text" name="salary_from" value="{{ old('salary_from') }}" class="from-control ajax-validation-input @error('salary_from') is-invalid @enderror" placeholder="">
                                    @if ($errors->has('salary_from'))
                                        <span class="text-danger">{{ $errors->first('salary_from') }}</span>
                                    @endif
                                </div>

                                <div id="salary-range-to" class="form-group col-lg-3 col-md-6 hide">
                                    <label>Salary To<span class="text-danger">*</span></label>
                                    <input type="text" name="salary_to" value="{{ old('salary_to') }}" class="from-control ajax-validation-input @error('salary_to') is-invalid @enderror" placeholder="">
                                    @if ($errors->has('salary'))
                                        <span class="text-danger">{{ $errors->first('salary_to') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-12">
                                    <label>Select Age <span class="text-danger">*</span></label>
                                    <select name="age_id" value="{{ old('age_id') }}"  class="chosen-select ajax-validation-input @error('age_id') is-invalid @enderror">
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
                                    <select name="experience_id" value="{{ old('experience_id') }}"  class="chosen-select ajax-validation-input @error('experience_id') is-invalid @enderror">
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
                                    {{-- <select name="skill_id[]" class="chosen-select ajax-validation-input @error('skill_id') is-invalid @enderror multiple" multiple>
                                        <option disabled>Select Skills</option>
                                        @foreach ($skillsData as $key => $data)
                                            <option value="{{ $data['id'] }}">{{ $data['skill_name'] }}</option>
                                        @endforeach
                                    </select> --}}

                                    <input type="text" id="job-skill-input" class="form-control input-custom-style" placeholder="Ex: Risk Management">
                                    <input type="hidden" id="job-skill-ids" name="job_skill_ids">
                                    <div id="selected-skills" class="selected-skills"></div>
                                    <div id="job-skill-dropdown" class="autocomplete-items"></div>
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

        {{-- <script type="text/javascript">
            $(document).ready(function() {
                var jobCategoryData = [];
                init();

                function init() {
                    fetchJobCategories();
                }

                function fetchJobCategories() {
                    var requestType = "POST";
                    var url = "{{ route('jp-fetch-values') }}";
                    var params = {
                        requestedData: "job-category",
                    };

                    ajaxRequest(url, requestType, params, function(response) {
                        jobCategoryData = response; // Save response globally
                    });
                }

                // Event listener for major subject input field
                document.getElementById('job-category-input').addEventListener('input', function() {
                    var dropdownId = "job-category-dropdown";
                    var columnName = "category_name";
                    var response = [];
                    response = jobCategoryData;

                    autocomplete(this, response, dropdownId, columnName);
                });

                // Function to filter institute names based on user input
                function autocomplete(input, response, dropdownId = '', columnName = '') {
                    var dropdown = document.getElementById(dropdownId);
                    dropdown.style.display = 'block';
                    dropdown.innerHTML = '';

                    var inputValue = input.value.toLowerCase();

                    if(response.status === 200) {
                        // data = response.responseData
                        response.responseData.forEach(function(data) {
                            var columnValue = data[columnName];
                            if (columnValue.toLowerCase().indexOf(inputValue) !== -1) {
                                var option = document.createElement('div');
                                var index = columnValue.toLowerCase().indexOf(inputValue);
                                option.innerHTML = columnValue.substring(0, index) + "<strong>" + columnValue.substring(index, index + inputValue.length) + "</strong>" + columnValue.substring(index + inputValue.length);
                                option.dataset.id = data.id; // Store the category id

                                option.addEventListener('click', function() {
                                    // input.value = columnValue;
                                    input.value = option.dataset.id;
                                    dropdown.innerHTML = '';
                                });
                                dropdown.appendChild(option);
                            }
                        });
                    }

                    if (!inputValue) {
                        dropdown.innerHTML = '';
                        dropdown.style.display = 'none';
                    }

                    // Set dropdown width to match input field width
                    dropdown.style.width = input.offsetWidth + 'px';
                }

                function ajaxRequest(url, requestType, params, successCallback) {
                    $.ajax({
                        url: url,
                        type: requestType,
                        data: params,
                        dataType:'json',
                        success: function(data) {
                            // Call the success callback function with the data
                            if (successCallback && typeof successCallback === 'function') {
                                successCallback(data);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log("Status: "+xhr.status+ " Message: "+thrownError);
                        }
                    });
                }

                $(document).on('change', '#salary-type-dropdown', function() {
                    var salaryType = $("#salary-type-dropdown option:selected").val();
                    if (salaryType == 1) {
                        document.getElementById("salary-input").classList.remove("hide");
                        document.getElementById("salary-range-from").classList.add("hide");
                        document.getElementById("salary-range-to").classList.add("hide");
                    } else if (salaryType == 2) {
                        document.getElementById("salary-input").classList.add("hide");
                        document.getElementById("salary-range-from").classList.add("hide");
                        document.getElementById("salary-range-to").classList.add("hide");
                    } else if (salaryType == 3) {
                        document.getElementById("salary-input").classList.add("hide");
                        document.getElementById("salary-range-from").classList.remove("hide");
                        document.getElementById("salary-range-to").classList.remove("hide");
                    }
                });
            });
        </script> --}}

        <script>
            $(document).ready(function() {
                var jobCategoryData = [];
                var jobSkillData = [];
                var selectedSkills = [];

                init();

                function init() {
                    fetchJobCategories();
                    fetchJobSkills();
                }

                function fetchJobCategories() {
                    var requestType = "POST";
                    var url = "{{ route('jp-fetch-values') }}";
                    var params = {
                        requestedData: "job-category",
                    };

                    ajaxRequest(url, requestType, params, function(response) {
                        jobCategoryData = response.responseData; // Adjusted response structure
                    });
                }

                function fetchJobSkills() {
                    var requestType = "POST";
                    var url = "{{ route('jp-fetch-values') }}";
                    var params = {
                        requestedData: "job-skill",
                    };

                    ajaxRequest(url, requestType, params, function(response) {
                        jobSkillData = response.responseData; // Adjusted response structure
                    });
                }

                // Event listener for major subject input field
                document.getElementById('job-category-input').addEventListener('input', function() {
                    var dropdownId = "job-category-dropdown";
                    var columnName = "category_name";
                    var response = [];
                    response = jobCategoryData;

                    autocompleteJobCategory(this, response, dropdownId, columnName);
                });

                // Function to filter institute names based on user input
                function autocompleteJobCategory(input, response, dropdownId = '', columnName = '') {
                    var dropdown = document.getElementById(dropdownId);
                    dropdown.style.display = 'block';
                    dropdown.innerHTML = '';

                    var inputValue = input.value.toLowerCase();

                    if(response.status === 200) {
                        // data = response.responseData
                        response.responseData.forEach(function(data) {
                            var columnValue = data[columnName];
                            if (columnValue.toLowerCase().indexOf(inputValue) !== -1) {
                                var option = document.createElement('div');
                                var index = columnValue.toLowerCase().indexOf(inputValue);
                                option.innerHTML = columnValue.substring(0, index) + "<strong>" + columnValue.substring(index, index + inputValue.length) + "</strong>" + columnValue.substring(index + inputValue.length);
                                option.dataset.id = data.id; // Store the category id

                                option.addEventListener('click', function() {
                                    input.value = columnValue;
                                    // input.value = option.dataset.id;
                                    dropdown.innerHTML = '';
                                });
                                dropdown.appendChild(option);
                            }
                        });
                    }

                    if (!inputValue) {
                        dropdown.innerHTML = '';
                        dropdown.style.display = 'none';
                    }

                    // Set dropdown width to match input field width
                    dropdown.style.width = input.offsetWidth + 'px';
                }

                // Event listener for job skill input field
                document.getElementById('job-skill-input').addEventListener('input', function() {
                    var dropdownId = "job-skill-dropdown";
                    var columnName = "skill_name";
                    autocomplete(this, jobSkillData, dropdownId, columnName);
                });

                function autocomplete(input, response, dropdownId = '', columnName = '') {
                    var dropdown = document.getElementById(dropdownId);
                    dropdown.style.display = 'block';
                    dropdown.innerHTML = '';

                    var inputValue = input.value.toLowerCase();
                    var matches = false;

                    response.forEach(function(data) {
                        var columnValue = data[columnName];
                        if (columnValue.toLowerCase().indexOf(inputValue) !== -1) {
                            matches = true;
                            var option = document.createElement('div');
                            var index = columnValue.toLowerCase().indexOf(inputValue);
                            option.innerHTML = columnValue.substring(0, index) + "<strong>" + columnValue.substring(index, index + inputValue.length) + "</strong>" + columnValue.substring(index + inputValue.length);
                            option.dataset.id = data.id; // Store the skill id
                            option.dataset.name = columnValue; // Store the skill name

                            option.addEventListener('click', function() {
                                addSelectedSkill(option.dataset.id, option.dataset.name);
                                input.value = '';
                                dropdown.innerHTML = '';
                                dropdown.style.display = 'none';
                            });
                            dropdown.appendChild(option);
                        }
                    });

                    if (!matches && inputValue) {
                        var option = document.createElement('div');
                        option.innerHTML = "Add <strong>" + inputValue + "</strong>";
                        option.addEventListener('click', function() {
                            addSelectedSkill('new-' + inputValue, inputValue); // Use a unique identifier for new entries
                            input.value = '';
                            dropdown.innerHTML = '';
                            dropdown.style.display = 'none';
                        });
                        dropdown.appendChild(option);
                    }

                    if (!inputValue) {
                        dropdown.innerHTML = '';
                        dropdown.style.display = 'none';
                    }

                    dropdown.style.width = input.offsetWidth + 'px';
                }

                function addSelectedSkill(id, name) {
                    // Check if the skill is already selected
                    if (!selectedSkills.some(skill => skill.id === id)) {
                        selectedSkills.push({ id: id, name: name });
                        updateSelectedSkills();
                        updateHiddenInput();
                    }
                }

                function updateSelectedSkills() {
                    var container = document.getElementById('selected-skills');
                    container.innerHTML = '';

                    selectedSkills.forEach(function(skill) {
                        var tag = document.createElement('div');
                        tag.className = 'selected-skill';
                        tag.innerHTML = skill.name + ' <span>&times;</span>';
                        tag.dataset.id = skill.id;

                        tag.addEventListener('click', function() {
                            removeSelectedSkill(tag.dataset.id);
                        });

                        container.appendChild(tag);
                    });
                }

                function removeSelectedSkill(id) {
                    selectedSkills = selectedSkills.filter(skill => skill.id !== id);
                    updateSelectedSkills();
                    updateHiddenInput();
                }

                function updateHiddenInput() {
                    var hiddenInput = document.getElementById('job-skill-ids');
                    hiddenInput.value = selectedSkills.map(skill => skill.id).join(',');
                }

                function ajaxRequest(url, requestType, params, successCallback) {
                    $.ajax({
                        url: url,
                        type: requestType,
                        data: params,
                        dataType: 'json',
                        success: function(data) {
                            if (successCallback && typeof successCallback === 'function') {
                                successCallback(data);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log("Status: " + xhr.status + " Message: " + thrownError);
                        }
                    });
                }

                $(document).on('change', '#salary-type-dropdown', function() {
                    var salaryType = $("#salary-type-dropdown option:selected").val();
                    if (salaryType == 1) {
                        document.getElementById("salary-input").classList.remove("hide");
                        document.getElementById("salary-range-from").classList.add("hide");
                        document.getElementById("salary-range-to").classList.add("hide");
                    } else if (salaryType == 2) {
                        document.getElementById("salary-input").classList.add("hide");
                        document.getElementById("salary-range-from").classList.add("hide");
                        document.getElementById("salary-range-to").classList.add("hide");
                    } else if (salaryType == 3) {
                        document.getElementById("salary-input").classList.add("hide");
                        document.getElementById("salary-range-from").classList.remove("hide");
                        document.getElementById("salary-range-to").classList.remove("hide");
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
