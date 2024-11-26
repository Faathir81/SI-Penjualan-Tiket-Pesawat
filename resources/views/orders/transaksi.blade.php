<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Detail Transaksi -->
                <h3 class="text-3xl font-semibold mb-6 text-gray-800">Detail Transaksi</h3>
                <p><strong>Maskapai:</strong> {{ $order->product->airline }}</p>
                <p><strong>Nomor Kursi:</strong> {{ $order->seat }}</p>
                <p><strong>Nama Pemesan:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
                <p><strong>Tanggal Pemesanan:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>

                <hr class="my-5">

                <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price) }}</p>


                <!-- Pesan Error -->
                @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mt-6">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <!-- Form Proses Pembayaran -->
                <div class="mt-6">
                    <form action="{{ route('transaksi.process') }}" method="POST" class="space-y-4">
                        @csrf
                        <!-- Hidden Field untuk Order ID -->
                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <!-- Input Uang -->
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Masukkan Jumlah
                                Uang</label>
                            <input type="number" name="amount" id="amount" min="1"
                                placeholder="Masukkan jumlah uang Anda"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="pt-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                                Proses Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>