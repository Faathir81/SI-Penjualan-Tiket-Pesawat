<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto font-sans">
        <h1 class="text-2xl font-bold text-purple-800 text-center mb-2">Log in to Capsswing</h1>
        <p class="text-sm text-gray-600 text-center mb-6">Welcome back! Sign in using your email to continue us</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-purple-800" />
                <x-text-input 
                    id="email" 
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="Enter your email address"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-purple-800" />
                <x-text-input 
                    id="password" 
                    class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password" 
                    placeholder="Enter your password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                        name="remember" 
                    />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="px-3 py-2 bg-violet-900 text-white rounded-md shadow-lg hover:bg-violet-800 focus:outline-none">
                    <a href="/">Back to Home</a>
                </x-primary-button>

                <x-primary-button class="px-3 py-2 bg-violet-900 text-white rounded-md shadow-lg hover:bg-violet-800 focus:outline-none">
                    {{ __('Log in') }}
                </x-primary-button>

            </div>
        </form>
    </div>
</x-guest-layout>
