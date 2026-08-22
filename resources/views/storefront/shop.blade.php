@extends('layouts.storefront')

@section('title', 'Shop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Shop</h1>
            <p class="mt-1 text-gray-500">Browse our full collection of products.</p>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('shop', array_filter(['search' => request('search')])) }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('category') ? 'bg-gray-100 text-gray-700 hover:bg-gray-200' : 'bg-indigo-600 text-white' }}">
                    All
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('shop', array_filter(['category' => $category->slug, 'search' => request('search')])) }}"
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('category') === $category->slug ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <form action="{{ route('shop') }}" method="GET" class="flex gap-2 w-full lg:w-80">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                           class="w-full pl-9 p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2.5 rounded-md hover:bg-indigo-700 transition-colors shrink-0">
                    Search
                </button>
            </form>
        </div>

        @if ($products->isEmpty())
            @if (request('search') || request('category'))
                <x-empty-state message="No products match your search or filter." :action-url="route('shop')" action-text="Clear filters" />
            @else
                <x-empty-state message="No products found." />
            @endif
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="group bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow flex flex-col">
                        <a href="{{ route('product.show', $product->slug) }}" class="block h-40 sm:h-48 bg-gray-100 overflow-hidden">
                            @if ($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                                     class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-gray-400 text-sm">No Image</div>
                            @endif
                        </a>
                        <div class="p-4 flex flex-col flex-1">
                            <span class="text-xs font-medium text-indigo-600 uppercase tracking-wide">{{ $product->category->name }}</span>
                            <a href="{{ route('product.show', $product->slug) }}" class="mt-1 font-semibold text-gray-900 hover:text-indigo-600 transition-colors line-clamp-1">
                                {{ $product->name }}
                            </a>
                            @if ($product->short_description)
                                <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $product->short_description }}</p>
                            @endif
                            <div class="mt-3 flex items-center justify-between">
                                <p class="text-indigo-600 font-bold">${{ number_format($product->price, 2) }}</p>
                            </div>
                            <a href="{{ route('product.show', $product->slug) }}"
                               class="mt-3 inline-block text-center bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
