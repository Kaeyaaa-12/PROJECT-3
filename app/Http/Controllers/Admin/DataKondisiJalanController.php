<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KondisiJalan;
use Illuminate\Http\Request;

class DataKondisiJalanController extends Controller
{
    public function index()
    {
        $dataKondisiJalan = KondisiJalan::orderBy('tahun', 'desc')->get();
        return view('admin.data_kondisi_jalan.index', compact('dataKondisiJalan'));
    }

    public function create()
    {
        return view('admin.data_kondisi_jalan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:kondisi_jalans,tahun',
            'baik' => 'required|numeric|min:0|max:100',
            'sedang' => 'required|numeric|min:0|max:100',
            'rusak_ringan' => 'required|numeric|min:0|max:100',
            'rusak_berat' => 'required|numeric|min:0|max:100',
        ]);

        KondisiJalan::create($request->all());

        return redirect()->route('admin.data_kondisi_jalan.index')
                         ->with('success', 'Data kondisi jalan berhasil ditambahkan.');
    }

    public function edit(KondisiJalan $data_kondisi_jalan)
    {
        return view('admin.data_kondisi_jalan.edit', compact('data_kondisi_jalan'));
    }

    public function update(Request $request, KondisiJalan $data_kondisi_jalan)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:kondisi_jalans,tahun,' . $data_kondisi_jalan->id,
            'baik' => 'required|numeric|min:0|max:100',
            'sedang' => 'required|numeric|min:0|max:100',
            'rusak_ringan' => 'required|numeric|min:0|max:100',
            'rusak_berat' => 'required|numeric|min:0|max:100',
        ]);

        $data_kondisi_jalan->update($request->all());

        return redirect()->route('admin.data_kondisi_jalan.index')
                         ->with('success', 'Data kondisi jalan berhasil diperbarui.');
    }

    public function destroy(KondisiJalan $data_kondisi_jalan)
    {
        $data_kondisi_jalan->delete();

        return redirect()->route('admin.data_kondisi_jalan.index')
                         ->with('success', 'Data kondisi jalan berhasil dihapus.');
    }
}