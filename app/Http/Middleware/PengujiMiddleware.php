<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengujiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roles == "penguji" || Auth::user() && Auth::user()->roles == "admin") {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Silahkan login sebagai penguji terlebih dahulu!');
    }
}
