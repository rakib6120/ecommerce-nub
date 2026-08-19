@extends('layouts.storefront')

@section('title', 'Cart')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Your Cart</h1>

        @if ($items->isEmpty())
            <x-empty-state message="Your cart is empty." :action-url="route('shop')" action-text="Continue shopping" />
        @else
            <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
                <table class="w-full text-sm text-left min-w-[560px]">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Product</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Subtotal</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-14 w-14 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-xs shrink-0">
                                            @if ($item['product']->image)
                                                <img src="{{ asset('storage/'.$item['product']->image) }}" alt="{{ $item['product']->name }}" class="h-full w-full object-cover rounded">
                                            @else
                                                No Image
                                            @endif
                                        </div>
                                        <span class="font-medium text-gray-900">{{ $item['product']->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-gray-600 whitespace-nowrap">${{ number_format($item['product']->price, 2) }}</td>
                                <td class="px-4 py-4">
                                    <form action="{{ route('cart.update', $item['product']) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}"
                                               class="w-16 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <button type="submit" class="text-indigo-600 hover:underline text-xs font-medium">Update</button>
                                    </form>
                                </td>
                                <td class="px-4 py-4 text-gray-900 font-medium whitespace-nowrap">${{ number_format($item['subtotal'], 2) }}</td>
                                <td class="px-4 py-4 text-right">
                                    <form action="{{ route('cart.remove', $item['product']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:underline text-xs font-medium">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end">
                <div class="w-full sm:w-64">
                    <div class="flex justify-between text-lg font-semibold text-gray-900 py-2 border-t border-gray-200">
                        <span>Total</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <a href="{{ route('checkout') }}"
                       class="mt-4 block text-center bg-indigo-600 text-white font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
                        Checkout
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
