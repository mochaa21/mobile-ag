<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nim' => $this->nim,
            'nama_lengkap' => $this->nama_lengkap,
            'program_studi' => $this->program_studi,
            'semester_aktif' => $this->semester_aktif,
            'prodi' => $this->prodi,
            'semester' => $this->semester,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'riwayat_prestasis' => RiwayatPrestasiResource::collection($this->whenLoaded('riwayat_prestasis')),
        ];
    }
}
