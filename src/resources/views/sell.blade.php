@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}" />
@endsection

@section('content')
<div class="addr__contents">
    <form action="/sell_create" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="addr__title">商品の出品</h1>
        <h3>商品画像</h3>
        <input type="file" class="sell__img" placeholder="画像を選択" name="upload_file">

        <h2>商品の詳細</h2>
        <hr>
        <h3 class="addr__code">カテゴリー(カンマ（,）区切りで入力ください)</h3>
        <input type="text" name="category">
        <h3 class="addr__addr">商品の状態</h3>
        <input type="text" name="condition">

        <h2>商品名と説明</h2>
        <hr>
        <h3 class="addr__code">商品名</h3>
        <input type="text" name="name">
        <h3 class="addr__code">ブランド</h3>
        <input type="text" name="brand">
        <h3 class="addr__Building">商品の説明</h3>
        <textarea name="description" cols="30" rows="10"></textarea>

        <h2>販売価格</h2>
        <hr>
        <h3 class="addr__code">販売価格</h3>
        <input type="text" name="price">
        
        <button>出品する</button>
    </form>
</div>
@endsection