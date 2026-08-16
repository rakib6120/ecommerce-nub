<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::with('category')
            ->where('status', true)
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->query('category'));
                });
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->query('search').'%');
            })
            ->latest()
            ->get();

        $categories = Category::where('status', true)->orderBy('name')->get();

        return view('storefront.shop', compact('products', 'categories'));
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
