<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LuasLahanProduksiPertanian;
use Illuminate\Http\Request;

class DataLuasLahanProduksiPertanianController extends Controller
{
    public function index()
    {
        $dataPertanian = LuasLahanProduksiPertanian::orderBy('tahun', 'desc')->orderBy('komoditas', 'asc')->get();
        return view('admin.data_luas_lahan_produksi_pertanian.index', compact('dataPertanian'));
    }

    public function create()
    {
        return view('admin.data_luas_lahan_produksi_pertanian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'komoditas' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0',
            'produksi' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        LuasLahanProduksiPertanian::create($request->all());

        return redirect()->route('admin.data_luas_lahan_produksi_pertanian.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(LuasLahanProduksiPertanian $pertanian)
    {
        return view('admin.data_luas_lahan_produksi_pertanian.edit', ['data_luas_lahan_produksi_pertanian' => $pertanian]);
    }

    public function update(Request $request, LuasLahanProduksiPertanian $pertanian)
    {
        $request->validate([
            'komoditas' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0',
            'produksi' => 'required|numeric|min:0',
            'tahun' => 'required|integer|digits:4',
        ]);

        $pertanian->update($request->all());

        return redirect()->route('admin.data_luas_lahan_produksi_pertanian.index')
                         ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(LuasLahanProduksiPertanian $pertanian)
    {
        $pertanian->delete(); // Pastikan variabel di sini juga diubah

        return redirect()->route('admin.data_luas_lahan_produksi_pertanian.index')
                     ->with('success', 'Data berhasil dihapus.');
    }
}