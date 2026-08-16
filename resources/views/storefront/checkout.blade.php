@extends('layouts.storefront')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

        @if ($items->isEmpty())
            <p class="text-gray-600">Your cart is empty.</p>
            <a href="{{ route('shop') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Continue shopping &rarr;</a>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Delivery Details</h2>

                    <form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $user->name) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('customer_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea id="address" name="address" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700">Payment Method</p>
                            <div class="mt-2 flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-md px-4 py-3">
                                <input type="radio" id="cod" name="payment_method" value="cod" checked disabled class="text-indigo-600 focus:ring-indigo-500">
                                <label for="cod" class="text-sm text-gray-700">Cash on Delivery</label>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
                            Place Order
                        </button>
                    </form>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>
                    <div class="bg-white border border-gray-200 rounded-lg p-4 space-y-3">
                        @foreach ($items as $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">{{ $item['product']->name }} &times; {{ $item['quantity'] }}</span>
                                <span class="text-gray-900 font-medium">${{ number_format($item['subtotal'], 2) }}</span>
                            </div>
                        @endforeach

                        <div class="flex justify-between text-sm pt-3 border-t border-gray-200">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-900 font-medium">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-lg font-semibold text-gray-900">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
