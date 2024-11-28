<x-app-layout>
    <div class="relative min-h-screen bg-gray-100">
        <!-- Background Image -->
        <img id="background" class="absolute inset-0 w-full h-full object-cover"
            src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />

        <!-- Main Content -->
        <div class="relative z-10 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-80 shadow-lg sm:rounded-lg px-6 py-8">
                    <!-- Form Pencarian -->
                    <div class="mb-6 max-w-7xl mx-auto flex justify-center">
                        <form method="GET" action="{{ route('welcome') }}"
                            class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
        </div>
    </div>
</x-app-layout>