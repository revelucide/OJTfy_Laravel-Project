<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('register');
});

// REGISTER AND LOGIN
Route::get('/register', [RegisterController::class, 'showForm']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm']);
Route::post('/login', [LoginController::class, 'login']);

use App\Http\Controllers\SettingsController;





//DASHBOARD FUNCTIONALITIES
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return view('dashboard');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

Route::get('/create-blog', function () {
    return view('create-blog');
});

Route::post('/submit-blog', function (Request $request) {
    // Save blog post logic here
    return 'Blog saved: ' . $request->title;
});

Route::get('/messages', function () {
    return view('messages');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/login', function () {
    return view('login'); // this should match your login.blade.php
})->name('login');
