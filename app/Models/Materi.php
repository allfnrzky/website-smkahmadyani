<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    // Nama tabel di database
    protected $table = 'materi';

    protected $fillable = [
        'mata_pelajaran_id',
        'judul',
        'konten',
        'file_path'
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}
