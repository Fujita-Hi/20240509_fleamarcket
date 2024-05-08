@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}" />
@endsection

@section('content')
<div class="sell__contents">
    <form action="/sell_create" method="POST" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error__message">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        @csrf
        <h1 class="sell__title">商品の出品</h1>
        <h3>商品画像</h3>
        <div class="sell__img">
        <label class="upload__label" for="form__image">画像を選択する</label>
        <input type="file" name="upload_file" id="form__image" onchange="FileSelect(event)">
        <span class="select__image"></span>
        </div>


        <h2>商品の詳細</h2>
        <hr>
        <h3 class="sell__category">カテゴリー(カンマ（,）区切りで入力)</h3>
        <input type="text" name="category">
        <h3 class="sell__condition">商品の状態</h3>
        <input type="text" name="condition">

        <h2>商品名と説明</h2>
        <hr>
        <h3 class="sell__name">商品名</h3>
        <input type="text" name="name">
        <h3 class="sell__brand">ブランド</h3>
        <input type="text" name="brand">
        <h3 class="sell__description">商品の説明</h3>
        <textarea name="description" cols="30" rows="10"></textarea>

        <h2>販売価格</h2>
        <hr>
        <h3 class="sell__price">販売価格</h3>
        <input type="text" name="price" placeholder="￥">
        
        <button>出品する</button>
    </form>
</div>

<script>
    function FileSelect(event) {
        var file = event.target.files[0];
        document.querySelector('.select__image').textContent = file.name;
    }
</script>

@endsection