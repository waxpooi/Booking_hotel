<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{

    public function index() {
        $locations = Location::all();
        return view('admin.edit-location', compact('locations'));
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:locations,name'
        ]);

        Location::create(['name' => $request->name]);

        return redirect()->route('location.index')->with('success', 'Lokasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id) {
        $request->validate(['name' => 'required']);

        $location = Location::findOrFail($id);
        $location->update(['name' => $request->name]);

        return response()->json(['success' => true, 'message' => 'Lokasi berhasil diperbarui!']);
    }



    public function destroy($id) {
        Location::findOrFail($id)->delete();
        return redirect()->route('location.index')->with('success', 'Lokasi berhasil dihapus!');
    }
}
