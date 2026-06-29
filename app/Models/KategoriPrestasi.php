<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPrestasi extends Model
{
    protected $fillable = ['nama_kategori', 'tingkat', 'poin_skpi'];

    public function riwayat_prestasis()
    {
        return $this->hasMany(RiwayatPrestasi::class, 'kategori_id');
    }
}
