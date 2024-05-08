<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/layouts/register.css') }}" />
    <form method="POST" action="{{ route('register') }}" class="register__contents">
        @csrf
        <h1 class="register__title">会員登録</h1>
        <!-- Email Address -->
        <x-input-label for="email" :value="__('メールアドレス')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- Password -->
        <x-input-label for="password" :value="__('パスワード')" />
        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <x-primary-button class="ms-4">{{ __('登録') }}</x-primary-button>
        <a href="{{ route('login') }}">{{ __('ログインはこちら') }}</a>
    </form>
</x-guest-layout>
