<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RiwayatPrestasiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'mahasiswa_id' => $this->mahasiswa_id,
            'kategori_id' => $this->kategori_id,
            'nama_kompetisi' => $this->nama_kompetisi,
            'penyelenggara' => $this->penyelenggara,
            'tanggal_kegiatan' => $this->tanggal_kegiatan,
            'status_validasi' => $this->status_validasi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'mahasiswa' => new MahasiswaResource($this->whenLoaded('mahasiswa')),
            'kategori' => new KategoriPrestasiResource($this->whenLoaded('kategori')),
        ];
    }
}
