@extends('layouts.storefront')

@section('title', $product->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
        <p class="mt-2 text-gray-600">Full product details are coming soon.</p>
    </div>
@endsection
