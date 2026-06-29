<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'program_studi',
        'semester_aktif',
        'prodi',
        'semester',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }

    public function riwayat_prestasis()
    {
        return $this->hasMany(RiwayatPrestasi::class, 'mahasiswa_id');
    }
}