<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class VerifiedController extends Controller
{
    // Method untuk verifikasi email
    public function verify($id, $hash)
    {
        // Cek apakah ID dan hash sesuai
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->withErrors(['error' => 'Link verifikasi tidak valid!']);
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('home')->with('success', 'Email Anda sudah diverifikasi.');
        }

        // Mark user email as verified
        $user->markEmailAsVerified();

        // Trigger event setelah verifikasi
        event(new Verified($user));

        return redirect()->route('home')->with('success', 'Email Anda berhasil diverifikasi.');
    }

    // Menampilkan halaman notice verifikasi
    public function showVerificationNotice()
    {
        return view('auth.verify');
    }
}
