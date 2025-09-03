@extends('layouts.admin')
@section('title', 'Create New Blog Post')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Create New Blog Post
                </h1>
                <p class="text-gray-600 mt-2">Share your thoughts, insights, and expertise with your audience</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">✍️</div>
                    <div class="text-sm text-gray-500">New Post</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">📝</div>
                    <div class="text-sm text-gray-500">Content</div>
                </div>
            </div>
        </div>
    </div>

    <x-forms.admin-form 
        :action="route('admin.blog.store')" 
        title="Blog Post Information"
        submit-text="Create Post"
        :cancel-url="route('admin.blog.index')"
    >
        <!-- Basic Post Information -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Basic Post Information
            </h3>
            
            <x-forms.form-field 
                label="Post Title" 
                name="title" 
                placeholder="How to Build a Modern Web Application with Laravel and Vue.js"
            />
            
            <x-forms.form-field 
                label="Post Content" 
                name="content" 
                type="textarea" 
                placeholder="Write your blog post content here. You can use HTML tags for formatting, including headings, lists, links, and more..."
                help="You can use HTML tags for formatting. Examples: &lt;h2&gt;Heading&lt;/h2&gt;, &lt;p&gt;Paragraph&lt;/p&gt;, &lt;ul&gt;&lt;li&gt;List item&lt;/li&gt;&lt;/ul&gt;"
            />
        </div>

        <!-- Post Media -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Post Media
            </h3>
            
            <x-forms.image-upload 
                name="image"
                label="Featured Image"
                accept="image/*"
                helpText="Recommended size: 1200x630 pixels (social media optimized). Formats: JPG, PNG, GIF. No file size limit. High-quality images work best for engagement."
                previewHeight="h-48"
                previewWidth="w-full"
                previewShape="rounded-xl"
                required="true"
            />
        </div>

        <!-- Blog Writing Tips -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                Blog Writing Tips
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-green-600 text-xs font-bold">1</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Compelling Title</p>
                            <p class="text-sm text-gray-600">Use clear, descriptive titles that grab attention and explain the value</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">2</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Structured Content</p>
                            <p class="text-sm text-gray-600">Use headings, lists, and paragraphs to make content scannable</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-600 text-xs font-bold">3</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Engaging Image</p>
                            <p class="text-sm text-gray-600">Choose relevant, high-quality images that complement your content</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-orange-100 rounded-full flex items-center justify-center">
                                <span class="text-orange-600 text-xs font-bold">4</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Valuable Content</p>
                            <p class="text-sm text-gray-600">Provide actionable insights, tips, or solutions to your readers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-forms.admin-form>
</div>
@endsection
