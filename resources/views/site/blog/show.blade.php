@extends('layouts.site')

@section('title', $post->title)

@section('content')
<div class="container mx-auto px-4 py-12 max-w-4xl">
    <article>
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500">{{ $post->created_at->format('F d, Y') }}</p>
        </header>

        @if($post->image)
            <div class="mb-8 rounded overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg object-cover">
            </div>
        @endif

        <div class="text-gray-800 leading-relaxed whitespace-pre-wrap text-lg">
            {!! $post->content !!}
        </div>
    </article>

    <div class="mt-10 text-center">
        <a href="{{ route('site.blog.index') }}" class="text-green-600 hover:underline font-semibold inline-flex items-center">
            <svg class="mr-1 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Blog
        </a>
    </div>
</div>
@endsection
