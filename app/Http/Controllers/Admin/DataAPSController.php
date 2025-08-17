<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aps;
use Illuminate\Http\Request;

class DataApsController extends Controller
{
    public function index()
    {
        $dataAps = Aps::orderBy('tahun', 'desc')->get();
        return view('admin.data_aps.index', compact('dataAps'));
    }

    public function create()
    {
        return view('admin.data_aps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'persentase_sd' => 'required|numeric|min:0|max:100',
            'persentase_smp' => 'required|numeric|min:0|max:100',
            'persentase_sma' => 'required|numeric|min:0|max:100',
            'tahun' => 'required|integer|digits:4|unique:aps,tahun',
        ]);

        Aps::create($request->all());

        return redirect()->route('admin.data_aps.index')
                         ->with('success', 'Data APS berhasil ditambahkan.');
    }

    public function edit(Aps $data_ap)
    {
        return view('admin.data_aps.edit', ['data_aps' => $data_ap]);
    }

    public function update(Request $request, Aps $data_ap)
    {
        $request->validate([
            'persentase_sd' => 'required|numeric|min:0|max:100',
            'persentase_smp' => 'required|numeric|min:0|max:100',
            'persentase_sma' => 'required|numeric|min:0|max:100',
            'tahun' => 'required|integer|digits:4|unique:aps,tahun,' . $data_ap->id,
        ]);

        $data_ap->update($request->all());

        return redirect()->route('admin.data_aps.index')
                         ->with('success', 'Data APS berhasil diperbarui.');
    }

    public function destroy(Aps $data_ap)
    {
        $data_ap->delete();

        return redirect()->route('admin.data_aps.index')
                         ->with('success', 'Data APS berhasil dihapus.');
    }
}