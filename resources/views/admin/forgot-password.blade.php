{{-- resources/views/admin/forgot-password.blade.php --}}
@extends('layouts.admin-auth')

@section('title', 'Lupa Password Admin')
@section('form-title', 'Lupa Password')

@section('content')
    <p class="text-center text-sm text-gray-300 !mt-2">
        Masukkan email Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.
    </p>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-400 text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6 !mt-6">
        @csrf

        <div>
            <label for="email" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                Alamat Email
            </label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required
                autofocus
                class="mt-1 block w-full bg-gray-800 bg-opacity-50 border border-gray-600 rounded-md py-2 px-3 text-white placeholder-gray-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" />
            @error('email')
                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 transition">
                Kirim Link Reset
            </button>
        </div>

        <div class="text-center !mt-4">
            <a href="{{ route('admin.login') }}" class="text-xs text-gray-400 hover:text-blue-400 transition">
                Kembali ke Login
            </a>
        </div>
    </form>
@endsection
