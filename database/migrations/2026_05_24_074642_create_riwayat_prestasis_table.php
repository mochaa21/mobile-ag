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
        Schema::create('riwayat_prestasis', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('kategori_id');
            
            $table->string('nama_kompetisi');
            $table->string('penyelenggara');
            $table->date('tanggal_kegiatan');
            $table->enum('status_validasi', ['Menunggu', 'Valid', 'Ditolak'])->default('Menunggu');
            $table->timestamps();

            // Aturan Relasi
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_prestasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_prestasis');
    }
};
