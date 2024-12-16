<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg p-6 border">
            <!-- Header Tiket -->
            <div class="text-center border-b pb-4 mb-4">
                <h2 class="text-3xl font-bold text-indigo-700">Detail Tiket Anda</h2>
                <p class="text-gray-600">Terima kasih atas pemesanan Anda</p>
            </div>

            <!-- Informasi Tiket -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Maskapai:</strong> {{ $order->product->airline }}</p>
                    <p><strong>Nomor Kursi:</strong> {{ $order->seat }}</p>
                    <p><strong>Nama Pemesan:</strong> {{ $order->name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                </div>
                <div>
                    <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                    <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
                    <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price) }}</p>
                    <p><strong>Tanggal Pemesanan:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>

            <!-- Status -->
            <div class="mt-4 text-center">
                <p class="text-green-600 font-bold">Status: Lunas</p>
            </div>
        </div>

        <!-- Tombol Cetak -->
        <div class="text-center mt-6">
            <a href="{{ route('dashboard')}}"
                class="px-6 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                Kembali ke Dashboard
            </a>
            <button> 
        </div>
</body>

</html>