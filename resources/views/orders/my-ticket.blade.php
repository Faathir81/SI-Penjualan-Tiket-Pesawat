<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tiket Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg px-6 py-8">

                <h3 class="text-2xl font-bold mb-6 text-indigo-600">Daftar Tiket Anda</h3>

                @if ($tickets->isEmpty())
                <p class="text-gray-600">Anda belum memiliki tiket yang aktif atau belum kedaluwarsa.</p>
                @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($tickets as $ticket)
                    <div class="bg-indigo-100 p-4 rounded-md shadow-md">
                        <h4 class="text-lg font-semibold text-indigo-700 mb-2">{{ $ticket->product->airline }}</h4>
                        <p><strong>Nomor Kursi:</strong> {{ $ticket->seat }}</p>
                        <p><strong>Keberangkatan:</strong> {{ $ticket->product->departure_location }}</p>
                        <p><strong>Tiba:</strong> {{ $ticket->product->arrival_location }}</p>
                        <p><strong>Waktu:</strong>
                            {{ $ticket->product->departure_time->format('d M Y, H:i') }}
                        </p>
                        <p><strong>Status:</strong> <span class="text-green-600 font-bold">Aktif</span></p>
                        <a href="{{ route('ticket.detail', $ticket->id) }}"
                            class="mt-4 inline-block px-4 py-2 bg-indigo-500 text-white rounded-md shadow hover:bg-indigo-600">
                            Lihat Detail
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>