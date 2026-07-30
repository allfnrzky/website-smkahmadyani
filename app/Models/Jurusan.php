<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'program_keahlians';
    protected $fillable = ['nama', 'kuota'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'jurusan_id');
    }
}
