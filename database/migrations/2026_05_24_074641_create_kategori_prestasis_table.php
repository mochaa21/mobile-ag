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
        Schema::create('kategori_prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori'); // cth: Juara 1, Juara 2
            
            // Aturan enum disesuaikan persis dengan value di form HTML lu
            $table->enum('tingkat', ['Fakultas', 'Universitas', 'Provinsi', 'Nasional', 'Internasional']);
            
            $table->integer('poin_skpi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_prestasis');
    }
};