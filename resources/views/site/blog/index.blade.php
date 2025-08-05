@extends('layouts.site')

@section('title', 'Blog')
@section('description', 'Read my latest articles about web development, design trends, and technology insights. Stay updated with industry best practices and innovative solutions.')

@section('content')

<div class="bg-background text-text min-h-screen">

    {{-- Hero Section --}}
    <section class="relative py-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/Home/banner-background-one.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-card/80 via-card/60 to-card/40"></div>

        <div class="container mx-auto px-6 relative font-rajdhani z-10">
            <div class="text-center max-w-4xl mx-auto reveal-on-scroll">
                <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight text-text mb-8">
                    Blog
                </h1>
                <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-3xl mx-auto">
                    Insights, tutorials, and thoughts on web development
                </p>
            </div>
        </div>
    </section>

    {{-- Blog Posts Section --}}
    <section class="py-32">
        <div class="container mx-auto px-6">
            @if ($posts->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-card rounded-3xl p-12 max-w-md mx-auto shadow-lg border border-card">
                        <div class="text-6xl mb-4">📝</div>
                        <h2 class="text-2xl font-semibold text-text mb-2">Blog Posts</h2>
                        <p class="text-muted">No blog posts found at the moment.</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <div class="bg-card rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transform transition-all duration-300 group hover:scale-105 hover:-translate-y-2 reveal-on-scroll border border-card">
                            <a href="{{ route('site.blog.show', $post->slug) }}" class="block">
                                @if ($post->image)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $post->image) }}" 
                                            alt="{{ $post->title }}" 
                                            class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-card/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>
                                @endif

                                <div class="p-8">
                                    <div class="flex items-center mb-6">
                                        <span class="text-4xl mr-4">📝</span>
                                        <h2 class="text-2xl font-semibold text-text group-hover:text-accent transition-colors duration-300">
                                            {{ $post->title }}
                                        </h2>
                                    </div>

                                    <p class="text-muted mb-6 leading-relaxed">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>

                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-accent font-medium">{{ $post->created_at->format('M d, Y') }}</span>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('site.blog.show', $post->slug) }}" 
                                                class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-accent/90 transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                                Read More
                                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($posts->hasPages())
                    <div class="mt-16 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            @php
                                $currentPage = $posts->currentPage();
                                $totalPages = $posts->lastPage();
                                $pageStart = max(1, $currentPage - 2);
                                $pageEnd = min($totalPages, $currentPage + 2);
                            @endphp

                            {{-- Previous Page --}}
                            @if ($posts->onFirstPage())
                                <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $posts->previousPageUrl() }}"
                                    class="px-4 py-2 bg-accent text-background font-semibold rounded hover:bg-accent/90 transition">
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
                                    <span class="px-4 py-2 bg-accent text-background font-semibold rounded">{{ $i }}</span>
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
                                    class="px-4 py-2 bg-accent text-background font-semibold rounded hover:bg-accent/90 transition">
                                    Next
                                </a>
                            @else
                                <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Next</span>
                            @endif
                        </nav>
                    </div>
                @endif
            @endif
        </div>
    </section>

</div>

@endsection
