<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    // Menampilkan semua gallery
    public function index()
    {
        $galleries = Gallery::with('post')->get(); // Menyertakan relasi post
        return response()->json($galleries);
    }

    // Menampilkan gallery berdasarkan ID
    public function show($id)
    {
        $gallery = Gallery::with('post')->find($id);
        if ($gallery) {
            return response()->json($gallery);
        } else {
            return response()->json(['message' => 'Gallery not found'], 404);
        }
    }

    // Menyimpan gallery baru
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $gallery = Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json($gallery, 201);
    }

    // Mengupdate gallery
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $gallery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json($gallery);
    }

    // Menghapus gallery
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $gallery->delete();
        return response()->json(['message' => 'Gallery successfully deleted']);
    }
}

