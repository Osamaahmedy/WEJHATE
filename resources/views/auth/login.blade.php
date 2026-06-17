<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-slate-800">تسجيل الدخول</h2>
        <p class="text-sm text-slate-500 mt-1">مرحباً بك مجدداً! قم بالدخول لمتابعة حجوزاتك.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-sky-600 hover:underline" href="{{ route('password.request') }}">
                        نسيت كلمة المرور؟
                    </a>
                @endif
                <x-input-label for="password" :value="__('كلمة المرور')" class="text-xs font-bold text-slate-500" />
            </div>

            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-slate-200 text-sky-600 shadow-sm focus:ring-sky-500 focus:border-sky-500" name="remember">
                <span class="ms-2 text-xs text-slate-500 font-bold">{{ __('تذكرني في المرات القادمة') }}</span>
            </label>
        </div>

        <div class="pt-4 space-y-4">
            <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md hover:shadow-lg transition">
                تسجيل الدخول
            </button>
            
            <p class="text-center text-xs text-slate-500">
                ليس لديك حساب؟ 
                <a href="{{ route('register') }}" class="font-bold text-sky-600 hover:underline">إنشاء حساب جديد</a>
            </p>
        </div>
    </form>
</x-guest-layout>
