@extends('layouts.storefront')

@section('title', 'About Us')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900">About ShopNub</h1>
        <p class="mt-4 text-gray-600 leading-relaxed">
            ShopNub is a small online store built to bring you quality products at fair
            prices. We started as a university project with a simple idea: make online
            shopping easy, honest, and enjoyable for everyone.
        </p>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900">Our Mission</h2>
                <p class="mt-2 text-gray-600">
                    To provide a simple, reliable, and enjoyable shopping experience while
                    offering a curated selection of products our customers can trust.
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900">Why Choose Us</h2>
                <ul class="mt-2 text-gray-600 space-y-1 list-disc list-inside">
                    <li>Carefully selected products</li>
                    <li>Simple and transparent pricing</li>
                    <li>Fast, friendly customer support</li>
                    <li>Secure and easy checkout</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
