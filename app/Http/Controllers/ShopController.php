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
}
