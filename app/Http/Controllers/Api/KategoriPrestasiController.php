<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKategoriPrestasiRequest;
use App\Http\Requests\UpdateKategoriPrestasiRequest;
use App\Http\Resources\KategoriPrestasiResource;
use App\Models\KategoriPrestasi;

class KategoriPrestasiController extends Controller
{
    public function index()
    {
        $kategoris = KategoriPrestasi::with('riwayat_prestasis')->latest()->paginate(10);
        return KategoriPrestasiResource::collection($kategoris);
    }

    public function show(KategoriPrestasi $kategoriPrestasi)
    {
        $kategoriPrestasi->load('riwayat_prestasis');
        return new KategoriPrestasiResource($kategoriPrestasi);
    }

    public function store(StoreKategoriPrestasiRequest $request)
    {
        $kategori = KategoriPrestasi::create($request->validated());
        return new KategoriPrestasiResource($kategori);
    }

    public function update(UpdateKategoriPrestasiRequest $request, KategoriPrestasi $kategoriPrestasi)
    {
        $kategoriPrestasi->update($request->validated());
        $kategoriPrestasi->load('riwayat_prestasis');
        return new KategoriPrestasiResource($kategoriPrestasi);
    }

    public function destroy(KategoriPrestasi $kategoriPrestasi)
    {
        $kategoriPrestasi->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
