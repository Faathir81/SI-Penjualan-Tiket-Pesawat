<nav x-data="{ open: false }" class="bg-transparent transition-colors duration-300 z-50 fixed w-full top-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo and Large Text -->
                <div class="shrink-0 flex items-center space-x-4">
                    @auth
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-100" />
                    </a>
                    @endauth
                    @guest
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-100" />
                    </a>
                    @endguest
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                    @auth
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="!text-white hover:text-purple-500 active:text-white transition-colors duration-300 text-xl">
                        {{ __('Welcome') }}
                    </x-nav-link>
                    @endauth
                    @guest
                    <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')"
                        class="!text-white hover:text-purple-500 active:text-white transition-colors duration-300 text-xl">
                        {{ __('Welcome') }}
                    </x-nav-link>

                    @endguest

                    <x-nav-link href="{{ route('tickets') }}" :active="request()->routeIs('tickets')"
                        class="!text-white hover:text-purple-500 active:text-white transition-colors duration-300 text-xl">
                        {{ __('Tickets') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Desktop Login/Register or Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                @guest
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-gray-100 hover:text-indigo-500 active:text-white border border-transparent rounded-md hover:bg-white bg-indigo-500 transition duration-300">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 text-gray-100 hover:text-indigo-500 active:text-white border border-transparent rounded-md hover:bg-white bg-indigo-500 transition duration-300">
                    {{ __('Register') }}
                </a>
                @endguest
                @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-4 py-2 text-gray-100 hover:text-indigo-500 active:text-white border border-transparent rounded-md hover:bg-white bg-indigo-500 transition duration-300">
                                <div class="font-bold">{{ Auth::user()->name }}</div>
                                <div class="ml-2">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-indigo-500 font-bold">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if(auth()->check() && auth()->user()->usertype === 'user')
                            <x-dropdown-link :href="route('orders.myTicket')" class="text-indigo-500 font-bold">
                                {{ __('myTicket') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('orders.history')" class="text-indigo-500 font-bold">
                                {{ __('History') }}
                            </x-dropdown-link>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-red-600 font-bold">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth
            </div>

            <!-- Hamburger Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-purple-500 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-purple-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Links for Authenticated Users -->
            @auth
            @if (auth()->user()->usertype === 'user')
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                class="text-white hover:text-purple-500 active:text-white transition-colors duration-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('tickets') }}" :active="request()->routeIs('tickets')"
                class="text-white hover:text-purple-500 active:text-white transition-colors duration-300">
                {{ __('Tickets') }}
            </x-responsive-nav-link>
            @elseif(auth()->user()->usertype === 'admin')
            <x-responsive-nav-link href="{{ route('admin/dashboard') }}" :active="request()->routeIs('admin/dashboard')"
                class="text-white hover:text-purple-500 active:text-white transition-colors duration-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @elseif(auth()->user()->usertype === 'teamIT')
            <x-responsive-nav-link href="{{ route('team') }}" :active="request()->routeIs('team')"
                class="text-white hover:text-purple-500 active:text-white transition-colors duration-300">
                {{ __('Team Capsswing') }}
            </x-responsive-nav-link>
            @endif
            @endauth

            <!-- Links for Guests -->
            @guest
            <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')"
                class="text-white hover:text-purple-500 active:text-white transition-colors duration-300">
                {{ __('Login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')"
                class="text-white hover:text-purple-500 active:text-white transition-colors duration-300">
                {{ __('Register') }}
            </x-responsive-nav-link>
            @endguest
        </div>
    </div>
</nav>