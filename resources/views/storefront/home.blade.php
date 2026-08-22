@extends('layouts.storefront')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-950 to-violet-900">
        <div class="absolute inset-0 opacity-40" aria-hidden="true"
             style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2440%22 height=%2240%22%3E%3Ccircle cx=%222%22 cy=%222%22 r=%221.5%22 fill=%22%23ffffff%22 fill-opacity=%220.18%22/%3E%3C/svg%3E');">
        </div>
        <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-indigo-500/30 blur-3xl" aria-hidden="true"></div>
        <div class="absolute -bottom-32 -left-20 h-80 w-80 rounded-full bg-violet-500/30 blur-3xl" aria-hidden="true"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <span class="inline-block bg-white/15 text-white text-xs font-semibold tracking-wide uppercase px-3 py-1 rounded-full">
                        New Arrivals Every Week
                    </span>
                    <h1 class="mt-5 text-4xl sm:text-5xl font-bold text-white tracking-tight leading-tight">
                        Shop the Latest Trends
                    </h1>
                    <p class="mt-4 text-lg text-indigo-100 max-w-xl mx-auto lg:mx-0">
                        Quality products at unbeatable prices, delivered right to your door.
                    </p>

                    <div class="mt-8">
                        <a href="{{ route('shop') }}"
                           class="inline-block bg-white text-indigo-600 font-semibold px-8 py-3 rounded-md shadow-sm hover:bg-indigo-50 transition-colors">
                            Shop Now
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-3 gap-4 max-w-md mx-auto lg:mx-0">
                        <div class="text-center lg:text-left">
                            <p class="text-2xl font-bold text-white">{{ $categories->count() }}+</p>
                            <p class="text-xs text-indigo-200 mt-1">Categories</p>
                        </div>
                        <div class="text-center lg:text-left">
                            <p class="text-2xl font-bold text-white">Free</p>
                            <p class="text-xs text-indigo-200 mt-1">Shipping $50+</p>
                        </div>
                        <div class="text-center lg:text-left">
                            <p class="text-2xl font-bold text-white">COD</p>
                            <p class="text-xs text-indigo-200 mt-1">Cash on Delivery</p>
                        </div>
                    </div>
                </div>

                @if ($featuredProducts->isNotEmpty())
                    <div class="hidden lg:block relative h-96">
                        <div class="absolute inset-0 flex items-center justify-center">
                            @if ($featuredProducts->get(0))
                                @php $product = $featuredProducts->get(0); @endphp
                                <a href="{{ route('product.show', $product->slug) }}"
                                   class="absolute w-52 h-64 -translate-x-28 -rotate-6 z-10 bg-white rounded-xl shadow-2xl p-3 hover:-translate-y-2 hover:z-30 transition-transform">
                                    <div class="h-44 w-full bg-gray-100 rounded-lg overflow-hidden">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <p class="mt-2 text-sm font-semibold text-gray-900 line-clamp-1">{{ $product->name }}</p>
                                    <p class="text-xs text-indigo-600 font-medium">${{ number_format($product->price, 2) }}</p>
                                </a>
                            @endif

                            @if ($featuredProducts->get(1))
                                @php $product = $featuredProducts->get(1); @endphp
                                <a href="{{ route('product.show', $product->slug) }}"
                                   class="absolute w-52 h-64 z-20 bg-white rounded-xl shadow-2xl p-3 hover:-translate-y-2 hover:z-30 transition-transform">
                                    <div class="h-44 w-full bg-gray-100 rounded-lg overflow-hidden">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <p class="mt-2 text-sm font-semibold text-gray-900 line-clamp-1">{{ $product->name }}</p>
                                    <p class="text-xs text-indigo-600 font-medium">${{ number_format($product->price, 2) }}</p>
                                </a>
                            @endif

                            @if ($featuredProducts->get(2))
                                @php $product = $featuredProducts->get(2); @endphp
                                <a href="{{ route('product.show', $product->slug) }}"
                                   class="absolute w-52 h-64 translate-x-28 rotate-6 z-10 bg-white rounded-xl shadow-2xl p-3 hover:-translate-y-2 hover:z-30 transition-transform">
                                    <div class="h-44 w-full bg-gray-100 rounded-lg overflow-hidden">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <p class="mt-2 text-sm font-semibold text-gray-900 line-clamp-1">{{ $product->name }}</p>
                                    <p class="text-xs text-indigo-600 font-medium">${{ number_format($product->price, 2) }}</p>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
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
