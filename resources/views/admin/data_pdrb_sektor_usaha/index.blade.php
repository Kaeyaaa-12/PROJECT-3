@extends('admin.layouts.admin')

@section('title', 'Data PDRB per Sektor Usaha')
@section('page-title', 'Manajemen Data PDRB per Sektor Usaha')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <a href="{{ route('admin.data_pdrb_sektor_usaha.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mb-6">
            <i class="ri-add-line mr-2"></i>Tambah Data PDRB
        </a>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Tahun</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Pertanian (%)</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Industri (%)</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Perdagangan (%)</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Konstruksi (%)</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Jasa (%)</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($dataPdrb as $data)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 text-center">{{ $data->tahun }}</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->pertanian, 2) }}</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->industri, 2) }}</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->perdagangan, 2) }}</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->konstruksi, 2) }}</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->jasa, 2) }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.data_pdrb_sektor_usaha.edit', $data->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 mr-4">
                                    <i class="ri-pencil-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.data_pdrb_sektor_usaha.destroy', $data->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tahun {{ $data->tahun }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 px-4 text-center text-gray-500">
                                Tidak ada data untuk ditampilkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
