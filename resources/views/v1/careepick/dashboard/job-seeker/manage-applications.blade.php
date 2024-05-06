@extends('v1.careepick.dashboard.layouts.js-master')
@section('content')
    <!--datatable css-->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>

    <div class="upper-title-box">
        <h3>Manage Applications</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Application Listings</h4>
                    </div>

                    <div class="widget-content">
                        @if(session('applicationStatusUpdateMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('applicationStatusUpdateMsg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-outer">
                            <table id="buttons-datatables" class="hover table align-middle default-table manage-job-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Company Name</th>
                                        <th>Application Date</th>
                                        <th>Job Deadline</th>
                                        <th>Status</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobsData as $key=> $data)
                                        <tr>
                                            <td><h6>{{ $data->job_title }}</h6></td>
                                            <td>{{ $data->company_name }}</td>
                                            <td>{{ $data->date_applied }}</td>
                                            <td>{{ $data->deadline }}</td>
                                            <td class="status">{{ $data->application_status }}</td>
                                            {{-- <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <button class="applied-jobs" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#updateApplicationStatus" data-text="Update Aplication status">
                                                                <span class="la la-pencil"></span>
                                                            </button>
                                                        </li>
                                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                                    </ul>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Status Modal -->
        <div class="modal fade" id="updateApplicationStatus" tabindex="-1" role="dialog" aria-labelledby="updateApplicationStatusModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="loginmodal">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update status</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form method="POST" action="{{ route('jp-update-job-application-status') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gx-3 gy-4">
                                        <div class="form-group col-lg-12 col-md-12 mb-4">
                                            <label class="py-2">Status <span class="text-danger">*</span></label>
                                            <input type="hidden" name="id" id="applied_job_id">
                                            <select name="status_id" class="chosen-select" tabindex="4">
                                                <option>Select Status</option>

                                            </select>
                                        </div>

                                        <div class="form-group mt-3">
                                            <button type="submit"
                                                class="btn btn-primary full-width font--bold btn-md">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Application Status Modal -->

    </div>


    <script>
        $(document).ready(function() {
            new DataTable('#buttons-datatables', {
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });

            $(document).on('click', '.applied-jobs', function() {
                var dataId = $(this).data('id');
                $("#applied_job_id").val(dataId);
            });
        });
    </script>
@endsection
