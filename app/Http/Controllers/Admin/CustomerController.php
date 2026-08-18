<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = User::where('role', 'customer')
            ->withCount('orders')
            ->latest('id')
            ->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $customer): View
    {
        if ($customer->role !== 'customer') {
            throw new NotFoundHttpException;
        }

        $totalOrders = $customer->orders()->count();
        $totalSpent = $customer->orders()->whereNotIn('status', ['cancelled'])->sum('total');
        $recentOrders = $customer->orders()->latest('id')->take(5)->get();

        return view('admin.customers.show', compact('customer', 'totalOrders', 'totalSpent', 'recentOrders'));
    }
}
