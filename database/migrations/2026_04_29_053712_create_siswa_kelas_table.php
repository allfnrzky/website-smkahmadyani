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
        Schema::create('siswa_kelas', function (Blueprint $table) {
            $table->id();
            // foreignId harus sinkron dengan tabel users (siswa)
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade');
            // foreignId harus sinkron dengan tabel kelas
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_kelas');
    }
};
