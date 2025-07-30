<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function edit()
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            session()->forget('user_id');
            return redirect('/login');
        }

        return view('settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            session()->forget('user_id');
            return redirect('/login');
        }

        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->fullname = $validated['fullname'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect('/dashboard')->with('success', 'Account updated successfully!');
    }
}
