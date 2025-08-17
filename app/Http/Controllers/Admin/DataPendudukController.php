<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendudukKecamatan;
use Illuminate\Http\Request;

class DataPendudukController extends Controller
{
    /**
     * Menampilkan daftar data penduduk.
     */
    public function index()
    {
        $dataPenduduk = PendudukKecamatan::orderBy('kecamatan')->get();
        return view('admin.data_penduduk.index', compact('dataPenduduk'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('admin.data_penduduk.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:penduduk_kecamatans,kecamatan',
            'jumlah_penduduk' => 'required|integer|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        PendudukKecamatan::create($request->all());

        return redirect()->route('admin.data_penduduk.index')
                         ->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(PendudukKecamatan $data_penduduk)
    {
        return view('admin.data_penduduk.edit', compact('data_penduduk'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, PendudukKecamatan $data_penduduk)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:penduduk_kecamatans,kecamatan,' . $data_penduduk->id,
            'jumlah_penduduk' => 'required|integer|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        $data_penduduk->update($request->all());

        return redirect()->route('admin.data_penduduk.index')
                         ->with('success', 'Data penduduk berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(PendudukKecamatan $data_penduduk)
    {
        $data_penduduk->delete();

        return redirect()->route('admin.data_penduduk.index')
                         ->with('success', 'Data penduduk berhasil dihapus.');
    }
}
