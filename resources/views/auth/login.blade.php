@extends('layouts.app2')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center w-100" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 400px; min-height: 80vh; display: flex; flex-direction: column; justify-content: center;">
        <h3 class="text-center mb-4">🔑 Login</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="flex-grow-1 d-flex flex-column justify-content-center">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            {{-- <div class="mt-3 text-center">
                <a href="{{ route('google.login') }}" class="btn btn-danger w-100">
                    <i class="fab fa-google"></i> Login dengan Google
                </a>
            </div> --}}

        </form>

        <div class="text-center mt-3">
            <p>Belum registrasi? <a href="{{ route('register') }}">Silakan registrasi</a></p>
        </div>
    </div>
</div>
@endsection
