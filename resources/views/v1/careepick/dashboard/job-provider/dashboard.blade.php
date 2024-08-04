@extends('v1.careepick.dashboard.layouts.jp-master')
@section('content')

    <!--datatable css-->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>

    <!-- Dashboard -->
    <div class="upper-title-box">
        <h3>Hi, {{ Auth::user()->name }}!!</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item">
                <div class="left">
                    <i class="icon flaticon-briefcase"></i>
                </div>
                <div class="right">
                    <h4>{{ App\Helper\Helper::getTotalPostedJobCount() }}</h4>
                    <p>Posted Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-red">
                <div class="left">
                    <i class="icon la la-file-invoice"></i>
                </div>
                <div class="right">
                    <h4>{{ App\Helper\Helper::getTotalApplicationCount() }}</h4>
                    <p>Applications</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-green">
                <div class="left">
                    <i class="icon la la-bookmark-o"></i>
                </div>
                <div class="right">
                    <h4>{{ App\Helper\Helper::getTotalShortlistedApplicantCount() }}</h4>
                    <p>Shortlist</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- applicants Widget -->
            <div class="applicants-widget ls-widget">
                <div class="widget-title">
                    <h4>Recent Applicants</h4>
                </div>
                <div class="widget-content">
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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jobsData = App\Helper\Helper::getRecentApplicants();
                                @endphp
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard -->

    <script>
        $(document).ready(function() {
            new DataTable('#buttons-datatables', {
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });
        });
    </script>
@endsection
