<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LajuInflasi;
use Illuminate\Http\Request;

class DataLajuInflasiController extends Controller
{
    public function index()
    {
        $dataInflasi = LajuInflasi::orderBy('tahun', 'desc')->get();
        return view('admin.data_laju_inflasi.index', compact('dataInflasi'));
    }

    public function create()
    {
        return view('admin.data_laju_inflasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:laju_inflasi,tahun',
            'persentase' => 'required|numeric|min:0',
        ]);

        LajuInflasi::create($request->all());

        return redirect()->route('admin.data_laju_inflasi.index')
                         ->with('success', 'Data Laju Inflasi Tahunan berhasil ditambahkan.');
    }

    public function edit(LajuInflasi $data_laju_inflasi)
    {
        return view('admin.data_laju_inflasi.edit', compact('data_laju_inflasi'));
    }

    public function update(Request $request, LajuInflasi $data_laju_inflasi)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:laju_inflasi,tahun,' . $data_laju_inflasi->id,
            'persentase' => 'required|numeric|min:0',
        ]);

        $data_laju_inflasi->update($request->all());

        return redirect()->route('admin.data_laju_inflasi.index')
                         ->with('success', 'Data Laju Inflasi Tahunan berhasil diperbarui.');
    }

    public function destroy(LajuInflasi $data_laju_inflasi)
    {
        $data_laju_inflasi->delete();

        return redirect()->route('admin.data_laju_inflasi.index')
                         ->with('success', 'Data Laju Inflasi Tahunan berhasil dihapus.');
    }
}
