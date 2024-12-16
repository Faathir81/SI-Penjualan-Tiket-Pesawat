<x-guest-layout>
    <div class="max-w-md mx-auto font-sans">
        <h1 class="text-2xl font-bold text-purple-800 text-center mb-2">Register to Capsswing</h1>
        <p class="text-sm text-gray-600 text-center mb-6">Create your account and join us</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-purple-800">Name :</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Enter your full name"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-purple-800">Email :</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    placeholder="Enter your email address"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-purple-800">Password :</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="Enter your password"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-purple-800">Confirm Password
                    :</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm your password"
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                @error('password_confirmation')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="space-y-4 mt-4">
                <!-- Register Button dan Login dengan Google -->
                <div class="flex items-center justify-center space-x-4">
                    <!-- Register Button -->
                    <button type="submit"
                        class="px-4 py-2 bg-violet-900 text-white rounded-md shadow hover:bg-violet-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500">
                        {{ __('Sign Up') }}
                    </button>
            
                    <!-- Login with Google -->
                    <a href="{{ route('auth.google') }}"
                        class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <!-- Google Icon -->
                        <img src="https://cdn-icons-png.flaticon.com/256/2702/2702602.png"
                            alt="Google Logo" class="w-6 h-6 mr-2">
                        <span class="text-gray-700 text-sm font-medium">Register with Google</span>
                    </a>
                </div>
            
                <!-- Sudah punya akun -->
                <div class="flex justify-center">
                    <a href="{{ route('login') }}"
                        class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Already have an account?') }}
                    </a>
                </div>
            </div>            
        </form>
    </div>
</x-guest-layout>