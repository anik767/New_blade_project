@extends('layouts.admin')
@section('title', 'Edit About Me')

@section('content')
    <x-admin-form 
        :action="route('admin.about-me.update')" 
        title="Edit About Me"
        submit-text="Update About Me"
        method="POST"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Name" 
                name="name" 
                required 
                placeholder="Enter your full name"
                :value="$aboutMe->name"
            />
            
            <x-form-field 
                label="Title/Position" 
                name="title" 
                placeholder="e.g., Full Stack Developer"
                :value="$aboutMe->title"
            />
        </div>
        
        <x-form-field 
            label="About Me Content" 
            name="content" 
            type="textarea" 
            required 
            placeholder="Tell visitors about yourself, your experience, and what you do..."
            :value="$aboutMe->content"
        />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Email" 
                name="email" 
                type="email"
                placeholder="your.email@example.com"
                :value="$aboutMe->email"
            />
            
            <x-form-field 
                label="Phone" 
                name="phone" 
                placeholder="+1 (555) 123-4567"
                :value="$aboutMe->phone"
            />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Location" 
                name="location" 
                placeholder="City, Country"
                :value="$aboutMe->location"
            />
            
            <x-form-field 
                label="LinkedIn URL" 
                name="linkedin" 
                type="url"
                placeholder="https://linkedin.com/in/yourprofile"
                :value="$aboutMe->linkedin"
            />
        </div>
        
        <div>
            <x-form-field 
                label="GitHub URL" 
                name="github" 
                type="url"
                placeholder="https://github.com/yourusername"
                :value="$aboutMe->github"
            />
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Profile Image
            </label>
            
            @if($aboutMe->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Current Profile Image:</p>
                    <img src="{{ asset('storage/' . $aboutMe->image) }}" 
                         alt="Current profile image" 
                         class="w-40 h-auto border rounded shadow">
                </div>
            @endif
            
            <input type="file" 
                   name="image" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   accept="image/*">
            
            <p class="mt-1 text-sm text-gray-500">Upload a new profile image to replace the current one (JPG, PNG, GIF)</p>
        </div>
    </x-admin-form>
@endsection 