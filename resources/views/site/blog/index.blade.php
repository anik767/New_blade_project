@extends('layouts.site')

@section('title', 'Blog')

@section('content')
    <div class="bg-background text-text min-h-screen pb-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-5xl font-extrabold text-center text-text mb-16 pt-8">Latest Blog Posts</h1>

            @if ($posts->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                        <div class="text-6xl mb-4">📝</div>
                        <h2 class="text-2xl font-semibold text-text mb-2">Blog Posts</h2>
                        <p class="text-muted">My blog posts will be available soon!</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <div class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl overflow-hidden shadow-lg shadow-accent/30 hover:shadow-acttive/50 transform transition duration-300 group">
                            <a href="{{ route('site.blog.show', $post->slug) }}" class="">
                                @if ($post->image)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $post->image) }}" 
                                             alt="{{ $post->title }}" 
                                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    </div>
                                @endif

                                <div class="p-6">
                                    <div class="flex flex-col mb-4">
                                        <span class="text-3xl mr-3 mb-2">📝</span>
                                        <h2 class="text-2xl font-semibold text-text group-hover:text-accent transition-colors">
                                            {{ $post->title }}
                                        </h2>
                                    </div>

                                    <p class="text-muted mb-4 line-clamp-3">{!! Str::limit(strip_tags($post->content), 120) !!}</p>

                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-accent font-medium">{{ $post->created_at->format('M d, Y') }}</span>
                                        <a href="{{ route('site.blog.show', $post->slug) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-acttive transition duration-300 font-medium text-sm">
                                            Read More
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Custom Pagination --}}
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
                            $pageStart = max($totalPages - 3, 1);
                        }
                    }
                @endphp

                {{-- Only show pagination if there are more than 6 posts --}}
                @if($posts->total() > 6)
                    <nav class="mt-12 flex justify-center space-x-2">
                        {{-- Previous Page --}}
                        @if ($posts->onFirstPage())
                            <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Previous</span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}"
                                class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">
                                Previous
                            </a>
                        @endif

                        {{-- First Page --}}
                        @if ($pageStart > 1)
                            <a href="{{ $posts->url(1) }}" class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">1</a>
                            @if ($pageStart > 2)
                                <span class="px-2 py-2 text-muted">...</span>
                            @endif
                        @endif

                        {{-- Page Window --}}
                        @for ($i = $pageStart; $i <= $pageEnd; $i++)
                            @if ($i == $currentPage)
                                <span class="px-4 py-2 bg-acttive text-dark font-semibold rounded">{{ $i }}</span>
                            @else
                                <a href="{{ $posts->url($i) }}"
                                    class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Last Page --}}
                        @if ($pageEnd < $totalPages)
                            @if ($pageEnd < $totalPages - 1)
                                <span class="px-2 py-2 text-muted">...</span>
                            @endif
                            <a href="{{ $posts->url($totalPages) }}"
                                class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">{{ $totalPages }}</a>
                        @endif

                        {{-- Next Page --}}
                        @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}"
                                class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">
                                Next
                            </a>
                        @else
                            <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Next</span>
                        @endif
                    </nav>
                @endif
            @endif
        </div>
    </div>
@endsection
