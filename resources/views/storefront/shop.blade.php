@extends('layouts.storefront')

@section('title', 'Shop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Shop</h1>

        <form action="{{ route('shop') }}" method="GET" class="mb-6 flex gap-2 max-w-md">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                   class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Search
            </button>
        </form>

        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('shop', array_filter(['search' => request('search')])) }}"
               class="px-4 py-2 rounded-md text-sm font-medium {{ request('category') ? 'bg-gray-100 text-gray-700 hover:bg-gray-200' : 'bg-indigo-600 text-white' }}">
                All
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('shop', array_filter(['category' => $category->slug, 'search' => request('search')])) }}"
                   class="px-4 py-2 rounded-md text-sm font-medium {{ request('category') === $category->slug ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ $category->name }}
                </a>
            @endforeach
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
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm flex flex-col">
                        <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">
                            @if ($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                            @else
                                Product Image
                            @endif
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <p class="font-medium text-gray-900">{{ $product->name }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ $product->category->name }}</p>
                            <p class="text-indigo-600 font-semibold mt-2">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('product.show', $product->slug) }}"
                               class="mt-auto pt-4 inline-block text-center bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
