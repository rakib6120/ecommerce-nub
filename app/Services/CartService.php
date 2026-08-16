<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected const SESSION_KEY = 'cart';

    /**
     * Add a product to the cart, or increase its quantity if already present.
     */
    public function add(int $productId, int $quantity): void
    {
        $cart = $this->raw();

        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Set a product's quantity in the cart to an exact value.
     */
    public function update(int $productId, int $quantity): void
    {
        $cart = $this->raw();

        if (! array_key_exists($productId, $cart)) {
            return;
        }

        $cart[$productId] = $quantity;

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Remove a single product from the cart.
     */
    public function remove(int $productId): void
    {
        $cart = $this->raw();

        unset($cart[$productId]);

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Empty the cart entirely.
     */
    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    /**
     * The raw product_id => quantity pairs stored in the session.
     *
     * @return array<int, int>
     */
    public function raw(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * The cart items resolved against the database, each with its product,
     * quantity, and subtotal. Products are always re-fetched from the
     * database so price/stock/name reflect the current source of truth.
     */
    public function items(): Collection
    {
        $cart = $this->raw();

        if (empty($cart)) {
            return collect();
        }

        return Product::whereIn('id', array_keys($cart))
            ->get()
            ->map(function (Product $product) use ($cart) {
                $quantity = $cart[$product->id];

                return [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity,
                ];
            });
    }

    /**
     * Total number of items (summed quantities) in the cart.
     */
    public function count(): int
    {
        return array_sum($this->raw());
    }

    /**
     * The total price of everything currently in the cart.
     */
    public function total(): float
    {
        return (float) $this->items()->sum('subtotal');
    }
}
