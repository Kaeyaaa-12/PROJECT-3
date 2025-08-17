{{-- resources/views/admin/data_kondisi_jalan/edit.blade.php --}}

@extends('admin.layouts.admin')

@section('title', 'Edit Data Kondisi Jalan')
@section('page-title', 'Edit Data Kondisi Jalan')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_kondisi_jalan.update', $data_kondisi_jalan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', $data_kondisi_jalan->tahun) }}"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tahun') border-red-500 @enderror">
                @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div>
                    <label for="baik" class="block text-sm font-medium text-gray-700">Persentase Baik (%)</label>
                    <input type="number" step="0.01" name="baik" id="baik"
                        value="{{ old('baik', $data_kondisi_jalan->baik) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="sedang" class="block text-sm font-medium text-gray-700">Persentase Sedang (%)</label>
                    <input type="number" step="0.01" name="sedang" id="sedang"
                        value="{{ old('sedang', $data_kondisi_jalan->sedang) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="rusak_ringan" class="block text-sm font-medium text-gray-700">Persentase Rusak Ringan
                        (%)</label>
                    <input type="number" step="0.01" name="rusak_ringan" id="rusak_ringan"
                        value="{{ old('rusak_ringan', $data_kondisi_jalan->rusak_ringan) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="rusak_berat" class="block text-sm font-medium text-gray-700">Persentase Rusak Berat
                        (%)</label>
                    <input type="number" step="0.01" name="rusak_berat" id="rusak_berat"
                        value="{{ old('rusak_berat', $data_kondisi_jalan->rusak_berat) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.data_kondisi_jalan.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
