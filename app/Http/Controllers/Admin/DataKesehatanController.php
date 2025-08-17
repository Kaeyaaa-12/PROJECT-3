<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use Illuminate\Http\Request;

class DataKesehatanController extends Controller
{
    public function index()
    {
        $dataKesehatan = Kesehatan::orderBy('tahun', 'desc')->get();
        return view('admin.data_kesehatan.index', compact('dataKesehatan'));
    }

    public function create()
    {
        return view('admin.data_kesehatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:kesehatans,tahun',
            'jumlah_puskesmas' => 'required|integer|min:0',
            'jumlah_rumah_sakit' => 'required|integer|min:0',
            'jumlah_puskesmas_pembantu' => 'required|integer|min:0',
        ]);

        Kesehatan::create($request->all());

        return redirect()->route('admin.data_kesehatan.index')
                         ->with('success', 'Data kesehatan berhasil ditambahkan.');
    }

    public function edit(Kesehatan $data_kesehatan)
    {
        return view('admin.data_kesehatan.edit', compact('data_kesehatan'));
    }

    public function update(Request $request, Kesehatan $data_kesehatan)
    {
        $request->validate([
            'tahun' => 'required|integer|digits:4|unique:kesehatans,tahun,' . $data_kesehatan->id,
            'jumlah_puskesmas' => 'required|integer|min:0',
            'jumlah_rumah_sakit' => 'required|integer|min:0',
            'jumlah_puskesmas_pembantu' => 'required|integer|min:0',
        ]);

        $data_kesehatan->update($request->all());

        return redirect()->route('admin.data_kesehatan.index')
                         ->with('success', 'Data kesehatan berhasil diperbarui.');
    }

    public function destroy(Kesehatan $data_kesehatan)
    {
        $data_kesehatan->delete();

        return redirect()->route('admin.data_kesehatan.index')
                         ->with('success', 'Data kesehatan berhasil dihapus.');
    }
}
