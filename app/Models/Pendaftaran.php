<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    // Ini untuk mengizinkan input data
    protected $fillable = [
        'user_id', 'no_pendaftaran', 'jenis_pendaftaran', 'nisn', 'asal_sekolah', 'tahun_lulus',
        'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jk', 'alamat', 'rtrw', 'desa', 
        'kecamatan', 'kabupaten', 'no_hp', 'email_siswa',
        'nama_ibu', 'status_ibu', 'hp_ibu', 'kerja_ibu', 'gaji_ibu', 'alamat_ibu', 'desa_ibu', 'kab_ibu', 'ktp_ibu',
        'nama_ayah', 'status_ayah', 'hp_ayah', 'kerja_ayah', 'gaji_ayah', 'alamat_ayah', 'ktp_ayah',
        'file_kk', 'file_ijazah', 'jurusan_1', 'jurusan_2', 'ukuran_seragam','jurusan_diterima', 'status', 'catatan_admin',
        'alasan_jurusan_1', 'alasan_jurusan_2'
    ];



    // Relasi ke User (Siswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Program Keahlian
    public function programKeahlian1() {
        return $this->belongsTo(ProgramKeahlian::class, 'jurusan_1');
    }

    // Relasi ke Program Keahlian 2
    public function programKeahlian2() {
    return $this->belongsTo(ProgramKeahlian::class, 'jurusan_2');
    }

    public function jurusanDiterima() {
    return $this->belongsTo(ProgramKeahlian::class, 'jurusan_diterima');
    }
}