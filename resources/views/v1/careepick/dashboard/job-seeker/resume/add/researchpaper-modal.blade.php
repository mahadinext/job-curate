<!-- Research Papers Modal -->
<div class="modal fade" id="addResearchPapers" tabindex="-1" role="dialog" aria-labelledby="addResearchPapersModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Research paper/Publications</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-publications') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="research_paper_subject"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Publication Link </label>
                                    <input type="text" name="research_paper_url"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-12 col-md-12 mb-4">
                                    <label class="py-2">Summary <span class="text-danger">*</span></label>
                                    <textarea name="research_paper_summary" class="form-control input-custom-style"></textarea>
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

<div class="modal fade" id="updateResearchPapers" tabindex="-1" role="dialog" aria-labelledby="updateResearchPapersModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Research paper/Publications</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-publications') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Subject <span class="text-danger">*</span></label>
                                    <input type="hidden" name="publication_id" id="publication_id">
                                    <input type="text" name="research_paper_subject" id="research_paper_subject_1"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-6 col-md-12 mb-4">
                                    <label class="py-2">Publication Link </label>
                                    <input type="text" name="research_paper_url" id="research_paper_url_1"
                                        class="form-control input-custom-style" />
                                </div>

                                <div class="form-group col-lg-12 col-md-12 mb-4">
                                    <label class="py-2">Summary <span class="text-danger">*</span></label>
                                    <textarea name="research_paper_summary" id="research_paper_summary_1" class="form-control input-custom-style"></textarea>
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
<!-- End Research Papers Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.publicationEditBtn', function() {
            var dataId = $(this).data('id');
            var requestType = "POST";
            var url = "{{ route('js-fetch-publications') }}";
            var params = {id: dataId};

            $.ajax({
                url: url,
                type: requestType,
                data: params,
                dataType:'json',
                success: function(response) {
                    $("#publication_id").val(dataId);
                    $("#research_paper_subject_1").val(response.research_paper_subject);
                    $("#research_paper_url_1").val(response.research_paper_url);
                    $("#research_paper_summary_1").val(response.research_paper_summary);
                    $('#updateResearchPapers').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });
        });
    });
</script>
