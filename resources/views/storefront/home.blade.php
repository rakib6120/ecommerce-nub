@extends('layouts.storefront')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="bg-indigo-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white">Shop the Latest Trends</h1>
            <p class="mt-4 text-lg text-indigo-100 max-w-2xl mx-auto">
                Quality products at unbeatable prices, delivered right to your door.
            </p>
            <a href="{{ url('/shop') }}"
               class="mt-8 inline-block bg-white text-indigo-600 font-semibold px-8 py-3 rounded-md hover:bg-indigo-50">
                Shop Now
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Products</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @for ($i = 0; $i < 4; $i++)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">
                        Product Image
                    </div>
                    <div class="p-4">
                        <p class="font-medium text-gray-900">Product Name</p>
                        <p class="text-sm text-gray-500 mt-1">$0.00</p>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    <!-- Category Section -->
    <section class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Shop by Category</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                    <div class="bg-gray-100 rounded-lg h-28 flex items-center justify-center text-gray-500 font-medium">
                        Category
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Promotional Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-indigo-50 rounded-lg p-8 text-center">
            <h2 class="text-xl font-semibold text-indigo-700">Free shipping on orders over $50</h2>
            <p class="mt-2 text-indigo-600">Limited time offer. Shop now and save.</p>
        </div>
    </section>
@endsection
