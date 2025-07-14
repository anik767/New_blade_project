@extends('layouts.admin')

@section('title', 'Manage Blog Posts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Blog Posts</h1>
        <a href="{{ route('admin.blog.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Create New Post
        </a>
    </div>

    @if($posts->isEmpty())
        <p>No blog posts found.</p>
    @else
    <table class="min-w-full border border-gray-300 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Image</th>
                <th class="border px-4 py-2 text-left">Title</th>
                <th class="border px-4 py-2 text-left">Published</th>
                <th class="border px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="border px-2 py-1">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="w-12 h-12 object-cover rounded">
                    @else
                        <span class="text-gray-400 italic">No image</span>
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('site.blog.show', $post->slug) }}" target="_blank" class="text-green-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </td>
                <td class="border px-4 py-2">{{ $post->created_at->format('M d, Y') }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('admin.blog.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit</a>

                    <form method="POST" action="{{ route('admin.blog.destroy', $post->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
