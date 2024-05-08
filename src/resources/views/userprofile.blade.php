@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')
<div class="profile__contents">
    <form action="/profile_update" method="POST" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error__message">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        @csrf
        <h1 class="profile__title">プロフィール設定</h1>
        <div class="profile__user">
            @if(Auth::user()->profileimg)
                <img src="{{ route('show.image', ['filename' => Auth::user()->profileimg]) }}" alt="ユーザ" class='user__img'></img>
            @else
                <img src="{{ route('show.image', ['filename' => 'profile/noimage.jpg']) }}" alt="ユーザ" class='user__img'></img>
            @endif
            <label class="user__upload" for="form__image">画像を選択する</label>
            <input type="file" name="upload_file" id="form__image" onchange="FileSelect(event)">
            <span class="select__image"></span>

        </div>
        <h2 class="profile__name">ユーザー名</h2>
        <input name="name" type="text" value="{{ Auth::user()->name }}">
        <h2 class="profile__num">郵便番号</h2>
        <input name="code" type="text" value="{{ $user_addr->code }}">
        <h2 class="profile__addr">住所</h2>
        <input name="addr" type="text" value="{{ $user_addr->addr }}">
        <h2 class="profile__Building">建物名</h2>
        <input name="building" type="text" value="{{ $user_addr->building }}">
        <button>更新する</button>
    </form>
</div>
<script>
    function FileSelect(event) {
        var file = event.target.files[0];
        document.querySelector('.select__image').textContent = file.name;
    }
</script>
@endsection