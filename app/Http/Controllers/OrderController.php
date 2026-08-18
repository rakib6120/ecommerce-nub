<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = $request->user()->orders()->latest()->get();

        return view('storefront.orders.index', compact('orders'));
    }

    public function show(Request $request, Order $order): View
    {
        $this->authorizeOwner($request, $order);

        $order->load('items.product');

        return view('storefront.orders.show', compact('order'));
    }

    public function confirmation(Request $request, Order $order): View
    {
        $this->authorizeOwner($request, $order);

        return view('storefront.order-confirmation', compact('order'));
    }

    private function authorizeOwner(Request $request, Order $order): void
    {
        if ($order->user_id !== $request->user()->id) {
            throw new NotFoundHttpException;
        }
    }
}
