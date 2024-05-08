<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Addr;
use App\Models\Item;
use App\Models\Sell;
use App\Models\History;
use App\Models\Comment;
use App\Models\Favorite;

class FleamarketController extends Controller
{

    public function home(){
        $items = Item::all();
        $user = auth()->user();
        if (!$user) {
            return view('home', ['items' => $items, 'favorites' => $items]);
        }
        $favoriteid = Favorite::where('user_id', $user->id)->pluck('item_id');
        $favorites = Item::whereIn('id', $favoriteid)->get();
        return view('home', ['items' => $items, 'favorites' => $favorites]);
    }

    public function mypage(){
        $user = auth()->user();
        $item_id = Sell::where('user_id', $user->id)->pluck('item_id');
        $items = Item::whereIn('id', $item_id)->get();
        $histories = [];
        $historied = History::where('user_id', $user->id)->get();
        foreach ($historied as $index => $item){
            $item_list = Item::where('id', $item->item_id)->first();
            $histories[] = [
            'history_id' => $item->id,
            'name' => $item_list->name,
            'img' => $item_list->img,
            ];
        }
        return view('mypage', ['items' => $items, 'histories' => $histories]);
    }

    public function item($item_id){
        $items = Item::findOrFail($item_id);
        $stars = Favorite::where('item_id', $item_id)->pluck('user_id')->toArray();
        $star_count = count($stars);

        $user = auth()->user();
        if (!$user) {
            $favorites  = false;
        }
        else{
            $favorites  = in_array($user->id, $stars);
        }
        return view('item', ['item' => $items, 'favorites' => $favorites, 'star_count' => $star_count]);
    }

    public function history($history_id){
        $histories = History::findOrFail($history_id);
        $item = Item::findOrFail($histories->item_id);
        return view('history', ['item' => $item, 'history' => $histories]);
    }

    public function history_update($history_id){
        $histories = History::findOrFail($history_id);
        return view('history_update', ['history' => $histories]);
    }

    public function history_addr_update(Request $request){
        $history_addr = history::where('id', $request->history_id)->first();
        
        $history_addr->code = $request->code;
        $history_addr->addr = $request->addr;
        $history_addr->building = $request->building;
        $history_addr->save();
        return redirect()->back();
    }   

    public function purchase($item_id){
        $items = Item::findOrFail($item_id);

        $temp_addr = session('temp_addr');
        if(!$temp_addr){
            $user_id = Auth::user()->id;
            $user_addr = Addr::where('user_id', $user_id)->first();
            if (!$user_addr) {
                $user_addr = new Addr();
            }
        }
        else{
            $user_addr = $temp_addr;
        }

        $payment_method = session('temp_method');
        if(!$payment_method){
            $payment_method = 'card';
        }

        return view('purchase', ['item' => $items, 'user_addr' => $user_addr, 'payment_method' => $payment_method]);
    }

    public function address($item_id){
        $user_id = Auth::user()->id;
        $temp_addr = session('temp_addr');
        if(!$temp_addr){
            $user_id = Auth::user()->id;
            $user_addr = Addr::where('user_id', $user_id)->first();
            if (!$user_addr) {
                $user_addr = new Addr();
            }
        }
        else{
            $user_addr = $temp_addr;
        }

        return view('address', ['item_id' =>$item_id, 'user_addr' => $user_addr]);
    }

    public function payment_method(Request $request){
        session(['temp_method' => $request->method]);
        return redirect()->back();
    } 

    public function temp_addr(Request $request){
        $user_id = Auth::user()->id;
        $user_addr = Addr::where('user_id', $user_id)->first();

        $user_addr->code = $request->code;
        $user_addr->addr = $request->addr;
        $user_addr->building = $request->building;
        session(['temp_addr' => $user_addr]);
        $url = '/purchase/'.$request->item_id;
        return Redirect::to($url);
    } 

    public function sell_create(Request $request){
        $user_id = Auth::user()->id;
        if ($request->hasFile('upload_file')) {
            $upload_file = $request->file('upload_file');
            $fileName = $upload_file->getClientOriginalName();
        }
        else {
            dd($upload_file);
        }
        //S3にアップロード
        
        if(!empty($upload_file)) {
            $dir = 'img';
            $s3_upload = Storage::disk('s3')->putFileAs('/'.$dir, $upload_file, $fileName);
        }

        $item = new Item();
        $item->name = $request->name;
        $item->brand = $request->brand;
        $item->price = $request->price;
        $item->category = $request->category;
        $item->condition = $request->condition;
        $item->description = $request->name;
        $item->img = $fileName;
        $item->save();

        $sell = [
            'user_id' => $user_id,
            'item_id' => $item->id
        ];
        Sell::create($sell);
        return Redirect::to('/mypage');
    }

    public function userprofile(){
        $user_id = Auth::user()->id;
        $user_addr = Addr::where('user_id', $user_id)->first();
        if (!$user_addr) {
            $user_addr = new Addr();
        }
        return view('userprofile', ['user_addr' => $user_addr]);
    }

    public function profile_update(Request $request){
        $user_id = Auth::user()->id;
        $user_addr = Addr::where('user_id', $user_id)->first();
        
        if (!$user_addr) {
            $user_addr = [
                'user_id' => $user_id,
                'code' => $request->code,
                'addr' => $request->addr,
                'building' => $request->building
            ];
            Addr::create($user_addr);
        }

        else{
            $user_addr->code = $request->code;
            $user_addr->addr = $request->addr;
            $user_addr->building = $request->building;
            $user_addr->save();
        }

        return redirect()->back();
    }   

    public function favorite_create(Request $request){
        $user_id = Auth::user()->id;
        $favorite = [
            'user_id' => $user_id,
            'item_id' => $request->item_id
        ];
        Favorite::create($favorite);
        return redirect()->back();
    }

    public function favorite_delete(Request $request){
        $user_id = Auth::user()->id;
        Favorite::where('user_id', $user_id)->where('item_id', $request->item_id)->delete();
        return redirect()->back();
    }

    public function showImage($filename){
        $path = 'img/' .$filename;
        $file = Storage::disk('s3')->get($path);
        return response($file, 200)->header('Content-Type', 'image/jpeg');
    }
}
