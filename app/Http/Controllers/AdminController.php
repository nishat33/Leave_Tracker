<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Leave;
use Session;
use Illuminate\Support\Facades\Log;
use App\Mail\DemoMail;


class AdminController extends Controller
{
    public function display()
    {
        // Assuming you need some initial data for your dashboard view, you can fetch it here
        $pendingLeaveCount = Leave::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $totalPendingLeave=Leave::where('status','pending')->count();

        $acceptedLeaveCount = Leave::where('status', 'accepted')->orderBy('created_at', 'desc')->get();
        $totalAcceptedLeave = Leave::where('status', 'accepted')->count();

        $rejectedLeaveCount = Leave::where('status', 'rejected')->orderBy('created_at', 'desc')->get();
        $totalRejectedLeave = Leave::where('status', 'rejected')->count();

        $totalUser = User::get();
        $countUser = User::count();

        // Assuming you have other data to pass to the view, you can include it here

        return view('/admin/dashboard', [
            'pendingLeaveCount' => $pendingLeaveCount,
            'totalPendingLeave'=>$totalPendingLeave,
            'acceptedLeaveCount' => $acceptedLeaveCount,
            'totalAcceptedLeave' => $totalAcceptedLeave,
            'rejectedLeaveCount' => $rejectedLeaveCount,
            'totalRejectedLeave'=>$totalRejectedLeave,
            'totalUser' => $totalUser,
            'countUser' => $countUser,
        ]);
    }

    public function acceptLeave(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'accepted';
        $leave->save();

        // Retrieve associated user's email
        $userEmail = $leave->user->email;

        // Send email notification if user's email is available
        if ($userEmail) {
            $mailData = [
                'start_date' => $leave->start_date,
                'end_date' => $leave->end_date,
                'status' => 'accepted',
            ];
            Mail::to($leave->user->email)->send(new DemoMail($mailData, $leave));

        }

        return redirect()->back()->with('success', 'Leave request accepted successfully.');
    }

public function rejectLeave(Request $request, $id)
{
    $leave = Leave::findOrFail($id);
    $leave->status = 'rejected';
    $leave->save();

    // Retrieve associated user's email
    $userEmail = $leave->user->email;

    // Send email notification if user's email is available
    if ($userEmail) {
        $mailData = [
            'start_date' => $leave->start_date,
            'end_date' => $leave->end_date,
            'status' => 'rejected',
        ];
        Mail::to($leave->user->email)->send(new DemoMail($mailData, $leave));

    }

    return redirect()->back()->with('success', 'Leave request rejected successfully.');
}

public function grantAdmin(User $user)
{
    // Update the isAdmin status of the selected user to 'yes'
    $user->isAdmin = 'yes';
    $user->save();

    // Provide feedback to the admin
    return redirect()->back()->with('success', 'Admin privileges granted successfully.');
}

public function userDisplay()
    {
        $users = User::all(); // Fetch all users from the database

        return view('admin.dashboard', compact('users'));
    }

    
}
