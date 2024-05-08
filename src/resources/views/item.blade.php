@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}" />
@endsection

@section('content')
<div class="item__column cat1">
    <img src="{{ route('show.image', ['filename' => $item->img]) }}" alt="商品画像" class='item__img'></img>
</div>
<div class="item__column cat2">
    <div class="item__detail">
        <h1>{{$item->name}}</h1>
        <p>{{$item->brand}}</p>
        <p>¥{{ number_format($item->price, 0, '.', ',') }}</p>
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
                <a href="/comment"><i class="fa-regular fa-comment"></i></a>
                <p class="item__comment--num">14</p>
            </div>
        </div>
        <form action="">
            @csrf
            <a href="/purchase/{{$item->id}}" class="item__purchase">購入する</a>
        </form>
        <h2>商品説明</h2>
        <p>{{$item->description}}</p>

        <h2>商品の情報</h2>
        <table class="item__info">
            <tr class="item__info--row1">
                <th class="item__category">カテゴリー</th>
                @php
                    $categorys = explode(',', $item->category);
                @endphp
                @foreach ($categorys as $category)
                    <td class="item__category--tag">{{$category}}</td>
                @endforeach
            </tr>
            <tr class="item__info--row2">
                <th class="item__condition">商品の状態</th>
                <td class="item__condition--tag">{{$item->condition}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection