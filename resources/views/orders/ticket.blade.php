<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto mt-10">
            <div class="bg-white shadow-md rounded-lg p-8 border border-gray-200">
                <!-- Header -->
                <div class="border-b pb-4 mb-6">
                    <h2 class="text-2xl font-bold text-violet-900">Detail Pembayaran</h2>
                    <p class="text-gray-500 text-sm">Silakan lihat detail pemesanan Anda</p>
                </div>
        
                <!-- Grid Informasi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Detail Transaksi -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Detail Transaksi</h3>
                        <p class="text-gray-700"><strong>Nama:</strong> <span class="font-normal">{{ $order->product->airline }}</span></p>
                        <p class="text-gray-700"><strong>Kuantitas:</strong> <span class="font-normal">{{ $order->quantity }}</span></p>
                        <p class="text-violet-900 font-semibold mt-4 text-lg">Rp {{ number_format($order->total_price, 2) }}</p>
                    </div>
        
                    <!-- Detail Pelanggan -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Detail Pelanggan</h3>
                        <p class="text-gray-700"><strong>Nama:</strong> <span class="font-normal">{{ $order->name }}</span></p>
                        <p class="text-gray-700"><strong>Email:</strong> <span class="font-normal">{{ $order->email }}</span></p>
                        <p class="text-gray-700"><strong>Telepon:</strong> <span class="font-normal">{{ $order->phone }}</span></p>
                    </div>
                </div>
        
                <!-- Tombol Aksi -->
                <div class="flex justify-end mt-6">
                    <a href="{{ route('dashboard') }}"
                        class="bg-violet-900 hover:bg-violet-950 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition duration-200">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div> 
    </body>
</html>