<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan'; // Sesuaikan dengan nama tabel di migrasi

    protected $fillable = [
        'tugas_id',
        'siswa_id',
        'file_path',
        'nilai'
    ];

    // Relasi ke User (Siswa)
    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    // Relasi ke Tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}