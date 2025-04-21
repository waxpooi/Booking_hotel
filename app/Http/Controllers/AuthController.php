<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //login
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('admin')->user();

            if (!$user) {
                return back()->withErrors(['email' => 'Login gagal!']);
            }

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Selamat datang, Admin!');
            } elseif ($user->role === 'receptionist') {
                return redirect()->route('receptionist.dashboard')->with('success', 'Selamat datang, Receptionist!');
            } else {
                return redirect()->route('home')->with('error', 'Anda tidak memiliki izin!');
            }
        }


        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect()->route('home')->with('success', 'Login berhasil sebagai tamu!');
        }


        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    //masuk ke register
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'tamu',
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('auth.verified');

    }
    //bagian email
    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Email verifikasi telah dikirim ulang!');
    }

    //logout gess
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout!');
    }
}
