<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('settings', compact('user')); // Pass user to Blade
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->fullname = $validated['fullname'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect('/dashboard')->with('success', 'Account updated successfully!');

    }
}
