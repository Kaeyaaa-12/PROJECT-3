<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PdrbSektorUsaha;
use Illuminate\Http\Request;

class DataPdrbSektorUsahaController extends Controller
{
    public function index()
    {
        $dataPdrb = PdrbSektorUsaha::orderBy('tahun', 'desc')->get();
        return view('admin.data_pdrb_sektor_usaha.index', compact('dataPdrb'));
    }

    public function create()
    {
        return view('admin.data_pdrb_sektor_usaha.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:pdrb_sektor_usaha,tahun',
            'pertanian' => 'required|numeric|min:0|max:100',
            'industri' => 'required|numeric|min:0|max:100',
            'perdagangan' => 'required|numeric|min:0|max:100',
            'konstruksi' => 'required|numeric|min:0|max:100',
            'jasa' => 'required|numeric|min:0|max:100',
        ]);

        PdrbSektorUsaha::create($request->all());

        return redirect()->route('admin.data_pdrb_sektor_usaha.index')
                         ->with('success', 'Data PDRB per Sektor Usaha berhasil ditambahkan.');
    }

    public function edit(PdrbSektorUsaha $data_pdrb_sektor_usaha)
    {
        return view('admin.data_pdrb_sektor_usaha.edit', compact('data_pdrb_sektor_usaha'));
    }

    public function update(Request $request, PdrbSektorUsaha $data_pdrb_sektor_usaha)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:pdrb_sektor_usaha,tahun,' . $data_pdrb_sektor_usaha->id,
            'pertanian' => 'required|numeric|min:0|max:100',
            'industri' => 'required|numeric|min:0|max:100',
            'perdagangan' => 'required|numeric|min:0|max:100',
            'konstruksi' => 'required|numeric|min:0|max:100',
            'jasa' => 'required|numeric|min:0|max:100',
        ]);

        $data_pdrb_sektor_usaha->update($request->all());

        return redirect()->route('admin.data_pdrb_sektor_usaha.index')
                         ->with('success', 'Data PDRB per Sektor Usaha berhasil diperbarui.');
    }

    public function destroy(PdrbSektorUsaha $data_pdrb_sektor_usaha)
    {
        $data_pdrb_sektor_usaha->delete();

        return redirect()->route('admin.data_pdrb_sektor_usaha.index')
                         ->with('success', 'Data PDRB per Sektor Usaha berhasil dihapus.');
    }
}