@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Categories</h2>
        <a href="{{ route('admin.categories.create') }}"
           class="bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700">
            Add Category
        </a>
    </div>

    @if ($categories->isEmpty())
        <x-empty-state message="No categories found." :action-url="route('admin.categories.create')" action-text="Add your first category" />
    @else
        <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
            <table class="w-full text-sm text-left min-w-[480px]">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Slug</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="px-4 py-4 text-gray-600">{{ $category->id }}</td>
                            <td class="px-4 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $category->slug }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-block px-2 py-1 rounded-full text-xs font-medium {{ $category->status ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right space-x-3">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:underline text-xs font-medium">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete category ' + @js($category->name) + '? This cannot be undone.');">
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
