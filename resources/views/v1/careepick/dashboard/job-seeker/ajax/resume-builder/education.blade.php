<script type="text/javascript">
    $(document).ready(function() {
        var schoolData = [];
        var collegeData = [];
        var madrashaData = [];
        var universityData = [];
        var majorSubjectsData = [];
        var examDegreeTitlesData = [];
        init();

        function init() {
            fetchExamDegreeTitlesData();
            fetchMajorSubjectsData();
            fetchSchoolCollegeMadrashaUniversityData();
        }

        function fetchSchoolCollegeMadrashaUniversityData() {
            var requestType = "POST";
            var url = "{{ route('fetch-values') }}";
            var params = {
                requestedData: "school-college-university",
                institutionType: "1"
            };
            var params1 = {
                requestedData: "school-college-university",
                institutionType: "2"
            };
            var params2 = {
                requestedData: "school-college-university",
                institutionType: "3"
            };
            var params3 = {
                requestedData: "school-college-university",
                institutionType: "4"
            };

            ajaxRequest(url, requestType, params, function(response) {
                schoolData = response; // Save response globally
            });
            ajaxRequest(url, requestType, params1, function(response) {
                collegeData = response; // Save response globally
            });
            ajaxRequest(url, requestType, params2, function(response) {
                madrashaData = response; // Save response globally
            });
            ajaxRequest(url, requestType, params3, function(response) {
                universityData = response; // Save response globally
            });
        }

        function fetchExamDegreeTitlesData() {
            var requestType = "POST";
            var url = "{{ route('fetch-values') }}";
            var params = {
                requestedData: "exam-degree-titles",
            };

            ajaxRequest(url, requestType, params, function(response) {
                examDegreeTitlesData = response; // Save response globally
            });
        }

        function fetchMajorSubjectsData() {
            var requestType = "POST";
            var url = "{{ route('fetch-values') }}";
            var params = {
                requestedData: "major-subjects",
            };

            ajaxRequest(url, requestType, params, function(response) {
                majorSubjectsData = response; // Save response globally
            });
        }

        $(document).on('change', '#institution-type', function() {
            var instituteType = $("#institution-type option:selected").val();
            if (instituteType == 4) {
                document.getElementById("graduation-duration-input").classList.remove("hide");
            } else {
                document.getElementById("graduation-duration-input").classList.add("hide");
            }

            $("#institute-name-input").val("");
            var dropdownId = "institute-name-dropdown";
            var inputId = "institute-name-input";

            hideDropdown(dropdownId, inputId);
        });

        // Event listener for institute name input field
        document.getElementById('institute-name-input').addEventListener('input', function() {
            var instituteType = $("#institution-type option:selected").val();
            var dropdownId = "institute-name-dropdown";
            var columnName = (instituteType !== "4") ? "institute_name" : "university_name";
            var response = [];

            if (instituteType == "1") {
                response = schoolData;
            } else if (instituteType == "2") {
                response = collegeData;
            } else if (instituteType == "3") {
                response = madrashaData;
            } else if (instituteType == "4") {
                response = universityData;
            }

            autocomplete(this, response, dropdownId, columnName);

            // autocomplete(this, params, requestType, url, dropdownId, columnName);
        });

        // Event listener for exam degree title input field
        document.getElementById('education-degree-title-input').addEventListener('input', function() {
            var dropdownId = "education-degree-title-dropdown";
            var columnName = "degree_full_form";
            var response = [];
            response = examDegreeTitlesData;

            autocomplete(this, response, dropdownId, columnName);
        });

        // Event listener for major subject input field
        document.getElementById('major-subject-input').addEventListener('input', function() {
            var dropdownId = "major-subject-dropdown";
            var columnName = "subject_name";
            var response = [];
            response = majorSubjectsData;

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
                        option.addEventListener('click', function() {
                            input.value = columnValue;
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

        // Hide dropdown when clicking outside input or dropdown
        document.addEventListener('click', function(event) {
            var dropdownId = "institute-name-dropdown";
            var inputId = "institute-name-input";

            hideDropdown(dropdownId, inputId);
        });

        function hideDropdown(dropdownId, inputId) {
            var dropdown = document.getElementById(dropdownId);
            var input = document.getElementById(inputId);

            if (event.target !== input && event.target.parentNode !== dropdown) {
                dropdown.innerHTML = '';
                dropdown.style.display = 'none';
            }
        }

        $(document).on('change', '#result-type-select', function() {
            var resultType = $("#result-type-select option:selected").val();

            if (resultType == 1 || resultType == 2 || resultType == 3) {
                document.getElementById("marks-input").classList.remove("hide");
                document.getElementById("cgpa-input").classList.add("hide");
                document.getElementById("scale-input").classList.add("hide");
            } else if (resultType == 4) {
                document.getElementById("marks-input").classList.add("hide");
                document.getElementById("cgpa-input").classList.remove("hide");
                document.getElementById("scale-input").classList.remove("hide");
            } else {
                document.getElementById("marks-input").classList.add("hide");
                document.getElementById("cgpa-input").classList.add("hide");
                document.getElementById("scale-input").classList.add("hide");
            }

            // $("#result-type-select").val("");
            // var dropdownId = "institute-name-dropdown";
            // var inputId = "institute-name-input";

            // hideDropdown(dropdownId, inputId);
        });

        // Add event listener to Level of Education select dropdown
        $(document).on('change', '#education-level-select', function() {
            var levelType = $("#education-level-select option:selected").val();

            if (levelType == 1 || levelType == 2 || levelType == 3|| levelType == 4) {
                document.getElementById("education-board-dropdown").classList.remove("hide");
            } else {
                document.getElementById("education-board-dropdown").classList.add("hide");
            }

            var selectedEducationLevelId = this.value;
            var degreeTitleSelect = document.getElementById('education-degree-title-select');
            var degreeTitleSelectWrapper = document.getElementById('education-degree-title-select-wrapper');
            var degreeTitleInputWrapper = document.getElementById('education-degree-title-input-wrapper');

            if (selectedEducationLevelId == 1 || selectedEducationLevelId == 2){
                document.getElementById("major-subject-div").classList.add("hide");
            } else {
                document.getElementById("major-subject-div").classList.remove("hide");
            }

            // var params = {
            //     requestedData: "education-level-degree",
            //     educationLevelId: selectedEducationLevelId
            // };
            // var url = "{{ route('fetch-values') }}";

            // ajaxRequest(url, "POST", params, function(response) {
            //     // console.log(response);
            //     if(response.status === 200) {
            //         data = response.responseData
            //         degreeTitleSelect.innerHTML = '';

            //         if (data.length > 0) {
            //             degreeTitleSelectWrapper.style.display = 'block';
            //             degreeTitleInputWrapper.style.display = 'none';

            //             data.forEach(function(degreeTitle) {
            //                 var option = document.createElement('option');
            //                 option.value = degreeTitle.id;
            //                 option.textContent = degreeTitle.degree_full_form;
            //                 degreeTitleSelect.appendChild(option);
            //             });
            //         } else {
            //             degreeTitleSelectWrapper.style.display = 'none';
            //             degreeTitleInputWrapper.style.display = 'block';
            //         }
            //     }
            // });

            // $.ajax({
            //     url: "{{ route('fetch-values') }}",
            //     type: "POST",
            //     data: params,
            //     dataType:'json',
            //     success: function(response) {
            //         degreeTitleSelect.innerHTML = '';
            //         var data = response.responseData;

            //         if (data.length > 0) {
            //             degreeTitleSelectWrapper.style.display = 'block';
            //             degreeTitleInputWrapper.style.display = 'none';

            //             data.forEach(function(degreeTitle) {
            //                 console.log(degreeTitle);
            //                 var option = document.createElement('option');
            //                 option.value = degreeTitle.id;
            //                 option.textContent = degreeTitle.degree_full_form;
            //                 degreeTitleSelect.appendChild(option);
            //             });
            //         } else {
            //             degreeTitleSelectWrapper.style.display = 'none';
            //             degreeTitleInputWrapper.style.display = 'block';
            //         }
            //     },
            //     error: function(xhr, ajaxOptions, thrownError) {
            //         console.log("Status: "+xhr.status+ " Message: "+thrownError);
            //     }
            // });
        });

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
    });
</script>
