<nav
    class="flex justify-between bg-gray-300"
>
    <div class="flex items-center justify-between flex-1">
        <!-- logo -->
        <a class="flex items-center p-2" href="{{ url('/') }}">
            <img src="{{ asset('favicons/favicon-96x96.png') }}" alt="Icon" class="h-8 mr-2">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button type="button" class="m-2 w-6 h-6 fill-current sm:hidden" x-on:click="menuIsOpen = true">
            <svg focusable="false" viewBox="0 0 24 24">
                <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
            </svg>
        </button>
    </div>

    <!-- desktop -->
    <div class="hidden sm:flex">
        @include('partials._nav-links')
    </div>


    <!-- mobile -->
    <div
        class="z-10 absolute right-0 inset-y-0 bg-gray-800 sm:hidden"
        x-show="menuIsOpen"
    >
        <div class="w-full text-right">
            <button type="button" class="p-4 text-2xl text-white" x-on:click="menuIsOpen = false">ⓧ</button>
        </div>

        <div class="flex flex-col p-4 w-64">
            @include('partials._nav-links')
        </div>
    </div>

</nav>

{{--<nav class="flex items-center justify-between">
    <div>
        <a class="flex items-center p-2" href="{{ url('/') }}">
            <img src="{{ asset('favicons/favicon-96x96.png') }}" alt="Icon" class="h-8 mr-2">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <div class="flex">
        <a class="ml-2 p-2 underline" href="{{ url('/') }}">
            Link 1
        </a>
        <a class="ml-2 p-2 underline" href="{{ url('/') }}">
            Link 2
        </a>

        @guest
            <a class="ml-2 p-2 underline" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="ml-2 p-2 underline" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <div class="relative" x-data="{ isOpen: false }" @click.away="isOpen = false">
                <button type="button" class="ml-2 p-2" @click.stop.prevent="isOpen = !isOpen">
                    {{ Auth::user()->name }}
                </button>

                <div class="absolute right-0 mt-1 flex flex-col bg-black" x-show="isOpen">
                    <a class="px-4 py-2 underline hover:bg-gray-900" href="{{ url('/') }}">
                        Subscription
                    </a>

                    <a class="px-4 py-2 underline hover:bg-gray-900" href="{{ url('/') }}">
                        Settings
                    </a>

                    <form class="" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 underline hover:bg-gray-900 w-full text-left">Logout
                        </button>
                    </form>
                </div>
            </div>
        @endguest
    </div>
</nav>--}}
