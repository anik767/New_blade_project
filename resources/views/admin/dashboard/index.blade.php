@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Modern Welcome Header with Glassmorphism -->
    <div class="relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/5 via-purple-600/5 to-indigo-600/5"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(147, 51, 234, 0.1) 0%, transparent 50%);"></div>
        
        <div class="relative p-6 lg:p-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white animate-pulse"></div>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent">
                                Welcome back, {{ auth()->user()->name }}! 👋
                            </h1>
                            <p class="text-gray-600 mt-1 text-lg">Here's your website overview for {{ now()->format('l, F j, Y') }}</p>
                        </div>
                    </div>
                    
                    <!-- Quick Stats Row -->
                    <div class="flex flex-wrap items-center gap-6 text-sm">
                        <div class="flex items-center gap-2 px-3 py-2 bg-white/60 backdrop-blur-sm rounded-full border border-white/20">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-gray-700 font-medium">Last login: {{ auth()->user()->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-2 bg-white/60 backdrop-blur-sm rounded-full border border-white/20">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">{{ \App\Models\ContactMessage::where('status', 'unread')->count() }} new messages</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-2 bg-white/60 backdrop-blur-sm rounded-full border border-white/20">
                            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">System running smoothly</span>
                        </div>
                    </div>
                </div>
                
                <!-- Search and Quick Actions -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Search Bar -->
                    <div class="relative flex-1 max-w-md">
                        <form action="{{ route('admin.dashboard.search') }}" method="GET" class="relative">
                            <div class="relative">
                                <input type="text" 
                                       name="q" 
                                       value="{{ request('q') }}"
                                       placeholder="Search projects, blogs, services, messages..." 
                                       class="w-full pl-10 pr-4 py-3 bg-white/80 backdrop-blur-sm border border-white/30 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 shadow-lg placeholder-gray-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                @if(request('q'))
                                    <button type="button" onclick="clearSearch()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            New Project
                        </a>
                        <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            New Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Statistics Cards with Glassmorphism -->
    <div class="px-6 lg:px-8 mt-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Projects Card -->
            <div class="dashboard-card group relative overflow-hidden p-6">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ \App\Models\ProjectPost::count() }}</div>
                            <div class="text-sm font-medium text-gray-600">Projects</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-blue-600 font-medium bg-blue-50 px-2 py-1 rounded-full">
                            {{ \App\Models\ProjectPost::where('created_at', '>=', now()->subDays(7))->count() }} new this week
                        </span>
                        <a href="{{ route('admin.projects.index') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center group-hover:translate-x-1 transition-transform duration-200">
                            View all
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Posts Card -->
            <div class="dashboard-card group relative overflow-hidden p-6">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-emerald-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-green-500 to-green-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ \App\Models\Blog::count() }}</div>
                            <div class="text-sm font-medium text-gray-600">Blog Posts</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-green-600 font-medium bg-green-50 px-2 py-1 rounded-full">
                            {{ \App\Models\Blog::where('created_at', '>=', now()->subDays(7))->count() }} new this week
                        </span>
                        <a href="{{ route('admin.blog.index') }}" class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center group-hover:translate-x-1 transition-transform duration-200">
                            View all
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Services Card -->
            <div class="group relative overflow-hidden dashboard-card p-6 ">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ \App\Models\Service::count() }}</div>
                            <div class="text-sm font-medium text-gray-600">Services</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-purple-600 font-medium bg-purple-50 px-2 py-1 rounded-full">
                            {{ \App\Models\Service::where('is_active', true)->count() }} active
                        </span>
                        <a href="{{ route('admin.services.index') }}" class="text-purple-600 hover:text-purple-800 font-medium text-sm flex items-center group-hover:translate-x-1 transition-transform duration-200">
                            View all
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Messages Card -->
            <div class="dashboard-card group relative overflow-hidden p-6">
                <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-orange-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-red-500 to-red-600 text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ \App\Models\ContactMessage::where('status', 'unread')->count() }}</div>
                            <div class="text-sm font-medium text-gray-600">New Messages</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-red-600 font-medium bg-red-50 px-2 py-1 rounded-full">
                            {{ \App\Models\ContactMessage::where('created_at', '>=', now()->subDays(7))->count() }} this week
                        </span>
                        <a href="{{ route('admin.contact-messages.index') }}" class="text-red-600 hover:text-red-800 font-medium text-sm flex items-center group-hover:translate-x-1 transition-transform duration-200">
                            View all
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Results Section -->
    @if(request('q'))
        <div class="px-6 lg:px-8 mb-8">
            <div class="dashboard-card shadow-xl">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search Results for "{{ request('q') }}"
                    </h3>
                </div>
                <div class="p-6">
                    @php
                        $query = request('q');
                        $projects = \App\Models\ProjectPost::where('title', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%")
                            ->orWhere('content', 'like', "%{$query}%")
                            ->limit(5)->get();
                        $blogs = \App\Models\Blog::where('title', 'like', "%{$query}%")
                            ->orWhere('content', 'like', "%{$query}%")
                            ->limit(5)->get();
                        $services = \App\Models\Service::where('title', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%")
                            ->limit(5)->get();
                        $messages = \App\Models\ContactMessage::where('name', 'like', "%{$query}%")
                            ->orWhere('email', 'like', "%{$query}%")
                            ->orWhere('message', 'like', "%{$query}%")
                            ->limit(5)->get();
                        $totalResults = $projects->count() + $blogs->count() + $services->count() + $messages->count();
                    @endphp

                    @if($totalResults > 0)
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Projects Results -->
                            @if($projects->count() > 0)
                                <div class="space-y-3">
                                    <h4 class="font-semibold text-gray-900 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        Projects ({{ $projects->count() }})
                                    </h4>
                                    @foreach($projects as $project)
                                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow">
                                            <h5 class="font-medium text-gray-900 mb-1">{{ $project->title }}</h5>
                                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($project->description, 100) }}</p>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit Project →</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Blog Posts Results -->
                            @if($blogs->count() > 0)
                                <div class="space-y-3">
                                    <h4 class="font-semibold text-gray-900 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        Blog Posts ({{ $blogs->count() }})
                                    </h4>
                                    @foreach($blogs as $blog)
                                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow">
                                            <h5 class="font-medium text-gray-900 mb-1">{{ $blog->title }}</h5>
                                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                                            <a href="{{ route('admin.blog.edit', $blog) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">Edit Post →</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Services Results -->
                            @if($services->count() > 0)
                                <div class="space-y-3">
                                    <h4 class="font-semibold text-gray-900 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        Services ({{ $services->count() }})
                                    </h4>
                                    @foreach($services as $service)
                                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow">
                                            <h5 class="font-medium text-gray-900 mb-1">{{ $service->title }}</h5>
                                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($service->description, 100) }}</p>
                                            <a href="{{ route('admin.services.edit', $service) }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium">Edit Service →</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Messages Results -->
                            @if($messages->count() > 0)
                                <div class="space-y-3">
                                    <h4 class="font-semibold text-gray-900 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        Messages ({{ $messages->count() }})
                                    </h4>
                                    @foreach($messages as $message)
                                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow">
                                            <h5 class="font-medium text-gray-900 mb-1">{{ $message->name }} ({{ $message->email }})</h5>
                                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($message->message, 100) }}</p>
                                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-red-600 hover:text-red-800 text-sm font-medium">View Message →</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No results found</h3>
                            <p class="text-gray-600">Try searching with different keywords or check your spelling.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- New Modern Features Section -->
    <div class="px-6 lg:px-8 mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Analytics Widget -->
            <div class="lg:col-span-2">
                <div class="dashboard-card p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Website Analytics
                        </h3>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            Live
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                            <div class="text-2xl font-bold text-blue-600">{{ \App\Models\ProjectPost::count() + \App\Models\Blog::count() }}</div>
                            <div class="text-sm text-blue-700">Total Posts</div>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                            <div class="text-2xl font-bold text-green-600">{{ \App\Models\Comment::count() }}</div>
                            <div class="text-sm text-green-700">Comments</div>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl">
                            <div class="text-2xl font-bold text-purple-600">{{ \App\Models\ContactMessage::count() }}</div>
                            <div class="text-sm text-purple-700">Messages</div>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl">
                            <div class="text-2xl font-bold text-orange-600">{{ \App\Models\Service::where('is_active', true)->count() }}</div>
                            <div class="text-sm text-orange-700">Active Services</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Metrics -->
            <div class="space-y-6">
                <div class="dashboard-card p-6 shadow-xl">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Performance
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Server Status</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5 animate-pulse"></div>
                                Online
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Database</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5 animate-pulse"></div>
                                Healthy
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Storage</span>
                            <span class="text-sm font-medium text-gray-900">2.4 GB / 10 GB</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full" style="width: 24%"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Home Management Overview -->
    <div class="px-6 lg:px-8 mb-6">
        <div class="dashboard-card shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home Management
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $banner = \App\Models\HomeBanner::latest()->first();
                        if (!$banner) {
                            $banner = new \App\Models\HomeBanner();
                        }
                    @endphp
                    
                    <!-- Banner Section -->
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg p-4 border border-indigo-200 h-52 relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <h4 class="font-semibold text-gray-900">Banner</h4>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Background Image</span>
                                <span class="font-medium {{ $banner->background_image ? 'text-green-600' : 'text-gray-400' }}">
                                    {{ $banner->background_image ? '✓' : '✗' }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Profile Image</span>
                                <span class="font-medium {{ $banner->person_image ? 'text-green-600' : 'text-gray-400' }}">
                                    {{ $banner->person_image ? '✓' : '✗' }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">CV File</span>
                                <span class="font-medium {{ $banner->cv_file ? 'text-green-600' : 'text-gray-400' }}">
                                    {{ $banner->cv_file ? '✓' : '✗' }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 absolute bottom-0 left-0 right-0 p-4">
                            <a href="{{ route('admin.home.banner.edit') }}" 
                               class="w-full bg-indigo-600 text-white px-3 py-2 rounded-lg hover:bg-indigo-700 transition-colors duration-200 text-center block text-sm">
                                Edit Banner
                            </a>
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-4 border border-green-200 h-52 relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                <h4 class="font-semibold text-gray-900">Skills</h4>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Skills</span>
                                <span class="font-medium text-gray-900">{{ count($banner->skills ?? []) }}</span>
                            </div>
                            @if(is_array($banner->skills) && count($banner->skills) > 0)
                                <div class="flex flex-wrap gap-1">
                                    @foreach(array_slice($banner->skills, 0, 2) as $skill)
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{ $skill }}</span>
                                    @endforeach
                                    @if(count($banner->skills) > 2)
                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">+{{ count($banner->skills) - 2 }} more</span>
                                    @endif
                                </div>
                            @else
                                <p class="text-xs text-gray-500">No skills added yet</p>
                            @endif
                        </div>
                        <div class="mt-4 absolute bottom-0 left-0 right-0 p-4">
                            <a href="{{ route('admin.home.skills.edit') }}" 
                               class="w-full bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 text-center block text-sm">
                                Edit Skills
                            </a>
                        </div>
                    </div>

                    <!-- Experience Section -->
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg p-4 border border-purple-200 h-52 relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8z"></path>
                                </svg>
                                <h4 class="font-semibold text-gray-900">Experience</h4>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Experiences</span>
                                <span class="font-medium text-gray-900">{{ count($banner->experience ?? []) }}</span>
                            </div>
                            @if(is_array($banner->experience) && count($banner->experience) > 0)
                                <div class="space-y-1">
                                    @foreach(array_slice($banner->experience, 0, 2) as $exp)
                                        <div class="text-xs">
                                            <div class="font-medium text-gray-900">{{ $exp['title'] ?? 'Job Title' }}</div>
                                            <div class="text-gray-600">{{ $exp['company'] ?? 'Company' }}</div>
                                        </div>
                                    @endforeach
                                    @if(count($banner->experience) > 2)
                                        <div class="text-xs text-gray-500">+{{ count($banner->experience) - 2 }} more experiences</div>
                                    @endif
                                </div>
                            @else
                                <p class="text-xs text-gray-500">No experience added yet</p>
                            @endif
                        </div>
                        <div class="mt-4 absolute bottom-0 left-0 right-0 p-4">
                            <a href="{{ route('admin.home.experience.edit') }}" 
                               class="w-full bg-purple-600 text-white px-3 py-2 rounded-lg hover:bg-purple-700 transition-colors duration-200 text-center block text-sm">
                                Edit Experience
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions - Full Width -->
    <div class="px-6 lg:px-8 mb-6">
        <div class="dashboard-card p-6 shadow-xl">
            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Quick Actions
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.profile.edit') }}" class="group flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 border border-transparent hover:border-gray-200 hover:shadow-md">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">Update Profile</h4>
                        <p class="text-sm text-gray-500">Manage your personal information</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.contacts.edit') }}" class="group flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 border border-transparent hover:border-gray-200 hover:shadow-md">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 group-hover:text-green-600 transition-colors">Contact Info</h4>
                        <p class="text-sm text-gray-500">Update contact details</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.page-banners.index') }}" class="group flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 border border-transparent hover:border-gray-200 hover:shadow-md">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 4m0 0l4-4 4 4M4 8h16"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">Page Banners</h4>
                        <p class="text-sm text-gray-500">Manage page banners</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 border border-transparent hover:border-gray-200 hover:shadow-md">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-orange-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 group-hover:text-orange-600 transition-colors">Dashboard</h4>
                        <p class="text-sm text-gray-500">View dashboard overview</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="px-6 lg:px-8 mt-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Recent Activity -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Modern Activity Feed -->
                <div class="dashboard-card shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-50/80 to-gray-100/80 backdrop-blur-sm px-6 py-4 border-b border-gray-200/50">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Recent Activity
                            <span class="ml-auto text-sm text-gray-500 font-normal">{{ $recentActivities->count() }} items</span>
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            
                            @foreach($recentActivities as $activity)
                            <div class="group flex items-start space-x-3 p-4 rounded-xl hover:bg-gray-50/80 transition-all duration-200 border border-transparent hover:border-gray-200/50">
                                <div class="flex-shrink-0">
                                    <div class="p-2.5 rounded-xl {{ $activity['bgColor'] }} {{ $activity['color'] }} group-hover:scale-110 transition-transform duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate group-hover:text-gray-700 transition-colors">{{ $activity['title'] }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $activity['time']->diffForHumans() }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="{{ $activity['url'] }}" class="text-xs {{ $activity['color'] }} hover:opacity-80 font-medium px-2 py-1 rounded-lg {{ $activity['bgColor'] }} transition-colors">
                                        View
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            
                            @if($recentActivities->isEmpty())
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">No recent activity</p>
                                <p class="text-gray-400 text-sm mt-1">Start creating content to see activity here</p>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>

                <!-- Modern Quick Actions -->
                <div class="dashboard-card shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-50/80 to-purple-50/80 backdrop-blur-sm px-6 py-4 border-b border-gray-200/50">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Quick Actions
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <a href="{{ route('admin.projects.create') }}" class="group flex items-center p-4 rounded-xl hover:bg-blue-50/80 transition-all duration-200 border border-transparent hover:border-blue-200/50">
                            <div class="p-3 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 text-blue-600 group-hover:scale-110 transition-transform duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900 group-hover:text-blue-700 transition-colors">New Project</p>
                                <p class="text-xs text-gray-500">Add a new portfolio project</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.blog.create') }}" class="group flex items-center p-4 rounded-xl hover:bg-green-50/80 transition-all duration-200 border border-transparent hover:border-green-200/50">
                            <div class="p-3 rounded-xl bg-gradient-to-br from-green-100 to-green-200 text-green-600 group-hover:scale-110 transition-transform duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900 group-hover:text-green-700 transition-colors">New Blog Post</p>
                                <p class="text-xs text-gray-500">Write a new blog article</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.services.create') }}" class="group flex items-center p-4 rounded-xl hover:bg-purple-50/80 transition-all duration-200 border border-transparent hover:border-purple-200/50">
                            <div class="p-3 rounded-xl bg-gradient-to-br from-purple-100 to-purple-200 text-purple-600 group-hover:scale-110 transition-transform duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900 group-hover:text-purple-700 transition-colors">New Service</p>
                                <p class="text-xs text-gray-500">Add a new service offering</p>
                            </div>
                        </a>
                    </div>
                </div>
        </div>

            <!-- Right Column: Modern Notifications & Stats -->
            <div class="space-y-6">
                <!-- Recent Messages -->
                <div class="dashboard-card shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50/80 to-indigo-50/80 backdrop-blur-sm px-6 py-4 border-b border-gray-200/50">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center justify-between">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Recent Messages
                            </span>
                            <span class="text-sm text-blue-600 font-medium bg-blue-100 px-2 py-1 rounded-full">{{ \App\Models\ContactMessage::where('status', 'unread')->count() }} unread</span>
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach(\App\Models\ContactMessage::latest()->take(4)->get() as $message)
                            <div class="group flex items-start space-x-3 p-3 rounded-xl hover:bg-gray-50/80 transition-all duration-200 border border-transparent hover:border-gray-200/50">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                        <span class="text-sm font-medium text-blue-700">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $message->name }}</p>
                                    <p class="text-xs text-gray-500 truncate mt-1">{{ Str::limit($message->message, 50) }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    @if($message->status === 'unread')
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 animate-pulse">New</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Read</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            
                            @if(\App\Models\ContactMessage::count() === 0)
                            <div class="text-center py-8">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm font-medium">No messages yet</p>
                                <p class="text-gray-400 text-xs mt-1">Messages will appear here when received</p>
                            </div>
                            @endif
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-200/50">
                            <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center group">
                                View all messages
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modern Website Statistics -->
                <div class="dashboard-card shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-50/80 to-gray-100/80 backdrop-blur-sm px-6 py-4 border-b border-gray-200/50">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Website Statistics
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50/50">
                            <span class="text-sm text-gray-600 font-medium">Total Comments</span>
                            <span class="text-sm font-bold text-gray-900 bg-gray-100 px-2 py-1 rounded-full">{{ \App\Models\Comment::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-yellow-50/50">
                            <span class="text-sm text-gray-600 font-medium">Pending Comments</span>
                            <span class="text-sm font-bold text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">{{ \App\Models\Comment::where('is_approved', false)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-green-50/50">
                            <span class="text-sm text-gray-600 font-medium">Active Services</span>
                            <span class="text-sm font-bold text-green-600 bg-green-100 px-2 py-1 rounded-full">{{ \App\Models\Service::where('is_active', true)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-blue-50/50">
                            <span class="text-sm text-gray-600 font-medium">Total Messages</span>
                            <span class="text-sm font-bold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">{{ \App\Models\ContactMessage::count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function clearSearch() {
    const searchInput = document.querySelector('input[name="q"]');
    if (searchInput) {
        searchInput.value = '';
        searchInput.form.submit();
    }
}
</script>
@endsection
