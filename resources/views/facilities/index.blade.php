@extends('layouts.app')

@section('title', 'Daftar Fasilitas')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Fasilitas</h2>

    <div class="row">
        @foreach ($facilities as $facility)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $facility->image) }}" class="card-img-top" alt="{{ $facility->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $facility->name }}</h5>
                        <p class="card-text">{{ $facility->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
