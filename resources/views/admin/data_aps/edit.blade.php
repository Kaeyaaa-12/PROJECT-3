@extends('admin.layouts.admin')

@section('title', 'Edit Data APS')
@section('page-title', 'Edit Data APS')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.data_aps.update', $data_aps->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', $data_aps->tahun) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="persentase_sd" class="block text-sm font-medium text-gray-700">Persentase SD/MI (%)</label>
                    <input type="number" step="0.01" name="persentase_sd" id="persentase_sd"
                        value="{{ old('persentase_sd', $data_aps->persentase_sd) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('persentase_sd')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="persentase_smp" class="block text-sm font-medium text-gray-700">Persentase SMP/MTs
                        (%)</label>
                    <input type="number" step="0.01" name="persentase_smp" id="persentase_smp"
                        value="{{ old('persentase_smp', $data_aps->persentase_smp) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('persentase_smp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="persentase_sma" class="block text-sm font-medium text-gray-700">Persentase SMA/MA/SMK
                        (%)</label>
                    <input type="number" step="0.01" name="persentase_sma" id="persentase_sma"
                        value="{{ old('persentase_sma', $data_aps->persentase_sma) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('persentase_sma')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.data_aps.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
