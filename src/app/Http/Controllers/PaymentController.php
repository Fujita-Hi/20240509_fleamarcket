<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;

use App\Models\History;

class PaymentController extends Controller
{
    public function pay(Request $request){
        Stripe::setApiKey(config('cashier.secret'));//シークレットキー

        $charge = Charge::create(array(
            'amount' => 47000,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
        return view('/mypage');
    }

    public function paycreate(Request $request){
        $payment_method = session('temp_method');
        return view('paycreate', ['payment_method' =>$payment_method, 'item_info' => $request]);
    }

    public function store(Request $request){
        //決済実行
        \Stripe\Stripe::setApiKey(config('cashier.secret'));
        try {
            if ($request->method == 'konbini'){
                $paymentIntent = \Stripe\PaymentIntent::create([
                    'amount' => $request->amount, // 金額を設定
                    'currency' => 'jpy', // 通貨を設定
                    'payment_method_types' => ['konbini'],
                    'payment_method_options' => [
                        'konbini' => [
                        'product_description' => $request->name,
                        'expires_after_days' => 3,
                        ],
                    ],
                ]);
                $response = [
                    'method' => 'konbini',
                    'clientSecret' => $paymentIntent->client_secret,
                    'paymentIntentId' => $paymentIntent->id,
                ];
            }
            else{
                $charge = Charge::create(array(
                    'amount' => $request->amount,
                    'currency' => 'jpy',
                    'source'=> request()->stripeToken,
                ));
                $response = [
                    'method' => 'card',
                    'clientSecret' => '',
                    'paymentIntentId' => '',
                ];
            }

        } catch (Exception $e) {
            return back()->with('flash_alert', '決済に失敗しました！('. $e->getMessage() . ')');
        }

        // 購入履歴
        $user_id = Auth::user()->id;
        $temp_addr = session('temp_addr');
        $history = [
                'user_id' => $user_id,
                'item_id' => $request->item_id,
                'amount' => $request->amount,
                'method' => $request->method,
                'code' => $temp_addr->code,
                'addr' => $temp_addr->addr,
                'building' => $temp_addr->building
        ];
        History::create($history);
 
        return view('paycomplete', ['response' =>$response]);
    }
}
