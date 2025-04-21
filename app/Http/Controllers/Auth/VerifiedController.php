<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class VerifiedController extends Controller
{

    public function verify($id, $hash)
    {

        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->withErrors(['error' => 'Link verifikasi tidak valid!']);
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('home')->with('success', 'Email Anda sudah diverifikasi.');
        }

        $user->markEmailAsVerified();

        event(new Verified($user));

        return redirect()->route('home')->with('success', 'Email Anda berhasil diverifikasi.');
    }

    public function showVerificationNotice()
    {
        return view('auth.verified');
    }
}
