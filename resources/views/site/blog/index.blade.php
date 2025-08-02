@extends('layouts.site')

@section('title', 'Blog')

@section('content')
    <div class="bg-background text-text min-h-screen py-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-5xl font-extrabold text-center text-text mb-16">Latest Blog Posts</h1>

            @if ($posts->isEmpty())
                <p class="text-center text-muted">No blog posts found.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach ($posts as $post)
                        <article class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl overflow-hidden shadow-lg shadow-accent/30  hover:shadow-acttive/50  transform transition duration-300">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover rounded-t-3xl">
                            @endif

                            <div class="p-6 flex flex-col h-full">
                                <h2 class="text-2xl font-semibold mb-2 leading-snug">
                                    <a href="{{ route('site.blog.show', $post->slug) }}" class="hover:underline text-text">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <p class="text-muted text-sm mb-3">{{ $post->created_at->format('M d, Y') }}</p>

                                <p class="text-sm text-muted flex-grow">
                                    {!! Str::limit(strip_tags($post->content), 120) !!}
                                </p>

                                <a href="{{ route('site.blog.show', $post->slug) }}"
                                    class="mt-4 inline-block text-accent hover:text-acttive text-sm font-medium transition">
                                    Read more →
                                </a>
                            </div>
                        </article>
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
