<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-3xl font-semibold mb-6 text-gray-800">Masukkan Jumlah Uang</h3>

                <form action="{{ route('transaction.process') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Input Jumlah Uang -->
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Uang</label>
                        <input type="number" name="amount" id="amount"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Masukkan jumlah uang" required>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>