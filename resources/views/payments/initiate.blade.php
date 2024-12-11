<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembayaran') }}
        </h2>
    </x-slot>

    <!-- Single Card -->
    <div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto mt-10">
        <h2 class="text-lg font-semibold mb-4">Detail Pembayaran</h2>
        <div class="space-y-4">
            <!-- Transaction Details -->

            <h3 class="font-semibold text-gray-700">Detail Transaksi</h3>
            <ul class="mt-2 text-gray-600">
                @foreach ($itemDetails as $item)
                <li>
                    <strong>Nama:</strong> {{ $item['name'] }} <br>
                    @if (!empty($item['airline']))
                    <strong>Airline:</strong> {{ $item['airline'] }} <br>
                    @endif
                    <strong>Harga:</strong> Rp {{ number_format($item['price'], 2) }} <br>
                    <strong>Kuantitas:</strong> {{ $item['quantity'] }}
                </li>
                @endforeach
            </ul>

            <hr class="border-t border-gray-300">

            <!-- Customer Details -->
            <div>
                <h3 class="font-semibold text-gray-700">Detail Pelanggan</h3>
                <ul class="mt-2 text-gray-600">
                    <li><strong>Nama:</strong> {{ $customerDetails['first_name'] }}</li>
                    <li><strong>Email:</strong> {{ $customerDetails['email'] }}</li>
                    <li><strong>Telepon:</strong> {{ $customerDetails['phone'] }}</li>
                </ul>
            </div>
        </div>

        <!-- Pay Button -->
        <div class="mt-6 text-center">
            <button id="pay-button" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">
                Bayar Sekarang
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