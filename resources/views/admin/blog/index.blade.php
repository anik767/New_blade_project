@extends('layouts.admin')
@section('title', 'All Blog Posts')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">All Blog Posts</h1>

    <a href="{{ route('admin.blog.create') }}"
       class="inline-block mb-4 px-5 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
        + Create New Post
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
                    <th class="px-4 py-3 border">Title</th>
                    <th class="px-4 py-3 border">Created</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 border">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="Blog image for {{ $post->title }}"
                                     class="w-12 h-12 rounded object-cover">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border font-medium">{{ $post->title }}</td>
                        <td class="px-4 py-3 border">{{ $post->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.blog.edit', $post->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500 italic border">
                            No blog posts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Smart Pagination --}}
    @php
        $totalPages = $posts->lastPage();
        $currentPage = $posts->currentPage();

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
        @if ($posts->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $posts->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Previous</a>
        @endif

        {{-- First page --}}
        @if ($pageStart > 1)
            <a href="{{ $posts->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">1</a>
            @if ($pageStart > 2)
                <span class="px-2 py-2">...</span>
            @endif
        @endif

        {{-- Page window --}}
        @for ($i = $pageStart; $i <= $pageEnd; $i++)
            @if ($i == $currentPage)
                <span class="px-4 py-2 bg-green-800 text-white rounded">{{ $i }}</span>
            @else
                <a href="{{ $posts->url($i) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $i }}</a>
            @endif
        @endfor

        {{-- Last page --}}
        @if ($pageEnd < $totalPages)
            @if ($pageEnd < $totalPages - 1)
                <span class="px-2 py-2">...</span>
            @endif
            <a href="{{ $posts->url($totalPages) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $totalPages }}</a>
        @endif

        {{-- Next --}}
        @if ($posts->hasMorePages())
            <a href="{{ $posts->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next</a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
</div>
@endsection
