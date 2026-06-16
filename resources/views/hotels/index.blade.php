<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                الفنادق المتاحة في مدينة عدن
            </h2>
            <span class="text-sm text-slate-500">ابحث عن غرفتك المثالية للإقامة الفاخرة</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search and Filter Form -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 mb-10">
            <form method="GET" action="{{ route('hotels.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Search Input -->
                <div class="space-y-2 text-right">
                    <label for="search" class="block text-sm font-bold text-slate-700">بحث باسم الفندق أو العنوان</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="مثال: فندق ميركيور، خورمكسر..." class="w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500 text-right">
                </div>

                <!-- Price Range Filter -->
                <div class="space-y-2 text-right">
                    <label for="price_range" class="block text-sm font-bold text-slate-700">نطاق السعر لكل ليلة</label>
                    <select id="price_range" name="price_range" class="w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500 text-right">
                        <option value="">كل الأسعار</option>
                        <option value="under_100" {{ request('price_range') == 'under_100' ? 'selected' : '' }}>أقل من $100</option>
                        <option value="100_150" {{ request('price_range') == '100_150' ? 'selected' : '' }}>$100 - $150</option>
                        <option value="over_150" {{ request('price_range') == 'over_150' ? 'selected' : '' }}>أكثر من $150</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end gap-3">
                    <button type="submit" class="flex-grow inline-flex justify-center items-center py-2.5 px-4 bg-sky-600 hover:bg-sky-700 text-white text-sm font-bold rounded-xl transition shadow-sm">
                        تصفية البحث
                    </button>
                    @if(request()->anyFilled(['search', 'price_range']))
                        <a href="{{ route('hotels.index') }}" class="inline-flex justify-center items-center py-2.5 px-4 bg-slate-150 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-xl transition">
                            إعادة تعيين
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Hotels Grid -->
        @if($hotels->isEmpty())
            <div class="bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-sm max-w-xl mx-auto space-y-4">
                <div class="w-16 h-16 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div class="space-y-1">
                    <h3 class="text-lg font-bold text-slate-800">لم نعثر على أي فنادق</h3>
                    <p class="text-slate-500 text-sm">حاول البحث بكلمات مختلفة أو تعديل فلاتر الأسعار.</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($hotels as $hotel)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md hover:scale-[1.01] transition duration-300 flex flex-col justify-between">
                        <div class="relative h-56 bg-slate-50">
                            <!-- Hotel image placeholder -->
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
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-slate-900">{{ $hotel->name }}</h3>
                                <div class="text-xs text-slate-400 flex items-center gap-1.5">
                                    <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $hotel->address }}
                                </div>
                                <p class="text-sm text-slate-500 leading-relaxed line-clamp-3 pt-2">{{ $hotel->description }}</p>
                            </div>
                            
                            <div class="border-t border-slate-100 mt-6 pt-4 flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-slate-400 block">سعر الليلة يبدأ من</span>
                                    <span class="text-lg font-black text-sky-655">${{ number_format($hotel->price_per_night, 0) }}</span>
                                </div>
                                <a href="{{ route('hotels.show', $hotel) }}" class="inline-flex justify-center items-center px-4.5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition">
                                    تفاصيل الحجز
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
