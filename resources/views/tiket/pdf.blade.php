@extends('layouts.pdf')

@section('title', 'Bukti Pembayaran')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Bukti Pembayaran Reservasi</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID Booking</th>
            <td>{{ $reservation->id }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $reservation->email }}</td>
        </tr>
        <tr>
            <th>Check-in</th>
            <td>{{ \Carbon\Carbon::parse($reservation->check_in)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <th>Check-out</th>
            <td>{{ \Carbon\Carbon::parse($reservation->check_out)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($reservation->status) }}</td>
        </tr>
        <tr>
            <th>Dibuat pada</th>
            <td>{{ $reservation->created_at->translatedFormat('d F Y H:i') }}</td>
        </tr>
    </table>

    <p class="mt-4">Terima kasih telah melakukan reservasi. Silakan tunjukkan bukti ini saat check-in.</p>
</div>
@endsection
