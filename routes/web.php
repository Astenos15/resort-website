<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/storage/{path}', function ($path) {
    $filePath = 'public/' . $path; // maps to storage/app/public

    if (!Storage::exists($filePath)) {
        abort(404);
    }

    $lastModified = Storage::lastModified($filePath);
    $etag = md5($filePath . $lastModified);

    // Handle browser cache
    if (
        request()->header('If-None-Match') === $etag ||
        strtotime(request()->header('If-Modified-Since')) === $lastModified
    ) {
        return response()->noContent(304);
    }

    $mimeType = Storage::mimeType($filePath);
    $fileContent = Storage::get($filePath);

    return response($fileContent, 200)
        ->header('Content-Type', $mimeType)
        ->header('Cache-Control', 'public, max-age=31536000') // 1 year cache
        ->header('ETag', $etag)
        ->header('Last-Modified', gmdate('D, d M Y H:i:s', $lastModified) . ' GMT');
})->where('path', '.*');

// Homepage
Route::get('/', [HomeController::class, 'index']);
Route::get('/home/edit', [HomeController::class, 'edit']);
Route::put('/home', [HomeController::class, 'update']);

// Facility
Route::get('/facilities', [FacilityController::class, 'index']);
Route::get('/facilities/edit', [FacilityController::class, 'edit']);
Route::put('/facilities', [FacilityController::class, 'update']);

// Gallery
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/create', [GalleryController::class, 'create']);
Route::post('/gallery', [GalleryController::class, 'store']);
Route::get('/gallery/{id}', [GalleryController::class, 'show']);
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);


// Rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/create', [RoomController::class, 'create']);
Route::post('/rooms', [RoomController::class, 'store']);
Route::get('/rooms/edit/{id}', [RoomController::class, 'edit']);
Route::get('/rooms/{id}', [RoomController::class, 'show']);
Route::put('/rooms/{id}', [RoomController::class, 'update']);
Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);


// Contact
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/edit', [ContactController::class, 'edit']);
Route::put('/contacts', [ContactController::class, 'update']);
