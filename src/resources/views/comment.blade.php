@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
@endsection


@section('content')
<div class="item__column cat1">
    <div class="item__img">
        <img src="{{ route('show.image', ['filename' => $item->img]) }}" alt="商品画像" class='item__img'></img>
    </div>
</div>
<div class="item__column cat2">
    <div class="item__detail">
        <h1>{{$item->name}}</h1>
        <p>{{$item->brand}}</p>
        <p>￥{{ number_format($item->price, 0, '.', ',') }}(値段)</p>
        <div class="item__evaluation">
            @if ($favorites)
                <form action="/favorite_delete" method="post">
                    @csrf
                    <input name='item_id' type="hidden" value="{{$item->id}}">
                    <div class="item__star">
                        <button class='star__button'><i class="fa-regular fa-star favorite-star"></i></button>
                        <p class="item__star--num">{{$star_count}}</p>
                    </div>
                </form>
            @else
                <form action="/favorite_create" method="post">
                    @csrf
                    <input name='item_id' type="hidden" value="{{$item->id}}">
                    <div class="item__star">
                        <button class='star__button'><i class="fa-regular fa-star"></i></button>
                        <p class="item__star--num">{{$star_count}}</p>
                    </div>
                </form>
            @endif
            <div class="item__comment">
                <a href="/item/comment/{{$item->id}}"><i class="fa-regular fa-comment"></i></a>
                <p class="item__comment--num">{{$comment_count}}</p>
            </div>
        </div>
        @foreach ($comments as $comment)
            @if ($comment['role'] < 1)
                <div class="comment__contants">
                    <div class="comment__profile">
                        <img src="{{ route('show.image', ['filename' => Auth::user()->profileimg]) }}" alt="ユーザ" class='profile__img'></img>
                        <span class="profile_name">{{$comment['name']}}</span>
                    </div>
                    <p class="comment__text">{{$comment['text']}}</p>
                </div>
            @else
                <div class="comment__contants">
                    <div class="comment__profile--right">
                        <span class="profile_name">{{$comment['name']}}</span>
                        <img src="{{ route('show.image', ['filename' => Auth::user()->profileimg]) }}" alt="ユーザ" class='profile__img'></img>
                    </div>
                    <p class="comment__text">{{$comment['text']}}</p>
                </div>
            @endif
        @endforeach    
        <form action="/comment_create" class="comment__form" method="POST">
            @csrf
            <span class="form__ttl">商品へのコメント</span>
            <input type="hidden" name="item_id" value="{{$item->id}}">
            <textarea class="form__textarea" name="comment" id="" cols="30" rows="10"></textarea>
            <button class="form__button">コメントを送信する</button>
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error__message">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
</div>


@endsection