<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-slate-800">استعادة كلمة المرور</h2>
        <p class="text-sm text-slate-500 mt-2">
            هل نسيت كلمة المرور؟ لا تقلق. أدخل بريدك الإلكتروني وسنرسل لك رابطاً لإعادة تعيينها.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-4 space-y-4">
            <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md hover:shadow-lg transition">
                إرسال رابط إعادة التعيين
            </button>
            
            <p class="text-center text-xs text-slate-500">
                <a href="{{ route('login') }}" class="font-bold text-sky-600 hover:underline">العودة لتسجيل الدخول</a>
            </p>
        </div>
    </form>
</x-guest-layout>
