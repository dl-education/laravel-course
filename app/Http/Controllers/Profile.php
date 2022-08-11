<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\PasswordUpdate as PasswordUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Profile extends Controller
{
    public function index()
    {
        return view('user.profile.index',[ 'user'=> Auth::user() ]);
    }

    public function editPassword()
    {
        return view('user.profile.editPassword');
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $request->user()->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ])->save();
        return redirect()->route('profile.index')->with('notification','password.change');
    }
}
