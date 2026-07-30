<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->text('alasan_jurusan_1')->nullable()->after('jurusan_2');
            $table->text('alasan_jurusan_2')->nullable()->after('alasan_jurusan_1');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn(['alasan_jurusan_1', 'alasan_jurusan_2']);
        });
    }
};
