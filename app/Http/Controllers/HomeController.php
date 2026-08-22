<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::with('category')
            ->where('status', true)
            ->latest('id')
            ->take(4)
            ->get();

        $categories = Category::where('status', true)
            ->orderBy('name')
            ->take(4)
            ->get();

        return view('storefront.home', compact('featuredProducts', 'categories'));
    }
}
