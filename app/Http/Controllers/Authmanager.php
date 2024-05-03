<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Leave;
use Session;
use Illuminate\Foundation\Auth\VerifiesEmails;

class Authmanager extends Controller
{
    //

    function login(){
        return view('login');
    
    }

    function registration(){
        return view('registration');
    }

    function welcome(){
        return view('welcome');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isAdmin === 'yes') {
                return redirect()->route('admin.dashboard');
            } 
            else {
                // Redirect regular users to the login page with an error message
                return redirect(route('welcome'))->with("error", "Not an admin. Please login as a regular user.");
            }
        }

        return redirect(route('login'))->with("error", "Login Unsuccessful! Check email or password.");
}


    function registrationPost(Request $request){

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
            
        ]);

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] =$request->email;
        $data['password'] = Hash::make($request->password);
        $data['isAdmin'] ="no";
        $user =  User::create($data);
        
        $user->sendEmailVerificationNotification();


        if(!$user){
            return  redirect(route('registration'))->with("error", "Registration Unsuccessful! ");
        }
        return  redirect(route('login'));
    }

    function welcomePost(Request $request){
        $request -> validate([
            'startig_date' => 'required',
            'ending_date' => 'required|after_or_equal:starting_date',
            'leave_type' => 'required',
            'remarks' =>'required'
        ]);
        
       
        
        $data['employee_name']=auth()->user()->name;
        $data['employee_username']=auth()->user()->username;
        $data['startig_date'] = $request->startig_date;
        $data['ending_date'] =$request->ending_date;
        $data['leave_type'] = $request->leave_type;
        $data['remarks'] = $request->remarks;
        $data['status'] ="pending";
        $leave =  Leave::create($data);

        if(!$leave){
            return  redirect(route('welcome'))->with("error", "Invalid data");
        }
        return  redirect(route('leave.history'));

    }

    public function leaveHistory()
    {
        $user = Auth::user();
        $leaveHistory = Leave::where('employee_name', $user->name)->get();
        return view('history', compact('leaveHistory'));
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return  redirect(route('login'));
    }
}
