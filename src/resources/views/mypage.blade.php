@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection


@section('content')
<div class="mypage__user">
    <div class="user__info">
         <div class="user__info--img">img</div>
        <p class="user__info--name">{{ Auth::user()->name }}さん</p>   
    </div>
    <a href="/userprofile" class="user__profile">プロフィールを編集</a>
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
    };

    document.getElementById('purchase-btn').onclick = function() {
        document.getElementById('sell-list').style.display = 'none';
        document.getElementById('purchase-list').style.display = 'block';
    };
</script>
@endsection