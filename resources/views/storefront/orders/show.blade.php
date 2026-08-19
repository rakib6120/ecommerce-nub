@extends('layouts.storefront')

@section('title', 'Order '.$order->order_number)

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <a href="{{ route('orders.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to My Orders</a>

        <div class="mt-4 flex items-center justify-between flex-wrap gap-2">
            <h1 class="text-3xl font-bold text-gray-900">Order {{ $order->order_number }}</h1>
            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 capitalize">
                {{ $order->status }}
            </span>
        </div>
        <p class="mt-1 text-gray-500 text-sm">Placed on {{ $order->created_at->format('M d, Y') }}</p>

        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-3">Delivery Information</h2>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Name</dt>
                        <dd class="text-gray-900 font-medium">{{ $order->customer_name }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Phone</dt>
                        <dd class="text-gray-900 font-medium">{{ $order->phone }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Email</dt>
                        <dd class="text-gray-900 font-medium">{{ $order->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">Address</dt>
                        <dd class="text-gray-900 font-medium mt-1">{{ $order->address }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-3">Order Total</h2>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Subtotal</dt>
                        <dd class="text-gray-900 font-medium">${{ number_format($order->subtotal, 2) }}</dd>
                    </div>
                    <div class="flex justify-between text-base pt-2 border-t border-gray-200">
                        <dt class="text-gray-900 font-semibold">Total</dt>
                        <dd class="text-gray-900 font-semibold">${{ number_format($order->total, 2) }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-3">Products</h2>
            <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
                <table class="w-full text-sm text-left min-w-[420px]">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Product</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="px-4 py-4 font-medium text-gray-900">{{ $item->product_name }}</td>
                                <td class="px-4 py-4 text-gray-600">${{ number_format($item->price, 2) }}</td>
                                <td class="px-4 py-4 text-gray-600">{{ $item->quantity }}</td>
                                <td class="px-4 py-4 text-gray-900 font-medium">${{ number_format($item->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
