<x-mail::message>
    {{-- Panel Utama (Kotak Putih) --}}
    <x-mail::panel>

        {{-- Logo BPS di dalam Panel --}}
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ $message->embed(public_path('assets/images/logobps.png')) }}" alt="Logo BPS"
                style="max-height: 75px; margin: auto;">
        </div>

        Halo {{ $user->name }},

        Anda menerima email ini karena kami menerima permintaan pengaturan ulang kata sandi untuk akun Anda. Silakan
        klik tombol di bawah ini untuk melanjutkan.

        <x-mail::button :url="$resetUrl">
            Reset Password
        </x-mail::button>

        Tautan reset kata sandi ini akan kedaluwarsa dalam 60 menit.

        Jika Anda tidak merasa meminta pengaturan ulang kata sandi, Anda dapat dengan aman mengabaikan email ini.

        Hormat kami,
        BPS Kabupaten Tulungagung

    </x-mail::panel>

</x-mail::message>
