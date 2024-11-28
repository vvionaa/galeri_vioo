<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan daftar profil
    public function index()
    {
        $profiles = Profile::all(); // Mengambil semua data profil
        return view('admin.profile.index', compact('profiles')); // Mengarahkan ke view
    }
    
    public function indexA()
    {
        $profiles = Profile::all(); // Mengambil semua data profil
        return view('profile', compact('profiles')); // Mengarahkan ke view
    }

    // Menampilkan detail profil berdasarkan ID
    public function show($id)
    {
        $profile = Profile::findOrFail($id); // Mencari data berdasarkan ID
        return view('admin.profile.show', compact('profile')); // Mengarahkan ke view
    }

    // Menampilkan halaman tambah profil
    public function create()
    {
        return view('admin.profile.create'); // View untuk form tambah
    }

    // Menyimpan data profil baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Profile::create($request->only('judul', 'isi')); // Menyimpan data

        return redirect('/profile')->with('success', 'Profil berhasil ditambahkan!');
    }

    // Menampilkan halaman edit profil
    public function edit($id)
    {
        $profile = Profile::findOrFail($id); // Mencari data untuk diedit
        return view('admin.profile.edit', compact('profile')); // Mengarahkan ke form edit
    }

    // Memperbarui data profil di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update($request->only('judul', 'isi')); // Memperbarui data

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Menghapus data profil dari database
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete(); // Menghapus data

        return redirect('/profile')->with('success', 'Profil berhasil dihapus!');
    }
}