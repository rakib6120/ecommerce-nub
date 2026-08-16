<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:1000'],
        ]);

        return back()->with('success', 'Your delivery details look good.');
    }
}
