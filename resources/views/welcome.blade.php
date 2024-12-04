<x-app-home-layout>
    <div class="relative min-h-screen bg-gray-100">
        <!-- Background Image -->
        <img id="background" class="absolute inset-0 w-full h-full object-cover"
            src="https://raw.githubusercontent.com/Faathir81/SI-Penjualan-Tiket-Pesawat/refs/heads/main/public/images/bg.png"
            alt="Laravel background" />

        <!-- Main Content -->
        <div class=" relative z-10 min-h-screen flex flex-col items-start justify-center px-12">
            <!-- Text Section -->
            <div class="mb-7">
                <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight">
                    Welcome to Capsswing :
                    <span class="text-white underline">
                        Where Will Your <br> Journey Take You
                    </span>
                    Today?
                </h1>
            </div>

            <!-- Form Section -->
            <div class="w-full max-w-2xl">

                <form method="GET" action="{{ route('welcome') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @csrf
                    <!-- Lokasi Keberangkatan -->
                    <div>
                        <label for="departure_location" class="block text-lg font-medium text-white">
                            Lokasi Keberangkatan
                        </label>
                        <input type="text" name="departure_location" id="departure_location"
                            placeholder="Masukkan lokasi keberangkatan"
                            class="w-full px-4 py-3 mt-1 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Lokasi Tiba -->
                    <div>
                        <label for="arrival_location" class="block text-lg font-medium text-white">
                            Lokasi Tiba
                        </label>
                        <input type="text" name="arrival_location" id="arrival_location"
                            placeholder="Masukkan lokasi tiba"
                            class="w-full px-4 py-3 mt-1 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Tombol Cari -->
                    <div class="flex items-end gap-4">
                        <button type="submit"
                            class="px-12 py-3 bg-indigo-700 text-white rounded-md shadow-lg hover:bg-indigo-500 focus:outline-none">
                            Cari
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-home-layout>