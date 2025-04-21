<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\Reservation;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('check_in', 'asc')->get();
        return view('admin.index', compact('reservations'));
    }

    public function dashboard()
    {
        $totalFacilities = Facilities::count();
        $totalReservations = Reservation::count();
        $totalUsers = User::count();
        $reservations = Reservation::with('user')->orderBy('tanggal', 'desc')->get();

        return view('admin.index', compact('totalFacilities', 'totalReservations', 'totalUsers', 'reservations'));
    }

    public function showReservations()
    {
        $reservations = Reservation::with('user')->orderBy('tanggal', 'desc')->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function facilities()
    {
        $facilities = Facilities::paginate(10);
        return view('admin.facilities', compact('facilities'));
    }

    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return redirect()->route('user.list')->with('success', 'Akun berhasil dinonaktifkan.');
    }
}
