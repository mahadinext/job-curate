@extends('v1.careepick.dashboard.layouts.jp-master')
@section('content')
    <!--datatable css-->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>

    <div class="upper-title-box">
        <h3>Manage Applications</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4e92b66718de79da6a00', {
            cluster: 'ap2'
        });

        // var channel = pusher.subscribe('my-channel');
        // channel.bind('new-notification', function(data) {
        //     alert(JSON.stringify(data));
        // });

        var channel = pusher.subscribe('careepick-v1');
        channel.bind('App\\Events\\NewNotification', function(data) {
            // Handle the received notification data and display it in the user panel
            console.log(data.message);
        });
    </script> --}}

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
                                        <th>Applicant Name</th>
                                        <th>Profile Matched</th>
                                        <th>View CV</th>
                                        <th>Download CV</th>
                                        <th>Job Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobsData as $key=> $data)
                                        <tr>
                                            <td><h6>{{ $data->job_title }}</h6></td>
                                            <td>{{ $data->applicant_name }}</td>
                                            <td>{{ $data->profile_match_percentage }}%</td>
                                            <td>
                                                <?php
                                                    $timestamp = time();
                                                    $fileName = $timestamp . "_" . str_replace([' ', '.', '--', '. '], '-', $data->applicant_name) . "-resume";
                                                ?>
                                                <a target="_blank" href="{{ route('view-resume', ['applicantsId'=> $data->applicant_id, 'fileName' => $fileName])}}">
                                                    <b>View</b>
                                                </a>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ route('download-resume', $data->applicant_id)}}">
                                                    <b>Download</b>
                                                </a>
                                            </td>
                                            <td>{{ $data->deadline }}</td>
                                            <td class="status">{{ $data->application_status }}</td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <button class="applied-jobs" data-id="{{ $data->id }}" data-status-id="{{ $data->application_status_id }}" data-bs-toggle="modal" data-bs-target="#updateApplicationStatus" data-text="Update Aplication status">
                                                                <span class="la la-pencil"></span>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button class="applied-jobs" data-id="{{ $data->id }}" data-status-id="{{ $data->application_status_id }}" data-bs-toggle="modal" data-bs-target="#updateApplicationStatus" data-text="Schedule Interview">
                                                                <span class="la la-clock"></span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
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
                                            <select name="status_id" id="status_id" class="chosen-select" tabindex="4" required>
                                                {{-- <option>Select Status</option>
                                                @foreach ($jobApplicationStatusData as $data)
                                                    <option value="{{ $data['id'] }}">{{ $data['status'] }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="row hide" id="schedule">
                                            <div class="form-group col-lg-12 col-md-12 mb-4">
                                                <label class="py-2">Day <span class="text-danger">*</span></label>
                                                <select name="schedule_day_id" id="schedule_day_id" class="chosen-select" tabindex="4" required>
                                                    <option>Select Day</option>
                                                    @foreach ($daysData as $data)
                                                        <option value="{{ $data->id }}">{{ $data->day_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 mb-4">
                                                <label class="py-2">Date <span class="text-danger">*</span></label>
                                                <input class="form-control input-custom-style" type="date" name="schedule_date" id="schedule_date" placeholder="YYYY-MM-DD">
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 mb-4">
                                                <label class="py-2">Time <span class="text-danger">*</span></label>
                                                <input type="time" name="schedule_time" id="schedule_time" class="form-control input-custom-style">
                                            </div>

                                            <div class="form-group col-lg-6 col-md-12 mb-4">
                                                <label class="py-2">Interview Location <span class="text-danger">*</span></label>
                                                <select id="interview_location" name="scheduled_location" class="chosen-select" tabindex="4" required>
                                                    <option>Select Location</option>
                                                    <option value="online">Online</option>
                                                    <option value="offline">Offline</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 mb-4 hide" id="offline_address_input">
                                                <label class="py-2">Address <span class="text-danger">*</span></label>
                                                <input type="text" name="offline_address" class="form-control input-custom-style" id="offline_address">
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 mb-4 hide" id="online_address_input">
                                                <label class="py-2">Url <span class="text-danger">*</span></label>
                                                <input type="text" name="online_address" class="form-control input-custom-style" id="online_address">
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 mb-4">
                                                <label class="py-2">Required Documents</label>
                                                <input type="text" name="required_documents" class="form-control input-custom-style" id="required_documents">
                                            </div>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /**
             * .....
             *
             */
            new DataTable('#buttons-datatables', {
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });

            /**
             * .....
             *
             */
            $(document).on('click', '.applied-jobs', function() {
                var dataId = $(this).data('id');
                var dataStatusId = $(this).data('status-id');
                $("#applied_job_id").val(dataId);

                var requestType = "POST";
                var url = "{{ route('jp-fetch-job-application-status') }}";
                var params = {id: dataId};

                ajaxRequest(url, requestType, params, function(response) {
                    $('#status_id').empty();

                     // Add default option
                     $('#status_id').append($('<option>', {
                        value: '',
                        text: 'Select Status'
                    }));
                    // Iterate through the response data and append options
                    $.each(response.jobApplicationStatus, function(index, item) {
                        var option = $('<option>', {
                            value: item.id,
                            text: item.status
                        });

                        // Set selected if matches dataId
                        if (item.id == dataStatusId) {
                            option.prop('selected', true);
                        }
                        $('#status_id').append(option);
                    });

                    // Set selected option for dataId
                    // $('#status_id').val(dataStatusId);

                    // Refresh chosen select after updating options
                    $('#status_id').trigger('chosen:updated');

                    // Update other form fields based on response
                    if (response.statusTracker.length > 0) {
                        var tracker = response.statusTracker[0];
                        $('#schedule_day_id').val(tracker.scheduled_day_id).trigger('chosen:updated');
                        $('#schedule_date').val(tracker.scheduled_date);
                        $('#schedule_time').val(tracker.scheduled_time);
                        $('#interview_location').val(tracker.scheduled_location).trigger('chosen:updated');

                        if (tracker.scheduled_location === 'offline') {
                            $('#offline_address').val(tracker.scheduled_address);
                            $('#online_address').val(''); // Clear online address if present
                            $('#offline_address_input').removeClass('hide');
                            $('#online_address_input').addClass('hide');
                        } else {
                            $('#online_address').val(tracker.scheduled_url);
                            $('#offline_address').val(''); // Clear offline address if present
                            $('#online_address_input').removeClass('hide');
                            $('#offline_address_input').addClass('hide');
                        }

                        $('#required_documents').val(tracker.required_documents);

                        // Show schedule section
                        $('#schedule').removeClass('hide');
                    }
                });

                if (dataStatusId == 1 || dataStatusId == 3 || dataStatusId == 5) {
                    document.getElementById("schedule").classList.add("hide");
                } else {
                    document.getElementById("schedule").classList.remove("hide");
                }
            });

            /**
             * .....
             *
             */
            $(document).on('change', '#status_id', function() {
                var id = $("#status_id option:selected").val();
                if (id == 1 || id == 3 || id == 5) {
                    document.getElementById("schedule").classList.add("hide");
                } else {
                    document.getElementById("schedule").classList.remove("hide");
                }
            });

            /**
             * .....
             *
             */
            $(document).on('change', '#interview_location', function() {
                var location = $("#interview_location option:selected").val();
                if (location == "online") {
                    $("#offline_address").val();
                    document.getElementById("offline_address_input").classList.add("hide");
                    document.getElementById("online_address_input").classList.remove("hide");
                } else {
                    $("#online_address").val();
                    document.getElementById("offline_address_input").classList.remove("hide");
                    document.getElementById("online_address_input").classList.add("hide");
                }
            });

            /**
             * .....
             *
             */
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
@endsection
