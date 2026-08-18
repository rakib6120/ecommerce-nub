<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin') - {{ config('app.name', 'ShopNub') }} Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">

    <div class="lg:flex">
        <aside class="bg-gray-900 text-gray-200 w-full lg:w-64 lg:min-h-screen shrink-0">
            <div class="px-6 py-5 text-lg font-bold text-white border-b border-gray-800">
                ShopNub Admin
            </div>

            <nav class="px-3 py-4 space-y-1 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Products</a>
                <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Categories</a>
                <a href="{{ route('admin.orders.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Orders</a>
                <a href="{{ route('admin.customers.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Customers</a>

                <div class="pt-4 mt-4 border-t border-gray-800 space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">View Store</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <div class="flex-1 min-w-0">
            <header class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8 py-4">
                <h1 class="text-xl font-semibold text-gray-900">@yield('title', 'Admin')</h1>
            </header>

            <main class="px-4 sm:px-6 lg:px-8 py-6">
                @if (session('success'))
                    <div class="mb-4 bg-green-50 text-green-700 border border-green-200 rounded-md px-4 py-3 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-50 text-red-700 border border-red-200 rounded-md px-4 py-3 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
