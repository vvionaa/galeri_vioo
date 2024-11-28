<?php

namespace App\Http\Controllers;

use App\Models\Image; // Pastikan spasi setelah use
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengarahkan ke view home tanpa data tambahan
        return view('home');
    }

    /**
     * Tampilkan galeri gambar.
     *
     * @return \Illuminate\View\View
     */
    public function galeri()
    {
        // Ambil semua data galeri dari database
        $images = Image::all();

        // Kirim data ke view galeri
        return view('galeri', ['images' => $images]);
    }

    /**
     * Tampilkan agenda berdasarkan kategori tertentu.
     *
     * @return \Illuminate\View\View
     */
    public function agenda()
    {
        // Ambil semua data dari tabel posts dengan category_id = 2
        $posts = Post::where('category_id', 3)->get();

        // Kirim data ke view agenda
        return view('agenda', ['posts' => $posts]);
    }

    /**
     * Tampilkan informasi berdasarkan kategori tertentu.
     *
     * @return \Illuminate\View\View
     */
    public function informasi()
    {
        // Ambil posts yang memiliki category_id = 10
        $posts = Post::where('category_id', 2)->get();

        // Kirim data ke view
        return view('informasi', compact('posts'));
    }
}