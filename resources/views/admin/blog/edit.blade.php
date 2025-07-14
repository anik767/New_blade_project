@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6">Edit Blog Post</h1>

    <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Show current image --}}
        @if ($post->image)
            <div class="mb-4">
                <label class="block font-semibold mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="w-64 rounded shadow">
            </div>
        @endif

        {{-- Upload new image --}}
        <div class="mb-4">
            <label for="image" class="block font-semibold mb-2">Replace Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block font-semibold mb-2">Content</label>
            <textarea name="content" id="content" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Update Post
        </button>
        <a href="{{ route('admin.blog.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
