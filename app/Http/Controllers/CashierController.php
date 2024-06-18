<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CashierController extends Controller
{
    public function checkout(Request $request)
    {
        $carts = Cart::with('product')->where("user_id", auth()->id())->get();

        $line_items = [];
        foreach ($carts as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name
                    ],
                    'unit_amount' => $item->product->price * 100
                ],
                'quantity' => $item->quantity,
            ];
        }

        $stripe_session = $request->user()->checkout($line_items, [
            'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout-cancel'),
        ]);

        return Inertia::location($stripe_session->url);
    }

    public function checkout_success()
    {
        Cart::with('product')->where("user_id", auth()->id())->delete();

        return Inertia::render('SuccessCheckout');
    }

    public function checkout_cancel()
    {
        return Inertia::render('CancelCheckout');
    }
}
