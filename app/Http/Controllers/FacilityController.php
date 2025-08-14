<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::first();
        return view('facility.index', ['facilities' => $facilities]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('facility.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,avif,webp|max:2048',
            'facilities_text' => 'required|string'
        ]);

        $folder = 'facility';
        $ext = $request->file('image')->getClientOriginalExtension();
        $filename = "facility.$ext";

        // Delete old image regardless of extension
        foreach (['jpeg', 'jpg', 'png', 'gif', 'avif', 'webp'] as $oldExt) {
            $oldFile = "$folder/facility.$oldExt";
            if (Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }
        }

        // Store the new image
        $request->file('image')->storeAs($folder, $filename, 'public');


        Facility::updateOrCreate(
            ['id' => 1], // Assuming only 1 row for facility page
            ['facilities_text' => $validated['facilities_text']]
        );

        return redirect()->back()->with('success', 'Facility page updated!');
    }
}
