<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EkonomiKecamatan;
use Illuminate\Http\Request;

class DataEkonomiController extends Controller
{
    /**
     * Menampilkan daftar data ekonomi.
     */
    public function index()
    {
        $dataEkonomi = EkonomiKecamatan::orderBy('kecamatan')->get();
        return view('admin.data_ekonomi.index', compact('dataEkonomi'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('admin.data_ekonomi.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:ekonomi_kecamatans,kecamatan',
            'pdrb_miliar' => 'required|numeric|min:0',
            'laju_pertumbuhan' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        EkonomiKecamatan::create($request->all());

        return redirect()->route('admin.data_ekonomi.index')
                         ->with('success', 'Data ekonomi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(EkonomiKecamatan $data_ekonomi)
    {
        return view('admin.data_ekonomi.edit', compact('data_ekonomi'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, EkonomiKecamatan $data_ekonomi)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:ekonomi_kecamatans,kecamatan,' . $data_ekonomi->id,
            'pdrb_miliar' => 'required|numeric|min:0',
            'laju_pertumbuhan' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        $data_ekonomi->update($request->all());

        return redirect()->route('admin.data_ekonomi.index')
                         ->with('success', 'Data ekonomi berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(EkonomiKecamatan $data_ekonomi)
    {
        $data_ekonomi->delete();

        return redirect()->route('admin.data_ekonomi.index')
                         ->with('success', 'Data ekonomi berhasil dihapus.');
    }
}
