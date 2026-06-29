<?php

namespace App\Http\Controllers;

use App\Models\KategoriPrestasi;
use Illuminate\Http\Request;

class KategoriPrestasiController extends Controller
{
    public function index() {
        $data = KategoriPrestasi::all();
        return view('data-kategori', compact('data'));
    }

    public function create() {
        return view('tambah-kategori');
    }

    public function store(Request $request) {
        KategoriPrestasi::create($request->all());
        return redirect()->route('data-kategori');
    }

    public function edit($id) {
        $data = KategoriPrestasi::find($id);
        return view('edit-kategori', compact('data'));
    }

    public function update(Request $request, $id) {
        KategoriPrestasi::find($id)->update($request->all());
        return redirect()->route('data-kategori');
    }

    public function destroy($id) {
        KategoriPrestasi::destroy($id);
        return redirect()->route('data-kategori');
    }
}