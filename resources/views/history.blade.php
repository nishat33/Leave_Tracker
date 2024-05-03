@extends('layout')
@section('title', 'History')
@section('content')
    <div class="container ">
        <div class="row mt-auto">
            <div class="col-md-12 mt-auto">
                <div class="card mt-auto">
                    <div class="card-body mt-auto">
                        <h4 class="header-title">Leave History Table</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-auto">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>User Name</th>
                                        <th>Starting Date</th>
                                        <th>Ending Date</th>
                                        <th>Leave Type</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leaveHistory as $leave)
                                    <tr style="background-color: 
                                    {{ $leave->status === 'pending' ? 'lightblue' : 
                                    ($leave->status === 'rejected' ? 'pink' : 
                                        ($leave->status === 'accepted' ? 'lightgreen' : 'inherit')) }} !important">
                                            <td> {{$leave->employee_username}}</td>
                                            <td>{{ $leave->startig_date }}</td>
                                            <td>{{ $leave->ending_date }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $leave->remarks }}</td>
                                            <td style="background-color: {{ $leave->status == 'pending' ? 'lightblue' : 'inherit' }}">{{ $leave->status }}</td>

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