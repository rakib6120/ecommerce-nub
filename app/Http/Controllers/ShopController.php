<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')
            ->where('status', true)
            ->latest()
            ->get();

        return view('storefront.shop', compact('products'));
    }

    public function show(string $slug): View
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('storefront.product-details', compact('product'));
    }
}
