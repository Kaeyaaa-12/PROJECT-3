@extends('admin.layouts.admin')

@section('title', 'Edit Data Ekonomi')
@section('page-title', 'Edit Data Ekonomi')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_ekonomi.update', $data_ekonomi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $data_ekonomi->kecamatan) }}"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('kecamatan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pdrb_miliar" class="block text-sm font-medium text-gray-700">PDRB (Miliar Rp)</label>
                <input type="number" step="0.01" name="pdrb_miliar" id="pdrb_miliar"
                    value="{{ old('pdrb_miliar', $data_ekonomi->pdrb_miliar) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('pdrb_miliar')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="laju_pertumbuhan" class="block text-sm font-medium text-gray-700">Laju Pertumbuhan (%)</label>
                <input type="number" step="0.01" name="laju_pertumbuhan" id="laju_pertumbuhan"
                    value="{{ old('laju_pertumbuhan', $data_ekonomi->laju_pertumbuhan) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('laju_pertumbuhan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', $data_ekonomi->tahun) }}"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-end">
                <a href="{{ route('admin.data_ekonomi.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
