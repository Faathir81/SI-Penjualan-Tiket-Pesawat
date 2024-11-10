<!-- resources/views/checkins/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Check-in') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Status Pembayaran dan Check-in</h3>

                @if(session('error'))
                <div class="text-red-500 mb-4">{{ session('error') }}</div>
                @elseif(session('success'))
                <div class="text-green-500 mb-4">{{ session('success') }}</div>
                @endif

                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">ID Transaksi</th>
                            <th class="px-4 py-2 border">Nama Produk</th>
                            <th class="px-4 py-2 border">Status Pembayaran</th>
                            <th class="px-4 py-2 border">Harga Tiket</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkins as $transaksi)
                        <tr>
                            <td class="px-4 py-2 border">{{ $transaksi->id }}</td>
                            <td class="px-4 py-2 border">{{ $transaksi->pesanan->product_name }}</td>
                            <td class="px-4 py-2 border">{{ $transaksi->status }}</td>
                            <td class="px-4 py-2 border">{{ number_format($transaksi->total_amount, 2) }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('checkins.create', $transaksi->id) }}"
                                    class="text-blue-500">Check-in</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($checkins->isEmpty())
                <p class="text-gray-500 mt-4">Tidak ada transaksi yang dapat diproses untuk check-in.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>