<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-violet-900 leading-tight">
            {{ __('Tiket Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg px-6 py-8">

                <h3 class="text-2xl font-bold mb-6 text-violet-900">Daftar Tiket Anda</h3>

                @if ($tickets->isEmpty())
                <p class="text-gray-600">Anda belum memiliki tiket yang aktif atau belum kedaluwarsa.</p>
                @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                    @foreach ($tickets as $ticket)
                    <!-- Kartu Tiket -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                        <!-- Header Kartu -->
                        <div class="bg-violet-950 text-white rounded-t-xl p-4">
                            <h4 class="text-lg font-bold">{{ $ticket->product->airline }}</h4>
                            <span class="text-sm opacity-80">Nomor Kursi: {{ $ticket->seat }}</span>
                        </div>
                        
                        <!-- Body Kartu -->
                        <div class="p-4 space-y-3">
                            <div class="flex justify-between">
                                <p class="text-gray-700 font-medium">Keberangkatan:</p>
                                <p class="text-right font-semibold">{{ $ticket->product->departure_location }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-700 font-medium">Tiba:</p>
                                <p class="text-right font-semibold">{{ $ticket->product->arrival_location }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-700 font-medium">Waktu:</p>
                                <p class="text-right font-semibold">{{ $ticket->product->departure_time->format('d M Y, H:i') }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-700 font-medium">Status:</p>
                                <span class="text-green-600 font-bold">Aktif</span>
                            </div>
                        </div>
                
                        <!-- Footer Kartu -->
                        <div class="bg-gray-50 rounded-b-xl p-4 flex justify-center">
                            <a href="{{ route('ticket.detail', $ticket->id) }}"
                                class="px-5 py-2 bg-violet-900 text-white font-semibold rounded-md shadow hover:bg-violet-950 transition-all duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>                
                @endif

            </div>
        </div>
    </div>
</x-app-layout>