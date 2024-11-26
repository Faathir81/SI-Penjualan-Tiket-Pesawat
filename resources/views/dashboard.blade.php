<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-8">

                <!-- Form Pencarian -->
                <div class="mb-6">
                    <form method="GET" action="{{ route('dashboard') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Lokasi Keberangkatan -->
                        <div>
                            <label for="departure_location" class="block text-sm font-medium text-gray-700">
                                Lokasi Keberangkatan
                            </label>
                            <input type="text" name="departure_location" id="departure_location"
                                placeholder="Masukkan lokasi keberangkatan"
                                class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ request('departure_location') }}">
                        </div>

                        <!-- Lokasi Tiba -->
                        <div>
                            <label for="arrival_location" class="block text-sm font-medium text-gray-700">
                                Lokasi Tiba
                            </label>
                            <input type="text" name="arrival_location" id="arrival_location"
                                placeholder="Masukkan lokasi tiba"
                                class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ request('arrival_location') }}">
                        </div>

                        <!-- Tombol Cari -->
                        <div class="flex items-end gap-4">
                            <!-- Tombol Cari -->
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                                Cari
                            </button>

                            <!-- Tombol Menampilkan Seluruh -->
                            <a href="{{ route('dashboard') }}"
                                class="px-4 py-2 border border-gray-500 text-gray-500 rounded-md shadow hover:bg-indigo-500 hover:text-white hover:border-indigo-500 focus:outline-none text-center">
                                Tampilkan Semua
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Daftar Tiket -->
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Tiket</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-200 bg-gray-50 shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-indigo-500 text-white">
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Nama Tiket</th>
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Kategori</th>
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Lokasi
                                    Keberangkatan</th>
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Lokasi Tiba</th>
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Harga</th>
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Kuota</th>
                                <th class="border border-gray-200 px-6 py-3 text-left font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="hover:bg-gray-100 transition ease-in-out duration-150">
                                <td class="border border-gray-200 px-6 py-3">{{ $product->airline }}</td>
                                <td class="border border-gray-200 px-6 py-3">{{ $product->category }}</td>
                                <td class="border border-gray-200 px-6 py-3">{{ $product->departure_location }}</td>
                                <td class="border border-gray-200 px-6 py-3">{{ $product->arrival_location }}</td>
                                <td class="border border-gray-200 px-6 py-3 flex justify-between items-center">
                                    <span>Rp</span>
                                    <span>{{ number_format($product->price) }}</span>
                                </td>

                                <td class="border border-gray-200 px-6 py-3">
                                    @if ($product->quota_tiket == 0)
                                    <span class="text-red-500 font-semibold">Sold Out</span>
                                    @else
                                    {{ $product->quota_tiket }}
                                    @endif
                                </td>
                                <td class="border border-gray-200 px-6 py-3">
                                    @if ($product->quota_tiket > 0)
                                    <a href="{{ route('orders.create', $product->id) }}"
                                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 shadow-sm">
                                        Pesan
                                    </a>
                                    @else
                                    <span class="text-gray-400">Tidak Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>