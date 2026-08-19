@extends('layouts.storefront')

@section('title', 'Page Not Found')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <p class="text-6xl font-bold text-indigo-600">404</p>
        <h1 class="mt-4 text-3xl font-bold text-gray-900">Page Not Found</h1>
        <p class="mt-2 text-gray-600">
            Sorry, we couldn't find the page you're looking for. It may have been moved or no longer exists.
        </p>

        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('home') }}"
               class="bg-indigo-600 text-white font-medium px-6 py-2 rounded-md hover:bg-indigo-700">
                Home
            </a>
            <a href="{{ route('shop') }}"
               class="bg-gray-100 text-gray-700 font-medium px-6 py-2 rounded-md hover:bg-gray-200">
                Shop
            </a>
        </div>
    </div>
@endsection
