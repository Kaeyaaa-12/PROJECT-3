@extends('admin.layouts.admin')

@section('title', 'Tambah Data PDRB per Sektor Usaha')
@section('page-title', 'Tambah Data PDRB Baru')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_pdrb_sektor_usaha.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', date('Y')) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tahun') border-red-500 @enderror">
                @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="pertanian" class="block text-sm font-medium text-gray-700">Pertanian (%)</label>
                    <input type="number" step="0.01" name="pertanian" id="pertanian" value="{{ old('pertanian') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="industri" class="block text-sm font-medium text-gray-700">Industri (%)</label>
                    <input type="number" step="0.01" name="industri" id="industri" value="{{ old('industri') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="perdagangan" class="block text-sm font-medium text-gray-700">Perdagangan (%)</label>
                    <input type="number" step="0.01" name="perdagangan" id="perdagangan"
                        value="{{ old('perdagangan') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="konstruksi" class="block text-sm font-medium text-gray-700">Konstruksi (%)</label>
                    <input type="number" step="0.01" name="konstruksi" id="konstruksi" value="{{ old('konstruksi') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="jasa" class="block text-sm font-medium text-gray-700">Jasa (%)</label>
                    <input type="number" step="0.01" name="jasa" id="jasa" value="{{ old('jasa') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.data_pdrb_sektor_usaha.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
