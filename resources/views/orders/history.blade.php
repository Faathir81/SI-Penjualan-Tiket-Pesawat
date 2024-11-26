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
                <p class="text-gray-600 text-center">Anda belum memiliki histori pesanan.</p>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300 shadow-lg">
                        <thead class="bg-indigo-500 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium">Tanggal</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Maskapai</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Nomor Kursi</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Jumlah Tiket</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($orders as $order)
                            <tr class="border-b hover:bg-gray-100 transition duration-150 ease-in-out">
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $order->product->airline }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $order->seat }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $order->quantity }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <span class="font-semibold">Rp</span>{{ number_format($order->total_price) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>