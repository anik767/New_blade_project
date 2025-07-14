@extends('layouts.admin')

@section('title', 'Create Blog Post')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6">Create Blog Post</h1>

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block font-semibold mb-2">Featured Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block font-semibold mb-2">Content</label>
            <textarea name="content" id="content" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Create Post
        </button>
        <a href="{{ route('admin.blog.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
