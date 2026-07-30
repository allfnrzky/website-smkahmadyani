<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_pendaftaran')->unique();
            $table->enum('jenis_pendaftaran', ['baru', 'pindahan']);
            $table->string('nisn', 10);
            $table->string('asal_sekolah');
            $table->year('tahun_lulus', 4);
            
            // Data Pribadi Siswa
            $table->string('nama_lengkap');
            $table->string('nik', 16);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->string('alamat');
            $table->string('rtrw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('no_hp');
            $table->string('email_siswa');

            // Data Ibu
            $table->string('nama_ibu');
            $table->enum('status_ibu', ['hidup', 'meninggal']);
            $table->string('hp_ibu');
            $table->string('kerja_ibu');
            $table->string('gaji_ibu');
            $table->string('alamat_ibu');
            $table->string('desa_ibu');
            $table->string('kab_ibu');
            $table->string('ktp_ibu')->nullable();

            // Data Ayah
            $table->string('nama_ayah');
            $table->enum('status_ayah', ['hidup', 'meninggal']);
            $table->string('hp_ayah');
            $table->string('kerja_ayah');
            $table->string('gaji_ayah');
            $table->string('alamat_ayah');

            // Berkas & Jurusan
            $table->string('file_kk')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->foreignId('jurusan_1'); // Pilihan Utama
            $table->foreignId('jurusan_2'); // Pilihan Kedua
            $table->string('ukuran_seragam');
            
            $table->enum('status', ['proses', 'lulus', 'tidak_lulus'])->default('proses');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
