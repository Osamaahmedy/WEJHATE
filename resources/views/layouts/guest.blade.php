<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'وجهتي') }} - المصادقة</title>

        <!-- Google Fonts (Tajawal) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans text-slate-900 antialiased bg-gradient-to-tr from-slate-950 via-slate-900 to-sky-950 min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="flex flex-col items-center">
                <a href="/" class="flex flex-col items-center space-y-2 group">
                    <span class="text-4xl font-black text-white flex items-center tracking-wide">
                        <span class="bg-gradient-to-r from-sky-500 to-cyan-400 text-slate-950 px-3.5 py-1.5 rounded-xl ml-2.5 shadow-lg transform group-hover:scale-105 transition">و</span>
                        وجهتي
                    </span>
                    <span class="text-xs text-cyan-400 font-bold tracking-widest uppercase">بوابتك السياحية لعدن</span>
                </a>
            </div>

            <div class="bg-white/95 backdrop-blur-md border border-slate-800/20 py-8 px-6 sm:px-10 shadow-2xl rounded-3xl text-right">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
