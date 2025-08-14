<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('room.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,avif,webp|max:2048',
            'title' => 'required|string',
            'price' => 'required|string',
            'inclusions' => 'required|string',
            'details' => 'required|string',
        ]);

        // Save to DB
        Room::create(array_merge($validated, [
            'image_path' => $request->file('image'), // Mutator handles storage
        ]));

        return redirect()->back()->with('success', 'Room is successfully added!');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('room.show', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('room.edit', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validate inputs
        $validated = $request->validate([
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,avif,webp|max:2048',
            'title' => 'required|string',
            'price' => 'required|string',
            'inclusions' => 'required|string',
            'details' => 'required|string',
        ]);

        // 2. Find the model
        $room = Room::findOrFail($id);

        // 3. Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $path = $room->getRawOriginal('image_path');
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            // Store new image
            $newPath = $request->file('image')->store('room', 'public');
            $validated['image_path'] = $newPath; // ✅ correct key for DB
        }

        // 4. Update record
        $room->update($validated);

        return redirect()->back()->with('success', 'Room updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        // Get the real stored path from DB without accessor
        $path = $room->getRawOriginal('image_path');

        // Delete file if it exists
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        // Delete DB record
        $room->delete();

        return redirect('/rooms');
    }
}
