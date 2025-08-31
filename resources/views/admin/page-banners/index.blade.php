@extends('layouts.admin')
@section('title', 'Page Banners')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Page Banners</h1>
                            <p class="text-gray-600 text-lg">Manage background media for different pages across your website</p>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center bg-purple-50 px-5 py-3 rounded-xl border border-purple-200">
                            <svg class="w-5 h-5 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span class="text-purple-700 font-medium">{{ $banners->count() }} pages configured</span>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-purple-600 mb-1">🎨</div>
                        <div class="text-sm text-gray-600 font-medium">Banners</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-blue-600 mb-1">📱</div>
                        <div class="text-sm text-gray-600 font-medium">Pages</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Banners Grid -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    Page Banner Management
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $pages = [
                        'home' => ['icon' => '🏠', 'title' => 'Home Page', 'description' => 'Main landing page banner'],
                        'about' => ['icon' => '👤', 'title' => 'About Page', 'description' => 'About me page background'],
                        'services' => ['icon' => '⚙️', 'title' => 'Services Page', 'description' => 'Services listing page'],
                        'projects' => ['icon' => '💼', 'title' => 'Projects Page', 'description' => 'Portfolio projects page'],
                        'blog' => ['icon' => '📝', 'title' => 'Blog Page', 'description' => 'Blog listing page'],
                        'contact' => ['icon' => '📞', 'title' => 'Contact Page', 'description' => 'Contact information page']
                    ];
                @endphp

                @foreach($pages as $pageKey => $pageInfo)
                    @php $banner = $banners->firstWhere('page', $pageKey); @endphp
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300 group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <div class="text-3xl mr-4">{{ $pageInfo['icon'] }}</div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $pageInfo['title'] }}</h3>
                                    <p class="text-sm text-gray-600">{{ $pageInfo['description'] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if($banner && $banner->background_media)
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-xs text-green-600 font-medium">Configured</span>
                                @else
                                    <div class="w-3 h-3 bg-gray-300 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-500 font-medium">Not set</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            @if($banner && $banner->background_media)
                                @php
                                    $ext = strtolower(pathinfo($banner->background_media, PATHINFO_EXTENSION));
                                    $isVideo = in_array($ext, ['mp4','webm']);
        @endphp
                                <div class="bg-gray-100 rounded-xl p-3">
                                    <div class="flex items-center">
                                        @if($isVideo)
                                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        @endif
                                        <span class="text-sm font-medium text-gray-700">{{ basename($banner->background_media) }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="bg-gray-50 rounded-xl p-3 border-2 border-dashed border-gray-300">
                                    <div class="flex items-center justify-center text-gray-400">
                                        <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-sm">No media set</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('admin.page-banners.edit', $pageKey) }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-sm group-hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            {{ $banner && $banner->background_media ? 'Update Banner' : 'Set Banner' }}
                        </a>
                    </div>
        @endforeach
            </div>
        </div>
  </div>
</div>
@endsection

