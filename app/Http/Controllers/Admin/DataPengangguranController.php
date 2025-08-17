<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengangguranKecamatan;
use Illuminate\Http\Request;

class DataPengangguranController extends Controller
{
    /**
     * Menampilkan daftar data pengangguran.
     */
    public function index()
    {
        $dataPengangguran = PengangguranKecamatan::orderBy('kecamatan')->get();
        return view('admin.data_pengangguran.index', compact('dataPengangguran'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('admin.data_pengangguran.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:pengangguran_kecamatans,kecamatan',
            'persentase_pengangguran' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        PengangguranKecamatan::create($request->all());

        return redirect()->route('admin.data_pengangguran.index')
                         ->with('success', 'Data pengangguran berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(PengangguranKecamatan $data_pengangguran)
    {
        return view('admin.data_pengangguran.edit', compact('data_pengangguran'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, PengangguranKecamatan $data_pengangguran)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:pengangguran_kecamatans,kecamatan,' . $data_pengangguran->id,
            'persentase_pengangguran' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        $data_pengangguran->update($request->all());

        return redirect()->route('admin.data_pengangguran.index')
                         ->with('success', 'Data pengangguran berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(PengangguranKecamatan $data_pengangguran)
    {
        $data_pengangguran->delete();

        return redirect()->route('admin.data_pengangguran.index')
                         ->with('success', 'Data pengangguran berhasil dihapus.');
    }
}
