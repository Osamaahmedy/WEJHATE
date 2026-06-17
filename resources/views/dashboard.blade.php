<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                لوحة التحكم للمستخدم
            </h2>
            <span class="text-sm text-slate-500">متابعة سريعة لحالة حجوزاتك، رحلاتك، وإحصائيات حسابك</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
        
        <!-- Welcome banner -->
        <div class="relative bg-gradient-to-r from-sky-700 via-sky-600 to-cyan-500 rounded-3xl p-6 sm:p-8 text-white shadow-lg overflow-hidden border border-sky-400/20">
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <defs>
                        <pattern id="dashboard-grid" width="30" height="30" patternUnits="userSpaceOnUse">
                            <path d="M 30 0 L 0 0 0 30" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#dashboard-grid)" />
                </svg>
            </div>
            <div class="relative z-10 flex flex-col sm:flex-row items-center justify-between gap-6 text-right">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-md border border-white/30 overflow-hidden flex items-center justify-center font-bold text-white text-2xl shrink-0">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                        @else
                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-black">مرحباً بك مجدداً، {{ auth()->user()->name }} 👋</h1>
                        <p class="text-sky-100 text-sm mt-1">بوابتك السياحية المتكاملة في عدن. تحكّم بحجوزاتك بكل سهولة ويسر.</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('profile.edit') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-sm font-bold text-white transition">
                        تعديل الحساب
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stat 1: Hotels -->
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition text-right">
                <div class="space-y-1">
                    <span class="text-xs text-slate-400 font-bold block">إجمالي حجوزات الفنادق</span>
                    <span class="text-3xl font-black text-slate-800">{{ auth()->user()->bookings()->count() }}</span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
            </div>
            
            <!-- Stat 2: Rides -->
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition text-right">
                <div class="space-y-1">
                    <span class="text-xs text-slate-400 font-bold block">رحلات التوصيل والتاكسي</span>
                    <span class="text-3xl font-black text-slate-800">{{ auth()->user()->rides()->count() }}</span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                </div>
            </div>

            <!-- Stat 3: Cart -->
            <a href="{{ route('cart.index') }}" class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition text-right group">
                <div class="space-y-1">
                    <span class="text-xs text-slate-400 font-bold block">العناصر غير المؤكدة بالسلة</span>
                    <span class="text-3xl font-black text-rose-600 group-hover:scale-105 transition inline-block">{{ $cartCount }}</span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center group-hover:bg-rose-100 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
            </a>
        </div>

        @if($cartCount > 0)
            <!-- Cart Alert Banner -->
            <div class="bg-rose-50 border-r-4 border-rose-500 rounded-2xl p-4 flex flex-col sm:flex-row items-center justify-between gap-4 text-right shadow-sm">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <div>
                        <span class="font-bold text-rose-800 block text-sm">لديك حجوزات معلقة في سلة التسوق!</span>
                        <span class="text-rose-700 text-xs mt-0.5">تبقت خطوة واحدة لتأكيد حجوزات الفنادق أو طلبات التكاسي الخاصة بك لتثبيتها رسمياً.</span>
                    </div>
                </div>
                <a href="{{ route('cart.index') }}" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-xs shadow-sm transition shrink-0">
                    مراجعة وتأكيد السلة
                </a>
            </div>
        @endif

        <!-- Lists of bookings & rides -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Recent Hotels Bookings -->
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                    <a href="{{ route('profile.bookings') }}" class="text-xs font-bold text-sky-600 hover:underline">عرض سجل الحجوزات</a>
                    <h3 class="text-lg font-bold text-slate-800 text-right flex items-center gap-2">
                        <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>آخر حجوزات الفنادق</span>
                    </h3>
                </div>

                @if($hotelBookings->isEmpty())
                    <div class="bg-white rounded-3xl p-8 text-center border border-slate-100 text-slate-500 text-sm shadow-sm space-y-3">
                        <p>لا يوجد لديك أي حجوزات فنادق حالياً.</p>
                        <a href="{{ route('hotels.index') }}" class="inline-flex py-1.5 px-4 bg-sky-50 hover:bg-sky-100 text-sky-700 font-bold rounded-lg text-xs transition">
                            احجز إقامة فندقية الآن
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($hotelBookings as $booking)
                            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm text-right space-y-3 hover:shadow-md transition">
                                <div class="flex justify-between items-start">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $booking->status === 'confirmed' ? 'bg-emerald-50 text-emerald-600' : ($booking->status === 'cancelled' ? 'bg-rose-50 text-rose-600' : 'bg-slate-50 text-slate-655') }}">
                                        {{ $booking->status === 'confirmed' ? 'مؤكد' : ($booking->status === 'cancelled' ? 'ملغي' : $booking->status) }}
                                    </span>
                                    <div>
                                        <h4 class="font-bold text-slate-800 text-base">{{ $booking->hotel->name }}</h4>
                                        <span class="text-xs text-slate-400 block mt-0.5">{{ $booking->hotel->address }}</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-y-2 text-xs text-slate-600 pt-2 border-t border-slate-50">
                                    <div>تاريخ الدخول: <span class="font-bold text-slate-800">{{ $booking->check_in }}</span></div>
                                    <div>تاريخ المغادرة: <span class="font-bold text-slate-800">{{ $booking->check_out }}</span></div>
                                    <div>عدد النزلاء: <span class="font-bold text-slate-800">{{ $booking->guests_count }} أشخاص</span></div>
                                    <div>السعر الإجمالي: <span class="font-black text-sky-600">${{ number_format($booking->total_price, 2) }}</span></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Recent Taxi Rides -->
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                    <a href="{{ route('profile.bookings') }}" class="text-xs font-bold text-sky-600 hover:underline">عرض سجل التوصيل</a>
                    <h3 class="text-lg font-bold text-slate-800 text-right flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                        <span>آخر طلبات التاكسي</span>
                    </h3>
                </div>

                @if($rides->isEmpty())
                    <div class="bg-white rounded-3xl p-8 text-center border border-slate-100 text-slate-500 text-sm shadow-sm space-y-3">
                        <p>لا يوجد لديك أي طلبات تاكسي حالياً.</p>
                        <a href="{{ route('drivers.index') }}" class="inline-flex py-1.5 px-4 bg-amber-50/50 hover:bg-amber-100 text-amber-700 font-bold rounded-lg text-xs transition">
                            اطلب رحلة تاكسي الآن
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($rides as $ride)
                            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm text-right space-y-3 hover:shadow-md transition">
                                <div class="flex justify-between items-start">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $ride->status === 'accepted' ? 'bg-sky-50 text-sky-600' : ($ride->status === 'completed' ? 'bg-emerald-50 text-emerald-600' : ($ride->status === 'cancelled' ? 'bg-rose-50 text-rose-600' : 'bg-slate-50 text-slate-600')) }}">
                                        {{ $ride->status === 'accepted' ? 'مقبول' : ($ride->status === 'completed' ? 'مكتمل' : ($ride->status === 'cancelled' ? 'ملغي' : 'معلق')) }}
                                    </span>
                                    <div>
                                        <h4 class="font-bold text-slate-800 text-base">تاكسي مع السائق: {{ $ride->driver->name }}</h4>
                                        <span class="text-xs text-slate-400 block mt-0.5">{{ $ride->driver->car_model }} (رقم: {{ $ride->driver->license_plate }})</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-y-1.5 text-xs text-slate-600 pt-2 border-t border-slate-50">
                                    <div>نقطة الانطلاق: <span class="font-bold text-slate-800">{{ $ride->pickup_location }}</span></div>
                                    <div>وجهة الوصول: <span class="font-bold text-slate-800">{{ $ride->dropoff_location }}</span></div>
                                    <div class="flex justify-between">
                                        <div>التاريخ: <span class="font-bold text-slate-800">{{ $ride->ride_date }} {{ $ride->ride_time }}</span></div>
                                        <div>التكلفة المقدرة: <span class="font-black text-sky-600">${{ number_format($ride->price, 2) }}</span></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>

        <!-- Quick Help & Profile Details -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm text-right">
            <h3 class="text-lg font-bold text-slate-850 border-b border-slate-50 pb-4 mb-4">تفاصيل الحساب</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                <div class="space-y-1 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="text-xs text-slate-400 block">الاسم بالكامل:</span>
                    <span class="font-bold text-slate-700">{{ auth()->user()->name }}</span>
                </div>
                <div class="space-y-1 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="text-xs text-slate-400 block">البريد الإلكتروني:</span>
                    <span class="font-bold text-slate-700">{{ auth()->user()->email }}</span>
                </div>
                <div class="space-y-1 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="text-xs text-slate-400 block">رقم الهاتف:</span>
                    <span class="font-bold text-slate-700" dir="ltr">{{ auth()->user()->phone ?? 'غير مسجل' }}</span>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
