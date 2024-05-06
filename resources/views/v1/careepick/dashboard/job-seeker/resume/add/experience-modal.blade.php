<!-- Work Experience Modal -->
<div class="modal fade" id="addWorkExperience" tabindex="-1" role="dialog" aria-labelledby="addWorkExperienceModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Work Experience</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-work-experience') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Company Name <span class="text-danger">*</span></label>
                                    <input type="hidden" name="experience_id" id="experience_id">
                                    <input type="text" name="organization_name" id="organization_name"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" id="designation"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-12 col-md-12 mb-4">
                                    <label class="py-2">Responsibilities </label>
                                    <textarea name="working_responsibilities" id="working_responsibilities" class="form-control input-custom-style"
                                        placeholder="Spent several years working on sheep on Wall Street..."></textarea>
                                </div>

                                <div id="major-subject-dropdown" class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">From Month <span class="text-danger">*</span></label>
                                    <select name="from_month" id="from_month" class="form-control chosen-select">
                                        <option value="">Select Month</option>
                                        @foreach ($monthsData as $key => $month)
                                            <option value="{{ $month->month_name }}">
                                                {{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="" class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">From Year <span class="text-danger">*</span></label>
                                    <select name="from_year" id="from_year" class="form-control chosen-select">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="" class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">To Month <span class="text-danger">*</span></label>
                                    <select id="to-month" name="to_month" class="form-control chosen-select" disabled="false">
                                        <option value="">Select Month</option>
                                        @foreach ($monthsData as $key => $month)
                                            <option value="{{ $month->month_name }}">
                                                {{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">To Year <span class="text-danger">*</span></label>
                                    <select id="to-year" name="to_year" class="form-control chosen-select" disabled="false">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 mb-4">
                                    <input name="currently_working" type="checkbox" id="currently-working"
                                        value="0" class="form-check-input" checked="false">
                                    <label class="form-check-label" for="formCheck1">
                                        Currently Working
                                    </label>
                                </div>

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

<div class="modal fade" id="updateWorkExperience" tabindex="-1" role="dialog" aria-labelledby="updateWorkExperienceModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Work Experience</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-work-experience') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Company Name <span class="text-danger">*</span></label>
                                    <input type="hidden" name="experience_id" id="experience_id_1">
                                    <input type="text" name="organization_name" id="organization_name_1"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" id="designation_1"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-12 col-md-12 mb-4">
                                    <label class="py-2">Responsibilities </label>
                                    <textarea name="working_responsibilities" id="working_responsibilities_1" class="form-control input-custom-style"
                                        placeholder="Spent several years working on sheep on Wall Street..."></textarea>
                                </div>

                                <div id="major-subject-dropdown" class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">From Month <span class="text-danger">*</span></label>
                                    <select name="from_month" id="from_month_1" class="form-control chosen-select">
                                        <option value="">Select Month</option>
                                        @foreach ($monthsData as $key => $month)
                                            <option value="{{ $month->month_name }}">
                                                {{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="" class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">From Year <span class="text-danger">*</span></label>
                                    <select name="from_year" id="from_year_1" class="form-control chosen-select">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="" class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">To Month <span class="text-danger">*</span></label>
                                    <select id="to-month" name="to_month_1" class="form-control chosen-select" disabled="false">
                                        <option value="">Select Month</option>
                                        @foreach ($monthsData as $key => $month)
                                            <option value="{{ $month->month_name }}">
                                                {{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 mb-4">
                                    <label class="py-2">To Year <span class="text-danger">*</span></label>
                                    <select id="to-year" name="to_year_1" class="form-control chosen-select" disabled="false">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 mb-4">
                                    <input name="currently_working" type="checkbox" id="currently-working_1"
                                        value="0" class="form-check-input" checked="false">
                                    <label class="form-check-label" for="formCheck1">
                                        Currently Working
                                    </label>
                                </div>

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
<!-- End Work Experience Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#currently-working', function() {
            var isChecked = this.checked;
            // var value = isChecked ? this.value : '';
            const toMonth = document.getElementById('to-month');
            const toYear = document.getElementById('to-year');
            if (isChecked) {
                $("#currently-working").val(1);
                toMonth.disabled = isChecked;
                toYear.disabled = isChecked;
            } else {
                toMonth.disabled = false;
                toYear.disabled = false;
            }
        });

        $(document).on('change', '#currently-working_1', function() {
            var isChecked = this.checked;
            // var value = isChecked ? this.value : '';
            const toMonth = document.getElementById('to-month_1');
            const toYear = document.getElementById('to-year_1');
            if (isChecked) {
                $("#currently-working_1").val(1);
                toMonth.disabled = isChecked;
                toYear.disabled = isChecked;
            } else {
                toMonth.disabled = false;
                toYear.disabled = false;
            }
        });

        $(document).on('click', '.workXpEditBtn', function() {
            var dataId = $(this).data('id');
            var requestType = "POST";
            var url = "{{ route('js-fetch-work-experience') }}";
            var params = {id: dataId};

            $.ajax({
                url: url,
                type: requestType,
                data: params,
                dataType:'json',
                success: function(response) {
                    console.log(response)
                    $("#experience_id_1").val(dataId);
                    $("#organization_name_1").val(response.organization_name);
                    $("#designation_1").val(response.designation);
                    $("#working_responsibilities_1").val(response.responsibilities);
                    $("#from_month_1").val(response.start_month).trigger('chosen:updated');
                    $("#from_year_1").val(response.start_year).trigger('chosen:updated');
                    if (response.currently_working != "yes") {
                        $("#to-month_1").val(response.to_month).trigger('chosen:updated');
                        $("#to-year_1").val(response.to_year).trigger('chosen:updated');
                        $("#to-month_1").prop('disabled', false);
                        $("#to-year_1").prop('disabled', false);
                    } else {
                        document.getElementById('currently-working_1').checked = true;
                        $("#to-month_1").prop('disabled', true);
                        document.getElementById('to-year_1').disabled = true;
                    }
                    $('#updateWorkExperience').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });
        });
    });
</script>
