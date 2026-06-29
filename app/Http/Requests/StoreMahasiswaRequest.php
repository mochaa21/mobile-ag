<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'nama_lengkap' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'semester_aktif' => 'required|integer|min:1|max:15',
            'prodi' => 'nullable|string|max:255',
            'semester' => 'nullable|string|max:10',
        ];
    }
}
