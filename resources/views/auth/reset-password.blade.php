<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-slate-800">إعادة تعيين كلمة المرور</h2>
        <p class="text-sm text-slate-500 mt-1">يرجى إدخال كلمة المرور الجديدة وتأكيدها لحسابك.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="space-y-1">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <x-input-label for="password" :value="__('كلمة المرور الجديدة')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-1">
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور الجديدة')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md hover:shadow-lg transition">
                تأكيد وتغيير كلمة المرور
            </button>
        </div>
    </form>
</x-guest-layout>
