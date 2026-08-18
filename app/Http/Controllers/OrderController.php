<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    public function confirmation(Request $request, Order $order): View
    {
        if ($order->user_id !== $request->user()->id) {
            throw new NotFoundHttpException;
        }

        return view('storefront.order-confirmation', compact('order'));
    }
}
