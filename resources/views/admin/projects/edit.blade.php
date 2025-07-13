@extends('layouts.admin')
@section('title', "Project Edit - {$project->title}")
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Project</h1>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title:</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Description:</label>
            <textarea name="description" rows="6" class="w-full border border-gray-300 p-2 rounded" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">GitHub Link (optional):</label>
            <input type="url" name="github_link" value="{{ old('github_link', $project->github_link) }}" class="w-full border border-gray-300 p-2 rounded" placeholder="https://github.com/your-repo">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Project Image (optional):</label>
            <input type="file" name="image" class="w-full">

            @if($project->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" class="w-40 h-auto border rounded shadow">
                </div>
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
    </form>
</div>
@endsection
