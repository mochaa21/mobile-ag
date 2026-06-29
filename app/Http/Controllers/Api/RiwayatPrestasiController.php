<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRiwayatPrestasiRequest;
use App\Http\Requests\UpdateRiwayatPrestasiRequest;
use App\Http\Resources\RiwayatPrestasiResource;
use App\Models\RiwayatPrestasi;

class RiwayatPrestasiController extends Controller
{
    public function index()
    {
        $riwayats = RiwayatPrestasi::with(['mahasiswa', 'kategori'])->latest()->paginate(10);
        return RiwayatPrestasiResource::collection($riwayats);
    }

    public function show(RiwayatPrestasi $riwayatPrestasi)
    {
        $riwayatPrestasi->load(['mahasiswa', 'kategori']);
        return new RiwayatPrestasiResource($riwayatPrestasi);
    }

    public function store(StoreRiwayatPrestasiRequest $request)
    {
        $riwayat = RiwayatPrestasi::create($request->validated());
        $riwayat->load(['mahasiswa', 'kategori']);
        return new RiwayatPrestasiResource($riwayat);
    }

    public function update(UpdateRiwayatPrestasiRequest $request, RiwayatPrestasi $riwayatPrestasi)
    {
        $riwayatPrestasi->update($request->validated());
        $riwayatPrestasi->load(['mahasiswa', 'kategori']);
        return new RiwayatPrestasiResource($riwayatPrestasi);
    }

    public function destroy(RiwayatPrestasi $riwayatPrestasi)
    {
        $riwayatPrestasi->delete();
        return response()->json(['message' => 'Riwayat prestasi berhasil dihapus']);
    }
}
