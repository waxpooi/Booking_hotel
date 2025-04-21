@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="alert alert-info">
        <strong>Periksa email Anda untuk verifikasi!</strong>
        <p>Silakan periksa inbox Anda untuk link verifikasi email. Jika Anda tidak menerimanya, Anda bisa mengirim ulang email verifikasi.</p>
    </div>

    <!-- Form untuk mengirim ulang verifikasi -->
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Kirim Ulang Verifikasi Email</button>
    </form>
</div>
@endsection
