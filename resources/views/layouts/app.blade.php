<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'وجهتي') }} - دليل سياحة وحجوزات عدن</title>

        <!-- Google Fonts (Tajawal & Cairo) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">

        <!-- Scripts & Tailwind CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
            }
            .glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
            .glass-dark {
                background: rgba(15, 23, 42, 0.6);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
            .beach-gradient {
                background: linear-gradient(135deg, #0a5c8c 0%, #00b4d8 50%, #f4a261 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-800">
        <div class="min-h-screen flex flex-col justify-between">
            <div>
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-16 z-40">
                        <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="py-6">
                    {{ $slot }}
                </main>
            </div>

            <!-- Modern Footer -->
            <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 py-10 mt-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <span class="text-2xl font-bold tracking-tight text-white flex items-center">
                                <span class="bg-cyan-500 text-slate-900 px-2.5 py-1 rounded-lg font-black mr-2">و</span>
                                وجهتي عدن
                            </span>
                            <p class="mt-4 text-sm text-slate-400 leading-relaxed">
                                منصة سياحية متكاملة تهدف لتسهيل حجز الفنادق وطلب التكاسي واستكشاف معالم ثغر اليمن الباسم (عدن) بأسلوب عصري وسلس.
                            </p>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="text-white font-bold text-lg mb-2">روابط سريعة</h3>
                            <a href="{{ route('home') }}" class="text-sm hover:text-cyan-400 transition">الرئيسية</a>
                            <a href="{{ route('hotels.index') }}" class="text-sm hover:text-cyan-400 transition">الفنادق في عدن</a>
                            <a href="{{ route('drivers.index') }}" class="text-sm hover:text-cyan-400 transition">طلب تاكسي (سائقين)</a>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-lg mb-2">روابط التواصل</h3>
                            <p class="text-sm text-slate-400 mb-2">للشكاوى والاقتراحات أو الاستفسارات:</p>
                            <p class="text-sm text-cyan-400">البريد الإلكتروني: asaam4292@gmail.com</p>
                            <p class="text-sm text-slate-400 mt-4">تم التطوير بحب لمنارة اليمن التاريخية 🌊⛰️</p>
                        </div>
                    </div>
                    <div class="border-t border-slate-800 mt-8 pt-6 text-center text-xs text-slate-500">
                        &copy; {{ date('Y') }} وجهتي. جميع الحقوق محفوظة لمدينة عدن.
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
