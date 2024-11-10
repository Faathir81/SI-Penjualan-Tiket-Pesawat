<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Pesanan Tiket: {{ $pesanan->product->name }}</h3>
                <p>Total Harga: Rp. {{ number_format($pesanan->total_price, 2) }}</p>

                @if (session('error'))
                <div class="text-red-500 mb-4">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                <div class="text-green-500 mb-4">{{ session('success') }}</div>
                @endif

                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">

                    <div class="mb-4">
                        <label for="payment_amount" class="block text-gray-700">Jumlah Pembayaran</label>
                        <input type="number" id="payment_amount" name="payment_amount" class="mt-1 block w-full" min="0"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="payment_method" class="block text-gray-700">Metode Pembayaran</label>
                        <input type="text" id="payment_method" name="payment_method" class="mt-1 block w-full" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>