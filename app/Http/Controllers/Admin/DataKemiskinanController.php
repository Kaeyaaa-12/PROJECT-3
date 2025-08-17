<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KemiskinanKecamatan;
use Illuminate\Http\Request;

class DataKemiskinanController extends Controller
{
    /**
     * Menampilkan daftar data kemiskinan.
     */
    public function index()
    {
        $dataKemiskinan = KemiskinanKecamatan::orderBy('kecamatan')->get();
        return view('admin.data_kemiskinan.index', compact('dataKemiskinan'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('admin.data_kemiskinan.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:kemiskinan_kecamatans,kecamatan',
            'persentase_kemiskinan' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        KemiskinanKecamatan::create($request->all());

        return redirect()->route('admin.data_kemiskinan.index')
                         ->with('success', 'Data kemiskinan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(KemiskinanKecamatan $data_kemiskinan)
    {
        return view('admin.data_kemiskinan.edit', compact('data_kemiskinan'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, KemiskinanKecamatan $data_kemiskinan)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:kemiskinan_kecamatans,kecamatan,' . $data_kemiskinan->id,
            'persentase_kemiskinan' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        $data_kemiskinan->update($request->all());

        return redirect()->route('admin.data_kemiskinan.index')
                         ->with('success', 'Data kemiskinan berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(KemiskinanKecamatan $data_kemiskinan)
    {
        $data_kemiskinan->delete();

        return redirect()->route('admin.data_kemiskinan.index')
                         ->with('success', 'Data kemiskinan berhasil dihapus.');
    }
}
