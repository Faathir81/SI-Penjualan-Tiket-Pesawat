<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tiket Anda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-col items-center space-y-6">

                    <!-- Informasi Tiket -->
                    <div class="w-full md:w-1/2 bg-indigo-100 p-6 rounded-md shadow">
                        <h3 class="text-2xl font-bold text-indigo-700 mb-4">Kwitansi</h3>
                        <p><strong>Maskapai:</strong> {{ $order->product->airline }}</p>
                        <p><strong>Nomor Kursi:</strong> {{ $order->seat }}</p>
                        <p><strong>Nama Pemesan:</strong> {{ $order->name }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                        <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
                        <p><strong>Tanggal Pemesanan:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                        <p class="mt-4 text-green-600 font-semibold">Status: Lunas</p>
                    </div>

                    <!-- Tombol Cetak Tiket -->
                    <div>
                        <a href="{{ route('ticket.view', $order->id) }}"
                            class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                            Cetak Tiket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>