<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePassword as ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Password extends Controller
{
    public function edit(){
        return view('profile.password.edit');
    }

    public function update(ChangePasswordRequest $request){
        $request->user()->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();
        
        // mb regenerate session
        return redirect()->route('profile.password.edit')->with('notification', 'password.changed');
    }
}
