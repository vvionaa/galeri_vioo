<?php

namespace App\Http\Controllers\Api;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // Menampilkan semua data petugas
    public function index()
    {
        $petugas = Petugas::all();
        return response()->json($petugas);
    }

    // Menampilkan petugas berdasarkan ID
    public function show($id)
    {
        $petugas = Petugas::find($id);
        if ($petugas) {
            return response()->json($petugas);
        } else {
            return response()->json(['message' => 'Petugas not found'], 404);
        }
    }

    // Menyimpan data petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email',
            'password' => 'required|string|min:6',
        ]);

        $petugas = new Petugas();
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = Hash::make($request->password);
        $petugas->save();

        return response()->json($petugas, 201);
    }

    // Mengupdate data petugas
    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return response()->json(['message' => 'Petugas not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $petugas->name = $request->name;
        $petugas->email = $request->email;
        if ($request->password) {
            $petugas->password = Hash::make($request->password);
        }
        $petugas->save();

        return response()->json($petugas);
    }

    // Menghapus data petugas
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return response()->json(['message' => 'Petugas not found'], 404);
        }

        $petugas->delete();
        return response()->json(['message' => 'Petugas deleted successfully']);
    }
}

