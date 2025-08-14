<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::first();
        return view('home.index', ['home' => $home]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $home = Home::first();

        return view('home.edit', [
            'home' => $home
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,avif,webp|max:2048',
            'hero_text' => 'required|string'
        ]);

        $folder = 'home';
        $ext = $request->file('image')->getClientOriginalExtension();
        $filename = "home.$ext";

        // Delete old image regardless of extension
        foreach (['jpeg', 'jpg', 'png', 'gif', 'avif', 'webp'] as $oldExt) {
            $oldFile = "$folder/home.$oldExt";
            if (Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }
        }

        // Store the new image
        $request->file('image')->storeAs($folder, $filename, 'public');

        // Update hero text (no need to store image path if always 1 image)
        Home::updateOrCreate(
            ['id' => 1], // Assuming only 1 row for homepage
            ['hero_text' => $validated['hero_text']]
        );

        return redirect()->back()->with('success', 'Homepage updated!');
    }
}
