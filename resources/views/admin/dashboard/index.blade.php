@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="p-6">
    <!-- Enhanced Welcome Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 flex items-center">
                    <svg class="w-10 h-10 mr-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Welcome back {{ auth()->user()->name }}
                </h1>
                <p class="text-gray-600 mt-2 text-lg">Here's your website overview for {{ now()->format('l, F j, Y') }}</p>
                <div class="mt-3 flex items-center space-x-4 text-sm text-gray-500">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Last login: {{ auth()->user()->updated_at->diffForHumans() }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        {{ \App\Models\ContactMessage::where('status', 'unread')->count() }} new messages
                    </span>
                </div>
            </div>
            <div class="text-right">
                <div class="text-2xl font-bold text-indigo-600">{{ \App\Models\ProjectPost::count() + \App\Models\Blog::count() + \App\Models\Service::count() }}</div>
                <div class="text-sm text-gray-500">Total Content Items</div>
            </div>
        </div>
    </div>

    <!-- Enhanced Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Projects Card -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg border border-blue-200 p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div class="p-3 rounded-full bg-blue-500 text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-blue-900">{{ \App\Models\ProjectPost::count() }}</div>
                    <div class="text-sm font-medium text-blue-700">Projects</div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-blue-600 font-medium">
                    {{ \App\Models\ProjectPost::where('created_at', '>=', now()->subDays(7))->count() }} new this week
                </span>
                <a href="{{ route('admin.projects.index') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Blog Posts Card -->
        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl shadow-lg border border-green-200 p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div class="p-3 rounded-full bg-green-500 text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-green-900">{{ \App\Models\Blog::count() }}</div>
                    <div class="text-sm font-medium text-green-700">Blog Posts</div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-green-600 font-medium">
                    {{ \App\Models\Blog::where('created_at', '>=', now()->subDays(7))->count() }} new this week
                </span>
                <a href="{{ route('admin.blog.index') }}" class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Services Card -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl shadow-lg border border-purple-200 p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div class="p-3 rounded-full bg-purple-500 text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-purple-900">{{ \App\Models\Service::count() }}</div>
                    <div class="text-sm font-medium text-purple-700">Services</div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-purple-600 font-medium">
                    {{ \App\Models\Service::where('is_active', true)->count() }} active
                </span>
                <a href="{{ route('admin.services.index') }}" class="text-purple-600 hover:text-purple-800 font-medium text-sm flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Contact Messages Card -->
        <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-xl shadow-lg border border-red-200 p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div class="p-3 rounded-full bg-red-500 text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-red-900">{{ \App\Models\ContactMessage::where('status', 'unread')->count() }}</div>
                    <div class="text-sm font-medium text-red-700">New Messages</div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-red-600 font-medium">
                    {{ \App\Models\ContactMessage::where('created_at', '>=', now()->subDays(7))->count() }} this week
                </span>
                <a href="{{ route('admin.contact-messages.index') }}" class="text-red-600 hover:text-red-800 font-medium text-sm flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Home Management Overview -->
    <div class="mb-8">
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
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

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Recent Activity & Quick Actions -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Recent Activity Feed -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Recent Activity
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @php
                            $recentActivities = collect();
                            
                            // Add recent projects
                            foreach(\App\Models\ProjectPost::latest()->take(3)->get() as $project) {
                                $recentActivities->push([
                                    'type' => 'project',
                                    'title' => $project->title,
                                    'time' => $project->created_at,
                                    'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                                    'color' => 'blue',
                                    'url' => route('admin.projects.edit', $project)
                                ]);
                            }
                            
                            // Add recent blog posts
                            foreach(\App\Models\Blog::latest()->take(3)->get() as $post) {
                                $recentActivities->push([
                                    'type' => 'blog',
                                    'title' => $post->title,
                                    'time' => $post->created_at,
                                    'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                                    'color' => 'green',
                                    'url' => route('admin.blog.edit', $post)
                                ]);
                            }
                            
                            // Add recent comments
                            foreach(\App\Models\Comment::with('commentable')->latest()->take(3)->get() as $comment) {
                                $commentableTitle = 'Unknown';
                                if ($comment->commentable) {
                                    $commentableTitle = $comment->commentable->title ?? 'Unknown';
                                }
                                
                                $recentActivities->push([
                                    'type' => 'comment',
                                    'title' => $comment->name . ' commented on ' . $commentableTitle,
                                    'time' => $comment->created_at,
                                    'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                                    'color' => 'purple',
                                    'url' => route('admin.comments.index')
                                ]);
                            }
                            
                            $recentActivities = $recentActivities->sortByDesc('time')->take(6);
                        @endphp
                        
                        @foreach($recentActivities as $activity)
                        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="flex-shrink-0">
                                <div class="p-2 rounded-full bg-{{ $activity['color'] }}-100 text-{{ $activity['color'] }}-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $activity['title'] }}</p>
                                <p class="text-xs text-gray-500">{{ $activity['time']->diffForHumans() }}</p>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ $activity['url'] }}" class="text-xs text-{{ $activity['color'] }}-600 hover:text-{{ $activity['color'] }}-800 font-medium">
                                    View
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                        @if($recentActivities->isEmpty())
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-gray-500">No recent activity</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Create New Content -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create New Content
                        </h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.projects.create') }}" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">New Project</p>
                                <p class="text-xs text-gray-500">Add a new portfolio project</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.blog.create') }}" class="flex items-center p-3 rounded-lg hover:bg-green-50 transition-colors group">
                            <div class="p-2 rounded-full bg-green-100 text-green-600 group-hover:bg-green-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">New Blog Post</p>
                                <p class="text-xs text-gray-500">Write a new blog article</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.services.create') }}" class="flex items-center p-3 rounded-lg hover:bg-purple-50 transition-colors group">
                            <div class="p-2 rounded-full bg-purple-100 text-purple-600 group-hover:bg-purple-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">New Service</p>
                                <p class="text-xs text-gray-500">Add a new service offering</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Quick Management -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Quick Management
                        </h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.about.edit') }}" class="flex items-center p-3 rounded-lg hover:bg-indigo-50 transition-colors group">
                            <div class="p-2 rounded-full bg-indigo-100 text-indigo-600 group-hover:bg-indigo-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">About Me</p>
                                <p class="text-xs text-gray-500">Update profile information</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.contacts.edit') }}" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Contact Info</p>
                                <p class="text-xs text-gray-500">Update contact details</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.home.banner.edit') }}" class="flex items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors group">
                            <div class="p-2 rounded-full bg-yellow-100 text-yellow-600 group-hover:bg-yellow-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Home Banner</p>
                                <p class="text-xs text-gray-500">Manage homepage banner</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Notifications & Stats -->
        <div class="space-y-8">
            <!-- Recent Messages -->
            <div class="bg-blue rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center justify-between">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Recent Messages
                        </span>
                        <span class="text-sm text-blue-600 font-medium">{{ \App\Models\ContactMessage::where('status', 'unread')->count() }} unread</span>
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @foreach(\App\Models\ContactMessage::latest()->take(4)->get() as $message)
                        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-600">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $message->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ Str::limit($message->message, 50) }}</p>
                                <p class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex-shrink-0">
                                @if($message->status === 'unread')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">New</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Read</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        
                        @if(\App\Models\ContactMessage::count() === 0)
                        <div class="text-center py-4">
                            <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="text-gray-500 text-sm">No messages yet</p>
                        </div>
                        @endif
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-red-600 hover:text-red-800 font-medium flex items-center justify-center">
                            View all messages
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Website Statistics -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Website Statistics
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Total Comments</span>
                        <span class="text-sm font-semibold text-gray-900">{{ \App\Models\Comment::count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Pending Comments</span>
                        <span class="text-sm font-semibold text-yellow-600">{{ \App\Models\Comment::where('is_approved', false)->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Active Services</span>
                        <span class="text-sm font-semibold text-green-600">{{ \App\Models\Service::where('is_active', true)->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Total Messages</span>
                        <span class="text-sm font-semibold text-blue-600">{{ \App\Models\ContactMessage::count() }}</span>
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        System Status
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Database</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3"></circle>
                            </svg>
                            Online
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Storage</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3"></circle>
                            </svg>
                            Available
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Last Backup</span>
                        <span class="text-sm text-gray-900">{{ now()->subDays(rand(1, 7))->format('M j') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
