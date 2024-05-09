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
            <form class="header__search" action="/search">
                @csrf
                <input name="keyword" class="header__search" type="text" placeholder="何をお探しですか？"></input>
            </form>
            <nav class="header__nav">
                <ul>
                    @if (Auth::guest())
                        <li><a href="/login" class="header__login">ログイン</a></li>
                        <li><a href="/register" class="header__register">会員登録</a></li>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="header__nav-item-link" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                        </form>
                        @can('admin-higher')
                            <li><a href="/admin" class="header__admin">管理</a></li>
                        @endcan
                        <li><a href="/mypage" class="header__login">マイページ</a></li>
                    @endif
                    @can('owner-higher')
                    <li><a href="/sell" class="header__sell">出品</a></li>
                    @endcan
                </ul>
            </nav>
            <div class="header__nav--burger">
                <input id="drawer_input" class="drawer_hidden" type="checkbox">
                <label for="drawer_input" class="drawer_open"><span></span></label>
                <nav class="burger__content">
                    <ul>
                        <li class=burger__search>
                            <form action="/search">
                                @csrf
                                <input name="keyword" class="burger__search" type="text" placeholder="検索"></input>
                            </form>
                        </li>
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
                            @can('admin-higher')
                                <li><a href="/admin" class="header__admin">管理</a></li>
                            @endcan
                            <li><a href="/mypage" class="header__login">マイページ</a></li>
                        @endif
                        @can('owner-higher')
                            <li><a href="/sell" class="header__sell">出品</a></li>
                        @endcan
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
