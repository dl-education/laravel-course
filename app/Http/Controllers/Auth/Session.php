<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login as LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Session extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        session()->flash('notification','auth.login');
        return redirect()->route('home');
    }

    public function exit()
    {
        return view('auth.logout');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
