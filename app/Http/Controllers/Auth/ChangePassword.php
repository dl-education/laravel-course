<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\ChangePassword as ChangePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ChangePassword extends Controller
{
    /**
     * Display the change password view.
     */
    public function create()
    {
        return view('auth.change-password');
    }

    /**
     * Handle an incoming change request.
     */
    public function store(ChangePasswordRequest $request)
    {
        $request->authenticatePassword();
        $request->session()->regenerate();
        session()->flash('notification', 'password.changed');
        return redirect()->back();
    }
}
