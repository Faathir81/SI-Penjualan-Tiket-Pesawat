<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-violet-900 leading-tight">
            {{ __('Detail Tiket Anda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md rounded-lg border-t-4 border-violet-900">
                <!-- Header Invoice -->
                <div class="bg-violet-900 text-white p-6 rounded-t-lg">
                    <h2 class="text-2xl font-bold uppercase">Kwitansi Pembayaran</h2>
                    <p class="text-sm mt-1">Terima kasih atas pembayaran Anda.</p>
                </div>
    
                <!-- Informasi Utama -->
                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informasi Tiket -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Detail Pemesanan</h3>
                        <p class="text-gray-600"><strong>Maskapai:</strong> <span class="font-normal">{{ $order->product->airline }}</span></p>
                        <p class="text-gray-600"><strong>Nomor Kursi:</strong> <span class="font-normal">{{ $order->seat }}</span></p>
                        <p class="text-gray-600"><strong>Nama Pemesan:</strong> <span class="font-normal">{{ $order->name }}</span></p>
                        <p class="text-gray-600"><strong>Email:</strong> <span class="font-normal">{{ $order->email }}</span></p>
                        <p class="text-gray-600"><strong>Nomor Telepon:</strong> <span class="font-normal">{{ $order->phone }}</span></p>
                    </div>
    
                    <!-- Detail Tambahan -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Rincian Pembayaran</h3>
                        <p class="text-gray-600"><strong>Jumlah Tiket:</strong> <span class="font-normal">{{ $order->quantity }}</span></p>
                        <p class="text-gray-600"><strong>Tanggal Pemesanan:</strong> <span class="font-normal">{{ $order->created_at->format('d M Y, H:i') }}</span></p>
                        <p class="text-green-600 font-bold mt-4 text-lg">Status: Lunas</p>
                    </div>
                </div>
    
                <!-- Tombol Cetak -->
                <div class="p-6 text-center">
                    <a href="{{ route('ticket.view', $order->id) }}"
                        class="inline-block px-6 py-3 bg-violet-900 text-white font-semibold rounded-lg shadow hover:bg-violet-950 transition duration-200">
                        Cetak Tiket
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>