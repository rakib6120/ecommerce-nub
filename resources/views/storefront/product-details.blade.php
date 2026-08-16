@extends('layouts.storefront')

@section('title', $product->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="h-80 md:h-96 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                @if ($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover rounded-lg">
                @else
                    Product Image
                @endif
            </div>

            <div>
                <p class="text-sm font-medium text-indigo-600">{{ $product->category->name }}</p>
                <h1 class="mt-1 text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                <p class="mt-4 text-2xl font-semibold text-gray-900">${{ number_format($product->price, 2) }}</p>

                <p class="mt-4 text-gray-600 leading-relaxed">{{ $product->description }}</p>

                <p class="mt-4 text-sm font-medium">
                    @if ($product->stock > 0)
                        <span class="text-green-600">In Stock ({{ $product->stock }} available)</span>
                    @else
                        <span class="text-red-600">Out of Stock</span>
                    @endif
                </p>

                <form action="{{ url('/cart/add/'.$product->id) }}" method="POST" class="mt-6 flex items-center gap-4">
                    @csrf
                    <label for="quantity" class="sr-only">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                           class="w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           @disabled($product->stock <= 0)>

                    <button type="submit"
                            class="bg-indigo-600 text-white font-medium px-6 py-2 rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed"
                            @disabled($product->stock <= 0)>
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
