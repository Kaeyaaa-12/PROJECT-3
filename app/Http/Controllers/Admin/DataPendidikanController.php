<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan; // Ini akan bekerja jika Model di Langkah 1 sudah benar
use Illuminate\Http\Request;

class DataPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPendidikan = Pendidikan::orderBy('kecamatan')->get();
        // Menggunakan sintaks standar untuk mengirim data ke view
        return view('admin.data_pendidikan.index', compact('dataPendidikan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data_pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:pendidikans,kecamatan',
            'angka_melek_huruf' => 'required|numeric|min:0|max:100',
            'tahun' => 'required|integer|digits:4',
        ]);

        Pendidikan::create($request->all());

        return redirect()->route('admin.data_pendidikan.index')
                         ->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     */
    public function edit(Pendidikan $pendidikan)
    {
        return view('admin.data_pendidikan.edit', ['data_pendidikan' => $pendidikan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255|unique:pendidikans,kecamatan,' . $pendidikan->id,
            'angka_melek_huruf' => 'required|numeric|min:0|max:100',
            'tahun' => 'required|integer|digits:4',
        ]);

        $pendidikan->update($request->all());

        return redirect()->route('admin.data_pendidikan.index')
                         ->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();

        return redirect()->route('admin.data_pendidikan.index')
                         ->with('success', 'Data pendidikan berhasil dihapus.');
    }
}
