<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('contact.index', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $contact = Contact::first();
        return view('contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,avif,webp|max:2048',
            'booking_text' => 'required|string',
            'directions_text' => 'required|string'
        ]);

        $folder = 'contact';
        $ext = $request->file('image')->getClientOriginalExtension();
        $filename = "contact.$ext";

        // Delete old image regardless of extension
        foreach (['jpeg', 'jpg', 'png', 'gif', 'avif', 'webp'] as $oldExt) {
            $oldFile = "$folder/contact.$oldExt";
            if (Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }
        }

        // Store the new image
        $request->file('image')->storeAs($folder, $filename, 'public');

        Contact::updateOrCreate(
            ['id' => 1], // Find the record
            [
                'booking_text' => $validated['booking_text'],
                'directions_text' => $validated['directions_text'],
            ]
        );

        return redirect()->back()->with('success', 'Contact page updated!');
    }
}
