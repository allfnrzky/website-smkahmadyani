<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // JIKA SUDAH LOGIN TAPI KLIK TOMBOL LOGIN LAGI
                // ARAHKAN SESUAI ROLE SECARA TEGAS
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
