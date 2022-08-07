<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DevToken
{
    public function handle(Request $request, Closure $next)
    {
        if($request->cookie('devtoken') !== 'jrehu234i0mgklrenglk'){
            abort(500);
        }

        return $next($request);
    }
}
