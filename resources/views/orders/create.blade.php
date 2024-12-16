<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-violet-900 leading-tight">
            {{ __('Konfirmasi Pemesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-3xl font-semibold mb-6 text-gray-800">Detail Tiket</h3>
                <div class="mb-6">
                    <p class="text-gray-600"><strong>Maskapai:</strong> {{ $product->airline }}</p>
                    <p class="text-gray-600"><strong>Harga:</strong> Rp{{ number_format($product->price) }}</p>
                </div>

                <h3 class="text-3xl font-semibold mb-6 text-gray-800">Data Pemesan</h3>
                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" readonly
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 shadow-sm cursor-not-allowed sm:text-sm">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Masukkan nomor telepon Anda" required>
                    </div>

                    <!-- Nomor Kursi -->
                    <div class="mb-4">
                        <label for="seat" class="block text-sm font-medium text-gray-700">Nomor Kursi</label>
                        <select name="seat" id="seat"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="" disabled selected>Pilih Nomor Kursi</option>
                            @for ($i = 1; $i <= 25; $i++) <option value="{{ $i }}"
                                {{ in_array($i, $occupiedSeats) ? 'disabled' : '' }}>
                                Kursi {{ $i }} {{ in_array($i, $occupiedSeats) ? '(Terpesan)' : '' }}
                                </option>
                                @endfor
                        </select>
                    </div>

                    <!-- Jumlah Tiket -->
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                        <input type="number" name="quantity" id="quantity" value="1" readonly
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 shadow-sm cursor-not-allowed sm:text-sm">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Konfirmasi
                            Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>