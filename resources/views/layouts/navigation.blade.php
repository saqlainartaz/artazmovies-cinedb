<nav class="navbar bg-primary text-primary-content px-4 sm:px-8">
    <div class="navbar-start">


        <a href="{{ route('movies') }}" class="flex items-center gap-2">
            <span class="font-bold text-xl tracking-tighter">ARTAZ</span>
        </a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 gap-2">
            <li>
                <a href="{{ route('movies') }}" class="{{ request()->routeIs('movies') ? 'active' : '' }}">
                    Movies
                </a>
            </li>
        </ul>
    </div>

    <div class="navbar-end">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow-xl bg-base-100 text-base-content rounded-box w-52 border border-base-300">
                <li><a href="{{ route('movies') }}">Movies</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
            </ul>
        </div>
        @auth
            <a href="{{ route('watchlist.index') }}" class="btn bg-base-100 text-base-content shadow-sm border-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>
                View My Watchlist
            </a>
            <div class="dropdown dropdown-end">

                <div tabindex="0" role="button" class="btn btn-ghost flex items-center gap-2">
                    <span class="font-medium">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 opacity-60" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </div>

                <ul tabindex="0"
                    class="dropdown-content menu p-2 shadow-2xl bg-base-100 text-base-content rounded-box w-60 mt-2 border border-base-300">
                    <li class="menu-title flex flex-col items-start px-4 py-3 border-b border-base-200 mb-2">
                        <span class="text-xs uppercase tracking-wider opacity-50">Logged in as</span>
                        <span class="text-sm font-semibold text-primary lowercase">{{ Auth::user()->email }}</span>
                    </li>

                    <li>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 py-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 py-3 text-error w-full text-left">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="hidden sm:flex gap-2">
                <a href="{{ route('login') }}" class="btn bg-base-100 text-base-content shadow-sm border-none">Login</a>
                <a href="{{ route('register') }}"
                    class="btn bg-base-100 text-base-content shadow-sm border-none">Register</a>
            </div>
        @endauth
    </div>
</nav>