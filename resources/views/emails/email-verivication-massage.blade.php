<x-guest-layout class="shadow-md ">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto p-6 bg-white rounded-lg font-sans">
        <h1 class="text-2xl font-bold text-purple-800 text-center mb-4">👋 Halo, {{ $name }}!</h1>
        <p class="text-sm text-gray-600 text-center mb-6">
            Terima kasih telah mendaftar. Klik tombol di bawah ini untuk memverifikasi email Anda (<span
                class="font-semibold">{{ $email }}</span>) dan menyelesaikan
            proses pendaftaran.
        </p>
        <div class="flex justify-center">
            <a href="{{ $url }}"
                class="px-6 py-2 text-white bg-purple-700 rounded-md shadow-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                Verifikasi Email
            </a>
        </div>
    </div>
</x-guest-layout>