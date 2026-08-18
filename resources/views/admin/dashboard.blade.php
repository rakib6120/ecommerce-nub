@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Products</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['products'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Categories</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['categories'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Orders</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['orders'] }}</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm text-gray-500">Total Customers</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['customers'] }}</p>
        </div>
    </div>
@endsection
