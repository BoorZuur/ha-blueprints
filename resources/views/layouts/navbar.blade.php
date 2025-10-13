<nav>
    <x-nav-link href="{{ route('home') }}" :active="Route::is('home')">Home</x-nav-link>
    <x-nav-link href="{{ route('about') }}" :active="Route::is('about')">About</x-nav-link>
    <x-nav-link href="{{ route('contact') }}" :active="Route::is('contact')">Contact</x-nav-link>
    @if (Route::has('login'))
        @auth
            <x-nav-link href="{{ url('/dashboard') }}" :active="Route::is('dashboard')">Dashboard</x-nav-link>
        @else
            <x-nav-link href="{{ route('login') }}" :active="Route::is('login')">Log in</x-nav-link>

            @if (Route::has('register'))
                <x-nav-link href="{{ route('register') }}" :active="Route::is('register')">Register</x-nav-link>
            @endif
        @endauth
    @endif
</nav>
