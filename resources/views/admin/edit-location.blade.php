@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Tujuan Maps</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Daftar Lokasi -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 70%">Nama Lokasi</th>
                        <th style="width: 20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <input type="text" class="form-control px-2"
                                value="{{ $location->name }}"
                                id="location-{{ $location->id }}"
                                data-id="{{ $location->id }}">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm" onclick="updateLocation({{ $location->id }})">
                                <i class="bi bi-save"></i> Save
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function updateLocation(id) {
        let input = document.getElementById(`location-${id}`);
        let newName = input.value;

        fetch(`/location/${id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({ name: newName })
        }).then(response => response.json())
          .then(data => {
              alert("Lokasi berhasil diperbarui!");
          })
          .catch(error => console.error("Error:", error));
    }
</script>
@endsection
