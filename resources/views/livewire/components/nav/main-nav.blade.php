<div>

    <!-- Primary Navigation Menu -->

    <div class=" justify-between h-16 px-8 shadow-xl shadow-gray-300">
        <div class="flex justify-between">

            {{-- main links --}}
            <div class="flex h-16 ">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="flex items-center">
                        <img class="block h-9 w-auto" src="{{ asset('assets/Logo_IDAM.jpg') }}" alt="Application Logo" />
                        <div class="ml-2 text-2xl font-semibold text-gray-900">
                            <div>IDAM</div>
                        </div>
                    </a>
                </div>
                <div class="pt-2">&copy;</div>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('welcome') }}" class="text-xl">
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('PropertyView') }}" class="text-xl">
                        {{ __('Properties') }}
                    </x-nav-link>

                </div>
            </div>

            {{-- Auth Menu --}}
            <div
                class=" sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center selection:bg-red-500 selection:text-white h-16">
                @if (Route::has('login'))
                    <div class="  sm:top-0 sm:right-0 p-6 text-right z-10">
                        <div class="p-2 bg-gray-200 flex gap-4 items-center rounded-md">

                            {{-- auth rekated links --}}
                            @auth
                                @can('HighAuth_Gate')
                                    <a href="{{ url('dashboard') }}"
                                        class="font-semibold text-gray-800 hover:text-blue-400 focus:outline focus:outline-2 focus:rounded-sm focus:scale-1.01">Dashboard</a>
                                @endcan
                                @can('propOwner_Gate')
                                    <a href="{{ url('listings') }}"
                                        class="font-semibold text-gray-800 hover:text-blue-400 focus:outline focus:outline-2 focus:rounded-sm focus:scale-1.01">My
                                        listings</a>
                                @endcan
                                {{-- Need to add the route for the contracts --}}
                                @can('Customer_Gate')
                                    <a href="{{ url('dashboard') }}"
                                        class="font-semibold text-gray-800 hover:text-blue-400 focus:outline focus:outline-2 focus:rounded-sm focus:scale-1.01">My
                                        Contracts</a>
                                @endcan

                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button
                                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover"
                                                    src="{{ Auth::user()->profile_photo_url }}"
                                                    alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <div class="border-t border-gray-200"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf

                                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>



</div>
