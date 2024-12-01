<nav x-data="{ open: false }" class="bg-white border-b border-indigo-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="boxlogo flex items-center justify-cente h-16 ">
                    <a href="
                            @auth
                                @if(auth()->user()->hasRole('admin'))
                                    {{ route('admin.dashboard') }}
                                @elseif(auth()->user()->hasRole('teamIT'))
                                    {{ route('team') }}
                                @else
                                    {{ route('dashboard') }}
                                @endif
                            @else
                                {{ route('welcome') }}
                            @endauth
                        " class="flex items-center">
                        <x-application-logo-violet class="block h-8 w-auto fill-current text-gray-100" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                @if (auth()->user()->usertype === 'user')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('tickets') }}" :active="request()->routeIs('tickets')">
                        {{ __('Tickets') }}
                    </x-nav-link>
                </div>
                @elseif (auth()->user()->usertype === 'admin')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('admin/dashboard') }}" :active="request()->routeIs('admin/dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @else
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('team') }}" :active="request()->routeIs('team')">
                        {{ __('Team Capsswing') }}
                    </x-nav-link>
                </div>
                @endif
                @else
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        {{ __('Welcome') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('tickets') }}" :active="request()->routeIs('tickets')">
                        {{ __('Tickets') }}
                    </x-nav-link>
                </div>
                @endauth
            </div>

            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-transparent hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
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
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if(auth()->check() && auth()->user()->usertype === 'user')
                        <x-dropdown-link :href="route('orders.myTicket')">
                            {{ __('myTicket') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('orders.history')">
                            {{ __('History') }}
                        </x-dropdown-link>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link href="{{route('login')}}">
                    {{__('Login')}}
                </x-nav-link>
                <x-nav-link href="{{route('register')}}">
                    {{__('Register')}}
                </x-nav-link>
            </div>
            @endauth

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-transparent">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Responsive Links -->
            @auth
            @if (auth()->user()->usertype === 'user')
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('tickets') }}" :active="request()->routeIs('tickets')">
                {{ __('Tickets') }}
            </x-responsive-nav-link>
            @elseif(auth()->user()->usertype === 'admin')
            <x-responsive-nav-link href="{{ route('admin/dashboard') }}"
                :active="request()->routeIs('admin/dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @elseif(auth()->user()->usertype === 'teamIT')
            <x-responsive-nav-link href="{{ route('team') }}" :active="request()->routeIs('team')">
                {{ __('Team Capsswing') }}
            </x-responsive-nav-link>
            @endif
            @endauth
        </div>
    </div>
</nav>