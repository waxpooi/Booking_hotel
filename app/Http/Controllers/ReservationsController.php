<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reservation;
Use App\Models\Room;

class ReservationsController extends Controller
{

    public function index()
    {
        $rooms = Room::all();
        return view('reservation_tamu.index', compact('rooms'));
    }

    public function create($room_id)
{

    $room = Room::findOrFail($room_id);

    $rooms = Room::all();

    return view('reservation.create', compact('room', 'rooms'));
}

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);


        $reservation = Reservation::create([
            'email' => $request->email,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);


        return redirect()->route('reservation.show', $reservation->id)
            ->with('success', 'Reservasi berhasil dibuat!');
    }


    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation_tamu.show', compact('reservation'));
    }


    public function success()
    {
        return view('reservation.success');
    }


    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $reservation = Reservation::findOrFail($id);


        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('payments'), $filename);

            $reservation->payment_proof = $filename;
            $reservation->payment_status = 'paid';
            $reservation->save();
        }

        return redirect()->route('reservation.show', $id)
            ->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    public function confirmPayment(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $reservation = Reservation::findOrFail($id);

        // Upload file
        $file = $request->file('payment_proof');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('payments'), $filename);

        // Update data
        $reservation->payment_proof = $filename;
        $reservation->payment_status = 'paid';
        $reservation->status = 'confirmed';
        $reservation->save();

        return redirect()->route('tiket.detail', $reservation->id)
            ->with('success', 'Bukti pembayaran berhasil diunggah!');
    }
}
