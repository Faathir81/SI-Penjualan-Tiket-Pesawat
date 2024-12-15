<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Add Product</h1>
                    <hr class="mb-6" />

                    @if (session()->has('error'))
                    <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ session('error') }}
                    </div>
                    @endif

                    <p class="mb-6">
                        <a href="{{ route('admin.products') }}" 
                            class="inline-block px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600">
                            Go Back
                        </a>
                    </p>

                    <form action="{{ route('admin.products.save') }}" method="POST">
                        @csrf

                        <!-- Airline -->
                        <div class="mb-6">
                            <input type="text" name="airline" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Airline" required>
                            @error('airline')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <select name="category" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                required>
                                <option value="">Select Category</option>
                                <option value="class A">Class VIP</option>
                                <option value="class B">Class Business</option>
                                <option value="class C">Class Economy</option>
                            </select>
                            @error('category')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Departure Location -->
                        <div class="mb-6">
                            <input type="text" name="departure_location" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Departure Location" required>
                            @error('departure_location')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Arrival Location -->
                        <div class="mb-6">
                            <input type="text" name="arrival_location" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Arrival Location" required>
                            @error('arrival_location')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Departure Time -->
                        <div class="mb-6">
                            <input type="datetime-local" name="departure_time" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                required>
                            @error('departure_time')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Arrival Time -->
                        <div class="mb-6">
                            <input type="datetime-local" name="arrival_time" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                required>
                            @error('arrival_time')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-6">
                            <input type="number" name="price" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Price" required>
                            @error('price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Quota Tiket -->
                        <div class="mb-6">
                            <input type="number" name="quota_tiket" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="Quota Tiket (max 25)" max="25" required>
                            @error('quota_tiket')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-2 text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
