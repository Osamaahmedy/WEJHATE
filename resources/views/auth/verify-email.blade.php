<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-slate-800">تأكيد البريد الإلكتروني</h2>
        <p class="text-sm text-slate-500 mt-2">
            شكراً لتسجيلك معنا! قبل البدء، يرجى تأكيد بريدك الإلكتروني من خلال الضغط على الرابط الذي أرسلناه إليك للتو. إذا لم يصلك البريد، يمكننا إرسال رابط آخر.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 bg-emerald-50 border border-emerald-100 rounded-xl p-4 text-emerald-700 text-xs font-bold text-right">
            تم إرسال رابط تأكيد جديد إلى عنوان البريد الإلكتروني الذي قمت بتسجيله.
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf
            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-xs shadow-sm transition">
                إعادة إرسال البريد الإلكتروني للتأكيد
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
            @csrf
            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-xs transition">
                تسجيل الخروج
            </button>
        </form>
    </div>
</x-guest-layout>
