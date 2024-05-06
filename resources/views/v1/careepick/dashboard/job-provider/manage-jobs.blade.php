@extends('v1.careepick.dashboard.layouts.jp-master')
@section('content')
    <!--datatable css-->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>

    <div class="upper-title-box">
        <h3>Manage Jobs</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>My Job Listings</h4>

                        {{-- <div class="chosen-outer">
                            <select class="chosen-select">
                                <option>Last 6 Months</option>
                                <option>Last 12 Months</option>
                                <option>Last 16 Months</option>
                                <option>Last 24 Months</option>
                                <option>Last 5 year</option>
                            </select>
                        </div> --}}
                    </div>

                    <div class="widget-content">
                        <div class="table-outer">
                            @if (session('manage-job-message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('manage-job-message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <table id="buttons-datatables" class="hover table align-middle default-table manage-job-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Age</th>
                                        <th>Experience</th>
                                        <th>Job Type</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobsData as $key=> $data)
                                        <tr>
                                            <td><h6><a href="{{ route('jp-single-job-applications', ['jobSlug' => $data->slug]) }}">{{ $data->job_title }}</a></h6></td>
                                            <td>{{ ($data->salary != null) ? $data->salary : $data->salary_type_name }}</td>
                                            <td>{{ $data->age_range_name }}</td>
                                            <td>{{ $data->experience_range_name }}</td>
                                            <td>{{ $data->job_nature_name }}</td>
                                            <td>{{ $data->deadline }}</td>
                                            <td class="status">{{ $data->status }}</td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        {{-- <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li> --}}
                                                        <li>
                                                            <a href="{{ route('jp-edit-job-application', ['jobSlug' => $data->slug]) }}" data-text="Edit Aplication">
                                                                <span class="la la-pencil"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('jp-delete-job-application', ['jobSlug' => $data->slug]) }}" data-text="Delete Aplication">
                                                                <span class="la la-trash"></span>
                                                            </a>
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
        });
    </script>
@endsection
