<!-- Certification Modal -->
<div class="modal fade" id="addCertification" tabindex="-1" role="dialog" aria-labelledby="addCertificationModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Certification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-certification') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Certification <span class="text-danger">*</span></label>
                                    <input type="text" name="certification_name"
                                        class="form-control input-custom-style" placeholder="Ex: Oracle Database: SQL Fundamentals"/>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Institute <span class="text-danger">*</span></label>
                                    <input type="text" name="certification_institution"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-4 col-md-12 mb-4">
                                    <label class="py-2">Score </label>
                                    <input type="text" name="certification_score"
                                        class="form-control input-custom-style" placeholder="Ex: 8/10" />
                                </div>

                                <div id="major-subject-dropdown" class="form-group col-lg-4 col-md-4 mb-4">
                                    <label class="py-2">Certified Month <span
                                            class="text-danger">*</span></label>
                                    <select name="certified_month" class="form-control chosen-select">
                                        <option value="">Select Month</option>
                                        @foreach ($monthsData as $key => $month)
                                            <option value="{{ $month->month_name }}">
                                                {{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="" class="form-group col-lg-4 col-md-4 mb-4">
                                    <label class="py-2">Certified Year <span
                                            class="text-danger">*</span></label>
                                    <select name="certified_year" class="form-control chosen-select">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12 mb-4">
                                    <label>Expiry Date</label>
                                    <input type="date" name="certification_expiry_date"
                                        class="form-control input-custom-style" placeholder="YYYY-MM-DD">
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

<div class="modal fade" id="updateCertification" tabindex="-1" role="dialog" aria-labelledby="updateCertificationModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Certification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-certification') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Certification <span class="text-danger">*</span></label>
                                    <input type="hidden" name="certification_id" id="certification_id">
                                    <input type="text" name="certification_name" id="certification_name_1"
                                        class="form-control input-custom-style" placeholder="Ex: Oracle Database: SQL Fundamentals"/>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Institute <span class="text-danger">*</span></label>
                                    <input type="text" name="certification_institution" id="certification_institution_1"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-4 col-md-12 mb-4">
                                    <label class="py-2">Score </label>
                                    <input type="text" name="certification_score" id="certification_score_1"
                                        class="form-control input-custom-style" placeholder="Ex: 8/10" />
                                </div>

                                <div id="major-subject-dropdown" class="form-group col-lg-4 col-md-4 mb-4">
                                    <label class="py-2">Certified Month <span class="text-danger">*</span></label>
                                    <select name="certified_month" id="certified_month_1" class="form-control chosen-select">
                                        <option value="">Select Month</option>
                                        @foreach ($monthsData as $key => $month)
                                            <option value="{{ $month->month_name }}">
                                                {{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="" class="form-group col-lg-4 col-md-4 mb-4">
                                    <label class="py-2">Certified Year <span class="text-danger">*</span></label>
                                    <select name="certified_year" id="certified_year_1" class="form-control chosen-select">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $year)
                                            <option value="{{ $year->year }}">
                                                {{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12 mb-4">
                                    <label>Expiry Date</label>
                                    <input type="date" name="certification_expiry_date" id="certification_expiry_date_1"
                                        class="form-control input-custom-style" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary full-width font--bold btn-md">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Certification Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.certificationEditBtn', function() {
            var dataId = $(this).data('id');
            var requestType = "POST";
            var url = "{{ route('js-fetch-certification') }}";
            var params = {id: dataId};

            $.ajax({
                url: url,
                type: requestType,
                data: params,
                dataType:'json',
                success: function(response) {
                    $("#certification_id").val(dataId);
                    $("#certification_name_1").val(response.certification_name);
                    $("#certification_institution_1").val(response.certification_institution);
                    $("#certification_score_1").val(response.certification_score);
                    $("#certified_month_1").val(response.certified_month).trigger('chosen:updated');
                    $("#certified_year_1").val(response.certified_year).trigger('chosen:updated');
                    $("#certification_expiry_date_1").val(response.certification_expiry_date);
                    $('#updateCertification').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });
        });
    });
</script>
