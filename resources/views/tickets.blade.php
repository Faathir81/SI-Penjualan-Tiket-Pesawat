<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>
    <div class="py-12 px-64">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-8">

                <!-- Form Pencarian -->
                <div class="mb-6 max-w-7xl mx-auto sm:px-6 lg:px-8 flex">

                    <form method="GET" action="{{ route('tickets') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @csrf
                        <!-- Lokasi Keberangkatan -->
                        <div>
                            <label for="departure_location" class="block text-sm font-medium text-gray-700">
                                Lokasi Keberangkatan
                            </label>
                            <input type="text" name="departure_location" id="departure_location"
                                placeholder="Masukkan lokasi keberangkatan"
                                class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-violet-950 focus:border-indigo-500"
                                value="{{ request('departure_location') }}">
                        </div>

                        <!-- Lokasi Tiba -->
                        <div>
                            <label for="arrival_location" class="block text-sm font-medium text-gray-700">
                                Lokasi Tiba
                            </label>
                            <input type="text" name="arrival_location" id="arrival_location"
                                placeholder="Masukkan lokasi tiba"
                                class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-violet-950 focus:border-indigo-500"
                                value="{{ request('arrival_location') }}">
                        </div>

                        <!-- Tombol Cari -->
                        <div class="flex items-end gap-4">
                            <button type="submit"
                                class="px-4 py-2 bg-violet-950 text-white rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Daftar Tiket -->
                @if ($products->isEmpty())
                <p class="text-gray-500">Tidak ada tiket yang ditemukan untuk pencarian Anda.</p>
                @else
                <div class="max-w-7xl mx-auto">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Tiket</h2>  
                    <table class="min-w-full border-collapse border border-gray-200 bg-gray-50 shadow-lg rounded-lg">
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="bg-white shadow-md rounded-lg mb-4 border border-gray-200">
                                <!-- Header: Maskapai, Kategori, dan Jadwal -->
                                <td colspan="9" class="p-4">
                                    <div class="flex items-center justify-between">
                                        <!-- Maskapai dan Kategori -->
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="flex items-center justify-center w-10 h-10 text-white rounded-full">
                                                <svg width="59" height="72" viewBox="0 0 59 72" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M40.2599 72C44.511 72 59 69.082 59 50.4994C59 39.9383 49.479 35.1401 45.2279 33.5284C45.209 33.5223 45.187 33.5132 45.165 33.504C45.143 33.4948 45.121 33.4857 45.1021 33.4796C43.9576 33.0523 43.2281 32.8691 43.2281 32.8691C43.7564 32.5639 44.2469 32.2342 44.6996 31.8802C45.1021 31.5627 45.4794 31.2331 45.8316 30.879C50.787 25.9342 50.2462 18.0836 50.2462 18.0836C50.2462 -1.15827 30.8772 0.0138229 30.8772 0.0138229H3.03113C1.35835 0.0138229 0 1.33243 0 2.96848V69.0576C0 70.6814 1.35835 72 3.03113 72H40.2599ZM37.3907 34.2856L45.1006 33.4797C43.9561 33.0524 43.2266 32.8693 43.2266 32.8693C43.7548 32.564 44.2454 32.2344 44.6981 31.8803C45.1006 31.5629 45.4779 31.2332 45.8301 30.8792C41.755 30.1832 37.114 29.2919 37.114 29.2919L41.3526 15.2146L38.2711 15.6419L28.9891 28.4007C28.4106 29.1943 27.4798 29.6949 26.4737 29.7437L18.9525 29.8414C18.7386 29.8414 18.5248 29.878 18.3362 29.9757C17.745 30.2443 16.5628 30.9158 16.5628 32.0024C16.5628 32.9181 17.4683 33.5408 18.0469 33.8582C18.3236 34.0047 18.6254 34.078 18.9273 34.0536C19.1243 34.0502 19.3835 34.0447 19.6888 34.0382C21.5858 33.998 25.257 33.9202 26.7629 34.078C28.8256 34.31 29.9827 36.0437 29.9827 36.0437L38.158 47.2519L41.8179 47.0931L37.3907 34.2856Z"
                                                        fill="#2D095E" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="font-semibold text-lg text-purple-700">
                                                    {{ $product->airline }}
                                                </h2>
                                                <span
                                                    class="text-sm text-green-600 font-medium">{{ $product->category }}</span>
                                            </div>
                                        </div>
                                        <!-- Jadwal Keberangkatan dan Kedatangan -->
                                        <div class="flex items-center space-x-8">
                                            <!-- Keberangkatan -->
                                            <div class="text-center">
                                                <p class="font-semibold text-sm text-gray-700">
                                                    {{ $product->departure_time }}
                                                </p>
                                                <p class="text-gray-500 text-xs">{{ $product->departure_location }}</p>
                                            </div>
                                            <div class="flex items-center space-x-2 text-gray-400">
                                                <div class="w-4 h-4 rounded-full bg-gray-400"></div>
                                            </div>
                                            <!-- Kedatangan -->
                                            <div class="text-center">
                                                <p class="font-semibold text-sm text-gray-700">
                                                    {{ $product->arrival_time }}
                                                </p>
                                                <p class="text-gray-500 text-xs">{{ $product->arrival_location }}</p>
                                            </div>
                                        </div>
                                        <!-- Harga -->
                                        <div class="text-right">
                                            <p class="text-red-500 font-bold text-lg">
                                                Rp{{ number_format($product->price) }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Dropdown untuk Info Tambahan -->
                            <tr x-data="{ open: false }" class="border-t">
                                <td colspan="9" class="p-4">
                                    <div class="relative">
                                        <!-- Konten Dropdown dengan Animasi -->
                                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-y-0"
                                            x-transition:enter-end="opacity-100 transform scale-y-100"
                                            x-transition:leave="transition ease-in duration-200"
                                            x-transition:leave-start="opacity-100 transform scale-y-100"
                                            x-transition:leave-end="opacity-0 transform scale-y-0"
                                            class="overflow-hidden border border-gray-200 rounded-lg p-4 mt-4">
                                            <div class="flex justify-between items-center space-y-2">
                                                <!-- Kuota -->
                                                <div>
                                                    <span class="font-medium">
                                                        Kuota:
                                                        @if ($product->quota_tiket == 0)
                                                        <span class="text-red-500">Sold Out</span>
                                                        @else
                                                        <span class="text-gray-700">{{ $product->quota_tiket }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                                <!-- Tombol Pesan -->
                                                <div>
                                                    @if ($product->quota_tiket > 0)
                                                    <a href="{{ route('orders.create', $product->id) }}"
                                                        class="px-4 py-2 bg-violet-900 text-white rounded-md hover:bg-violet-950 shadow-sm">
                                                        Pesan
                                                    </a>
                                                    @else
                                                    <span class="text-gray-400">Tidak Tersedia</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tombol Lihat Selengkapnya / Tutup -->
                                        <div class="text-right mt-4">
                                            <button @click="open = !open"
                                                class="text-purple-700 text-sm hover:underline focus:outline-none">
                                                <span x-show="!open">Lihat Selengkapnya</span>
                                                <span x-show="open">Tutup</span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>