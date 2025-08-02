@extends('layouts.admin')
@section('title', 'Create New Blog Post')

@section('content')
    <x-admin-form 
        :action="route('admin.blog.store')" 
        title="Create New Blog Post"
        submit-text="Create Post"
        :cancel-url="route('admin.blog.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Post Title" 
                name="title" 
                required 
                placeholder="Enter blog post title"
            />
            
            <x-form-field 
                label="Featured Image" 
                name="image" 
                type="file" 
                help="Upload a featured image for your blog post (max 2MB, JPG, PNG, GIF)"
                accept="image/*"
            />
        </div>
        
        <x-form-field 
            label="Content" 
            name="content" 
            type="textarea" 
            required 
            placeholder="Write your blog post content here..."
            help="You can use HTML tags for formatting"
        />
    </x-admin-form>
@endsection
