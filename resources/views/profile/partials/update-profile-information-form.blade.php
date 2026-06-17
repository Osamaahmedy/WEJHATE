<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-slate-800">
            بيانات الملف الشخصي
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            تحديث بيانات حسابك الأساسية، رقم الهاتف وعنوان البريد الإلكتروني.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="space-y-1">
            <x-input-label for="name" :value="__('الاسم')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div class="space-y-1">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 bg-amber-50 p-3 rounded-xl border border-amber-100">
                    <p class="text-xs text-amber-800">
                        بريدك الإلكتروني غير مفعل.
                        <button form="send-verification" class="underline hover:text-amber-900 font-bold">
                            اضغط هنا لإعادة إرسال رابط التفعيل.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-bold text-xs text-emerald-600">
                            تم إرسال رابط تفعيل جديد إلى عنوان بريدك الإلكتروني.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Phone Number -->
        <div class="space-y-1">
            <x-input-label for="phone" :value="__('رقم الهاتف')" class="text-xs font-bold text-slate-500" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full rounded-xl border-slate-200 focus:border-sky-500 focus:ring-sky-500 text-sm" :value="old('phone', $user->phone)" placeholder="مثال: +967 777 777 777" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Avatar Upload -->
        <div class="space-y-2">
            <x-input-label for="avatar" :value="__('الصورة الشخصية')" class="text-xs font-bold text-slate-500" />
            @if($user->avatar)
                <div class="my-2 flex items-center gap-3">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover border border-slate-200">
                    <span class="text-xs text-slate-400">الصورة الحالية للملف الشخصي</span>
                </div>
            @endif
            <input id="avatar" name="avatar" type="file" class="mt-1 block w-full text-xs text-slate-500 file:ml-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 transition cursor-pointer border border-slate-200 rounded-xl p-1 bg-white" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="px-5 py-2.5 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-xs shadow-sm transition">
                حفظ التغييرات
            </button>

            @if (session('status') === 'profile-updated')
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
