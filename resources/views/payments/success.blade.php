<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎉 {{ __('Success') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-green-600 mb-4">✅ Pembayaran Berhasil!</h1>
            <p class="text-gray-700 text-lg">
                Terima kasih atas pembayaran Anda. Pesanan Anda telah diterima. 😊
            </p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-800">📄 Detail Pesanan</h2>
            <p class="text-gray-600 mt-2">
                <strong>Nomor Order:</strong> {{ $orderNumber }}
            </p>
        </div>

        <div class="mt-6 text-center">
            <form action="{{ route('ticket.detail', ['order' => $orderNumber]) }}" method="GET" class="text-center">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md font-semibold hover:bg-blue-600 inline-flex items-center">
                    🎫 Cetak Tiket
                </button>
            </form>
        </div>
    </div>
</x-app-layout>