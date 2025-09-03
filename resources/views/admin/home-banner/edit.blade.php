@extends('layouts.admin')
@section('title', 'Edit Home Banner')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Edit Home Banner
                </h1>
                <p class="text-gray-600 mt-2">Update your homepage banner content and media</p>
                <div class="mt-2 flex items-center space-x-4 text-sm text-gray-500">
                    @if($banner->exists)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Last updated: {{ $banner->updated_at->diffForHumans() }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 00-2-2V6a2 2 0 00-2-2M9 4a2 2 0 012-2h4a2 2 0 012 2"></path>
                            </svg>
                            Created: {{ $banner->created_at->format('M d, Y') }}
                        </span>
                    @else
                        <span class="flex items-center text-blue-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            New banner - will be created when saved
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $banner->background_image ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">Background</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $banner->person_image ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">Profile</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $banner->cv_file ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">CV</div>
                </div>
            </div>
        </div>
    </div>

    <x-forms.admin-form 
        :action="route('admin.home.update')" 
        title="Banner Information"
        submit-text="Update Banner"
        method="PUT"
        enctype="multipart/form-data"
    >
        <!-- Banner Content -->
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Banner Content
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-forms.form-field 
                    label="Title Line 1" 
                    name="title_line1" 
                    placeholder="e.g., Hi, I'm John Doe"
                    :value="$banner->title_line1"
                />
                
                <x-forms.form-field 
                    label="Title Line 2" 
                    name="title_line2" 
                    placeholder="e.g., Full Stack Developer"
                    :value="$banner->title_line2"
                />
            </div>
            
            <x-forms.form-field 
                label="Subtitle" 
                name="subtitle" 
                type="textarea" 
                placeholder="A brief description about yourself and what you do. This will appear below your main title..."
                :value="$banner->subtitle"
            />
        </div>

        <!-- Banner Media -->
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Banner Media
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Background Image (Optional)
                    </label>
                    
                    @if($banner->background_image)
                        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <p class="text-sm font-medium text-gray-700 mb-3">Current Background Image:</p>
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $banner->background_image) }}" 
                                     alt="Current background" 
                                     class="w-48 h-32 object-cover rounded-lg border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="relative">
                        <input type="file" 
                               name="background_image" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                               accept="image/*">
                    </div>
                    
                    <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 text-blue-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Background Image Requirements (Optional):</p>
                                <ul class="text-sm text-blue-700 mt-1 list-disc list-inside space-y-1">
                                    <li>Recommended size: 1920x1080 pixels</li>
                                    <li>Formats: JPG, PNG, GIF</li>
                                    <li>No file size limit</li>
                                    <li>High-quality, professional images work best</li>
                                    <li>Leave empty to keep current image or skip upload</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Profile Image (Optional)
                    </label>
                    
                    @if($banner->person_image)
                        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <p class="text-sm font-medium text-gray-700 mb-3">Current Profile Image:</p>
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $banner->person_image) }}" 
                                     alt="Current person" 
                                     class="w-32 h-32 object-cover rounded-full border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="relative">
                        <input type="file" 
                               name="person_image" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                               accept="image/*">
                    </div>
                    
                    <div class="mt-2 p-3 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 text-green-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-green-800">Profile Image Requirements (Optional):</p>
                                <ul class="text-sm text-green-700 mt-1 list-disc list-inside space-y-1">
                                    <li>Recommended size: 400x400 pixels (square)</li>
                                    <li>Formats: JPG, PNG, GIF</li>
                                    <li>No file size limit</li>
                                    <li>Professional headshot or portrait works best</li>
                                    <li>Leave empty to keep current image or skip upload</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resume/CV Section -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Resume/CV
            </h3>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    CV File (Optional)
                </label>
                
                @if($banner->cv_file)
                    <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                        <p class="text-sm font-medium text-gray-700 mb-3">Current CV File:</p>
                        <div class="flex items-center space-x-3">
                            <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ asset('storage/' . $banner->cv_file) }}" 
                               target="_blank" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                View Current CV
                            </a>
                        </div>
                    </div>
                @endif
                
                <div class="relative">
                    <input type="file" 
                           name="cv_file" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                           accept=".pdf,.doc,.docx">
                </div>
                
                <div class="mt-2 p-3 bg-purple-50 border border-purple-200 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 text-purple-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-purple-800">CV File Requirements (Optional):</p>
                            <ul class="text-sm text-purple-700 mt-1 list-disc list-inside space-y-1">
                                <li>Formats: PDF, DOC, DOCX</li>
                                <li>Maximum file size: 5MB</li>
                                <li>Keep it updated with your latest experience</li>
                                <li>Professional formatting recommended</li>
                                <li>Leave empty to keep current file or skip upload</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Preview -->
        @if($banner->title_line1 || $banner->title_line2 || $banner->subtitle)
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Banner Preview
                </h3>
                
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                    @if($banner->title_line1)
                        <h1 class="text-3xl font-bold text-gray-900">{{ $banner->title_line1 }}</h1>
                    @endif
                    @if($banner->title_line2)
                        <h2 class="text-2xl font-semibold text-gray-700 mt-2">{{ $banner->title_line2 }}</h2>
                    @endif
                    @if($banner->subtitle)
                        <p class="text-gray-600 mt-4 text-lg">{{ $banner->subtitle }}</p>
                    @endif
                </div>
            </div>
        @endif
    </x-forms.admin-form>
</div>
@endsection 
