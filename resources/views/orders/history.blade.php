<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Histori Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-6 text-gray-800">Histori Pesanan Anda</h3>

                @if($orders->isEmpty())
                <p class="text-gray-600">Anda belum memiliki histori pesanan.</p>
                @else
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Maskapai</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nomor Kursi</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Jumlah Tiket</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->product->airline }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->seat }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->quantity }}</td>
                            <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($order->total_price) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>