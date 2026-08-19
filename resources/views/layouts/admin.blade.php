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

            <nav class="flex items-center gap-1 overflow-x-auto px-3 py-2 text-sm font-medium
                        lg:flex-col lg:items-stretch lg:gap-0 lg:space-y-1 lg:overflow-visible lg:px-3 lg:py-4">
                <div class="flex items-center gap-1 lg:contents">
                    <a href="{{ route('admin.dashboard') }}" class="shrink-0 whitespace-nowrap block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Dashboard</a>
                    <a href="{{ route('admin.products.index') }}" class="shrink-0 whitespace-nowrap block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Products</a>
                    <a href="{{ route('admin.categories.index') }}" class="shrink-0 whitespace-nowrap block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Categories</a>
                    <a href="{{ route('admin.orders.index') }}" class="shrink-0 whitespace-nowrap block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Orders</a>
                    <a href="{{ route('admin.customers.index') }}" class="shrink-0 whitespace-nowrap block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">Customers</a>
                </div>

                <div class="flex items-center gap-1 lg:contents">
                    <a href="{{ route('home') }}" class="shrink-0 whitespace-nowrap block px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white lg:mt-4 lg:pt-4 lg:border-t lg:border-gray-800">View Store</a>
                    <form action="{{ route('logout') }}" method="POST" class="shrink-0 lg:w-full">
                        @csrf
                        <button type="submit" class="whitespace-nowrap w-full text-left px-3 py-2 rounded-md hover:bg-gray-800 hover:text-white">
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
                @if (session()->hasAny(['success', 'error', 'warning']))
                    <div class="mb-4 space-y-3">
                        <x-flash-messages />
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
