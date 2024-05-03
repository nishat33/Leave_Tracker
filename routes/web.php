<?php

use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authmanager;
use App\Http\Controllers\Session;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use Illuminate\Contracts\Auth\MustVerifyEmail;

Auth::routes(['verify' => true]);



Route::get('/admin/dashboard', [AdminController::class, 'display'])->name('admin.dashboard');
Route::post('/admin/dashboard/leave/{id}/accept', [AdminController::class, 'acceptLeave'])->name('admin.dashboard.acceptLeave');
Route::post('/admin/dashboard/leave/{id}/reject', [AdminController::class, 'rejectLeave'])->name('admin.dashboard.rejectLeave');


Route::get('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
Route::post('/admin/dashboard/{user}', [AdminController::class, 'grantAdmin'])->name('grant.admin');


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('welcome');
    } else {
        return redirect()->route('registration');
    }
}) -> name('home');


Route::get('/login', [Authmanager::class, 'login']) -> name('login');
Route::post('/login', [Authmanager::class, 'loginPost']) -> name('login.post');

Route::get('/registration',[Authmanager::class, 'registration']) ->name('registration');
Route::post('/registration',[Authmanager::class, 'registrationPost']) ->name('registration.post');

Route::get('/welcome',[Authmanager::class,'welcome'])->name('welcome');
Route::post('/welcome',[Authmanager::class,'welcomePost'])->name('welcome.post');
Route::get('/history',[Authmanager::class,'leaveHistory'])->name('leave.history');

Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware('auth');


Route::get('/logout', [Authmanager::class, 'logout'])->name('logout');
Route::get('/admin/login', function () {
    return view('admin.adminLogin');
})->name('admin.login');

