@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Products</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['products'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Categories</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['categories'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Orders</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['orders'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Customers</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['customers'] }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Orders</h2>

        @if ($recentOrders->isEmpty())
            <x-empty-state message="No orders yet." />
        @else
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Order Number</th>
                            <th class="px-4 py-3">Customer</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($recentOrders as $order)
                            <tr>
                                <td class="px-4 py-4 font-medium text-gray-900">{{ $order->order_number }}</td>
                                <td class="px-4 py-4 text-gray-600">{{ $order->customer_name }}</td>
                                <td class="px-4 py-4 text-gray-900">${{ number_format($order->total, 2) }}</td>
                                <td class="px-4 py-4">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 capitalize">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
