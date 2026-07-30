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
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Tambahkan kolom ini
            $table->unsignedBigInteger('jurusan_diterima')->nullable()->after('jurusan_2');
            
            // Opsional: hubungkan sebagai foreign key ke tabel program_keahlians
            $table->foreign('jurusan_diterima')->references('id')->on('program_keahlians');
        });
    }

    public function down() {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropForeign(['jurusan_diterima']);
            $table->dropColumn('jurusan_diterima');
        });
    }
};
