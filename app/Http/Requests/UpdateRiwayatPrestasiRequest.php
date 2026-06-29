<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRiwayatPrestasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'kategori_id' => 'required|exists:kategori_prestasis,id',
            'nama_kompetisi' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'status_validasi' => 'sometimes|in:Menunggu,Valid,Ditolak',
        ];
    }
}
