<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('galeriPage', [GalleryController::class, 'indexA'])->name('galeri');

Route::get('/profil', [ProfileController::class, 'index'])->name('profil');

Route::get('/profilPage', [ProfileController::class, 'indexA'])->name('profilPage');

Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');

Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');

// Rute untuk halaman profil
Route::resource('profile', ProfileController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

// Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Route untuk pengunjung yang sudah login
Route::middleware('auth')->group(function(){
    // Route untuk menampilkan dashboard admin
Route::get('/admin', function(){
    return view('admin.dashboard.index', [
        'title' => 'Dashboard',
    ]);
});

// Route untuk menampilkan halaman manajemen admin
Route::get('/petugas', [PetugasController::class, 'index']);

//Route untuk menampilkan tambah admin
Route::get('/petugas/create', [PetugasController::class, 'create']);

//Route untuk menyimpan data admin yang baru
Route::post('/petugas', [PetugasController::class, 'store']);

//Route untuk menampilkan form edit admin
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit']);

//Route untuk menyimpan update admin
Route::put('/petugas/{id}', [PetugasController::class, 'update']);

//Route untuk menghapus data admin
Route::delete('/petugas/{id}', [PetugasController::class, 'destroy']);

// Route untuk logout
Route::get('/logout', [AuthController::class, 'logout']);

// Route untuk CRUD category
Route::resource('categories', CategoryController::class);

// Route untuk CRUD post
Route::resource('posts', PostController::class);

// Route untuk CRUD gallery
Route::resource('galleries', GalleryController::class);

// Route untuk menyimpan foto yang diupload
Route::post('/images/store', [ImageController::class, 'store']);

// Route untuk menghapus foto
Route::delete('/images/{id}', [ImageController::class, 'destroy']);

Route::put('/images/{id}', [ImageController::class, 'update']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

Route::get('/admin/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/admin/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('/admin/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

});