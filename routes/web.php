<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Controllers\ProfileController;

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
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');


Route::post('/upload-profile-picture', function (Request $request) {
    if (!session()->has('user_id')) return redirect('/login');

    $request->validate([
        'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $user = \App\Models\User::find(session('user_id'));
    if (!$user) return redirect('/login');

    // Delete old picture
    if ($user->profile_picture) {
        Storage::disk('public')->delete($user->profile_picture);
    }

    $path = $request->file('profile_picture')->store('profile_pictures', 'public');
    $user->profile_picture = $path;
    $user->save();

    // Update session if you use session('user')
    session(['user' => $user->toArray()]);

    return redirect('/profile')->with('success', 'Profile picture updated!');
});

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

    $blogs = session('blogs', []); // ✅ Fetch saved blogs

    return view('create-blog', compact('blogs'));
});

Route::post('/submit-blog', function (Request $request) {
    $blogs = session('blogs', []);

    $blogs[] = [
        'id' => uniqid(),
        'title' => $request->title,
        'content' => $request->content
    ];

    session(['blogs' => $blogs]);

    return redirect('/create-blog')->with('success', 'Blog saved!');
});

Route::get('/purge-blogs', function () {
    session()->forget('blogs'); // This deletes the 'blogs' from the session
    return redirect('/create-blog')->with('success', 'All blog entries have been deleted.');
});


Route::get('/delete-blog/{id}', function ($id) {
    $blogs = session('blogs', []);

    $filtered = array_filter($blogs, function ($blog) use ($id) {
        return $blog['id'] !== $id;
    });

    session(['blogs' => array_values($filtered)]); // Reindex array

    return redirect('/create-blog')->with('success', 'Blog deleted!');
});


Route::get('/messages', function () {
    if (!session()->has('user')) return redirect('/login');
    return view('messages');
});


