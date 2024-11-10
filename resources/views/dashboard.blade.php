<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5">

                <div class="mt-6">
                    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="departure_location" placeholder="Cari keberangkatan..."
                                class="form-input rounded-md shadow-sm" value="{{ request('departure_location') }}">
                            <button type="submit" class="ml-2 btn btn-primary">Cari</button>
                        </div>
                    </form>
                    <h2 class="text-lg font-medium text-gray-900">Daftar Tiket</h2>
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Nama Tiket</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Lokasi Keberangkatan</th>
                                <th scope="col">Lokasi Tiba</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuota</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-airplane-fill mr-2" viewBox="0 0 16 16">
                                            <path
                                                d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849" />
                                        </svg>
                                        <span class="p-2">{{ $product->airline }}</span>
                                    </div>
                                </td>

                                <td class="pt-3">{{ $product->category }}</td>
                                <td class="pt-3">{{ $product->departure_location }}</td>
                                <td class="pt-3">{{ $product->arrival_location }}</td>
                                <td class="pt-3">{{ $product->price }}</td>
                                <td class="pt-3">
                                    @if ($product->quota_tiket == 0)
                                    <span class="text-red-500">Sold Out</span>
                                    @else
                                    {{ $product->quota_tiket }}
                                    @endif
                                </td>

                                <!-- dashboard.blade.php -->
                                <td>
                                    <a href="{{ route('pesanan.dashboard', ['product_id' => $product->id]) }}"
                                        class="btn btn-primary">Pesan</a>
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