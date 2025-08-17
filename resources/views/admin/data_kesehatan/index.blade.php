@extends('admin.layouts.admin')

@section('title', 'Data Kesehatan')
@section('page-title', 'Manajemen Data Fasilitas Kesehatan')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <a href="{{ route('admin.data_kesehatan.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mb-6">
            <i class="ri-add-line mr-2"></i>Tambah Data Kesehatan
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
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Rumah Sakit</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Puskesmas</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Puskesmas Pembantu</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($dataKesehatan as $data)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 text-center">{{ $data->tahun }}</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->jumlah_rumah_sakit) }} Unit</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->jumlah_puskesmas) }} Unit</td>
                            <td class="py-3 px-4 text-right">{{ number_format($data->jumlah_puskesmas_pembantu) }} Unit</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.data_kesehatan.edit', $data->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 mr-4">
                                    <i class="ri-pencil-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.data_kesehatan.destroy', $data->id) }}" method="POST"
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
                            <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                Tidak ada data untuk ditampilkan. Silakan tambahkan data baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
