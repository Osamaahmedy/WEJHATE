<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-rose-800">
            حذف الحساب نهائياً
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            بمجرد حذف حسابك، سيتم حذف جميع بياناتك وسجلات حجوزاتك بشكل نهائي. يرجى التأكد من رغبتك في الحذف قبل المتابعة.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-xs shadow-sm transition"
    >
        حذف الحساب
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 text-right">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-slate-800">
                هل أنت متأكد من رغبتك في حذف الحساب؟
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                لتأكيد الحذف النهائي، يرجى إدخال كلمة المرور الخاصة بك. سيتم إيقاف كافة الحجوزات وحذف كافة معلوماتك الشخصية.
            </p>

            <div class="mt-6 space-y-1">
                <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="text-xs font-bold text-slate-500" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-xl border-slate-200 focus:border-rose-500 focus:ring-rose-500 text-sm"
                    placeholder="أدخل كلمة المرور الحالية"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-xs transition">
                    إلغاء
                </button>

                <button type="submit" class="px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-xs transition">
                    تأكيد حذف الحساب نهائياً
                </button>
            </div>
        </form>
    </x-modal>
</section>
