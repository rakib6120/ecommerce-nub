<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(protected CartService $cart) {}

    public function index(Request $request): View
    {
        $items = $this->cart->items();
        $total = $this->cart->total();

        return view('storefront.checkout', [
            'items' => $items,
            'total' => $total,
            'user' => $request->user(),
        ]);
    }
}
