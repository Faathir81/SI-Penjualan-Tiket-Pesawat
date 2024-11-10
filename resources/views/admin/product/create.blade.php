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
                    <h1 class="mb-0">Add Product</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{ session('error') }}
                    </div>
                    @endif

                    <p><a href="{{ route('admin/products') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/products/save') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="airline" class="form-control" placeholder="Airline" required>
                                @error('airline')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select name="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <option value="class A">Class VIP</option>
                                    <option value="class B">Class Business</option>
                                    <option value="class C">Class Economy</option>
                                </select>
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="departure_location" class="form-control"
                                    placeholder="Departure Location" required>
                                @error('departure_location')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="arrival_location" class="form-control"
                                    placeholder="Arrival Location" required>
                                @error('arrival_location')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="datetime-local" name="departure_time" class="form-control"
                                    placeholder="Departure Time" required>
                                @error('departure_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="datetime-local" name="arrival_time" class="form-control"
                                    placeholder="Arrival Time" required>
                                @error('arrival_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="price" class="form-control" placeholder="Price" required>
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="quota_tiket" class="form-control"
                                    placeholder="Quota Tiket (max 25)" max="25" required>
                                @error('quota_tiket')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>