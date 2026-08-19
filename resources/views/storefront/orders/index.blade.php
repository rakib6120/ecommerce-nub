@extends('layouts.storefront')

@section('title', 'My Orders')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">My Orders</h1>

        @if ($orders->isEmpty())
            <x-empty-state message="You haven't placed any orders yet." :action-url="route('shop')" action-text="Start shopping" />
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
                        @foreach ($orders as $order)
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
                                    <a href="{{ route('orders.show', $order) }}" class="text-indigo-600 hover:underline text-xs font-medium">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
