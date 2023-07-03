<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Chatify\Chat;
use App\Models\Chatify\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Pusher\Pusher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', function () {
        return Redirect::route('chatify');
    })->name('dashboard');
   // routes/web.php
   Route::get('/video-chat', function () {
    // fetch all users apart from the authenticated user
    $users = User::where('id', '<>', Auth::id())->get();
    return view('video-chat', ['users' => $users]);
});

// Endpoints to call or receive calls.
Route::post('/video/call-user', 'App\Http\Controllers\VideoChatController@callUser');
Route::post('/video/accept-call', 'App\Http\Controllers\VideoChatController@acceptCall');



   


});


