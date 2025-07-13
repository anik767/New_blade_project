@extends('layouts.site')
@section('title', 'Projects')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-green-500">Projects</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-blue-600 hover:underline">
                                {{ $project->title }}
                            </a>
                        </h2>
                        <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>

                        @if ($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                                View on GitHub
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Custom Pagination --}}
        @php
            $totalPages = $projects->lastPage();
            $currentPage = $projects->currentPage();

            // Show 5 pages max before ellipsis + last page link
            $pageStart = 1;
            $pageEnd = min(5, $totalPages);

            // If current page > 3, shift the page window forward so current page is visible
            if ($currentPage > 3 && $totalPages > 5) {
                $pageStart = $currentPage - 2;
                $pageEnd = $currentPage + 2;

                if ($pageEnd > $totalPages) {
                    $pageEnd = $totalPages;
                    $pageStart = max($totalPages - 3, 1);
                }
            }
        @endphp

        <nav class="mt-8 flex justify-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($projects->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $projects->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Previous</a>
            @endif

            {{-- First page always --}}
            @if ($pageStart > 1)
                <a href="{{ $projects->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">1</a>
                @if ($pageStart > 2)
                    <span class="px-2 py-2">...</span>
                @endif
            @endif

            {{-- Page numbers window --}}
            @for ($i = $pageStart; $i <= $pageEnd; $i++)
                @if ($i == $currentPage)
                    <span class="px-4 py-2 bg-green-800 text-white rounded">{{ $i }}</span>
                @else
                    <a href="{{ $projects->url($i) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $i }}</a>
                @endif
            @endfor

            {{-- Last page if not in the range --}}
            @if ($pageEnd < $totalPages)
                @if ($pageEnd < $totalPages - 1)
                    <span class="px-2 py-2">...</span>
                @endif
                <a href="{{ $projects->url($totalPages) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $totalPages }}</a>
            @endif

            {{-- Next Page Link --}}
            @if ($projects->hasMorePages())
                <a href="{{ $projects->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next</span>
            @endif
        </nav>
    </div>
@endsection
