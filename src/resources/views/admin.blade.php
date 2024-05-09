@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<table>
    <tr>
        <th>ユーザー名</th>
        <th>役職</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            @if ($user->role > 10 && $user->role <= 100)
                <td>管理者</td>
            @elseif ($user->role >=1 && $user->role <= 10)
                <td>店舗管理者</td>
            @else
                <td>利用者</td>
            @endif
            <td>
                <form action="/role_update" method="post">
                    @csrf
                    <input type="hidden" name="user_uuid" value="{{$user->uuid}}">
                    <select name="role">
                        <option value="0">一般</option>
                        <option value="1">店舗管理者</option>
                        <option value="10">管理者</option>
                    </select>
                    <button type="submit">更新</button>
                </form>
            </td>
            <td>
                <form action="/user_delete" method="post">
                    @csrf
                    <input type="hidden" name="user_uuid" value="{{$user->uuid}}">
                    <button type="submit">削除</button>
                </form>
            </td>
            <td><a href="mailto:{{$user->mail}}">メール送信</a></td>
        </tr>
    @endforeach
</table>
@endsection