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
                    <h1 class="mb-0">Edit Product</h1>
                    <hr />
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="airline">Airline</label>
                            <input type="text" name="airline" class="form-control"
                                value="{{ old('airline', $product->airline) }}">
                            @error('airline')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" placeholder="Category"
                                    value="{{ old('category', $product->category) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Departure Location</label>
                                <input type="text" name="departure_location" class="form-control"
                                    placeholder="Departure Location"
                                    value="{{ old('departure_location', $product->departure_location) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Arrival Location</label>
                                <input type="text" name="arrival_location" class="form-control"
                                    placeholder="Arrival Location"
                                    value="{{ old('arrival_location', $product->arrival_location) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Departure Time</label>
                                <input type="datetime-local" name="departure_time" class="form-control"
                                    value="{{ old('departure_time', \Carbon\Carbon::parse($product->departure_time)->format('Y-m-d\TH:i')) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Arrival Time</label>
                                <input type="datetime-local" name="arrival_time" class="form-control"
                                    value="{{ old('arrival_time', \Carbon\Carbon::parse($product->arrival_time)->format('Y-m-d\TH:i')) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price"
                                    value="{{ old('price', $product->price) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning">
                                    Update Now!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>