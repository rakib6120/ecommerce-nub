@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
    <h2 class="text-lg font-semibold text-gray-900 mb-6">Customers</h2>

    @if ($customers->isEmpty())
        <x-empty-state message="No customers found." />
    @else
        <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
            <table class="w-full text-sm text-left min-w-[600px]">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Registered</th>
                        <th class="px-4 py-3">Total Orders</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="px-4 py-4 text-gray-600">{{ $customer->id }}</td>
                            <td class="px-4 py-4 font-medium text-gray-900">{{ $customer->name }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $customer->email }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $customer->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $customer->orders_count }}</td>
                            <td class="px-4 py-4 text-right">
                                <a href="{{ route('admin.customers.show', $customer) }}" class="text-indigo-600 hover:underline text-xs font-medium">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
