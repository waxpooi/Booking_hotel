<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FacilitiesController extends Controller
{
    public function index()
    {
        $facilities = Facilities::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }


        Facilities::create($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }


    public function edit(Facilities $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facilities $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($facility->image) {
                Storage::delete('public/' . $facility->image);
            }
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }
        $facility->update($validated);
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facilities $facility)
    {
        if ($facility->image) {
            Storage::delete('public/' . $facility->image);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function guestIndex()
    {
        $facilities = Facilities::all();
        return view('facilities.index', compact('facilities'));
    }
}
