<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
                    <hr class="mb-6" />
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Airline -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Airline</label>
                            <input type="text" name="airline" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Airline"
                                value="{{ old('airline', $product->airline) }}">
                            @error('airline')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <input type="text" name="category" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Category"
                                value="{{ old('category', $product->category) }}">
                        </div>

                        <!-- Departure Location -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Departure Location</label>
                            <input type="text" name="departure_location" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Departure Location"
                                value="{{ old('departure_location', $product->departure_location) }}">
                        </div>

                        <!-- Arrival Location -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Arrival Location</label>
                            <input type="text" name="arrival_location" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Arrival Location"
                                value="{{ old('arrival_location', $product->arrival_location) }}">
                        </div>

                        <!-- Departure Time -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Departure Time</label>
                            <input type="datetime-local" name="departure_time" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                value="{{ old('departure_time', \Carbon\Carbon::parse($product->departure_time)->format('Y-m-d\TH:i')) }}">
                        </div>

                        <!-- Arrival Time -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Arrival Time</label>
                            <input type="datetime-local" name="arrival_time" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                value="{{ old('arrival_time', \Carbon\Carbon::parse($product->arrival_time)->format('Y-m-d\TH:i')) }}">
                        </div>

                        <!-- Price -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                            <input type="number" name="price" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Price"
                                value="{{ old('price', $product->price) }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit" 
                                class="px-6 py-2 bg-indigo-500 text-white font-medium rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Update Now!
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
