<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(protected CartService $cart) {}

    public function index(): View
    {
        $items = $this->cart->items();
        $total = $this->cart->total();

        return view('storefront.cart', compact('items', 'total'));
    }

    public function add(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $existingQuantity = $this->cart->raw()[$product->id] ?? 0;
        $requestedTotal = $existingQuantity + $validated['quantity'];

        if (! $product->status || $requestedTotal > $product->stock) {
            return back()->with('error', 'Sorry, only '.$product->stock.' unit(s) of "'.$product->name.'" are available.');
        }

        $this->cart->add($product->id, $validated['quantity']);

        return back()->with('success', '"'.$product->name.'" was added to your cart.');
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:'.$product->stock],
        ]);

        $this->cart->update($product->id, $validated['quantity']);

        return back()->with('success', 'Cart updated.');
    }

    public function remove(Product $product): RedirectResponse
    {
        $this->cart->remove($product->id);

        return redirect()->route('cart')->with('success', '"'.$product->name.'" was removed from your cart.');
    }
}
