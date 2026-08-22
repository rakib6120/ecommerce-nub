@extends('layouts.storefront')

@section('title', $product->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <nav class="text-sm text-gray-500 mb-6">
            <a href="{{ route('shop') }}" class="hover:text-indigo-600">Shop</a>
            <span class="mx-1">/</span>
            <a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="hover:text-indigo-600">{{ $product->category->name }}</a>
            <span class="mx-1">/</span>
            <span class="text-gray-700">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="h-80 md:h-[28rem] bg-gray-100 rounded-xl overflow-hidden border border-gray-200 flex items-center justify-center text-gray-400">
                @if ($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                @else
                    Product Image
                @endif
            </div>

            <div>
                <a href="{{ route('shop', ['category' => $product->category->slug]) }}"
                   class="text-sm font-medium text-indigo-600 uppercase tracking-wide hover:underline">
                    {{ $product->category->name }}
                </a>
                <h1 class="mt-1 text-3xl font-bold text-gray-900">{{ $product->name }}</h1>

                @if ($product->short_description)
                    <p class="mt-2 text-lg text-gray-600">{{ $product->short_description }}</p>
                @endif

                <p class="mt-4 text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</p>

                <p class="mt-4">
                    @if ($product->stock > 0)
                        <span class="inline-flex items-center gap-1.5 text-sm font-medium text-green-700 bg-green-50 px-3 py-1 rounded-full">
                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                            In Stock &mdash; {{ $product->stock }} available
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 text-sm font-medium text-red-700 bg-red-50 px-3 py-1 rounded-full">
                            <span class="h-2 w-2 rounded-full bg-red-500"></span>
                            Out of Stock
                        </span>
                    @endif
                </p>

                @if ($product->description)
                    <div class="mt-6 pt-6 border-t border-gray-200 text-gray-600 leading-relaxed">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                @endif

                <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-6 pt-6 border-t border-gray-200">
                    @csrf
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                    <div class="flex items-center gap-4">
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                               class="w-20 py-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                               @disabled($product->stock <= 0)>

                        <button type="submit"
                                class="flex-1 sm:flex-none bg-indigo-600 text-white font-medium px-8 py-2.5 rounded-md hover:bg-indigo-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                @disabled($product->stock <= 0)>
                            Add to Cart
                        </button>
                    </div>
                    @error('quantity')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </form>
            </div>
        </div>
    </div>
@endsection
