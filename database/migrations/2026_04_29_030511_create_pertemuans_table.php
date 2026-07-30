<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onDelete('cascade');
            $table->string('judul'); 
            $table->timestamps();
        });
        // Tambah link di tabel lama
        Schema::table('materi', function (Blueprint $table) { $table->foreignId('pertemuan_id')->nullable()->constrained('pertemuans'); });
        Schema::table('tugas', function (Blueprint $table) { $table->foreignId('pertemuan_id')->nullable()->constrained('pertemuans'); });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertemuans');
    }
};
