<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-slate-900 overflow-hidden py-20 sm:py-28 shadow-inner border-b border-slate-800">
        <!-- SVG decorative background pattern -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="lg:grid lg:grid-cols-12 lg:gap-12 items-center">
                <!-- Text Content -->
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-right">
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-sky-500/10 text-sky-400 border border-sky-500/20 mb-6">
                        <svg class="w-3.5 h-3.5 ml-1.5 text-sky-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h2a2.5 2.5 0 002.5-2.5V10a2 2 0 00-2-2h-1a2 2 0 01-2-2V5a2 2 0 00-2-2h-1.5a3 3 0 00-3 3v.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        مرحباً بك في ثغر اليمن الباسم
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        اكتشف سحر عدن مع <br>
                        <span class="bg-gradient-to-r from-sky-400 to-cyan-300 bg-clip-text text-transparent">منصة وجهتي</span>
                    </h1>
                    <p class="mt-6 text-base sm:text-lg text-slate-300 leading-relaxed">
                        بوابتك الرقمية وحجوزاتك المتكاملة في مدينة عدن العريقة. احجز مكان إقامتك، واطلب رحلتك بكل ثقة، واستكشف عبق المعالم الأثرية لثغر اليمن الباسم.
                    </p>
                    <div class="mt-8 sm:max-w-lg sm:mx-auto lg:mx-0 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('hotels.index') }}" class="inline-flex justify-center items-center px-7 py-3.5 border border-transparent text-base font-bold rounded-xl text-white bg-sky-600 hover:bg-sky-700 shadow-md hover:shadow-lg transition">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            تصفح وحجز الفنادق
                        </a>
                        <a href="{{ route('drivers.index') }}" class="inline-flex justify-center items-center px-7 py-3.5 border border-slate-700 text-base font-bold rounded-xl text-slate-200 bg-slate-800 hover:bg-slate-750 hover:text-white shadow-sm transition">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                            طلب سائق (تاكسي)
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image (Illustrative) -->
                <div class="mt-12 lg:mt-0 lg:col-span-6 relative">
                    <div class="relative mx-auto w-full max-w-md lg:max-w-none rounded-3xl shadow-2xl border border-slate-800/40 overflow-hidden transform hover:scale-[1.01] transition duration-300">
                        <img src="{{ asset('images/landmarks/sira.png') }}" alt="قلعة صيرة عدن" class="w-full h-auto object-cover max-h-[420px]">
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950 via-slate-900/30 to-transparent p-6 pt-16">
                            <span class="text-xs text-sky-400 font-bold tracking-widest uppercase">معالم تاريخية</span>
                            <h3 class="text-xl font-bold text-white mt-1">قلعة صيرة التاريخية - عدن</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-28">
        <!-- Landmarks Section -->
        <div class="space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">استكشف معالم عدن السياحية</h2>
                <div class="h-1 w-16 bg-sky-500 mx-auto rounded-full"></div>
                <p class="text-slate-500 leading-relaxed">عدن مدينة تنبض بالحياة، تجمع بين الشواطئ الساحرة، الجبال البركانية الشاهقة، والتراث الذي يمتد لقرون طويلة.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($landmarks as $landmark)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between hover:shadow-md hover:scale-[1.02] transition duration-300">
                        <div class="relative h-52 overflow-hidden bg-slate-50">
                            @if(file_exists(public_path($landmark['image'])))
                                <img src="{{ asset($landmark['image']) }}" alt="{{ $landmark['name'] }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-950 text-white p-6 text-center">
                                    <svg class="w-10 h-10 text-sky-400 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    <span class="font-bold text-sm text-slate-300">{{ $landmark['name'] }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $landmark['name'] }}</h3>
                                <p class="text-sm text-slate-500 leading-relaxed">{{ $landmark['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Featured Hotels Section -->
        <div class="space-y-12">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="text-right space-y-2">
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">أفضل الفنادق الموصى بها</h2>
                    <p class="text-slate-500">احجز إقامتك الفندقية بأفضل الأسعار وبخدمات متميزة طوال رحلتك.</p>
                </div>
                <a href="{{ route('hotels.index') }}" class="text-sm font-bold text-sky-600 hover:text-sky-700 transition flex items-center gap-1">
                    عرض جميع الفنادق
                    <svg class="h-4 w-4 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredHotels as $hotel)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md hover:scale-[1.01] transition duration-350 flex flex-col justify-between">
                        <div class="relative h-56 bg-slate-50">
                            <!-- Hotel banner design -->
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-tr from-sky-850 to-cyan-600 text-white p-6 relative">
                                <div class="absolute inset-0 bg-slate-950/20"></div>
                                <div class="relative z-10 text-center space-y-2 flex flex-col items-center">
                                    <svg class="w-10 h-10 text-sky-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    <h4 class="font-bold text-lg leading-tight">{{ $hotel->name }}</h4>
                                </div>
                            </div>
                            <span class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-2.5 py-1 rounded-xl text-xs font-bold text-slate-800 shadow-sm flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-amber-500 fill-amber-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                {{ number_format($hotel->rating, 1) }}
                            </span>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-1.5">{{ $hotel->name }}</h3>
                                <div class="text-xs text-slate-400 mb-4 flex items-center gap-1.5">
                                    <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $hotel->address }}
                                </div>
                                <p class="text-sm text-slate-500 leading-relaxed line-clamp-3 mb-4">{{ $hotel->description }}</p>
                            </div>
                            <div class="border-t border-slate-100 pt-4 flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-slate-400 block">تبدأ الأسعار من</span>
                                    <span class="text-xl font-black text-sky-650">${{ number_format($hotel->price_per_night, 0) }}<span class="text-xs text-slate-400 font-normal">/ليلة</span></span>
                                </div>
                                <a href="{{ route('hotels.show', $hotel) }}" class="inline-flex justify-center items-center px-4.5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition">
                                    تفاصيل الحجز
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Drivers Section -->
        <div class="space-y-12">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="text-right space-y-2">
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">سائقون متوفرون للتوصيل</h2>
                    <p class="text-slate-500">سائقون محليون ذوو خبرة وكفاءة عالية لمساعدتك في التنقل بكل سلاسة وأمان.</p>
                </div>
                <a href="{{ route('drivers.index') }}" class="text-sm font-bold text-sky-600 hover:text-sky-700 transition flex items-center gap-1">
                    عرض جميع السائقين
                    <svg class="h-4 w-4 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredDrivers as $driver)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md hover:scale-[1.01] transition duration-300 p-6 flex flex-col justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-slate-50 border border-slate-150 overflow-hidden flex items-center justify-center font-bold text-sky-700 text-lg shrink-0">
                                <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div class="text-right">
                                <h3 class="font-bold text-slate-900 text-base">{{ $driver->name }}</h3>
                                <div class="flex items-center gap-1 text-xs text-amber-500 font-bold mt-0.5">
                                    <svg class="w-3 h-3 text-amber-400 fill-amber-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <span>{{ number_format($driver->rating, 1) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="my-5 space-y-2 text-sm text-slate-600 bg-slate-50 p-4.5 rounded-2xl text-right">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400">نوع السيارة:</span>
                                <span class="font-bold text-slate-700">{{ $driver->car_model }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400">اللوحة:</span>
                                <span class="font-bold text-slate-700">{{ $driver->license_plate }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400">الحالة:</span>
                                <span class="inline-flex items-center text-xs font-bold text-emerald-600 bg-emerald-50/50 px-2 py-0.5 rounded-md">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 ml-1.5 animate-pulse"></span>
                                    متاح للتوصيل
                                </span>
                            </div>
                        </div>
                        
                        <a href="{{ route('drivers.index') }}" class="w-full inline-flex justify-center items-center py-3 bg-sky-50 hover:bg-sky-100 text-sky-700 text-xs font-bold rounded-xl transition gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                            حجز رحلة تاكسي
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
