<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('admin')->user();

        if (!$user) {
            return redirect()->route('home')->withErrors(['error' => 'Akses ditolak!']);
        }

        if (!in_array($user->role, ['admin', 'receptionist'])) {
            return redirect()->route('home')->withErrors(['error' => 'Anda tidak memiliki izin!']);
        }

        return $next($request);
    }
}
