@extends('admin.layouts.admin')

@section('title', 'Tambah Data Kesehatan')
@section('page-title', 'Tambah Data Fasilitas Kesehatan Baru')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_kesehatan.store') }}" method="POST">
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
                    <label for="jumlah_rumah_sakit" class="block text-sm font-medium text-gray-700">Jumlah Rumah
                        Sakit</label>
                    <input type="number" name="jumlah_rumah_sakit" id="jumlah_rumah_sakit"
                        value="{{ old('jumlah_rumah_sakit') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('jumlah_rumah_sakit') border-red-500 @enderror">
                    @error('jumlah_rumah_sakit')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="jumlah_puskesmas" class="block text-sm font-medium text-gray-700">Jumlah Puskesmas</label>
                    <input type="number" name="jumlah_puskesmas" id="jumlah_puskesmas"
                        value="{{ old('jumlah_puskesmas') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('jumlah_puskesmas') border-red-500 @enderror">
                    @error('jumlah_puskesmas')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="jumlah_puskesmas_pembantu" class="block text-sm font-medium text-gray-700">Jumlah Puskesmas
                        Pembantu</label>
                    <input type="number" name="jumlah_puskesmas_pembantu" id="jumlah_puskesmas_pembantu"
                        value="{{ old('jumlah_puskesmas_pembantu') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('jumlah_puskesmas_pembantu') border-red-500 @enderror">
                    @error('jumlah_puskesmas_pembantu')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.data_kesehatan.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
