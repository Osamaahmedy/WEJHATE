<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                سلة الحجوزات المحفوظة
            </h2>
            <span class="text-sm text-slate-500">راجع حجوزاتك للفنادق والتكاسي وقم بتأكيدها دفعة واحدة</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-r-4 border-emerald-500 rounded-2xl text-emerald-700 text-sm font-bold text-right shadow-sm flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-550" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border-r-4 border-rose-500 rounded-2xl text-rose-700 text-sm font-bold text-right shadow-sm flex items-center gap-2">
                <svg class="w-5 h-5 text-rose-550" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($cartItems->isEmpty())
            <!-- Empty Cart -->
            <div class="bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-sm max-w-2xl mx-auto space-y-6">
                <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-10 h-10 text-slate-350" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                </div>
                <div class="space-y-2">
                    <h3 class="text-xl font-bold text-slate-800">سلة الحجوزات الخاصة بك فارغة حالياً</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">لم تقم بإضافة أي فنادق أو رحلات تاكسي إلى سلتك حتى الآن. ابدأ بتصفح الخدمات وخطط لرحلتك الممتعة إلى عدن.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="{{ route('hotels.index') }}" class="inline-flex justify-center items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl transition shadow-sm gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>تصفح وحجز الفنادق</span>
                    </a>
                    <a href="{{ route('drivers.index') }}" class="inline-flex justify-center items-center px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl transition gap-2 border border-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                        <span>طلب تاكسي (سائقين)</span>
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Cart Items List (col-span-8) -->
                <div class="lg:col-span-8 space-y-6">
                    @php $totalAmount = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            $isHotel = ($item->bookable_type === 'App\Models\Hotel' || $item->bookable_type === App\Models\Hotel::class);
                            $bookable = $item->bookable;
                        @endphp

                        @if($bookable)
                            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 text-right">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 {{ $isHotel ? 'bg-sky-50 text-sky-600' : 'bg-amber-50 text-amber-600' }}">
                                        @if($isHotel)
                                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                        @else
                                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16V9a4 4 0 00-4-4h-4M21 16H3"/></svg>
                                        @endif
                                    </div>
                                    <div class="space-y-1">
                                        @if($isHotel)
                                            @php $totalAmount += $item->details['total_price']; @endphp
                                            <h3 class="font-bold text-slate-800 text-lg">حجز فندق: {{ $bookable->name }}</h3>
                                            <div class="text-xs text-slate-400">العنوان: {{ $bookable->address }}</div>
                                            <div class="grid grid-cols-2 gap-x-8 gap-y-1 text-xs text-slate-500 pt-2">
                                                <div>تاريخ الدخول: <span class="font-bold text-slate-700">{{ $item->details['check_in'] }}</span></div>
                                                <div>تاريخ المغادرة: <span class="font-bold text-slate-700">{{ $item->details['check_out'] }}</span></div>
                                                <div>المدة: <span class="font-bold text-slate-700">{{ $item->details['days'] }} ليالي</span></div>
                                                <div>النزلاء: <span class="font-bold text-slate-700">{{ $item->details['guests_count'] }} أشخاص</span></div>
                                            </div>
                                        @else
                                            @php $totalAmount += $item->details['price']; @endphp
                                            <h3 class="font-bold text-slate-800 text-lg">طلب تاكسي: مع السائق {{ $bookable->name }}</h3>
                                            <div class="text-xs text-slate-400">السيارة: {{ $bookable->car_model }} (رقم اللوحة: {{ $bookable->license_plate }})</div>
                                            <div class="grid grid-cols-2 gap-x-8 gap-y-1 text-xs text-slate-500 pt-2">
                                                <div>نقطة الانطلاق: <span class="font-bold text-slate-700">{{ $item->details['pickup_location'] }}</span></div>
                                                <div>وجهة الوصول: <span class="font-bold text-slate-700">{{ $item->details['dropoff_location'] }}</span></div>
                                                <div>التاريخ: <span class="font-bold text-slate-700">{{ $item->details['ride_date'] }}</span></div>
                                                <div>الوقت: <span class="font-bold text-slate-700">{{ $item->details['ride_time'] }}</span></div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex sm:flex-col items-end justify-between w-full sm:w-auto border-t sm:border-0 border-slate-50 pt-4 sm:pt-0">
                                    <div class="text-right">
                                        <span class="text-xs text-slate-400 block">تكلفة الحجز</span>
                                        <span class="text-xl font-black text-sky-600">${{ number_format($isHotel ? $item->details['total_price'] : $item->details['price'], 2) }}</span>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('cart.destroy', $item) }}" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-rose-500 hover:text-rose-700 font-bold transition flex items-center gap-1">
                                            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <span>حذف الحجز</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Order Summary (col-span-4) -->
                <div class="lg:col-span-4 sticky top-24">
                    <div class="bg-white border border-slate-100 shadow-sm rounded-3xl p-6 text-right space-y-6">
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">ملخص الفاتورة</h3>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-400">إجمالي الحجوزات:</span>
                                <span class="font-bold text-slate-800">{{ $cartItems->count() }} عناصر</span>
                            </div>
                            <div class="flex justify-between items-baseline pt-4 border-t border-slate-50">
                                <span class="text-sm text-slate-500 font-bold">المبلغ الإجمالي المستحق:</span>
                                <span class="text-2xl font-black text-sky-600">${{ number_format($totalAmount, 2) }}</span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('cart.checkout') }}" class="pt-4">
                            @csrf
                            <button type="submit" class="w-full py-3.5 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span>تأكيد الحجز النهائي</span>
                            </button>
                        </form>

                        <div class="bg-sky-50 rounded-2xl p-4 flex gap-3 text-right">
                            <svg class="w-5 h-5 text-sky-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <p class="text-xs text-sky-800 leading-relaxed">
                                عند تأكيد الحجز، سيتم تسجيل الطلبات رسمياً في قاعدة البيانات وسنقوم فوراً بإرسال رسالة تفصيلية لتأكيد حجزك عبر البريد الإلكتروني.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
