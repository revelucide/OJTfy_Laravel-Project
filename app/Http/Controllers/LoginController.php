<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simulate login (you can later replace with Auth::login)
            session(['user' => $user->username]);

            return redirect('/dashboard')->with('success', 'Welcome back, ' . $user->fullname . '!');
        }

        return back()->with('error', 'Invalid credentials.');
    }
}
