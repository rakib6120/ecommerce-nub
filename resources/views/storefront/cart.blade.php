@extends('layouts.storefront')

@section('title', 'Cart')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Your Cart</h1>

        @if ($items->isEmpty())
            <x-empty-state message="Your cart is empty." :action-url="route('shop')" action-text="Continue shopping" />
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-4">
                    @foreach ($items as $item)
                        <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center gap-4">
                            <a href="{{ route('product.show', $item['product']->slug) }}" class="h-20 w-20 sm:h-24 sm:w-24 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                                @if ($item['product']->image)
                                    <img src="{{ asset('storage/'.$item['product']->image) }}" alt="{{ $item['product']->name }}" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                @endif
                            </a>

                            <div class="flex-1 min-w-0">
                                <a href="{{ route('product.show', $item['product']->slug) }}" class="font-medium text-gray-900 hover:text-indigo-600 transition-colors">
                                    {{ $item['product']->name }}
                                </a>
                                <p class="text-sm text-gray-500 mt-0.5">${{ number_format($item['product']->price, 2) }} each</p>

                                <div class="mt-3 flex flex-wrap items-center gap-3">
                                    <form action="{{ route('cart.update', $item['product']) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <label class="text-sm text-gray-500">Qty</label>
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}"
                                               class="w-16 p-3 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <button type="submit" class="text-indigo-600 hover:underline text-xs font-medium">Update</button>
                                    </form>

                                    <span class="text-gray-300">|</span>

                                    <form action="{{ route('cart.remove', $item['product']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:underline text-xs font-medium">Remove</button>
                                    </form>
                                </div>
                            </div>

                            <div class="text-right shrink-0">
                                <p class="text-lg font-semibold text-gray-900">${{ number_format($item['subtotal'], 2) }}</p>
                            </div>
                        </div>
                    @endforeach

                    <a href="{{ route('shop') }}" class="inline-block text-sm text-indigo-600 hover:underline">&larr; Continue shopping</a>
                </div>

                <div>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 sticky top-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span>Calculated at checkout</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between text-lg font-semibold text-gray-900">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <a href="{{ route('checkout') }}"
                           class="mt-6 block text-center bg-indigo-600 text-white font-medium px-4 py-2.5 rounded-md hover:bg-indigo-700 transition-colors">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
