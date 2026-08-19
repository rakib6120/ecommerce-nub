@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Products</h2>
        <a href="{{ route('admin.products.create') }}"
           class="bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
            Add Product
        </a>
    </div>

    @if ($products->isEmpty())
        <x-empty-state message="No products found." :action-url="route('admin.products.create')" action-text="Add your first product" />
    @else
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Stock</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="h-10 w-10 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-[10px]">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover rounded">
                                    @else
                                        No Image
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-4 font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $product->category->name }}</td>
                            <td class="px-4 py-4 text-gray-900">${{ number_format($product->price, 2) }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $product->stock }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-block px-2 py-1 rounded-full text-xs font-medium {{ $product->status ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right space-x-3">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:underline text-xs font-medium">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete product ' + @js($product->name) + '? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-xs font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
