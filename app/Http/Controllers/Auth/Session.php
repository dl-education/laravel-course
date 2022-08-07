<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login as LoginRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Session extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->route('posts.index');
    }

    public function exit(){
        return view('auth.exit');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
