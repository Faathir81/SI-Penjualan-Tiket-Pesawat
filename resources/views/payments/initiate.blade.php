<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-violet-900 leading-tight">
            {{ __('Pembayaran') }} 📄
        </h2>
    </x-slot>

    <!-- Single Card -->
    <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6 max-w-4xl mx-auto mt-10">

        <!-- Header Section -->
        <div class="flex items-center justify-between border-b-2 border-purple-800 pb-4">
            <div>
                <h1 class="text-2xl font-bold text-purple-800">Detail Pembayaran</h1>
                <p class="text-gray-600 text-sm mt-1">Silakan lihat detail pemesanan Anda</p>
            </div>
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-2 gap-8 mt-6">
            <!-- Left Section -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Detail Transaksi</h3>
                <ul class="space-y-4 text-gray-600">
                    @foreach ($itemDetails as $item)
                    <li class="flex justify-between border-b border-gray-300 pb-2">
                        <div>
                            <p><strong>Nama:</strong> {{ $item['name'] }}</p>
                            @if (!empty($item['airline']))
                            <p><strong>Airline:</strong> {{ $item['airline'] }}</p>
                            @endif
                            <p><strong>Kuantitas:</strong> {{ $item['quantity'] }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-violet-700 font-semibold">Rp {{ number_format($item['price'], 2) }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Right Section -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Detail Pelanggan</h3>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex justify-between">
                        <span class="font-medium">Nama</span>
                        <span>{{ $customerDetails['first_name'] }}</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="font-medium">Email</span>
                        <span>{{ $customerDetails['email'] }}</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="font-medium">Telepon</span>
                        <span>{{ $customerDetails['phone'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="mt-8 flex items-center justify-end">
            <button id="pay-button"
                class="bg-violet-800 text-white font-semibold py-3 px-6 rounded-md shadow-lg hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
                Bayar Sekarang 💸
            </button>
        </div>
    </div>



    <script type="text/javascript">
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        snap.pay('{{ $snapToken }}');
    });
    </script>
</x-app-layout>