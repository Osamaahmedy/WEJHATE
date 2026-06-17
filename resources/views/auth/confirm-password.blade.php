<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-slate-800">تأكيد كلمة المرور</h2>
        <p class="text-sm text-slate-500 mt-2">
            هذه منطقة آمنة من التطبيق. يرجى تأكيد كلمة المرور الخاصة بك قبل المتابعة.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <!-- Password -->
        <div class="space-y-1">
            <x-input-label for="password" :value="__('كلمة المرور')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-slate-200 text-sm focus:border-sky-500 focus:ring-sky-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md hover:shadow-lg transition">
                تأكيد المتابعة
            </button>
        </div>
    </form>
</x-guest-layout>
