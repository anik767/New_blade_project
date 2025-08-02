@extends('layouts.admin')
@section('title', "Edit Project - {$project->title}")

@section('content')
    <x-admin-form 
        :action="route('admin.projects.update', $project->id)" 
        title="Edit Project"
        submit-text="Update Project"
        method="PUT"
        :cancel-url="route('admin.projects.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Project Title" 
                name="title" 
                required 
                placeholder="Enter project title"
                :value="$project->title"
            />
            
            <x-form-field 
                label="GitHub Link" 
                name="github_link" 
                type="url" 
                placeholder="https://github.com/username/repo"
                help="Optional: Link to the project's GitHub repository"
                :value="$project->github_link"
            />
        </div>
        
        <x-form-field 
            label="Description" 
            name="description" 
            type="textarea" 
            required 
            placeholder="Describe your project..."
            :value="$project->description"
        />
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Project Image
            </label>
            
            @if($project->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $project->image) }}" 
                         alt="Current project image" 
                         class="w-40 h-auto border rounded shadow">
                </div>
            @endif
            
            <input type="file" 
                   name="image" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   accept="image/*">
            
            <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one (max 2MB, JPG, PNG, GIF)</p>
        </div>
    </x-admin-form>
@endsection
