<x-guest-layout>
    <div class="max-w-md mx-auto font-sans">
        <h1 class="text-2xl font-bold text-purple-800 text-center mb-2">Register to Capsswing</h1>
        <p class="text-sm text-gray-600 text-center mb-6">Create your account and join us</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-purple-800">Name :</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name" 
                    placeholder="Enter your full name" 
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-purple-800">Email :</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autocomplete="username" 
                    placeholder="Enter your email address" 
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-purple-800">Password :</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Enter your password" 
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-purple-800">Confirm Password :</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Confirm your password" 
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('password_confirmation')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="flex items-center justify-end space-x-4">
                <!-- Already have an account -->
                <a href="{{ route('login') }}" class="text-purple-800 hover:text-purple-600 underline text-sm">
                    Already have an account?
                </a>

                <!-- Register Button -->
                <button type="submit"  class="px-4 py-2 bg-violet-900 text-white rounded-md shadow-lg hover:bg-violet-800 focus:outline-none"> 
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
