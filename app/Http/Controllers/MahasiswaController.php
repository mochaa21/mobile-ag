<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $data = Mahasiswa::all();
        return view('data-mahasiswa', compact('data'));
    }

    public function create() {
        return view('tambah-mahasiswa');
    }

    public function store(Request $request) {
        Mahasiswa::create($request->all());
        return redirect()->route('data-mahasiswa');
    }

    public function edit($id) {
        $data = Mahasiswa::find($id);
        return view('edit-mahasiswa', compact('data'));
    }

    public function update(Request $request, $id) {
        Mahasiswa::find($id)->update($request->all());
        return redirect()->route('data-mahasiswa');
    }

    public function destroy($id) {
        Mahasiswa::destroy($id);
        return redirect()->route('data-mahasiswa');
    }
}