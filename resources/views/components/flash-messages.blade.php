@if (session('success'))
    <div class="bg-green-50 text-green-700 border border-green-200 rounded-md px-4 py-3 text-sm">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-50 text-red-700 border border-red-200 rounded-md px-4 py-3 text-sm">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-md px-4 py-3 text-sm">
        {{ session('warning') }}
    </div>
@endif
