<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryImages = Gallery::simplePaginate(6);
        return view('gallery.index', ['galleryImages' => $galleryImages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,avif|max:2048'
        ]);

        // Save to DB
        Gallery::create([
            'image_path' => $request->file('image') // Mutator handles storage
        ]);

        return response()->json(['success' => true]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $galleryImage = Gallery::findOrFail($id);

        return view('gallery.show', compact('galleryImage'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Get the real stored path from DB without accessor
        $path = $gallery->getRawOriginal('image_path');

        // Delete file if it exists
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        // Delete DB record
        $gallery->delete();

        return redirect('/gallery')->with('success', 'Image deleted successfully.');
    }
}
