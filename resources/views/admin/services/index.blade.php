@extends('layouts.admin')
@section('title', 'All Services')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">All Services</h1>

    <a href="{{ route('admin.services.create') }}"
       class="inline-block mb-4 px-5 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
        + Create New Service
    </a>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow-sm">
        <table class="min-w-full bg-white border border-gray-200 text-sm text-gray-800">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 border">Image</th>
                    <th class="px-4 py-3 border">Icon</th>
                    <th class="px-4 py-3 border">Title</th>
                    <th class="px-4 py-3 border">Order</th>
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border">Description</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 border">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-16 h-12 object-cover rounded border">
                            @else
                                <div class="w-16 h-12 bg-gray-200 rounded border flex items-center justify-center">
                                    <span class="text-gray-400 text-xs">No Image</span>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 border">
                            @if($service->icon)
                                <span class="text-2xl">{{ $service->icon }}</span>
                            @else
                                <span class="text-gray-400 italic">No Icon</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border font-medium">{{ $service->title }}</td>
                        <td class="px-4 py-3 border text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-medium">
                                {{ $service->order }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border text-center">
                            @if($service->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-medium">
                                    Active
                                </span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs font-medium">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border">
                            <div class="max-w-xs truncate" title="{{ $service->description }}">
                                {{ Str::limit($service->description, 100) }}
                            </div>
                        </td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('services.show', $service->slug) }}" target="_blank"
                                   class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-1 focus:ring-green-500 text-sm transition">
                                    View
                                </a>
                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-1 focus:ring-red-500 text-sm transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500 italic border">
                            No services found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Smart Pagination --}}
    @php
        $totalPages = $services->lastPage();
        $currentPage = $services->currentPage();

        $pageStart = 1;
        $pageEnd = min(5, $totalPages);

        if ($currentPage > 3 && $totalPages > 5) {
            $pageStart = $currentPage - 2;
            $pageEnd = $currentPage + 2;

            if ($pageEnd > $totalPages) {
                $pageEnd = $totalPages;
                $pageStart = max($totalPages - 4, 1);
            }
        }
    @endphp

    <nav class="mt-6 flex justify-center space-x-2">
        {{-- Previous --}}
        @if ($services->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $services->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Previous</a>
        @endif

        {{-- First page --}}
        @if ($pageStart > 1)
            <a href="{{ $services->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">1</a>
            @if ($pageStart > 2)
                <span class="px-2 py-2">...</span>
            @endif
        @endif

        {{-- Page window --}}
        @for ($i = $pageStart; $i <= $pageEnd; $i++)
            @if ($i == $currentPage)
                <span class="px-4 py-2 bg-green-800 text-white rounded">{{ $i }}</span>
            @else
                <a href="{{ $services->url($i) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $i }}</a>
            @endif
        @endfor

        {{-- Last page --}}
        @if ($pageEnd < $totalPages)
            @if ($pageEnd < $totalPages - 1)
                <span class="px-2 py-2">...</span>
            @endif
            <a href="{{ $services->url($totalPages) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $totalPages }}</a>
        @endif

        {{-- Next --}}
        @if ($services->hasMorePages())
            <a href="{{ $services->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next</a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
</div>
@endsection 