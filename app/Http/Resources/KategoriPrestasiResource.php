<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KategoriPrestasiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_kategori' => $this->nama_kategori,
            'tingkat' => $this->tingkat,
            'poin_skpi' => $this->poin_skpi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'riwayat_prestasis' => RiwayatPrestasiResource::collection($this->whenLoaded('riwayat_prestasis')),
        ];
    }
}
