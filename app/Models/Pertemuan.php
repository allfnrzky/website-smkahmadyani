<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $fillable = ['mata_pelajaran_id', 'judul', 'deskripsi'];

    // Relasi ke Mata Pelajaran (TAMBAHKAN INI)
    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function materis() {
        return $this->hasMany(Materi::class, 'pertemuan_id');
    }

    public function tugas() {
        return $this->hasMany(Tugas::class, 'pertemuan_id');
    }
}