@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('content')
<div class="addr__contents">
    <form action="/temp_addr">
        @csrf
        <input name="item_id" type="hidden" value="{{ $item_id }}">
        <h1 class="addr__title">住所の変更</h1>
        <h2 class="addr__code">郵便番号</h2>
        <input name="code" type="text" value="{{ $user_addr->code }}">
        <h2 class="addr__addr">住所</h2>
        <input name="addr" type="text" value="{{ $user_addr->addr }}">
        <h2 class="addr__Building">建物名</h2>
        <input name="building" type="text" value="{{ $user_addr->building }}">
        <button>更新する</button>
    </form>
</div>
@endsection