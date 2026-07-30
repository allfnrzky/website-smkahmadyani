<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View | RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') return redirect()->route('admin.login');
            if ($user->role === 'calon_siswa') return redirect()->route('calon-siswa.dashboard');
            if ($user->role === 'guru') return redirect()->route('dashboard');
            return redirect()->route('siswa.dashboard');
        }
        return view('auth.login');
    }

    public function createAdmin(): View | RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') return redirect()->route('admin.dashboard');
            return redirect('/');
        }
        return view('auth.login-admin');
    }

    public function createLms(): View | RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') return redirect()->route('admin.dashboard');
            if ($user->role === 'guru') return redirect()->route('dashboard');
            return redirect()->route('siswa.dashboard');
        }
        return view('auth.login-lms');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role !== 'calon_siswa') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->withErrors(['email' => 'Hanya akun PPDB yang bisa login di sini.']);
        }

        return redirect()->route('calon-siswa.dashboard');
    }

    public function storeAdmin(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role !== 'admin') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')->withErrors(['email' => 'Hanya admin yang bisa login di halaman ini.']);
        }

        return redirect()->route('admin.dashboard');
    }

    public function storeLms(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'calon_siswa') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login.lms')->withErrors(['email' => 'Akun PPDB tidak bisa login di sini. Silakan login di halaman PPDB.']);
        }

        if ($user->role === 'admin') return redirect()->route('admin.dashboard');
        if ($user->role === 'guru') return redirect()->route('dashboard');
        return redirect()->route('siswa.dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.login');
        }

        if ($user && ($user->role === 'siswa' || $user->role === 'guru')) {
            return redirect()->route('login.lms');
        }

        return redirect()->route('login');
    }
}
