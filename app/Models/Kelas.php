<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kelas extends Model
{
    protected $fillable = ['nama', 'jurusan_id', 'token', 'token_expired_at'];

    protected static function booted()
    {
        static::creating(function ($kelas) {
            // Generate token random 6 karakter unik
            $kelas->token = strtoupper(Str::random(6));
            // Set expired dalam 7 hari kedepan
            $kelas->token_expired_at = now()->addDays(7);
        });
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }
}