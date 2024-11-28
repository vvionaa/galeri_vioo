<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    // Menampilkan semua image
    public function index()
    {
        $images = Image::with('gallery')->get(); // Menyertakan relasi gallery
        return response()->json($images);
    }

    // Menampilkan image berdasarkan ID
    public function show($id)
    {
        $image = Image::with('gallery')->find($id);
        if ($image) {
            return response()->json($image);
        } else {
            return response()->json(['message' => 'Image not found'], 404);
        }
    }

    // Menyimpan image baru
    public function store(Request $request)
    {
        $request->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'file' => 'required|string',
            'title' => 'required|string|max:255',
        ]);

        $image = Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $request->file,
            'title' => $request->title,
        ]);

        return response()->json($image, 201);
    }

    // Mengupdate image
    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $request->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'file' => 'required|string',
            'title' => 'required|string|max:255',
        ]);

        $image->update([
            'gallery_id' => $request->gallery_id,
            'file' => $request->file,
            'title' => $request->title,
        ]);

        return response()->json($image);
    }

    // Menghapus image
    public function destroy($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $image->delete();
        return response()->json(['message' => 'Image successfully deleted']);
    }
}

