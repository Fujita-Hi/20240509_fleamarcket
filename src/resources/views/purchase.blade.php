@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection

@section('content')
<div class="purchase__column cat1">
    <div class="purchase__item">
        <img src="{{ route('show.image', ['filename' => $item->img]) }}" alt="商品画像" class='purchase__item--img'></img>
        <div class="purchase__iteminfo">
            <h1>{{$item->name}}</h1>
            <p>¥{{ number_format($item->price, 0, '.', ',') }}</p>
        </div>
    </div>
    <div class="purchase__payment">
        <form action="/payment_method" method="get">
            <div class="purchase__payment--header">
                <h2>支払い方法</h2>
                <button class="purchase__payment--button">変更する</button>
            </div>
            <input type="radio" name="method" value="card" {{ $payment_method == 'card' ? 'checked' : '' }}>クレジットカード
            <input type="radio" name="method" value="konbini" {{ $payment_method == 'konbini' ? 'checked' : '' }}>コンビニ払い
        </form>
        
    </div>
    <div class="purchase__addr">
        <div class="purchase__addr--header">
            <h2>配送先</h2>
            <a href="/address/{{$item->id}}">変更する</a>
        </div>
        <table class="purchase__addr--detail">
                <tr>
                    <th>郵便番号</th>
                    <td>{{ $user_addr->code }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $user_addr->addr }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $user_addr->building }}</td>
                </tr>
        </table>
    </div>
</div>
<div class="purchase__column cat2">
    <div class="purchase__detail">
        <table>
            <tr>
                <td>商品代金</td>
                <td>¥{{ number_format($item->price, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>支払い金額</td>
                <td>¥{{ number_format($item->price, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>支払い方法</td>
                @if ($payment_method === 'card')
                    <td> クレジットカード</td>
                @else
                    <td> コンビニ払い</td>
                @endif
            </tr>
        </table>
    </div>
    <form action="/paycreate">
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="amount" value="{{ $item->price }}">
        <input type="hidden" name="name" value="{{ $item->name }}">
        <button>購入する</button>
    </form>
</div>

@endsection