<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nim',
        'program_studi',
        'semester_aktif'
    ];

    public function riwayat_prestasis()
    {
        return $this->hasMany(RiwayatPrestasi::class);
    }
}