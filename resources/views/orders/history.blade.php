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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                    @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                        <!-- Header Card -->
                        <div class="bg-violet-950 text-white rounded-t-lg p-4">
                            <p class="text-sm opacity-80">{{ $order->created_at->format('d M Y, H:i') }}</p>
                            <h4 class="text-lg font-semibold">{{ $order->product->airline }}</h4>
                        </div>
                
                        <!-- Body Card -->
                        <div class="p-4 space-y-3">
                            <div class="flex justify-between">
                                <p class="text-gray-700 font-medium">Nomor Kursi:</p>
                                <p class="font-semibold">{{ $order->seat }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-700 font-medium">Jumlah Tiket:</p>
                                <p class="font-semibold">{{ $order->quantity }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-700 font-medium">Total Harga:</p>
                                <p class="font-semibold text-red-500">Rp{{ number_format($order->total_price) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>                
                @endif
            </div>
        </div>
    </div>
</x-app-layout>