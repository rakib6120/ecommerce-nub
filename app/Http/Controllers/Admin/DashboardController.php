<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'products' => Product::count(),
            'categories' => Category::count(),
            'orders' => Order::count(),
            'customers' => User::where('role', 'customer')->count(),
        ];

        $recentOrders = Order::latest('id')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
