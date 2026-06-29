<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPrestasi extends Model
{
    protected $fillable = [
        'mahasiswa_id', 'kategori_id', 'nama_kompetisi', 
        'penyelenggara', 'tanggal_kegiatan', 'status_validasi'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPrestasi::class, 'kategori_id');
    }
}
