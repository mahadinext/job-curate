@extends('v1.careepick.dashboard.layouts.ad-master')
@section('content')
    <!--datatable css-->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>

    <div class="upper-title-box">
        <h3>Manage Employees</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Employees Listing</h4>
                    </div>

                    <div class="widget-content">
                        @if(session('employeesUpdateMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('employeesUpdateMsg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-outer">
                            <table id="buttons-datatables" class="hover table align-middle default-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Profile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobSeekersData as $key=> $data)
                                        <tr>
                                            <td><h6>{{ $data->jobseeker_name }}</h6></td>
                                            <td>{{ $data->jobseeker_mail }}</td>
                                            <td>{{ $data->jobseeker_phone_no_1 }}</td>
                                            <td class="status">{{ $data->jobseeker_status }}</td>
                                            <td class="status">{{ $data->jobseeker_status }}</td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <button class="employees" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#update" data-text="Update">
                                                                <span class="la la-pencil"></span>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button class="employees" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#delete" data-text="Delete">
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
    </div>

@endsection
