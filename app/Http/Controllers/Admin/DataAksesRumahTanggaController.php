<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesRumahTangga;
use Illuminate\Http\Request;

class DataAksesRumahTanggaController extends Controller
{
    public function index()
    {
        $dataAksesRumahTangga = AksesRumahTangga::orderBy('tahun', 'desc')->get();
        return view('admin.data_akses_rumah_tangga.index', compact('dataAksesRumahTangga'));
    }

    public function create()
    {
        return view('admin.data_akses_rumah_tangga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:akses_rumah_tanggas,tahun',
            'persentase_akses_air_bersih_layak' => 'required|numeric|min:0|max:100',
            'akses_sanitasi_layak' => 'required|numeric|min:0|max:100',
            'rasio_elektrifikasi' => 'required|numeric|min:0|max:100',
        ]);

        AksesRumahTangga::create($request->all());

        return redirect()->route('admin.data_akses_rumah_tangga.index')
                         ->with('success', 'Data akses rumah tangga berhasil ditambahkan.');
    }

    public function edit(AksesRumahTangga $data_akses_rumah_tangga)
    {
        return view('admin.data_akses_rumah_tangga.edit', compact('data_akses_rumah_tangga'));
    }

    public function update(Request $request, AksesRumahTangga $data_akses_rumah_tangga)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:akses_rumah_tanggas,tahun,' . $data_akses_rumah_tangga->id,
            'persentase_akses_air_bersih_layak' => 'required|numeric|min:0|max:100',
            'akses_sanitasi_layak' => 'required|numeric|min:0|max:100',
            'rasio_elektrifikasi' => 'required|numeric|min:0|max:100',
        ]);

        $data_akses_rumah_tangga->update($request->all());

        return redirect()->route('admin.data_akses_rumah_tangga.index')
                         ->with('success', 'Data akses rumah tangga berhasil diperbarui.');
    }

    public function destroy(AksesRumahTangga $data_akses_rumah_tangga)
    {
        $data_akses_rumah_tangga->delete();

        return redirect()->route('admin.data_akses_rumah_tangga.index')
                         ->with('success', 'Data akses rumah tangga berhasil dihapus.');
    }
}