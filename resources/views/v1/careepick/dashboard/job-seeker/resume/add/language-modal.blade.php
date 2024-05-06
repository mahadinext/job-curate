<!-- Langugae Modal -->
<div class="modal fade" id="addLanguage" tabindex="-1" role="dialog" aria-labelledby="addLanguageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Language Proficiency</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-langugaes') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Language <span class="text-danger">*</span></label>
                                    <select name="language_id" class="form-control chosen-select">
                                        <option value="">Select Language</option>
                                        @foreach ($languagesData as $key => $language)
                                            <option value="{{ $language->id }}">
                                                {{ $language->language_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 mb-4">
                                    <label class="py-2">Proficiency <span class="text-danger">*</span></label>
                                    <select name="proficiency" class="form-control chosen-select">
                                        <option value="">Select Language Proficiency</option>
                                        <option value="Fluent">Fluent</option>
                                        <option value="Native">Native</option>
                                        <option value="Highly Skilled">Highly Skilled</option>
                                    </select>
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

<div class="modal fade" id="updateLanguage" tabindex="-1" role="dialog" aria-labelledby="updateLanguageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Language Proficiency</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-langugaes') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <input type="hidden" name="js_language_id" id="js_language_id">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Language <span class="text-danger">*</span></label>
                                    <select name="language_id" id="language_id_1" class="form-control chosen-select">
                                        <option value="">Select Language</option>
                                        @foreach ($languagesData as $key => $language)
                                            <option value="{{ $language->id }}">
                                                {{ $language->language_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 mb-4">
                                    <label class="py-2">Proficiency <span class="text-danger">*</span></label>
                                    <select name="proficiency" id="proficiency_1" class="form-control chosen-select">
                                        <option value="">Select Language Proficiency</option>
                                        <option value="Fluent">Fluent</option>
                                        <option value="Native">Native</option>
                                        <option value="Highly Skilled">Highly Skilled</option>
                                    </select>
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
<!-- End Language Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.languageEditBtn', function() {
            var dataId = $(this).data('id');
            var requestType = "POST";
            var url = "{{ route('js-fetch-langugaes') }}";
            var params = {id: dataId};

            $.ajax({
                url: url,
                type: requestType,
                data: params,
                dataType:'json',
                success: function(response) {
                    $("#js_language_id").val(dataId);
                    $("#language_id_1").val(response.language_id).trigger('chosen:updated');
                    $("#proficiency_1").val(response.proficiency).trigger('chosen:updated');
                    $('#updateLanguage').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });
        });
    });
</script>
