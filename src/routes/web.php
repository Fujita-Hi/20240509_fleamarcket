<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FleamarketController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FleamarketController::class, 'home']);

Route::get('/item/{item_id}', [FleamarketController::class, 'item']);


Route::get('/comment', function () {
    return view('comment');
})->middleware(['auth', 'verified'])->name('/login');

Route::get('/temp_addr', [FleamarketController::class, 'temp_addr'])->middleware(['auth', 'verified'])->name('/login');

Route::get('/purchase/{item_id}', [FleamarketController::class, 'purchase'])->middleware(['auth', 'verified'])->name('/login');

Route::get('/payment_method', [FleamarketController::class, 'payment_method'])->middleware(['auth', 'verified'])->name('/login');

Route::get('/mypage', [FleamarketController::class, 'mypage'])->middleware(['auth', 'verified'])->name('/login');

Route::get('/history/{history_id}', [FleamarketController::class, 'history'])->middleware(['auth', 'verified'])->name('/login');

Route::get('/history_update/{history_id}', [FleamarketController::class, 'history_update'])->middleware(['auth', 'verified'])->name('/login');

Route::get('/history_addr_update', [FleamarketController::class, 'history_addr_update'])->middleware(['auth', 'verified'])->name('/login');


Route::get('/userprofile', [FleamarketController::class, 'userprofile']);

Route::get('/profile_update', [FleamarketController::class, 'profile_update']);

Route::get('/sell', function () {
    return view('sell');
})->middleware(['auth', 'verified'])->name('/login');

Route::post('/sell_create', [FleamarketController::class, 'sell_create']);

Route::get('/address/{item_id}', [FleamarketController::class, 'address'])->middleware(['auth', 'verified'])->name('/login');

Route::post('/favorite_create', [FleamarketController::class, 'favorite_create'])->middleware(['auth', 'verified'])->name('/login');;

Route::post('/favorite_delete', [FleamarketController::class, 'favorite_delete'])->middleware(['auth', 'verified'])->name('/login');;

Route::get('images/{filename}', [FleamarketController::class, 'showImage'])->name('show.image');

Route::post('/upload', [FleamarketController::class, 'upload'])->name('upload');

Route::post('/pay', [PaymentController::class, 'pay']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/paycreate', [PaymentController::class, 'paycreate'])->name('paycreate');
Route::prefix('payment')->name('payment.')->group(function () {
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
});

require __DIR__.'/auth.php';
