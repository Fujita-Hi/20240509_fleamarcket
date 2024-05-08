<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <link rel="stylesheet" href="{{ asset('css/layouts/login.css') }}" />

    <form method="POST" action="{{ route('login') }}" class="login__contents">
        @csrf
        <!-- Email Address -->
        <h1 class="login__title">ログイン</h1>
        <x-input-label for="email" :value="__('メールアドレス')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <x-input-label for="password" :value="__('パスワード')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />


        <x-primary-button class="ms-3">
            {{ __('ログインする') }}
        </x-primary-button>
        <a href="/register">会員登録はこちら</a>
    </form>
</x-guest-layout>
