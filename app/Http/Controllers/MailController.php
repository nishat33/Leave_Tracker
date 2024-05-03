<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    
    public function sendEmail()
    {
        // Fetch leave details with associated user
        $leave = Leave::with('user')->find(1); // Assuming you have leave data in the database

        if ($leave) {
            // Send email notification
            Mail::to($leave->user->email)->send(new DemoMail($leave));
            
            return "Email sent successfully to " . $leave->user->email;
        } else {
            return "Leave request not found.";
        }
    }

    public function acceptLeave(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'accepted';
        $leave->save();

        // Send email notification without a view
        $mailData = [
            'start_date' => $leave->startig_date,
            'end_date' => $leave->ending_date,
            'status' => 'accepted',
        ];
        Mail::to($leave->user->email)->send(new DemoMail($mailData));

        return redirect()->back()->with('success', 'Leave request accepted successfully.');
    }

    public function rejectLeave(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();

        // Send email notification without a view
        $mailData = [
            'start_date' => $leave->startig_date,
            'end_date' => $leave->endin_date,
            'status' => 'rejected',
        ];
        Mail::to($leave->user->email)->send(new DemoMail($mailData));

        return redirect()->back()->with('success', 'Leave request rejected successfully.');
    }
}
