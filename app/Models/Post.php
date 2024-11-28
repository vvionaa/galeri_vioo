<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Mendifiniskan field yang boleh di isi
    protected $fillable = ['title', 'content', 'category_id', 'petugas_id', 'status'];

    // Relasi Post ke Category (One to One)
    public function category()
    {
        return$this->belongsTo(Category::class);
    }

    // Relasi Post ke Petugas
    public function petugas(){
        return $this->belongsTo(Petugas::class);
    }

    // Relasi ke Gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}