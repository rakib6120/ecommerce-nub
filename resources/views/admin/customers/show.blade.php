@extends('layouts.admin')

@section('title', 'Customer Details')

@section('content')
    <a href="{{ route('admin.customers.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Customers</a>

    <h2 class="mt-4 text-lg font-semibold text-gray-900">{{ $customer->name }}</h2>
    <p class="text-gray-500 text-sm">{{ $customer->email }}</p>

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Registered</p>
            <p class="mt-2 text-xl font-bold text-gray-900">{{ $customer->created_at->format('M d, Y') }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Orders</p>
            <p class="mt-2 text-xl font-bold text-gray-900">{{ $totalOrders }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Spent</p>
            <p class="mt-2 text-xl font-bold text-gray-900">${{ number_format($totalSpent, 2) }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-sm font-semibold text-gray-900 mb-3">Recent Orders</h3>

        @if ($recentOrders->isEmpty())
            <x-empty-state message="No orders yet." />
        @else
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Order Number</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($recentOrders as $order)
                            <tr>
                                <td class="px-4 py-4 font-medium text-gray-900">{{ $order->order_number }}</td>
                                <td class="px-4 py-4 text-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-4 text-gray-900">${{ number_format($order->total, 2) }}</td>
                                <td class="px-4 py-4">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 capitalize">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-right">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:underline text-xs font-medium">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
