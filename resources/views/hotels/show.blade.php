<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('hotels.index') }}" class="p-2 text-slate-400 hover:text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-lg transition">
                <svg class="h-5 w-5 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                    {{ $hotel->name }}
                </h2>
                <span class="text-sm text-slate-500">{{ $hotel->address }}</span>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border-r-4 border-rose-500 rounded-2xl text-rose-700 text-sm font-bold text-right shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left Column: Hotel Info (col-span-8) -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Large Hotel Banner -->
                <div class="bg-gradient-to-tr from-sky-800 to-cyan-500 text-white rounded-3xl p-10 h-72 flex flex-col justify-end relative overflow-hidden shadow-sm">
                    <div class="absolute inset-0 bg-slate-950/40"></div>
                    <div class="relative z-10 space-y-2 text-right">
                        <span class="bg-white/95 text-slate-800 px-3 py-1 rounded-full text-xs font-bold shadow-sm inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-amber-500 fill-amber-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            {{ number_format($hotel->rating, 1) }}
                        </span>
                        <h1 class="text-3xl font-black">{{ $hotel->name }}</h1>
                        <p class="text-sm text-slate-200">{{ $hotel->address }}</p>
                    </div>
                </div>

                <!-- Hotel Description -->
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm space-y-4 text-right">
                    <h3 class="text-xl font-bold text-slate-900 border-b border-slate-50 pb-4">عن الفندق</h3>
                    <p class="text-slate-600 leading-relaxed text-base">
                        {{ $hotel->description }}
                    </p>
                </div>

                <!-- Hotel Amenities -->
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm text-right">
                    <h3 class="text-xl font-bold text-slate-900 border-b border-slate-50 pb-4 mb-6">الميزات والخدمات</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="p-4 bg-slate-50 rounded-2xl flex flex-col items-center justify-center text-center space-y-2">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071a10.5 10.5 0 0114.14 0M1.414 6.586a16.5 16.5 0 0121.172 0"/></svg>
                            <span class="text-xs font-bold text-slate-700">إنترنت مجاني سريع</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl flex flex-col items-center justify-center text-center space-y-2">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.586 10.414a2 2 0 00-2.828 0L12 17.172l-6.758-6.758a2 2 0 10-2.828 2.828l8.172 8.172a2 2 0 002.828 0l8.172-8.172a2 2 0 000-2.828z"/></svg>
                            <span class="text-xs font-bold text-slate-700">مسبح خارجي مجهز</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl flex flex-col items-center justify-center text-center space-y-2">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                            <span class="text-xs font-bold text-slate-700">مواقف سيارات آمنة</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl flex flex-col items-center justify-center text-center space-y-2">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3m14.5-6.5l-11 11m0-11l11 11"/></svg>
                            <span class="text-xs font-bold text-slate-700">تكييف مركزي كامل</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Booking Box (col-span-4) -->
            <div class="lg:col-span-4 sticky top-24">
                <div class="bg-white border border-slate-100 shadow-sm rounded-3xl p-6 text-right space-y-6">
                    <div class="flex justify-between items-baseline border-b border-slate-50 pb-4">
                        <span class="text-sm text-slate-400">سعر الليلة</span>
                        <div>
                            <span class="text-2xl font-black text-sky-600">${{ number_format($hotel->price_per_night, 0) }}</span>
                            <span class="text-xs text-slate-400"> / ليلة</span>
                        </div>
                    </div>

                    @auth
                        <form method="POST" action="{{ route('hotels.book', $hotel) }}" class="space-y-4">
                            @csrf
                            <!-- Check-in -->
                            <div class="space-y-1">
                                <label for="check_in" class="block text-xs font-bold text-slate-500">تاريخ الوصول</label>
                                <input type="date" id="check_in" name="check_in" min="{{ date('Y-m-d') }}" value="{{ old('check_in', date('Y-m-d')) }}" class="w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm text-right" required>
                                @error('check_in')
                                    <span class="text-xs text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Check-out -->
                            <div class="space-y-1">
                                <label for="check_out" class="block text-xs font-bold text-slate-500">تاريخ المغادرة</label>
                                <input type="date" id="check_out" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('check_out', date('Y-m-d', strtotime('+1 day'))) }}" class="w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm text-right" required>
                                @error('check_out')
                                    <span class="text-xs text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Guests count -->
                            <div class="space-y-1">
                                <label for="guests_count" class="block text-xs font-bold text-slate-500">عدد النزلاء</label>
                                <select id="guests_count" name="guests_count" class="w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm text-right" required>
                                    @for($i=1; $i<=10; $i++)
                                        <option value="{{ $i }}" {{ old('guests_count') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'شخص' : ($i == 2 ? 'شخصان' : 'أشخاص') }}</option>
                                    @endfor
                                </select>
                                @error('guests_count')
                                    <span class="text-xs text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="w-full py-3.5 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                <span>إضافة الحجز للسلة</span>
                            </button>
                        </form>
                    @else
                        <div class="bg-slate-50 rounded-2xl p-5 text-center space-y-3">
                            <p class="text-sm text-slate-600 leading-relaxed">يرجى تسجيل الدخول لتتمكن من حجز هذا الفندق وإتمام طلباتك.</p>
                            <a href="{{ route('login') }}" class="w-full inline-flex justify-center items-center py-2.5 bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold rounded-xl transition shadow-sm">
                                تسجيل الدخول الآن
                            </a>
                        </div>
                    @endauth

                    <div class="bg-amber-50 rounded-2xl p-4 flex gap-3 text-right">
                        <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        <p class="text-xs text-amber-800 leading-relaxed">
                            بعد إضافة الحجز للسلة، ستتمكن من مراجعته وتأكيده مع بقية حجوزاتك (مثل طلبات النقل والتاكسي) لتأكيدها دفعة واحدة.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
