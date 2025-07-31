<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::find(session('user_id'));

        if (!$user) return redirect('/login');

        return view('profile', [
            'fullname' => $user->fullname,
            'username' => $user->username,
            'email' => $user->email,
            'profile_picture' => $user->profile_picture ?? null
        ]);
    }
}

