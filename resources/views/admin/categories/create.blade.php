@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
    <a href="{{ route('admin.categories.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Categories</a>

    <div class="mt-4 max-w-xl bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                        class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm py-2.5 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="1" @selected(old('status', '1') == '1')>Active</option>
                    <option value="0" @selected(old('status') == '0')>Inactive</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-indigo-600 text-white font-medium px-5 py-2.5 rounded-md hover:bg-indigo-700 transition-colors">
                    Save Category
                </button>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection
