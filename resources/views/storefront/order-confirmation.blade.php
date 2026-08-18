@extends('layouts.storefront')

@section('title', 'Order Confirmation')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-green-100 text-green-600 text-2xl">
                &check;
            </div>
            <h1 class="mt-4 text-3xl font-bold text-gray-900">Thank you for your order!</h1>
            <p class="mt-2 text-gray-600">Your order has been placed successfully.</p>
        </div>

        <div class="mt-8 bg-white border border-gray-200 rounded-lg p-6">
            <dl class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <dt class="text-gray-500">Order Number</dt>
                    <dd class="text-gray-900 font-medium">{{ $order->order_number }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Customer Name</dt>
                    <dd class="text-gray-900 font-medium">{{ $order->customer_name }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Status</dt>
                    <dd class="text-gray-900 font-medium capitalize">{{ $order->status }}</dd>
                </div>
                <div class="flex justify-between text-base pt-3 border-t border-gray-200">
                    <dt class="text-gray-900 font-semibold">Total</dt>
                    <dd class="text-gray-900 font-semibold">${{ number_format($order->total, 2) }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('shop') }}"
               class="flex-1 text-center bg-indigo-600 text-white font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
                Continue Shopping
            </a>
            <a href="{{ url('/my-orders') }}"
               class="flex-1 text-center bg-gray-100 text-gray-700 font-medium px-4 py-2 rounded-md hover:bg-gray-200">
                My Orders
            </a>
        </div>
    </div>
@endsection
