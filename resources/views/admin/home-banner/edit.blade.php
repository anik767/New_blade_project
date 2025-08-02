@extends('layouts.admin')
@section('title', 'Edit Home Banner')

@section('content')
    <x-admin-form 
        :action="route('admin.home-banner.update')" 
        title="Edit Home Banner"
        submit-text="Update Banner"
        method="PUT"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Title Line 1" 
                name="title_line1" 
                required 
                placeholder="Enter first line of title"
                :value="$banner->title_line1"
            />
            
            <x-form-field 
                label="Title Line 2" 
                name="title_line2" 
                required 
                placeholder="Enter second line of title"
                :value="$banner->title_line2"
            />
        </div>
        
        <x-form-field 
            label="Subtitle" 
            name="subtitle" 
            type="textarea" 
            required 
            placeholder="Enter subtitle text..."
            :value="$banner->subtitle"
        />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    CV File (PDF/DOC)
                </label>
                
                @if($banner->cv_file)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Current CV</p>
                                    <p class="text-xs text-gray-500">{{ basename($banner->cv_file) }}</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $banner->cv_file) }}" 
                               target="_blank" 
                               class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                View
                            </a>
                        </div>
                    </div>
                @endif
                
                <div class="relative">
                    <input type="file" 
                           name="cv_file" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           accept=".pdf,.doc,.docx">
                    <p class="mt-2 text-sm text-gray-500">Upload a new CV file to replace the current one (PDF, DOC, DOCX)</p>
                </div>
            </div>
            
            <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Background Image
                </label>
                
                @if($banner->background_image)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <p class="text-sm font-medium text-gray-900 mb-3">Current Background:</p>
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $banner->background_image) }}" 
                                 alt="Current background image" 
                                 class="w-full h-48 object-cover rounded-lg border shadow-sm">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-200 rounded-lg flex items-center justify-center">
                                <a href="{{ asset('storage/' . $banner->background_image) }}" 
                                   target="_blank" 
                                   class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 inline-flex items-center px-3 py-2 bg-white text-gray-900 rounded-md hover:bg-gray-100 text-sm font-medium">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View Full Size
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="relative">
                    <input type="file" 
                           name="background_image" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           accept="image/*">
                    <p class="mt-2 text-sm text-gray-500">Upload a new background image to replace the current one (JPG, PNG, GIF)</p>
                </div>
            </div>
        </div>
        
        <div class="space-y-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Person Image
            </label>
            
            @if($banner->person_image)
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <p class="text-sm font-medium text-gray-900 mb-3">Current Person Image:</p>
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $banner->person_image) }}" 
                             alt="Current person image" 
                             class="w-48 h-48 object-cover rounded-lg border shadow-sm">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <a href="{{ asset('storage/' . $banner->person_image) }}" 
                               target="_blank" 
                               class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 inline-flex items-center px-3 py-2 bg-white text-gray-900 rounded-md hover:bg-gray-100 text-sm font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Full Size
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="relative">
                <input type="file" 
                       name="person_image" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       accept="image/*">
                <p class="mt-2 text-sm text-gray-500">Upload a new person image to replace the current one (JPG, PNG, GIF)</p>
            </div>
        </div>
    </x-admin-form>
@endsection
