@extends('layouts.storefront')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

        @if ($items->isEmpty())
            <x-empty-state message="Your cart is empty." :action-url="route('shop')" action-text="Continue shopping" />
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">Delivery Details</h2>

                        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $user->name) }}"
                                       class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                                @error('customer_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                       class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                       class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea id="address" name="address" rows="3"
                                          class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">{{ old('address') }}</textarea>
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

                            <button type="submit" class="w-full bg-indigo-600 text-white font-medium px-4 py-2.5 rounded-md hover:bg-indigo-700 transition-colors">
                                Place Order
                            </button>
                        </form>
                    </div>
                </div>

                <div>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 sticky top-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>

                        <div class="space-y-2">
                            @foreach ($items as $item)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">{{ $item['product']->name }} &times; {{ $item['quantity'] }}</span>
                                    <span class="text-gray-900 font-medium">${{ number_format($item['subtotal'], 2) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-200 space-y-2 text-sm">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between text-lg font-semibold text-gray-900">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
