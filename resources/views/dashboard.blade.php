<x-app-layout>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-8">

                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('tickets') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                            Cari
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>