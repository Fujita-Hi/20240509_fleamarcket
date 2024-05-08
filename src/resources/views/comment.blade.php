@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
@endsection


@section('content')
<div class="item__column cat1">
    <div class="item__img">商品画像</div>
</div>
<div class="item__column cat2">
    <div class="item__detail">
        <h1>商品名</h1>
        <p>ブランド名</p>
        <p>￥47,000(値段)</p>
        <div class="item__evaluation">
            <div class="item__star">
                <i class="fa-regular fa-star"></i>
                <p class="item__star--num">13</p>
            </div>
            <div class="item__comment">
                <i class="fa-regular fa-comment"></i>
                <p class="item__comment--num">14</p>
            </div>
        </div>
        <form action="" class="comment__contants">
            <span>名前</span>
            <input type="text">
            <span>名前</span>
            <input type="text">
            <span>名前</span>
            <input type="text">
            <span>商品へのコメント</span>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <button>コメントを送信する</button>
        </form>
    </div>
</div>


@endsection