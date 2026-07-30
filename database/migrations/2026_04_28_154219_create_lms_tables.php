<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('jurusan_id')->constrained('program_keahlians')->onDelete('cascade');
            $table->string('token')->unique();
            $table->dateTime('token_expired_at');
            $table->timestamps();
        });

        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->dateTime('deadline');
            $table->timestamps();
        });

        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onDelete('cascade');
            $table->string('judul');
            $table->text('konten')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });

        Schema::create('pengumpulan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->constrained('tugas')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade');
            $table->string('file_path');
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan');
        Schema::dropIfExists('tugas');
        Schema::dropIfExists('materi');
        Schema::dropIfExists('mata_pelajaran');
        Schema::dropIfExists('kelas');
    }
};
