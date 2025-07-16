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

                <div class="mt-12 text-center">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
