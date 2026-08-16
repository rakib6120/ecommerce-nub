<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'ShopNub')) - {{ config('app.name', 'ShopNub') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-900">

    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">
                    ShopNub
                </a>

                <nav class="hidden md:flex items-center space-x-6 text-sm font-medium text-gray-700">
                    <a href="{{ url('/') }}" class="hover:text-indigo-600">Home</a>
                    <a href="{{ url('/shop') }}" class="hover:text-indigo-600">Shop</a>
                    <a href="{{ url('/about') }}" class="hover:text-indigo-600">About</a>
                    <a href="{{ url('/cart') }}" class="hover:text-indigo-600">Cart</a>
                </nav>

                <div class="flex items-center space-x-4 text-sm font-medium">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                        <a href="{{ url('/register') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Register</a>
                    @endauth
                </div>
            </div>

            <nav class="md:hidden flex items-center justify-between pb-3 text-sm font-medium text-gray-700">
                <a href="{{ url('/') }}" class="hover:text-indigo-600">Home</a>
                <a href="{{ url('/shop') }}" class="hover:text-indigo-600">Shop</a>
                <a href="{{ url('/about') }}" class="hover:text-indigo-600">About</a>
                <a href="{{ url('/cart') }}" class="hover:text-indigo-600">Cart</a>
            </nav>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500 text-center">
            &copy; {{ date('Y') }} ShopNub. All rights reserved.
        </div>
    </footer>

</body>
</html>
