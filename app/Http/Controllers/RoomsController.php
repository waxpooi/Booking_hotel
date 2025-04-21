<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    // =========== TAMU ===========

    public function guestIndex()
    {
        $rooms = Room::all();
        return view('rooms_tamu.rooms', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms_tamu.show_tamu', compact('room'));
    }

    // =========== ADMIN ===========

    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms')); // Tampilkan index Blade
    }

    public function create()
    {
        return view('admin.rooms.create'); // Tampilkan form create
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_type'       => 'required|string|max:255',
            'description'     => 'required|string',
            'capacity'        => 'required|integer',
            'price'           => 'required|numeric',
            'quantity'        => 'required|integer',
            'room_facilities' => 'nullable|string',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/rooms'), $imageName);
            $validated['image'] = $imageName;
        }

        Room::create($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room')); // Tampilkan form edit
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'room_type'       => 'required|string|max:255',
            'description'     => 'required|string',
            'capacity'        => 'required|integer',
            'price'           => 'required|numeric',
            'quantity'        => 'required|integer',
            'room_facilities' => 'nullable|string',
        ]);

        $room = Room::findOrFail($id);

        // Menangani gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/rooms'), $imageName);
            $validated['image'] = $imageName;
        }

        $room->update($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil dihapus!');
    }
}
