@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endsection


@section('content')
    @if ($response["method"] === 'card')
        <h2>クレジットカードでの決済を完了しました</h2>
    @else
        <h2>コンビニ払いでの決済を受付ました</h2>
        <table>
            <tr>
                <th>発行番号:</th>
                <td>{{$response["paymentIntentId"]}}</td>
            </tr>
        </table>

    @endif
@endsection