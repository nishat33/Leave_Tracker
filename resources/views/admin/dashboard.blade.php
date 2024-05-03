@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-primary-subtle clickable-card" onclick="toggleTable('pending-requests-table')">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text"> {{ $totalPendingLeave }} leave requests</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 ">
                <div class="card-body bg-success-subtle clickable-card" onclick="toggleTable('accepted-requests-table')">
                    <h5 class="card-title">Accepted Requests</h5>
                    <p class="card-text">{{ $totalAcceptedLeave }} accepted leave requests</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body bg-danger-subtle clickable-card" onclick="toggleTable('rejected-requests-table')">
                    <h5 class="card-title">Rejected Requests</h5>
                    <p class="card-text">{{ $totalRejectedLeave }} rejected leave requests</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-warning-subtle clickable-card" onclick="toggleTable('all-users')">
                <div class="card-body ">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">{{ $countUser }} employees</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="container">
    <div class="row mt-auto">
        <div class="col-md-12 mt-auto" id="pending-requests-table"  style="display:none;">
            <div class="card mt-auto">
                <div class="card-body mt-auto">
                    <h4 class="header-title">Pending Leave Requests</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-auto">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Leave Type</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th> Status Update </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingLeaveCount as $leave)
                                    @if($leave->status == 'pending')
                                        <tr style="background-color: lightblue">
                                            <td> {{$leave->employee_name}}</td>
                                            <td>{{ $leave->startig_date }}</td>
                                            <td>{{ $leave->ending_date }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $leave->remarks }}</td>
                                            <td>{{ $leave->status }}</td>
                                            <td>
                                            <div class="d-flex flex-column">
                                            <form action="{{ route('admin.dashboard.acceptLeave', $leave->id) }}" method="POST" class="mb-2">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-block">Accept</button>
                                            </form>
                                            <form action="{{ route('admin.dashboard.rejectLeave', $leave->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-block">Reject</button>
                                            </form>
                                        </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-auto mt-5" id="accepted-requests-table" style="display:none;">
            <div class="card mt-auto">
                <div class="card-body mt-auto">
                    <h4 class="header-title">Accepted Leave Requests</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-auto">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th> Employee Name </th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Leave Type</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acceptedLeaveCount as $leave)
                                    @if($leave->status == 'accepted')
                                        <tr style="background-color: lightblue">
                                            <td>{{$leave ->employee_name}}</td>
                                            <td>{{ $leave->startig_date }}</td>
                                            <td>{{ $leave->ending_date }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $leave->remarks }}</td>
                                            <td>{{ $leave->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-auto mt-5" id="rejected-requests-table" style="display:none;">
            <div class="card mt-auto">
                <div class="card-body mt-auto">
                    <h4 class="header-title">Rejected Leave Requests</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-auto">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Leave Type</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rejectedLeaveCount as $leave)
                                    @if($leave->status == 'rejected')
                                        <tr style="background-color: lightblue">
                                        <td>{{$leave->employee_name}}</td>
                                            <td>{{ $leave->startig_date }}</td>
                                            <td>{{ $leave->ending_date }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $leave->remarks }}</td>
                                            <td>{{ $leave->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-auto mt-5" id="all-users" style="display:none;">
            <div class="card mt-auto">
                <div class="card-body mt-auto">
                    <h4 class="header-title">All Employee List</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-auto">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Grant Admin Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($totalUser as $leave)
                                        <tr style="background-color: lightblue">
                                            <td>{{ $leave->name }}</td>
                                            <td>{{ $leave->email }}</td>
                                            <td>
                                            @if ($leave->isAdmin !== 'yes') <!-- Only display the button if the user is not already an admin -->

                                                <form action="{{ route('grant.admin', $leave->id) }}" method="POST">

                                                    @csrf

                                                    <button type="submit" class="btn btn-success btn-block">Grant Admin Privileges</button>

                                                </form>

                                                @else

                                                Already an admin

                                                @endif
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
    function toggleTable(tableId) {
        // Get references to all table elements
        var pendingTable = document.getElementById("pending-requests-table");
        var rejectedTable = document.getElementById("accepted-requests-table");
        var acceptedTable = document.getElementById("rejected-requests-table");
        var totalTable = document.getElementById("all-users");

        // Hide all tables
        pendingTable.style.display = "none";
        rejectedTable.style.display = "none";
        acceptedTable.style.display = "none";
        totalTable.style.display = "none";

        // Show the clicked table
        var tableToShow = document.getElementById(tableId);
        tableToShow.style.display = "block";
    }
</script>








@endsection