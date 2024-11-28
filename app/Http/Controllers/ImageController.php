<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Store a newly created image in storage.
     */
    public function store(Request $request)
    {
        // Validasi data request
        $request->validate([
            'gallery_id' => 'required|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required|string|max:255',
        ]);

        // Ambil file yang diupload
        $file = $request->file('file');

        // Generate nama file
        $fileName = time() . '-' . $file->getClientOriginalName();

        // Pindahkan file ke folder public/images
        $file->move(public_path('images'), $fileName);

        // Simpan data ke database
        Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $fileName,
            'title' => $request->title,
        ]);

        // Redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil ditambahkan.');
    }

    /**
     * Update the specified image in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data request
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
        ]);

        // Cari data image berdasarkan ID
        $image = Image::findOrFail($id);

        // Update judul
        $image->title = $request->title;

        // Jika ada file baru yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama dari folder public/images
            if ($image->file && file_exists(public_path('images/' . $image->file))) {
                unlink(public_path('images/' . $image->file));
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);

            // Update nama file di database
            $image->file = $fileName;
        }

        // Simpan perubahan ke database
        $image->save();

        // Redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Remove the specified image from storage.
     */
    public function destroy($id)
    {
        // Cari data image berdasarkan ID
        $image = Image::findOrFail($id);

        // Hapus file dari folder public/images
        if ($image->file && file_exists(public_path('images/' . $image->file))) {
            unlink(public_path('images/' . $image->file));
        }

        // Hapus data dari database
        $image->delete();

        // Redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
