<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Pesanan Tiket:
                    {{ $transaksi->pesanan->product->name }}
                </h3>
                <p>Total Harga: Rp. {{ number_format($transaksi->pesanan->total_price, 2) }}</p>
                <p>Status Pembayaran: {{ $transaksi->status }}</p>
                <p>Jumlah Pembayaran: Rp. {{ number_format($transaksi->payment_amount, 2) }}</p>
                <p>Metode Pembayaran: {{ $transaksi->payment_method }}</p>
            </div>
        </div>
    </div>
</x-app-layout>