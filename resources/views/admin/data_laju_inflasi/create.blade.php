@extends('admin.layouts.admin')

@section('title', 'Tambah Data Laju Inflasi')
@section('page-title', 'Tambah Data Laju Inflasi Baru')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_laju_inflasi.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', date('Y')) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tahun') border-red-500 @enderror">
                @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="persentase" class="block text-sm font-medium text-gray-700">Persentase (%)</label>
                <input type="number" step="0.01" name="persentase" id="persentase" value="{{ old('persentase') }}"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('persentase') border-red-500 @enderror">
                @error('persentase')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.data_laju_inflasi.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
