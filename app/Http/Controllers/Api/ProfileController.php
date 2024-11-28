<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // Menampilkan semua profil
    public function index()
    {
        $profiles = Profile::all();
        return response()->json($profiles);
    }

    // Menampilkan profil berdasarkan ID
    public function show($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            return response()->json($profile);
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }

    // Menyimpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $profile = Profile::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return response()->json($profile, 201);
    }

    // Mengupdate profil
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $profile->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return response()->json($profile);
    }

    // Menghapus profil
    public function destroy($id)
    {
        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile->delete();
        return response()->json(['message' => 'Profile successfully deleted']);
    }
}

