@extends('layouts.storefront')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ $user->name }}!</h1>
        <p class="mt-2 text-gray-600">Here's a quick overview of your account.</p>

        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900">Account Information</h2>
                <dl class="mt-4 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Name</dt>
                        <dd class="text-gray-900 font-medium">{{ $user->name }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Email</dt>
                        <dd class="text-gray-900 font-medium">{{ $user->email }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-500">Member Since</dt>
                        <dd class="text-gray-900 font-medium">{{ $user->created_at->format('M d, Y') }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6 flex flex-col">
                <h2 class="text-lg font-semibold text-gray-900">Orders</h2>
                <p class="mt-2 text-sm text-gray-500">View your past and current orders.</p>
                <a href="{{ url('/my-orders') }}"
                   class="mt-auto pt-4 inline-block text-center bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
                    My Orders
                </a>
            </div>
        </div>
    </div>
@endsection
