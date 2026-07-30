<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Tambahkan baris ini
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'user_id'
    ];

    // Relasi ke User (Penulis berita)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}