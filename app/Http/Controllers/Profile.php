<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\PasswordUpdate as PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $data = $request->validated();
        $user = User::findOrFail(auth()->id());
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect()->route('profile.index');
    }
}
