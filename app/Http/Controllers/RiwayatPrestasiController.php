<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\KategoriPrestasi;
use App\Models\RiwayatPrestasi;
use Illuminate\Http\Request;

class RiwayatPrestasiController extends Controller
{
    public function index() {
        $data = RiwayatPrestasi::with(['mahasiswa', 'kategori'])->latest()->get();
        return view('data-riwayat', compact('data'));
    }

    public function create() {
        $mahasiswas = Mahasiswa::all();
        $kategoris = KategoriPrestasi::all();
        return view('tambah-riwayat', compact('mahasiswas', 'kategoris'));
    }

    public function store(Request $request) {
        RiwayatPrestasi::create($request->all());
        return redirect()->route('data-riwayat');
    }

    public function validasi($id, $status) {
        $riwayat = RiwayatPrestasi::find($id);
        if($riwayat) {
            $riwayat->update(['status_validasi' => $status]);
        }
        return redirect()->route('data-riwayat');
    }

    public function destroy($id) {
        RiwayatPrestasi::destroy($id);
        return redirect()->route('data-riwayat');
    }
}