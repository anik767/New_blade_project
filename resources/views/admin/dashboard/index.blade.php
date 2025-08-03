@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="p-6">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600 mt-2">Here's what's happening with your website today.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Projects Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Projects</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\ProjectPost::count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all projects →</a>
            </div>
        </div>

        <!-- Blog Posts Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Blog Posts</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\BlogPost::count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.blog.index') }}" class="text-sm text-green-600 hover:text-green-800">View all posts →</a>
            </div>
        </div>

        <!-- Services Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Services</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Service::count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.services.index') }}" class="text-sm text-purple-600 hover:text-purple-800">View all services →</a>
            </div>
        </div>

        <!-- Contact Messages Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">New Messages</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\ContactMessage::where('status', 'unread')->count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-red-600 hover:text-red-800">View all messages →</a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Projects -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
            </div>
            <div class="space-y-3">
                @foreach(\App\Models\ProjectPost::latest()->take(3)->get() as $project)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-900">{{ $project->title }}</p>
                        <p class="text-sm text-gray-600">{{ $project->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-sm text-blue-600 hover:text-blue-800">Edit</a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Blog Posts -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent Blog Posts</h3>
                <a href="{{ route('admin.blog.index') }}" class="text-sm text-green-600 hover:text-green-800">View all</a>
            </div>
            <div class="space-y-3">
                @foreach(\App\Models\BlogPost::latest()->take(3)->get() as $post)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-900">{{ $post->title }}</p>
                        <p class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-sm text-green-600 hover:text-green-800">Edit</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Recent Comments -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Recent Comments</h3>
            <a href="{{ route('admin.comments.index') }}" class="text-sm text-purple-600 hover:text-purple-800">View all</a>
        </div>
        <div class="space-y-3">
            @foreach(\App\Models\Comment::with('commentable')->latest()->take(5)->get() as $comment)
            <div class="flex items-start justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex-1">
                    <p class="font-medium text-gray-900">{{ $comment->name }}</p>
                    <p class="text-sm text-gray-600">{{ Str::limit($comment->comment, 100) }}</p>
                    <p class="text-xs text-gray-500 mt-1">
                        On: {{ $comment->commentable->title ?? 'Unknown Post' }} • {{ $comment->created_at->diffForHumans() }}
                    </p>
                </div>
                <div class="ml-4">
                    @if($comment->is_approved)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Approved</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Access Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{ route('admin.about-me.edit') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">About Me</h3>
                    <p class="text-sm text-gray-600">Edit your profile information</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.contacts.edit') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Contact Info</h3>
                    <p class="text-sm text-gray-600">Update contact details</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.home.edit') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Home Banner</h3>
                    <p class="text-sm text-gray-600">Manage homepage banner</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
