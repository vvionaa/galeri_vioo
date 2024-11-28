<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::with('category', 'petugas')->get(); // Menyertakan relasi kategori dan petugas
        return response()->json($posts);
    }

    // Menampilkan post berdasarkan ID
    public function show($id)
    {
        $post = Post::with('category', 'petugas')->find($id);
        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'petugas_id' => 'required|exists:petugas,id',
            'status' => 'required|string|max:50',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'petugas_id' => $request->petugas_id,
            'status' => $request->status,
        ]);

        return response()->json($post, 201);
    }

    // Mengupdate post
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'petugas_id' => 'required|exists:petugas,id',
            'status' => 'required|string|max:50',
        ]);

        $post->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'petugas_id' => $request->petugas_id,
            'status' => $request->status,
        ]);

        return response()->json($post);
    }

    // Menghapus post
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post successfully deleted']);
    }
}

