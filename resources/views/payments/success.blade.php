<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎉 {{ __('Success') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
        <!-- Header Pembayaran -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-violet-950 flex items-center justify-center mb-2">
                ✅ Pembayaran Berhasil!
            </h1>
            <p class="text-gray-700 text-lg">
                Terima kasih atas pembayaran Anda. Pesanan Anda telah diterima. 😊
            </p>
        </div>
    
        <!-- Detail Pesanan -->
        <div class="bg-gray-100 rounded-lg p-6 shadow-inner">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-4">
                📄 Detail Pesanan
            </h2>
            <p class="text-gray-700 text-lg">
                <strong>Nomor Order:</strong>
                <span class="text-gray-900 font-medium">{{ $orderNumber }}</span>
            </p>
        </div>
    
        <!-- Tombol Cetak Tiket -->
        <div class="mt-8 text-center">
            <form action="{{ route('ticket.detail', ['order' => $orderNumber]) }}" method="GET">
                <button type="submit"
                    class="bg-violet-900 hover:bg-violet-950 text-white font-semibold py-3 px-8 rounded-full shadow-md transition-all duration-300 ease-in-out transform hover:scale-105 inline-flex items-center">
                    🎫 Cetak Tiket
                </button>
            </form>
        </div>
    </div>
</x-app-layout>