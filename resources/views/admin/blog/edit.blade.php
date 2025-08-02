@extends('layouts.admin')
@section('title', "Edit Blog Post - {$blog->title}")

@section('content')
    <x-admin-form 
        :action="route('admin.blog.update', $blog->id)" 
        title="Edit Blog Post"
        submit-text="Update Post"
        method="PUT"
        :cancel-url="route('admin.blog.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Post Title" 
                name="title" 
                required 
                placeholder="Enter blog post title"
                :value="$blog->title"
            />
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Featured Image
                </label>
                
                @if($blog->image)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             alt="Current blog image" 
                             class="w-40 h-auto border rounded shadow">
                    </div>
                @endif
                
                <input type="file" 
                       name="image" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       accept="image/*">
                
                <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one (max 2MB, JPG, PNG, GIF)</p>
            </div>
        </div>
        
        <x-form-field 
            label="Content" 
            name="content" 
            type="textarea" 
            required 
            placeholder="Write your blog post content here..."
            help="You can use HTML tags for formatting"
            :value="$blog->content"
        />
    </x-admin-form>
@endsection
