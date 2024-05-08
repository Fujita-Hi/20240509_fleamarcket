@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endsection


@section('content')
<div class="switch__button">
    <button id="recommended-btn">おすすめ</button>
    <button id="mylist-btn">マイリスト</button>
</div>
<hr>
<div id="recommended-list">
    @foreach ($items as $item)
    <a href="/item/{{$item->id}}"><img src="{{ route('show.image', ['filename' => $item->img]) }}" alt="{{$item->name}}" class="main__img"></img></a>
    @endforeach
</div>
<div id="mylist-list" style="display: none;">
    @foreach ($favorites as $favorite)
    <a href="/item/{{$favorite->id}}"><img src="{{ route('show.image', ['filename' => $favorite->img]) }}" alt="{{$favorite->name}}" class="main__img"></img></a>
    @endforeach
</div>
<script>
    document.getElementById('recommended-btn').onclick = function() {        
        document.getElementById('recommended-list').style.display = 'block';
        document.getElementById('mylist-list').style.display = 'none';
        document.getElementById('recommended-btn').style.color = "red";
        document.getElementById('recommended-btn').style.fontWeight = "bold";
        document.getElementById('mylist-btn').style.color = "";
        document.getElementById('mylist-btn').style.fontWeight = "";
    };

    document.getElementById('mylist-btn').onclick = function() {
        document.getElementById('recommended-list').style.display = 'none';
        document.getElementById('mylist-list').style.display = 'block';
        document.getElementById('mylist-btn').style.color = "red";
        document.getElementById('mylist-btn').style.fontWeight = "bold";
        document.getElementById('recommended-btn').style.color = "";
        document.getElementById('recommended-btn').style.fontWeight = "";
    };
</script>
@endsection