@extends('layouts.admin')
@section('title', 'Create New Project')

@section('content')
    <x-admin-form 
        :action="route('admin.projects.store')" 
        title="Create New Project"
        submit-text="Create Project"
        :cancel-url="route('admin.projects.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Project Title" 
                name="title" 
                required 
                placeholder="Enter project title"
            />
            
            <x-form-field 
                label="GitHub Link" 
                name="github_link" 
                type="url" 
                placeholder="https://github.com/username/repo"
                help="Optional: Link to the project's GitHub repository"
            />
        </div>
        
        <x-form-field 
            label="Description" 
            name="description" 
            type="textarea" 
            required 
            placeholder="Describe your project..."
        />
        
        <x-form-field 
            label="Project Image" 
            name="image" 
            type="file" 
            help="Upload an image for your project (max 2MB, JPG, PNG, GIF)"
            accept="image/*"
        />
    </x-admin-form>
@endsection
