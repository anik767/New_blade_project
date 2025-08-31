@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Create New Post</h1>
            <a href="{{ route('admin.posts.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                Back to Posts
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                {{-- Post Type Selection --}}
                <div class="mb-6">
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Post Type *</label>
                    <select name="type" id="type" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Post Type</option>
                        <option value="project" {{ old('type') === 'project' ? 'selected' : '' }}>Project</option>
                        <option value="blog" {{ old('type') === 'blog' ? 'selected' : '' }}>Blog Post</option>
                        <option value="service" {{ old('type') === 'service' ? 'selected' : '' }}>Service</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter post title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content" rows="8" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Enter post content">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Project-specific fields --}}
                <div id="project-fields" class="mb-6 hidden">
                    <div class="mb-4">
                        <label for="github_link" class="block text-sm font-medium text-gray-700 mb-2">GitHub Link</label>
                        <input type="url" name="github_link" id="github_link" value="{{ old('github_link') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="https://github.com/username/repository">
                        @error('github_link')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Service-specific fields --}}
                <div id="service-fields" class="mb-6 hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon (CSS class or emoji)</label>
                            <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="fas fa-code or 🚀">
                            @error('icon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                            <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const projectFields = document.getElementById('project-fields');
    const serviceFields = document.getElementById('service-fields');

    function toggleFields() {
        const selectedType = typeSelect.value;
        
        // Hide all type-specific fields
        projectFields.classList.add('hidden');
        serviceFields.classList.add('hidden');
        
        // Show relevant fields based on selection
        if (selectedType === 'project') {
            projectFields.classList.remove('hidden');
        } else if (selectedType === 'service') {
            serviceFields.classList.remove('hidden');
        }
    }

    typeSelect.addEventListener('change', toggleFields);
    
    // Initialize on page load
    toggleFields();
});
</script>
@endsection 