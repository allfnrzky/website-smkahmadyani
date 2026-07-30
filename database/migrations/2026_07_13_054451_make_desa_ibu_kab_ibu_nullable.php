<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftarans', function ($table) {
            $table->string('desa_ibu')->nullable()->change();
            $table->string('kab_ibu')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function ($table) {
            $table->string('desa_ibu')->nullable(false)->change();
            $table->string('kab_ibu')->nullable(false)->change();
        });
    }
};
