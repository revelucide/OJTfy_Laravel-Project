<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user_id' => $user->id]);
            session(['user' => $user->only(['fullname', 'username', 'email'])]); // for profile/dashboard use
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid username or password.');
    }
}
