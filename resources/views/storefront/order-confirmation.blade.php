@extends('layouts.storefront')

@section('title', 'Order Confirmation')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
        <p class="mt-2 text-gray-600">Full order confirmation details are coming soon.</p>
    </div>
@endsection
