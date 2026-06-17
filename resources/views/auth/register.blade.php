<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-slate-800">إنشاء حساب جديد</h2>
        <p class="text-sm text-slate-500 mt-1">ابدأ رحلتك السياحية في عدن واستمتع بخدماتنا المميزة.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div class="space-y-1">
            <x-input-label for="name" :value="__('الاسم الكامل')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="name" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="space-y-1">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <x-input-label for="password" :value="__('كلمة المرور')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-1">
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4 space-y-4">
            <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md hover:shadow-lg transition">
                إنشاء حساب جديد
            </button>
            
            <p class="text-center text-xs text-slate-500">
                لديك حساب بالفعل؟ 
                <a href="{{ route('login') }}" class="font-bold text-sky-600 hover:underline">تسجيل الدخول</a>
            </p>
        </div>
    </form>
</x-guest-layout>
