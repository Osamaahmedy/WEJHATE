<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-slate-800">
            تحديث كلمة المرور
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            تأكد من استخدام كلمة مرور طويلة وعشوائية للحفاظ على أمان حسابك.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="space-y-1">
            <x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="space-y-1">
            <x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-1">
            <x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور الجديدة')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="px-5 py-2.5 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-xs shadow-sm transition">
                حفظ كلمة المرور
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs font-bold text-emerald-600"
                >تم الحفظ بنجاح.</p>
            @endif
        </div>
    </form>
</section>
