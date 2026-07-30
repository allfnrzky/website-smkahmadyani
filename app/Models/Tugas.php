<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'mata_pelajaran_id', 
        'pertemuan_id', 
        'judul', 
        'deskripsi', 
        'deadline'
    ];

    // Relasi ke Pertemuan (TAMBAHKAN INI)
    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id');
    }

    // Relasi ke Mata Pelajaran (Ganti nama agar sesuai dengan pemanggilan 'mapel')
    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function pengumpulans() {
        return $this->hasMany(Pengumpulan::class, 'tugas_id');
    }
}