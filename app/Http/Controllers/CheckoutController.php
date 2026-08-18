<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use RuntimeException;

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
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:1000'],
        ]);

        $cartItems = $this->cart->raw();

        if (empty($cartItems)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        try {
            $order = DB::transaction(function () use ($request, $validated, $cartItems) {
                $products = Product::whereIn('id', array_keys($cartItems))->lockForUpdate()->get()->keyBy('id');

                $subtotal = 0;
                $lineItems = [];

                foreach ($cartItems as $productId => $quantity) {
                    $product = $products->get($productId);

                    if (! $product || ! $product->status || $quantity > $product->stock) {
                        throw new RuntimeException('Sorry, "'.($product->name ?? 'a product').'" no longer has enough stock. Please update your cart.');
                    }

                    $lineSubtotal = $product->price * $quantity;
                    $subtotal += $lineSubtotal;

                    $lineItems[] = ['product' => $product, 'quantity' => $quantity, 'subtotal' => $lineSubtotal];
                }

                $order = Order::create([
                    'user_id' => $request->user()->id,
                    'order_number' => $this->generateOrderNumber(),
                    'customer_name' => $validated['customer_name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'subtotal' => $subtotal,
                    'total' => $subtotal,
                    'status' => 'pending',
                ]);

                foreach ($lineItems as $lineItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $lineItem['product']->id,
                        'product_name' => $lineItem['product']->name,
                        'price' => $lineItem['product']->price,
                        'quantity' => $lineItem['quantity'],
                        'subtotal' => $lineItem['subtotal'],
                    ]);

                    $lineItem['product']->decrement('stock', $lineItem['quantity']);
                }

                return $order;
            });
        } catch (RuntimeException $e) {
            return redirect()->route('cart')->with('error', $e->getMessage());
        }

        $this->cart->clear();

        return redirect()->route('order.confirmation', $order)->with('success', 'Your order has been placed!');
    }

    private function generateOrderNumber(): string
    {
        do {
            $orderNumber = 'ORD-'.now()->format('Ymd').'-'.strtoupper(Str::random(6));
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }
}
