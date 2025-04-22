<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class TiketController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login')->with('error', 'login dlu bro nanti abis login pesen yee');
        }

        $userEmail = $user->email;

        $reservations = Reservation::where('email', $userEmail)->get();

        return view('tiket.index', compact('reservations'));
    }

    public function show($id)
    {
        $userEmail = Auth::user()->email;


        $reservation = Reservation::where('id', $id)
            ->where('email', $userEmail)
            ->firstOrFail();

        return view('tiket.detail', compact('reservation'));
    }
}
