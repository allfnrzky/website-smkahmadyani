<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tugas', function (Blueprint $table) {
            $table->dropForeign(['pertemuan_id']);
            $table->foreign('pertemuan_id')->references('id')->on('pertemuans')->onDelete('set null');
        });

        Schema::table('materi', function (Blueprint $table) {
            $table->dropForeign(['pertemuan_id']);
            $table->foreign('pertemuan_id')->references('id')->on('pertemuans')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tugas', function (Blueprint $table) {
            $table->dropForeign(['pertemuan_id']);
            $table->foreign('pertemuan_id')->references('id')->on('pertemuans');
        });

        Schema::table('materi', function (Blueprint $table) {
            $table->dropForeign(['pertemuan_id']);
            $table->foreign('pertemuan_id')->references('id')->on('pertemuans');
        });
    }
};
