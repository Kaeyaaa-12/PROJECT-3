@extends('admin.layouts.admin')

@section('title', 'Tambah Data Akses Rumah Tangga')
@section('page-title', 'Tambah Data Baru')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_akses_rumah_tangga.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', date('Y')) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tahun') border-red-500 @enderror">
                @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="persentase_akses_air_bersih_layak" class="block text-sm font-medium text-gray-700">Akses Air
                        Bersih Layak (%)</label>
                    <input type="number" step="0.01" name="persentase_akses_air_bersih_layak"
                        id="persentase_akses_air_bersih_layak" value="{{ old('persentase_akses_air_bersih_layak') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="akses_sanitasi_layak" class="block text-sm font-medium text-gray-700">Akses Sanitasi Layak
                        (%)</label>
                    <input type="number" step="0.01" name="akses_sanitasi_layak" id="akses_sanitasi_layak"
                        value="{{ old('akses_sanitasi_layak') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="rasio_elektrifikasi" class="block text-sm font-medium text-gray-700">Rasio Elektrifikasi
                        (%)</label>
                    <input type="number" step="0.01" name="rasio_elektrifikasi" id="rasio_elektrifikasi"
                        value="{{ old('rasio_elektrifikasi') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.data_akses_rumah_tangga.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
