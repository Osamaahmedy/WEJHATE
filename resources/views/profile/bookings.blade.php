<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                سجل حجوزاتي وطلباتي
            </h2>
            <span class="text-sm text-slate-500">متابعة حالة حجوزات الفنادق وطلبات التكاسي الحالية والسابقة</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-r-4 border-emerald-500 rounded-2xl text-emerald-700 text-sm font-bold text-right shadow-sm flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-550" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="space-y-12">
            <!-- Hotel Bookings Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-3 text-right flex items-center gap-2">
                    <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>حجوزات الفنادق المؤكدة</span>
                </h3>
                @if($hotelBookings->isEmpty())
                    <div class="bg-white rounded-3xl p-10 text-center border border-slate-100 shadow-sm text-slate-500">
                        لا يوجد لديك أي حجوزات فنادق حالياً.
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($hotelBookings as $booking)
                            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm text-right space-y-4 hover:shadow-md transition">
                                <div class="flex justify-between items-start">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                        {{ $booking->status === 'confirmed' ? 'مؤكد' : ($booking->status === 'cancelled' ? 'ملغي' : $booking->status) }}
                                    </span>
                                    <div>
                                        <h4 class="font-bold text-slate-800 text-lg">{{ $booking->hotel->name }}</h4>
                                        <span class="text-xs text-slate-400 block mt-0.5">{{ $booking->hotel->address }}</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-y-2 text-sm text-slate-600 pt-2 border-t border-slate-50">
                                    <div>تاريخ الدخول: <span class="font-bold text-slate-800">{{ $booking->check_in }}</span></div>
                                    <div>تاريخ المغادرة: <span class="font-bold text-slate-800">{{ $booking->check_out }}</span></div>
                                    <div>النزلاء: <span class="font-bold text-slate-800">{{ $booking->guests_count }} أشخاص</span></div>
                                    <div>السعر الإجمالي: <span class="font-black text-sky-600">${{ number_format($booking->total_price, 2) }}</span></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Ride Bookings Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-3 text-right flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                    <span>طلبات التوصيل والتاكسي</span>
                </h3>
                @if($rides->isEmpty())
                    <div class="bg-white rounded-3xl p-10 text-center border border-slate-100 shadow-sm text-slate-500">
                        لا يوجد لديك أي طلبات تاكسي حالياً.
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($rides as $ride)
                            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm text-right space-y-4 hover:shadow-md transition">
                                <div class="flex justify-between items-start">
                                    @if($ride->status === 'accepted')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-sky-50 text-sky-600 border border-sky-100">
                                            مقبول وجاري التنسيق
                                        </span>
                                    @elseif($ride->status === 'completed')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            مكتمل
                                        </span>
                                    @elseif($ride->status === 'cancelled')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-600 border border-rose-100">
                                            ملغي
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-50 text-slate-600 border border-slate-100">
                                            معلق
                                        </span>
                                    @endif
                                    
                                    <div>
                                        <h4 class="font-bold text-slate-800 text-lg">تاكسي مع السائق: {{ $ride->driver->name }}</h4>
                                        <span class="text-xs text-slate-400 block mt-0.5">{{ $ride->driver->car_model }} (لوحة: {{ $ride->driver->license_plate }})</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-y-2 text-sm text-slate-600 pt-2 border-t border-slate-50">
                                    <div>نقطة الانطلاق: <span class="font-bold text-slate-800">{{ $ride->pickup_location }}</span></div>
                                    <div>وجهة الوصول: <span class="font-bold text-slate-800">{{ $ride->dropoff_location }}</span></div>
                                    <div class="grid grid-cols-2">
                                        <div>التاريخ: <span class="font-bold text-slate-800">{{ $ride->ride_date }}</span></div>
                                        <div>الوقت: <span class="font-bold text-slate-800">{{ $ride->ride_time }}</span></div>
                                    </div>
                                    <div class="grid grid-cols-2 items-center">
                                        <div>التكلفة المقدرة: <span class="font-black text-sky-600">${{ number_format($ride->price, 2) }}</span></div>
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            <a href="tel:{{ $ride->driver->phone }}" class="text-xs font-bold text-cyan-650 hover:underline" dir="ltr">{{ $ride->driver->phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
