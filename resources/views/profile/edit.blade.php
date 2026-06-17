<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                إعدادات الحساب
            </h2>
            <span class="text-sm text-slate-500">إدارة وتعديل بياناتك الشخصية وحماية حسابك</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-3xl mx-auto space-y-8">
            <!-- Profile Info Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm text-right">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm text-right">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-rose-100 shadow-sm text-right">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
