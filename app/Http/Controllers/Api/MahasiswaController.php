<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('riwayat_prestasis')->latest()->paginate(10);
        return MahasiswaResource::collection($mahasiswas);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('riwayat_prestasis');
        return new MahasiswaResource($mahasiswa);
    }

    public function store(StoreMahasiswaRequest $request)
    {
        $mahasiswa = Mahasiswa::create($request->validated());
        return new MahasiswaResource($mahasiswa);
    }

    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->validated());
        $mahasiswa->load('riwayat_prestasis');
        return new MahasiswaResource($mahasiswa);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa berhasil dihapus']);
    }
}
