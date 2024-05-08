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
        <h2>支払い内容</h2>
        <table>
            <tr>
                <td>支払い金額</td>
                <td>¥{{ number_format($history->amount, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>支払い方法</td>
                @if ($history->method === 'card')
                    <td> クレジットカード</td>
                @else
                    <td> コンビニ払い</td>
                @endif
            </tr>
        </table>
        
    </div>
    <div class="purchase__addr">
        <div class="purchase__addr--header">
            <h2>配送先</h2>
            <a href="/history_update/{{$history->id}}">変更する</a>
        </div>
        <table class="purchase__addr--detail">
                <tr>
                    <th>郵便番号</th>
                    <td>{{ $history->code }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $history->addr }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $history->building }}</td>
                </tr>
        </table>
    </div>
</div>

@endsection