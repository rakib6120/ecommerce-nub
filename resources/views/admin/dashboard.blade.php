@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">Total Products</p>
                <span class="flex items-center justify-center h-9 w-9 rounded-full bg-indigo-50 text-indigo-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 8l-9-5-9 5 9 5 9-5z" />
                        <path d="M3 8v8l9 5 9-5V8" />
                        <path d="M12 13v8" />
                    </svg>
                </span>
            </div>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['products'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">Total Categories</p>
                <span class="flex items-center justify-center h-9 w-9 rounded-full bg-purple-50 text-purple-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.59 13.41L13.42 20.58a2 2 0 01-2.83 0L3 13V3h10l7.59 7.59a2 2 0 010 2.82z" />
                        <circle cx="7.5" cy="7.5" r="1.5" />
                    </svg>
                </span>
            </div>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['categories'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">Total Orders</p>
                <span class="flex items-center justify-center h-9 w-9 rounded-full bg-amber-50 text-amber-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
                        <path d="M3 6h18" />
                        <path d="M16 10a4 4 0 01-8 0" />
                    </svg>
                </span>
            </div>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['orders'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">Total Customers</p>
                <span class="flex items-center justify-center h-9 w-9 rounded-full bg-emerald-50 text-emerald-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </span>
            </div>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['customers'] }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Orders</h2>

        @if ($recentOrders->isEmpty())
            <x-empty-state message="No orders yet." />
        @else
            <div class="bg-white border border-gray-200 rounded-xl overflow-x-auto">
                <table class="w-full text-sm text-left min-w-[640px]">
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
