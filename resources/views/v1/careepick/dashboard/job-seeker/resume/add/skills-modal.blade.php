<!-- Skills Modal -->
<div class="modal fade" id="addSkills" tabindex="-1" role="dialog" aria-labelledby="addSkillsModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Skills</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('js-add-skills') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-3 gy-4">
                                <div class="form-group col-lg-12 col-md-12 mb-4">
                                    <label class="py-2">Skill <span class="text-danger">*</span></label>
                                    <select name="skill_id[]" data-placeholder="Skills" class="chosen-select multiple" multiple tabindex="4">
                                        @foreach ($skillsData as $data)
                                            @php
                                                $selected = $jobSeekerSkillsData->contains('skill_id', $data['id']) ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $data['id'] }}" {{ $selected }}>{{ $data['skill_name'] }}</option>
                                        @endforeach
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
<!-- End Skills Modal -->
