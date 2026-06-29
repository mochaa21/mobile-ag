<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            // Menambahkan kolom prodi dan semester, diset nullable agar data yang lama tidak error
            $table->string('prodi')->nullable()->after('nim');
            $table->string('semester')->nullable()->after('prodi');
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn(['prodi', 'semester']);
        });
    }
};