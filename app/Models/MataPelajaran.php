<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran'; // Sesuaikan dengan nama tabel di migrasi
    protected $fillable = ['kelas_id', 'guru_id', 'nama'];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}