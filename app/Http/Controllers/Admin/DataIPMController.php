<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IpmKecamatan;
use Illuminate\Http\Request;

class DataIPMController extends Controller
{
    /**
     * Menampilkan daftar data IPM.
     */
    public function index()
    {
        $dataIpm = IpmKecamatan::orderBy('kecamatan')->get();
        return view('admin.data_ipm.index', compact('dataIpm'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('admin.data_ipm.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:ipm_kecamatans,kecamatan',
            'skor_ipm' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        IpmKecamatan::create($request->all());

        return redirect()->route('admin.data_ipm.index')
                         ->with('success', 'Data IPM berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(IpmKecamatan $data_ipm)
    {
        return view('admin.data_ipm.edit', compact('data_ipm'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, IpmKecamatan $data_ipm)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:ipm_kecamatans,kecamatan,' . $data_ipm->id,
            'skor_ipm' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        $data_ipm->update($request->all());

        return redirect()->route('admin.data_ipm.index')
                         ->with('success', 'Data IPM berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(IpmKecamatan $data_ipm)
    {
        $data_ipm->delete();

        return redirect()->route('admin.data_ipm.index')
                         ->with('success', 'Data IPM berhasil dihapus.');
    }
}
