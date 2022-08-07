<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register as RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
       $data = $request->validated();
       $data['password'] = Hash::make($data['password']);
       $user = User::create($data);
       event(new Registered($user));
       Auth::login($user);
       session()->flash('notification','auth.register');
       return redirect()->route('home');
    }

}
