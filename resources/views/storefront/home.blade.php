@extends('layouts.storefront')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-indigo-600 to-indigo-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-24 text-center">
            <h1 class="text-3xl sm:text-5xl font-bold text-white tracking-tight">Shop the Latest Trends</h1>
            <p class="mt-4 text-lg text-indigo-100 max-w-2xl mx-auto">
                Quality products at unbeatable prices, delivered right to your door.
            </p>
            <a href="{{ route('shop') }}"
               class="mt-8 inline-block bg-white text-indigo-600 font-semibold px-8 py-3 rounded-md shadow-sm hover:bg-indigo-50 transition-colors">
                Shop Now
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Featured Products</h2>
            <a href="{{ route('shop') }}" class="text-sm font-medium text-indigo-600 hover:underline">View all &rarr;</a>
        </div>

        @if ($featuredProducts->isEmpty())
            <x-empty-state message="No products available yet." />
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($featuredProducts as $product)
                    <div class="group bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow flex flex-col">
                        <a href="{{ route('product.show', $product->slug) }}" class="block h-40 sm:h-48 bg-gray-100 overflow-hidden">
                            @if ($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                                     class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-gray-400 text-sm">No Image</div>
                            @endif
                        </a>
                        <div class="p-4">
                            <a href="{{ route('product.show', $product->slug) }}" class="font-medium text-gray-900 hover:text-indigo-600 transition-colors line-clamp-1">
                                {{ $product->name }}
                            </a>
                            <p class="text-sm text-gray-500 mt-1">{{ $product->category->name }}</p>
                            <p class="text-indigo-600 font-semibold mt-2">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- Category Section -->
    <section class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Shop by Category</h2>

            @if ($categories->isEmpty())
                <x-empty-state message="No categories available yet." />
            @else
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('shop', ['category' => $category->slug]) }}"
                           class="group bg-gray-50 hover:bg-indigo-50 border border-gray-200 hover:border-indigo-200 rounded-xl h-28 flex items-center justify-center text-center px-3 transition-colors">
                            <span class="font-medium text-gray-700 group-hover:text-indigo-700 transition-colors">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Promotional Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-indigo-50 rounded-xl p-8 text-center">
            <h2 class="text-xl font-semibold text-indigo-700">Free shipping on orders over $50</h2>
            <p class="mt-2 text-indigo-600">Limited time offer. Shop now and save.</p>
        </div>
    </section>
@endsection
