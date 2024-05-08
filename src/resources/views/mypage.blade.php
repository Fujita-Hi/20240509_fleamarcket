@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection


@section('content')
<div class="mypage__user">
    <div class="user__info">
        @if(Auth::user()->profileimg)
            <img src="{{ route('show.image', ['filename' => Auth::user()->profileimg]) }}" alt="ユーザ" class='user__info--img'></img>
        @else
            <img src="{{ route('show.image', ['filename' => 'profile/noimage.jpg']) }}" alt="ユーザ" class='user__info--img'></img>
        @endif
        <p class="user__info--name">{{ Auth::user()->name }}さん</p>
    </div>
    <a href="/mypage/profile" class="user__profile">プロフィールを編集</a>
</div>

<div class="switch__button">
    <button id="sell-btn">出品した商品</button>
    <button id="purchase-btn">購入した商品</button>
</div>
<hr>
<div id="sell-list">
    @foreach ($items as $item)
        <a href="/item/{{$item->id}}"><img src="{{ route('show.image', ['filename' => $item->img]) }}" alt="{{$item->name}}" class="main__img"></img></a>
    @endforeach
</div>
<div id="purchase-list" style="display: none;">
    @foreach ($histories as $history)
    <a href="/history/{{$history['history_id']}}"><img src="{{ route('show.image', ['filename' => $history['img']]) }}" alt="{{$history['name']}}" class="main__img"></img></a>
    @endforeach
</div>

<script>
    document.getElementById('sell-btn').onclick = function() {        
        document.getElementById('sell-list').style.display = 'block';
        document.getElementById('purchase-list').style.display = 'none';
        document.getElementById('sell-btn').style.color = "red";
        document.getElementById('sell-btn').style.fontWeight = "bold";
        document.getElementById('purchase-btn').style.color = "black";
        document.getElementById('purchase-btn').style.fontWeight = "";
    };

    document.getElementById('purchase-btn').onclick = function() {
        document.getElementById('sell-list').style.display = 'none';
        document.getElementById('purchase-list').style.display = 'block';
        document.getElementById('purchase-btn').style.color = "red";
        document.getElementById('purchase-btn').style.fontWeight = "bold";
        document.getElementById('sell-btn').style.color = "black";
        document.getElementById('sell-btn').style.fontWeight = "";
    };
</script>
@endsection