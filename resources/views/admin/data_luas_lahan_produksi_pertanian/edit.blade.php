@extends('admin.layouts.admin')

@section('title', 'Edit Data Pertanian')
@section('page-title', 'Edit Data Pertanian')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form
            action="{{ route('admin.data_luas_lahan_produksi_pertanian.update', $data_luas_lahan_produksi_pertanian->id) }}"
            method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="komoditas" class="block text-sm font-medium text-gray-700">Komoditas</label>
                <input type="text" name="komoditas" id="komoditas"
                    value="{{ old('komoditas', $data_luas_lahan_produksi_pertanian->komoditas) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="luas_lahan" class="block text-sm font-medium text-gray-700">Luas Lahan (Ha)</label>
                    <input type="number" step="0.01" name="luas_lahan" id="luas_lahan"
                        value="{{ old('luas_lahan', $data_luas_lahan_produksi_pertanian->luas_lahan) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="produksi" class="block text-sm font-medium text-gray-700">Produksi (Ton)</label>
                    <input type="number" step="0.01" name="produksi" id="produksi"
                        value="{{ old('produksi', $data_luas_lahan_produksi_pertanian->produksi) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun"
                    value="{{ old('tahun', $data_luas_lahan_produksi_pertanian->tahun) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.data_luas_lahan_produksi_pertanian.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
