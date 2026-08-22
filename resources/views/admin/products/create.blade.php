@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
    <a href="{{ route('admin.products.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Products</a>

    <div class="mt-4 max-w-2xl bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                        class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm p-3 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm p-3 focus:border-indigo-500 focus:ring-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                <input type="text" id="short_description" name="short_description" value="{{ old('short_description') }}" maxlength="255"
                       class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm p-3 focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1.5 text-xs text-gray-500">A one-line summary shown on product cards.</p>
                @error('short_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Full Description</label>
                <textarea id="description" name="description" rows="4"
                          class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm p-3 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="relative mt-1.5">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">$</span>
                        <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}"
                               class="block w-full rounded-md border-gray-300 shadow-sm p-3 pl-7 focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" id="stock" name="stock" min="0" value="{{ old('stock') }}"
                           class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm p-3 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp"
                       class="mt-1.5 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="mt-1.5 text-xs text-gray-500">JPG, PNG, or WEBP. Max 2MB.</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                        class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm p-3 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="1" @selected(old('status', '1') == '1')>Active</option>
                    <option value="0" @selected(old('status') == '0')>Inactive</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-indigo-600 text-white font-medium px-5 py-2.5 rounded-md hover:bg-indigo-700 transition-colors">
                    Save Product
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection
