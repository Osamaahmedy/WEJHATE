<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-reverse space-x-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="text-2xl font-black tracking-wider text-slate-900 flex items-center">
                            <span class="bg-gradient-to-r from-sky-600 to-cyan-500 text-white px-2.5 py-1 rounded-lg mr-2 shadow-sm">و</span>
                            <span class="bg-gradient-to-r from-sky-700 to-cyan-600 bg-clip-text text-transparent">وجهتي</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 space-x-reverse sm:-my-px sm:flex">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-bold leading-5 transition {{ request()->routeIs('home') ? 'border-sky-500 text-sky-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }}">
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        الرئيسية
                    </a>
                    <a href="{{ route('hotels.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-bold leading-5 transition {{ request()->routeIs('hotels.*') ? 'border-sky-500 text-sky-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }}">
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        الفنادق في عدن
                    </a>
                    <a href="{{ route('drivers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-bold leading-5 transition {{ request()->routeIs('drivers.*') ? 'border-sky-500 text-sky-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }}">
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                        حجز تاكسي
                    </a>
                    @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-bold leading-5 transition {{ request()->routeIs('dashboard') ? 'border-sky-500 text-sky-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }}">
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                        لوحة التحكم
                    </a>
                    @endauth
                </div>
            </div>

            <!-- Settings & Auth Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-reverse space-x-4">
                @auth
                    <!-- Cart Indicator -->
                    @php
                        $cartCount = auth()->user()->cartItems()->count();
                    @endphp
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-slate-400 hover:text-slate-600 transition focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @if($cartCount > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-black leading-none text-red-100 transform translate-x-1/3 -translate-y-1/3 bg-rose-600 rounded-full">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ openDropdown: false }" @click.away="openDropdown = false">
                        <button @click="openDropdown = !openDropdown" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-lg text-slate-500 bg-slate-50 hover:bg-slate-100 hover:text-slate-700 focus:outline-none transition ease-in-out duration-150">
                            <!-- Avatar image or standard initials fallback -->
                            <div class="w-8 h-8 rounded-full bg-sky-100 border border-sky-200 overflow-hidden ml-2 flex items-center justify-center text-sky-700 font-bold">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                                @else
                                    {{ mb_substr(auth()->user()->name, 0, 1) }}
                                @endif
                            </div>
                            <div>{{ auth()->user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>

                        <div x-show="openDropdown" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute left-0 mt-2 w-48 rounded-2xl shadow-lg py-2 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50 text-right">
                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition">
                                <svg class="w-4 h-4 ml-2.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                                لوحة التحكم
                            </a>
                            <a href="{{ route('profile.bookings') }}" class="flex items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition">
                                <svg class="w-4 h-4 ml-2.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                                حجوزاتي
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition">
                                <svg class="w-4 h-4 ml-2.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                إعدادات الحساب
                            </a>
                            <hr class="border-slate-100 my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full text-right px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50 transition">
                                    <svg class="w-4 h-4 ml-2.5 text-rose-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-500 hover:text-slate-800 transition">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white text-sm font-bold rounded-lg transition shadow-sm">
                        إنشاء حساب جديد
                    </a>
                @endauth
            </div>

            <!-- Hamburger menu icon -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white border-b border-slate-100">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-bold transition {{ request()->routeIs('home') ? 'border-sky-500 text-sky-600 bg-sky-50' : 'border-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-50 hover:border-slate-300' }}">
                الرئيسية
            </a>
            <a href="{{ route('hotels.index') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-bold transition {{ request()->routeIs('hotels.*') ? 'border-sky-500 text-sky-600 bg-sky-50' : 'border-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-50 hover:border-slate-300' }}">
                الفنادق في عدن
            </a>
            <a href="{{ route('drivers.index') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-bold transition {{ request()->routeIs('drivers.*') ? 'border-sky-500 text-sky-600 bg-sky-50' : 'border-transparent text-slate-600 hover:text-slate-800 hover:bg-slate-50 hover:border-slate-300' }}">
                حجز تاكسي
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-100">
            @auth
                <div class="flex items-center px-4">
                    <div class="shrink-0 ml-3">
                        <div class="w-10 h-10 rounded-full bg-sky-100 border border-sky-200 overflow-hidden flex items-center justify-center text-sky-700 font-bold">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                            @else
                                {{ mb_substr(auth()->user()->name, 0, 1) }}
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-base text-slate-800">{{ auth()->user()->name }}</div>
                        <div class="font-medium text-sm text-slate-500">{{ auth()->user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <a href="{{ route('cart.index') }}" class="block pl-3 pr-4 py-2 text-base font-bold text-slate-600 hover:text-slate-800 hover:bg-slate-50">
                        السلة ({{ auth()->user()->cartItems()->count() }})
                    </a>
                    <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 text-base font-bold text-slate-600 hover:text-slate-800 hover:bg-slate-50">
                        لوحة التحكم
                    </a>
                    <a href="{{ route('profile.bookings') }}" class="block pl-3 pr-4 py-2 text-base font-bold text-slate-600 hover:text-slate-800 hover:bg-slate-50">
                        حجوزاتي
                    </a>
                    <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-bold text-slate-600 hover:text-slate-800 hover:bg-slate-50">
                        إعدادات الحساب
                    </a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-right pl-3 pr-4 py-2 text-base font-bold text-rose-600 hover:text-rose-800 hover:bg-rose-50">
                            تسجيل الخروج
                        </button>
                    </form>
                </div>
            @else
                <div class="px-4 py-2 space-y-2">
                    <a href="{{ route('login') }}" class="block text-center py-2 border border-slate-300 text-slate-700 rounded-lg font-bold hover:bg-slate-50 transition">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="block text-center py-2 bg-sky-600 text-white rounded-lg font-bold hover:bg-sky-700 transition">إنشاء حساب جديد</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
