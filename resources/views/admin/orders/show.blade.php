@extends('layouts.admin')

@section('title', 'Order '.$order->order_number)

@section('content')
    <a href="{{ route('admin.orders.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Orders</a>

    <div class="mt-4 flex items-center justify-between flex-wrap gap-3">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">Order {{ $order->order_number }}</h2>
            <p class="mt-1 text-gray-500 text-sm">Placed on {{ $order->created_at->format('M d, Y') }}</p>
        </div>

        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST"
              class="flex items-center gap-2 bg-white border border-gray-200 rounded-md px-3 py-2">
            @csrf
            @method('PATCH')
            <label for="status" class="sr-only">Status</label>
            <select id="status" name="status" onchange="this.form.submit()"
                    class="rounded-md border-gray-300 shadow-sm text-sm capitalize focus:border-indigo-500 focus:ring-indigo-500">
                @foreach (['pending', 'processing', 'completed', 'cancelled'] as $status)
                    <option value="{{ $status }}" @selected($order->status === $status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <noscript><button type="submit" class="text-indigo-600 hover:underline text-sm">Update</button></noscript>
        </form>
    </div>

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-3">Customer Information</h3>
            <dl class="space-y-2 text-sm">
                <div>
                    <dt class="text-gray-500">Account</dt>
                    <dd class="text-gray-900 font-medium break-words">{{ $order->user->name }} ({{ $order->user->email }})</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Order Name</dt>
                    <dd class="text-gray-900 font-medium">{{ $order->customer_name }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Order Email</dt>
                    <dd class="text-gray-900 font-medium">{{ $order->email }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Phone</dt>
                    <dd class="text-gray-900 font-medium">{{ $order->phone }}</dd>
                </div>
            </dl>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-3">Delivery Address</h3>
            <p class="text-sm text-gray-900">{{ $order->address }}</p>

            <h3 class="text-sm font-semibold text-gray-900 mt-6 mb-3">Order Total</h3>
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
        <h3 class="text-sm font-semibold text-gray-900 mb-3">Products</h3>
        <div class="bg-white border border-gray-200 rounded-xl overflow-x-auto">
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
@endsection
