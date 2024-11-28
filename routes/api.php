<?php


use App\Http\Controllers\Api\PetugasController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Daftar API resource routes
Route::apiResource('petugas', PetugasController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('post', PostController::class);
Route::apiResource('galery', GalleryController::class);
Route::apiResource('image', ImageController::class);
Route::apiResource('profile', ProfileController::class);

// Route untuk mendapatkan data user, membutuhkan autentikasi Sanctum
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

