<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->get();
        $original_total = $carts->sum('total_price');

        return Inertia::render('Cart', [
            'carts' => $carts,
            'originalTotal' => $original_total,
        ]);
    }

    public function store(CartRequest $request)
    {
        $validated = $request->validated();
        $cart = Cart::where('user_id', auth()->id())->where('product_id', $validated['product_id'])->first();

        if (!is_null($cart)) {
            $cart->increment('quantity');

            return redirect()->route('home');
        }

        Cart::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home');
    }

    public function update(Cart $cart, string $change)
    {
        if ($change === "increment") {
            $cart->increment('quantity');
        }
        if ($change === "decrement") {
            $cart->decrement('quantity');
        }

        return redirect()->route('carts.index');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('carts.index');
    }
}
