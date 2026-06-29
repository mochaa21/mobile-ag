<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriPrestasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_kategori' => 'required|string|max:255',
            'tingkat' => 'required|in:Fakultas,Universitas,Provinsi,Nasional,Internasional',
            'poin_skpi' => 'required|integer|min:0',
        ];
    }
}
