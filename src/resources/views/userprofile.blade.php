@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')
<div class="profile__contents">
    <form action="/profile_update">
        @csrf
        <h1 class="profile__title">プロフィール設定</h1>
        <div class="profile__user">
            <div class="user__img">img</div>
            <a href="/profile" class="user__upload">画像を選択する</a>
        </div>
        <h2 class="profile__name">ユーザー名</h2>
        <input type="text" value="{{ Auth::user()->name }}">>
        <h2 class="profile__num">郵便番号</h2>
        <input name="code" type="text" value="{{ $user_addr->code }}">
        <h2 class="profile__addr">住所</h2>
        <input name="addr" type="text" value="{{ $user_addr->addr }}">
        <h2 class="profile__Building">建物名</h2>
        <input name="building" type="text" value="{{ $user_addr->building }}">
        <button>更新する</button>
    </form>
</div>
@endsection