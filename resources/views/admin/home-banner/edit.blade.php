@extends('layouts.admin')
@section('title', 'Edit Home Banner')

@section('content')
    <x-admin-form 
        :action="route('admin.home.update')" 
        title="Edit Home Banner"
        submit-text="Update Banner"
        method="POST"
        enctype="multipart/form-data"
    >
        <!-- Title Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Title Line 1" 
                name="title_line1" 
                placeholder="e.g., Hi, I'm John Doe"
                :value="$banner->title_line1"
            />
            
            <x-form-field 
                label="Title Line 2" 
                name="title_line2" 
                placeholder="e.g., Full Stack Developer"
                :value="$banner->title_line2"
            />
        </div>
        
        <x-form-field 
            label="Subtitle" 
            name="subtitle" 
            type="textarea" 
            placeholder="A brief description about yourself and what you do..."
            :value="$banner->subtitle"
        />
        
        <!-- Images Section -->
        <div class="border-t border-gray-200 pt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Images</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-form-field 
                        label="Background Image" 
                        name="background_image" 
                        type="file"
                        help="Upload a background image for the banner (recommended: 1920x1080px)"
                    />
                    @if($banner->background_image)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Current background image:</p>
                            <img src="{{ asset('storage/' . $banner->background_image) }}" 
                                 alt="Current background" 
                                 class="mt-2 w-32 h-20 object-cover rounded border">
                        </div>
                    @endif
                </div>
                
                <div>
                    <x-form-field 
                        label="Person Image" 
                        name="person_image" 
                        type="file"
                        help="Upload your profile photo (recommended: 400x400px)"
                    />
                    @if($banner->person_image)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Current person image:</p>
                            <img src="{{ asset('storage/' . $banner->person_image) }}" 
                                 alt="Current person" 
                                 class="mt-2 w-32 h-20 object-cover rounded border">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- CV Section -->
        <div class="border-t border-gray-200 pt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Resume/CV</h3>
            
            <x-form-field 
                label="CV File" 
                name="cv_file" 
                type="file"
                help="Upload your CV/resume (PDF, DOC, DOCX - max 5MB)"
            />
            
            @if($banner->cv_file)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Current CV file:</p>
                    <a href="{{ asset('storage/' . $banner->cv_file) }}" 
                       target="_blank" 
                       class="text-blue-600 hover:text-blue-800 text-sm">
                        View current CV
                    </a>
                </div>
            @endif
        </div>
        
        <!-- Preview Section -->
        @if($banner->title_line1 || $banner->title_line2 || $banner->subtitle)
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Current Banner Preview</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    @if($banner->title_line1)
                        <h1 class="text-2xl font-bold text-gray-900">{{ $banner->title_line1 }}</h1>
                    @endif
                    @if($banner->title_line2)
                        <h2 class="text-xl font-semibold text-gray-700 mt-1">{{ $banner->title_line2 }}</h2>
                    @endif
                    @if($banner->subtitle)
                        <p class="text-gray-600 mt-2">{{ $banner->subtitle }}</p>
                    @endif
                </div>
            </div>
        @endif
    </x-admin-form>
@endsection 