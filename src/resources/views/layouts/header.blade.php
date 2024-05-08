<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}" />
    <title>COACHTECH</title>
    @yield('css')
</head>
<body>
    <header>
        <div class="header__flex">
            <a href="/"><img src="{{ url('/img/logo.svg') }}" alt="logo" class="header__logo"></img></a>
            <form action="">
                @csrf
                <input class="header__search" type="text" placeholder="何をお探しですか？">
            </form>
            <nav>
                <ul>
                    @if (Auth::guest())
                        <li><a href="/login" class="header__login">ログイン</a></li>
                        <li><a href="" class="header__register">会員登録</a></li>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="header__nav-item-link" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                        </form>
                        <li><a href="/mypage" class="header__login">マイページ</a></li>
                    @endif
                    <li><a href="/sell" class="header__sell">出品</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>