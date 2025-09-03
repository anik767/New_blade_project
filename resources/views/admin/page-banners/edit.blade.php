@extends('layouts.admin')
@section('title', 'Edit Page Banner')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="md:flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Page Banner</h1>
                            <p class="text-gray-600 text-lg">Update background media for the {{ ucfirst($banner->page) }} page</p>
                        </div>
                    </div>
                    
                    <!-- Page Info -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                            <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-blue-700 font-medium">{{ ucfirst($banner->page) }} Page Banner</span>
                        </div>
                        
                        @if($banner->background_media)
                            <div class="flex items-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-green-700 font-medium">Banner configured</span>
                            </div>
                        @else
                            <div class="flex items-center bg-yellow-50 px-5 py-3 rounded-xl border border-yellow-200">
                                <svg class="w-5 h-5 mr-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <span class="text-yellow-700 font-medium">No banner set</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-purple-600 mb-1">🎨</div>
                        <div class="text-sm text-gray-600 font-medium">Banner</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-blue-600 mb-1">📱</div>
                        <div class="text-sm text-gray-600 font-medium">{{ ucfirst($banner->page) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <x-forms.admin-form 
            :action="route('admin.page-banners.update', $banner->page)" 
            method="PUT"
            title=""
            submit-text="Update Banner"
            :cancel-url="route('admin.page-banners.index')"
        >


            <!-- Banner Management -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 mb-8 border border-blue-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    Banner Management
                </h3>
                
                <x-forms.image-upload 
                                   name="background_media" 
                    label="Page Banner"
                    :currentImage="$banner->background_media"
                                   accept="image/*,video/mp4,video/webm" 
                    helpText="Images: JPG, PNG, GIF, WEBP. Videos: MP4, WEBM. Recommended: High resolution for best quality. No file size limit."
                    previewHeight="h-80"
                    previewWidth="w-full"
                    previewShape="rounded-xl"
                />
            </div>

            <!-- Banner Tips -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    Banner Best Practices
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">1</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">High Resolution</p>
                                <p class="text-sm text-gray-600">Use high-quality images/videos for crisp display across all devices</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 text-sm font-bold">2</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Aspect Ratio</p>
                                <p class="text-sm text-gray-600">16:9 or 21:9 ratios work best for banner backgrounds</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                    <span class="text-purple-600 text-sm font-bold">3</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">File Size</p>
                                <p class="text-sm text-gray-600">Optimize files for web to ensure fast loading times</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span class="text-orange-600 text-sm font-bold">4</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Content Overlay</p>
                                <p class="text-sm text-gray-600">Ensure text remains readable over your chosen background</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.admin-form>
    </div>
</div>
@endsection


