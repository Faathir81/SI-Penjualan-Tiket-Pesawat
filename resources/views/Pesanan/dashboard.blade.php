<!-- resources/views/pesanan/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Pesanan - {{ $product->airline }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5">
                <h2 class="text-lg font-medium text-gray-900">Detail Tiket</h2>
                <form method="POST" action="{{ route('pesanan.create', ['product_id' => $product->id]) }}">
                    @csrf
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Nama Tiket</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->airline }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quota_tiket }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Form untuk input data pembeli dan jumlah tiket -->
                    <h3 class="text-lg font-medium text-gray-900 mt-4">Informasi Pembeli</h3>
                    <div class="mt-4">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nama Pembeli</label>
                            <input type="text" name="name" id="name" class="form-input mt-1 block w-full"
                                value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email Pembeli</label>
                            <input type="email" name="email" id="email" class="form-input mt-1 block w-full"
                                value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700">Jumlah Tiket</label>
                            <input type="number" name="quantity" id="quantity" class="form-input mt-1 block w-full"
                                value="1" min="1" required>
                        </div>
                    </div>

                    <!-- Menyembunyikan beberapa field seperti product_id dan harga -->
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <button type="submit" class="btn btn-primary mt-4">Pesan Tiket</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>