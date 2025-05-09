<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReceptionistController extends Controller
{
    public function dashboard()
    {
        return $this->index();
    }

    public function index()
    {
        $reservations = Reservation::orderBy('check_in')->get();
        return view('admin.index', compact('reservations'));
    }

    public function filterByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $date = $request->input('date');
        $reservations = reservation::whereDate('check_in', $date)->get();
        return view('admin.index', compact('reservations'));
    }

    public function searchBYEmail(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);
        $query = $request->input('query');

        $reservations = Reservation::where('email', 'like', '%' . $query . '%')->get();
        return view('admin.index', compact('reservations'))->with('success', 'nyari pake email berhasil');
    }

    public function acceptReservation($id)
    {
        $reservations = Reservation::findOrFail($id);
        $reservations->status = 'confirmed';
        $reservations->save();

        return redirect()->route('receptionist.reservations')
            ->with('success', 'reservasi telah di unggah');
    }

    public function cancelledReservation($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->status = 'cancelled';
    $reservation->save();

    return redirect()->route('receptionist.reservations')
        ->with('success', 'Reservasi berhasil ditolak.');
}

}
