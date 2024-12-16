<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-8">
                <div class="p-6 text-gray-900">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold">List Product</h1>
                        <a href="{{ route('admin.products.create') }}"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                            Add Product
                        </a>
                    </div>
                    <hr class="mb-6" />

                    <!-- Success Message -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <!-- Product Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 bg-gray-50 shadow-md rounded-lg">
                            <thead>
                                <tr class="bg-indigo-500 text-white">
                                    <th class="px-4 py-3 text-left border">No.</th>
                                    <th class="px-4 py-3 text-left border">Airline</th>
                                    <th class="px-4 py-3 text-left border">Category</th>
                                    <th class="px-4 py-3 text-left border">Departure Location</th>
                                    <th class="px-4 py-3 text-left border">Arrival Location</th>
                                    <th class="px-4 py-3 text-left border">Departure Time</th>
                                    <th class="px-4 py-3 text-left border">Arrival Time</th>
                                    <th class="px-4 py-3 text-left border">Price</th>
                                    <th class="px-4 py-3 text-left border">Unit</th>
                                    <th class="px-4 py-3 text-left border">Change</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                @if(Auth::user()->hasRole('admin') && Auth::id() == $product->id_user)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 border">{{ $product->airline }}</td>
                                    <td class="px-4 py-3 border">{{ $product->category }}</td>
                                    <td class="px-4 py-3 border">{{ $product->departure_location }}</td>
                                    <td class="px-4 py-3 border">{{ $product->arrival_location }}</td>
                                    <td class="px-4 py-3 border">{{ $product->departure_time }}</td>
                                    <td class="px-4 py-3 border">{{ $product->arrival_time }}</td>
                                    <td class="px-4 py-3 border">Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 border">{{ $product->quota_tiket }}</td>
                                    <td class="px-4 py-3 border">
                                        <div class="flex space-x-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600 focus:outline-none">
                                                Edit
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <a href="#" 
                                               onclick="event.preventDefault(); 
                                                       if (confirm('Are you sure you want to delete this product?')) {
                                                           document.getElementById('delete-form-{{ $product->id }}').submit();
                                                       }" 
                                               class="px-3 py-1 bg-red-500 text-white rounded-md shadow hover:bg-red-600 focus:outline-none">
                                                Delete
                                            </a>
                                        
                                            <!-- Hidden Form for Deleting Product -->
                                            <form id="delete-form-{{ $product->id }}" 
                                                  action="{{ route('admin.products.delete', ['id' => $product->id]) }}" 
                                                  method="POST" 
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>                                        
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center px-4 py-3 text-gray-500">
                                        Product not found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>