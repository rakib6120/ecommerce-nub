@extends('layouts.storefront')

@section('title', 'Register')

@section('content')
    <div class="min-h-[calc(100vh-8rem)] flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">ShopNub</a>
                <h1 class="mt-4 text-2xl font-bold text-gray-900">Create an account</h1>
                <p class="mt-1 text-gray-500">Join us to start shopping.</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">
                <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                               class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required
                               class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">At least 8 characters.</p>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white font-medium px-4 py-2.5 rounded-md hover:bg-indigo-700 transition-colors">
                        Create Account
                    </button>
                </form>
            </div>

            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">Login</a>
            </p>
        </div>
    </div>
@endsection
