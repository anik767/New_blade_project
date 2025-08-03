@extends('layouts.admin')
@section('title', 'Create About Me Content')

@section('content')
    <x-admin-form 
        :action="route('admin.about-me.store')" 
        title="Create About Me Content"
        submit-text="Create Content"
        :cancel-url="route('admin.about-me.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Name" 
                name="name" 
                required 
                placeholder="Your full name"
            />
            
            <x-form-field 
                label="Title" 
                name="title" 
                placeholder="e.g., Full Stack Developer"
                help="Your professional title or role"
            />
        </div>
        
        <x-form-field 
            label="Profile Image" 
            name="image" 
            type="file" 
            help="Upload your profile picture (max 2MB, JPG, PNG, GIF)"
            accept="image/*"
        />
        
        <x-form-field 
            label="About Me" 
            name="content" 
            type="textarea" 
            required 
            placeholder="Tell visitors about yourself, your skills, experience, and what you do..."
            help="You can use HTML tags for formatting"
        />
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-form-field 
                label="Email" 
                name="email" 
                type="email" 
                placeholder="your.email@example.com"
            />
            
            <x-form-field 
                label="Phone" 
                name="phone" 
                placeholder="+1 234 567 8900"
            />
            
            <x-form-field 
                label="Location" 
                name="location" 
                placeholder="City, Country"
            />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="LinkedIn" 
                name="linkedin" 
                type="url" 
                placeholder="https://linkedin.com/in/yourprofile"
            />
            
            <x-form-field 
                label="GitHub" 
                name="github" 
                type="url" 
                placeholder="https://github.com/yourusername"
            />
        </div>
    </x-admin-form>
@endsection 