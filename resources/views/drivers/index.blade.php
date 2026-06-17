<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                خدمات النقل والتكاسي في عدن
            </h2>
            <span class="text-sm text-slate-500">اطلب سائقاً خاصاً لرحلاتك وتنقلك داخل المدينة بكل سهولة</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border-r-4 border-rose-500 rounded-2xl text-rose-700 text-sm font-bold text-right shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- Search and Filter Form -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 mb-8">
            <form method="GET" action="{{ route('drivers.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Search Input -->
                <div class="space-y-2 text-right">
                    <label for="search" class="block text-sm font-bold text-slate-700">بحث باسم السائق أو السيارة</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="مثال: صالح، تويوتا كامري..." class="w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500 text-right">
                </div>

                <!-- Status Filter -->
                <div class="space-y-2 text-right">
                    <label for="status" class="block text-sm font-bold text-slate-700">الحالة</label>
                    <select id="status" name="status" class="w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500 text-right">
                        <option value="">الكل</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>متاح</option>
                        <option value="busy" {{ request('status') == 'busy' ? 'selected' : '' }}>مشغول</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end gap-3">
                    <button type="submit" class="flex-grow inline-flex justify-center items-center py-2.5 px-4 bg-sky-600 hover:bg-sky-700 text-white text-sm font-bold rounded-xl transition shadow-sm">
                        تصفية البحث
                    </button>
                    @if(request()->anyFilled(['search', 'status']))
                        <a href="{{ route('drivers.index') }}" class="inline-flex justify-center items-center py-2.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-xl transition">
                            إعادة تعيين
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Drivers Grid -->
        @if($drivers->isEmpty())
            <div class="bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-sm max-w-xl mx-auto space-y-4">
                <div class="w-16 h-16 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                </div>
                <div class="space-y-1">
                    <h3 class="text-lg font-bold text-slate-800">لم نعثر على أي سائقين</h3>
                    <p class="text-slate-500 text-sm">تأكد من كتابة أحرف صحيحة أو تعديل الفلترة.</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($drivers as $driver)
                    <div x-data="{ expanded: false }" class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md hover:scale-[1.01] transition duration-300 p-6 flex flex-col justify-between h-fit">
                        <div>
                            <!-- Header info -->
                            <div class="flex items-center justify-between border-b border-slate-50 pb-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-14 rounded-full bg-slate-50 border border-slate-200 overflow-hidden flex items-center justify-center font-bold text-sky-700 text-lg shrink-0">
                                        @if($driver->avatar && file_exists(public_path($driver->avatar)))
                                            <img src="{{ asset($driver->avatar) }}" alt="{{ $driver->name }}" class="w-full h-full object-cover">
                                        @elseif($driver->avatar && file_exists(public_path('storage/' . $driver->avatar)))
                                            <img src="{{ asset('storage/' . $driver->avatar) }}" alt="{{ $driver->name }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <h3 class="font-bold text-slate-900 text-base">{{ $driver->name }}</h3>
                                        <div class="flex items-center gap-1 text-xs text-amber-500 font-bold mt-0.5">
                                            <svg class="w-3.5 h-3.5 text-amber-400 fill-amber-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            <span>{{ number_format($driver->rating, 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    @if($driver->status === 'available')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 ml-1.5"></span>
                                            متاح حالياً
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-600 border border-rose-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500 ml-1.5"></span>
                                            مشغول برحلة
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Car Details -->
                            <div class="space-y-2 text-sm text-slate-600 bg-slate-50 p-4 rounded-2xl mb-4 text-right">
                                <div class="flex justify-between">
                                    <span class="text-slate-400">السيارة:</span>
                                    <span class="font-bold text-slate-700">{{ $driver->car_model }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400">رقم اللوحة:</span>
                                    <span class="font-bold text-slate-700">{{ $driver->license_plate }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400">رقم الهاتف:</span>
                                    <span class="font-bold text-slate-700" dir="ltr">{{ $driver->phone }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Form (Expanded using Alpine.js) -->
                        <div x-show="expanded" x-collapse x-cloak class="border-t border-slate-50 pt-4 mt-2 text-right">
                            @auth
                                <form method="POST" action="{{ route('drivers.book_ride', $driver) }}" class="space-y-3">
                                    @csrf
                                    <!-- Pickup Location -->
                                    <div class="space-y-1">
                                        <label class="block text-xs font-bold text-slate-500">نقطة الانطلاق (مكان التواجد)</label>
                                        <input type="text" name="pickup_location" placeholder="مثال: مطار عدن، كريتر الشارع العام..." class="w-full rounded-xl border-slate-200 text-xs focus:border-sky-500 focus:ring-sky-500 text-right" required>
                                    </div>

                                    <!-- Dropoff Location -->
                                    <div class="space-y-1">
                                        <label class="block text-xs font-bold text-slate-500">وجهة الوصول</label>
                                        <input type="text" name="dropoff_location" placeholder="مثال: ساحل جولدموهور، فندق ميركيور..." class="w-full rounded-xl border-slate-200 text-xs focus:border-sky-500 focus:ring-sky-500 text-right" required>
                                    </div>

                                    <!-- Date and Time -->
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="space-y-1">
                                            <label class="block text-xs font-bold text-slate-500">التاريخ</label>
                                            <input type="date" name="ride_date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" class="w-full rounded-xl border-slate-200 text-xs focus:border-sky-500 focus:ring-sky-500 text-right" required>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="block text-xs font-bold text-slate-500">الوقت</label>
                                            <input type="time" name="ride_time" value="12:00" class="w-full rounded-xl border-slate-200 text-xs focus:border-sky-500 focus:ring-sky-500 text-right" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="w-full py-2.5 bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold rounded-xl shadow-sm transition flex justify-center items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                        <span>إضافة الرحلة للسلة</span>
                                    </button>
                                </form>
                            @else
                                <div class="bg-rose-50 rounded-2xl p-4 text-center space-y-2">
                                    <p class="text-xs text-rose-700 leading-relaxed font-bold">يرجى تسجيل الدخول أولاً لطلب تاكسي.</p>
                                    <a href="{{ route('login') }}" class="inline-flex justify-center items-center py-1.5 px-4 bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold rounded-lg transition">
                                        تسجيل الدخول
                                    </a>
                                </div>
                            @endauth
                        </div>

                        <!-- Expand / Close button -->
                        @if($driver->status === 'available')
                            <button @click="expanded = !expanded" class="w-full mt-4 py-2.5 bg-sky-50 hover:bg-sky-100 text-sky-700 text-xs font-bold rounded-xl transition flex justify-center items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                                <span x-show="!expanded">احجز رحلة الآن</span>
                                <span x-show="expanded">إغلاق نموذج الحجز</span>
                            </button>
                        @else
                            <button class="w-full mt-4 py-2.5 bg-slate-100 text-slate-400 text-xs font-bold rounded-xl cursor-not-allowed" disabled>
                                السائق غير متاح حالياً
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
