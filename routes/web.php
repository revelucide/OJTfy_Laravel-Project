<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;

// ----------------------------------------
// HOME (Redirect to Register or Dashboard)
// ----------------------------------------
Route::get('/', function () {
    return session()->has('user') ? redirect('/dashboard') : redirect('/register');
});

// -----------------------
// REGISTER & LOGIN ROUTES
// -----------------------
Route::get('/register', [RegisterController::class, 'showForm']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// -------------------
// LOGOUT ROUTE
// -------------------
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

// -------------------
// DASHBOARD
// -------------------
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return view('dashboard');
});

// -------------------
// PROFILE
// -------------------
Route::get('/profile', function () {
    if (!session()->has('user')) return redirect('/login');

    $user = session('user');
    return view('profile', [
        'fullname' => $user['fullname'],
        'username' => $user['username'],
        'email' => $user['email'],
    ]);
})->name('profile');

// -------------------
// SETTINGS
// -------------------
Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

// -------------------
// BLOGS & MESSAGES
// -------------------
Route::get('/create-blog', function () {
    if (!session()->has('user')) return redirect('/login');
    return view('create-blog');
});

Route::post('/submit-blog', function (Request $request) {
    // Save blog post logic here
    return 'Blog saved: ' . $request->title;
});

Route::get('/messages', function () {
    if (!session()->has('user')) return redirect('/login');
    return view('messages');
});


