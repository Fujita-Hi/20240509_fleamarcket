@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('content')
<div class="addr__contents">
    <form action="/history_addr_update" method="POST">
        @csrf
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error__message">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <input type="hidden" name="history_id" value="{{$history->id}}">
        <h1 class="addr__title">住所の変更</h1>
        <h2 class="addr__code">郵便番号</h2>
        <input name="code" type="text" value="{{ $history->code }}">
        <h2 class="addr__addr">住所</h2>
        <input name="addr" type="text" value="{{ $history->addr }}">
        <h2 class="addr__Building">建物名</h2>
        <input name="building" type="text" value="{{ $history->building }}">
        <button>更新する</button>
        
    </form>
</div>
@endsection