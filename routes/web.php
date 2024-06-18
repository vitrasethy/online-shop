<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CashierController;
use App\Http\Requests\CheckOutRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'products' => Product::all(),
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
   Route::apiResource('carts', CartController::class)->except('update');
   Route::put('carts/{cart}/{change}', [CartController::class, 'update'])->name('cart.update');
   Route::get('checkout', [CashierController::class, 'checkout'])->name('checkout');
   Route::get('/checkout-success', [CashierController::class, 'checkout_success'])->name('checkout-success');
   Route::get('/checkout-cancel', [CashierController::class, 'checkout_cancel'])->name('checkout-cancel');
});

require __DIR__.'/auth.php';
