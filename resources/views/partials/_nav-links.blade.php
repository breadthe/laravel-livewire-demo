<a class="ml-2 p-2 underline text-gray-100 sm:text-gray-700 hover:bg-gray-300 hover:text-black" href="{{ url('/') }}">
    Link 1
</a>
<a class="ml-2 p-2 underline text-gray-100 sm:text-gray-700 hover:bg-gray-300 hover:text-black" href="{{ url('/') }}">
    Link 2
</a>

@guest
    <a class="ml-2 p-2 underline" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
        <a class="ml-2 p-2 underline" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
@else
    <!-- desktop -->
    <div class="relative hidden sm:block" x-data="{ dropdownIsOpen: false }" @click.away="dropdownIsOpen = false">
        <button
            type="button"
            class="flex items-center ml-2 p-2 font-black"
            @click.stop.prevent="dropdownIsOpen = !dropdownIsOpen"
        >
            {{ Auth::user()->name }}

            <span x-show="dropdownIsOpen" x-cloak>
                @include('partials.icons._svg', ['icon' => 'chevron-down', 'width' => 28, 'height' => 28, 'viewBox' => '20 20', 'strokeWidth' => 0, 'fill' => true])
            </span>
            <span x-show="!dropdownIsOpen" x-cloak>
                @include('partials.icons._svg', ['icon' => 'chevron-up', 'width' => 28, 'height' => 28, 'viewBox' => '20 20', 'strokeWidth' => 0, 'fill' => true])
            </span>
        </button>

        <div
            class="absolute right-0 mt-1 flex flex-col bg-gray-300"
            x-show="dropdownIsOpen"
        >
            <a class="px-4 py-2 underline hover:bg-gray-100" href="{{ url('/') }}">
                Subscription
            </a>

            <a class="px-4 py-2 underline hover:bg-gray-100" href="{{ url('/') }}">
                Settings
            </a>

            <form class="" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 underline hover:bg-gray-100 w-full text-left font-light">Logout
                </button>
            </form>
        </div>
    </div>

    <!-- mobile -->
    <div class="flex flex-col sm:hidden mt-8 text-gray-100">
        <span class="ml-2 p-2 font-black">
            {{ Auth::user()->name }}
        </span>

        <a class="px-4 py-2 underline text-gray-100 sm:text-gray-700 hover:bg-gray-300" href="{{ url('/') }}">
            Subscription
        </a>

        <a class="px-4 py-2 underline text-gray-100 sm:text-gray-700 hover:bg-gray-300" href="{{ url('/') }}">
            Settings
        </a>

        <form class="" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="px-4 py-2 underline hover:bg-gray-300 hover:text-black w-full text-left font-light">Logout
            </button>
        </form>
    </div>
@endguest
