{{-- resources/views/auth/reset-password.blade.php --}}
@extends('layouts.admin-auth')

@section('title', 'Reset Password Admin')
@section('form-title', 'Atur Ulang Password')

@section('content')
    <form method="POST" action="{{ route('password.store') }}" class="space-y-6 !mt-6">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                Alamat Email
            </label>
            <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}"
                autocomplete="email" required readonly
                class="mt-1 block w-full bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md py-2 px-3 text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none cursor-not-allowed" />
            @error('email')
                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- AWAL PERUBAHAN 1: Input Password Baru --}}
        <div x-data="{ show: false }" class="relative">
            <label for="password" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                Password Baru
            </label>
            <input id="password" name="password" :type="show ? 'text' : 'password'" required autofocus
                class="mt-1 block w-full bg-gray-800 bg-opacity-50 border border-gray-600 rounded-md py-2 pl-3 pr-10 text-white placeholder-gray-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" />
            @error('password')
                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
            @enderror
            <div class="absolute inset-y-0 right-0 top-6 flex items-center pr-3">
                <button type="button" @click="show = !show" class="text-gray-400 hover:text-gray-200">
                    {{-- Ikon Mata Terbuka --}}
                    <svg x-show="!show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639l4.443-7.447A1 1 0 017 4h10a1 1 0 01.521.146l4.443 7.447a1.012 1.012 0 010 .639l-4.443 7.447A1 1 0 0117 20H7a1 1 0 01-.521-.146L2.036 12.322z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{-- Ikon Mata Tertutup --}}
                    <svg x-show="show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243l-4.243-4.243" />
                    </svg>
                </button>
            </div>
        </div>
        {{-- AKHIR PERUBAHAN 1 --}}

        {{-- AWAL PERUBAHAN 2: Input Konfirmasi Password --}}
        <div x-data="{ show: false }" class="relative">
            <label for="password_confirmation" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                Konfirmasi Password
            </label>
            <input id="password_confirmation" name="password_confirmation" :type="show ? 'text' : 'password'" required
                class="mt-1 block w-full bg-gray-800 bg-opacity-50 border border-gray-600 rounded-md py-2 pl-3 pr-10 text-white placeholder-gray-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" />
            @error('password_confirmation')
                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
            @enderror
            <div class="absolute inset-y-0 right-0 top-6 flex items-center pr-3">
                <button type="button" @click="show = !show" class="text-gray-400 hover:text-gray-200">
                    {{-- Ikon Mata Terbuka --}}
                    <svg x-show="!show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639l4.443-7.447A1 1 0 017 4h10a1 1 0 01.521.146l4.443 7.447a1.012 1.012 0 010 .639l-4.443 7.447A1 1 0 0117 20H7a1 1 0 01-.521-.146L2.036 12.322z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{-- Ikon Mata Tertutup --}}
                    <svg x-show="show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243l-4.243-4.243" />
                    </svg>
                </button>
            </div>
        </div>
        {{-- AKHIR PERUBAHAN 2 --}}

        <div>
            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 transition">
                Reset Password
            </button>
        </div>
    </form>
@endsection
