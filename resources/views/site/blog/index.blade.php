@extends('layouts.site')

@section('title', 'Blog')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-center text-green-600 mb-12">Latest Blog Posts</h1>

    @if($posts->isEmpty())
        <p class="text-center text-gray-500">No blog posts found.</p>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden border">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-5 flex flex-col h-full">
                        <h2 class="text-xl font-semibold mb-2 text-gray-900">
                            <a href="{{ route('site.blog.show', $post->slug) }}" class="hover:text-green-600 transition">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-sm text-gray-500 mb-3">{{ $post->created_at->format('M d, Y') }}</p>

                        <p class="text-gray-700 text-sm flex-grow">
                            {!! Str::limit(strip_tags($post->content), 120) !!}
                        </p>

                        <a href="{{ route('site.blog.show', $post->slug) }}" class="mt-4 inline-flex items-center text-green-600 hover:underline text-sm font-medium">
                            Read more
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
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
@endsection
