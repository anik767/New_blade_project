@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">View Post: {{ $post->title }}</h1>
            <div class="flex space-x-3">
                <a href="{{ route('admin.posts.edit', $post) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                    Edit Post
                </a>
                <a href="{{ route('admin.posts.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                    Back to Posts
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            {{-- Header Section --}}
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $post->type === 'project' ? 'bg-purple-100 text-purple-800' : 
                               ($post->type === 'blog' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                            {{ ucfirst($post->type) }}
                        </span>
                        <span class="text-sm text-gray-500">Created: {{ $post->created_at->format('M d, Y \a\t g:i A') }}</span>
                        @if($post->updated_at != $post->created_at)
                            <span class="text-sm text-gray-500">Updated: {{ $post->updated_at->format('M d, Y \a\t g:i A') }}</span>
                        @endif
                    </div>
                    @if($post->type === 'service')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $post->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $post->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- Content Section --}}
            <div class="p-6">
                {{-- Title and Slug --}}
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500">Slug: {{ $post->slug }}</p>
                </div>

                {{-- Image --}}
                @if($post->image)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Featured Image</h3>
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         alt="{{ $post->title }}" 
                         class="max-w-md rounded-lg shadow-md">
                </div>
                @endif

                {{-- Content --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Content</h3>
                    <div class="prose max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                {{-- Type-specific Information --}}
                @if($post->type === 'project')
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Project Details</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        @if($post->github_link)
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-600">GitHub:</span>
                                <a href="{{ $post->github_link }}" target="_blank" rel="noopener noreferrer"
                                   class="text-blue-600 hover:text-blue-800 underline">
                                    {{ $post->github_link }}
                                </a>
                            </div>
                        @else
                            <p class="text-gray-500">No GitHub link provided</p>
                        @endif
                    </div>
                </div>
                @endif

                @if($post->type === 'service')
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Service Details</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="text-gray-600">Icon:</span>
                                <span class="ml-2">
                                    @if($post->icon)
                                        @if(str_contains($post->icon, 'fa-'))
                                            <i class="{{ $post->icon }} text-2xl"></i>
                                        @else
                                            <span class="text-2xl">{{ $post->icon }}</span>
                                        @endif
                                    @else
                                        <span class="text-gray-500">No icon</span>
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-600">Display Order:</span>
                                <span class="ml-2 font-medium">{{ $post->order ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Comments Count --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Comments</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-600">
                            This {{ $post->type }} has {{ $post->comments()->count() }} approved comments.
                        </p>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="border-t border-gray-200 pt-6">
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.posts.edit', $post) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                Edit Post
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                    Delete Post
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('admin.posts.index') }}" 
                           class="text-gray-600 hover:text-gray-800 font-medium">
                            ← Back to Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 