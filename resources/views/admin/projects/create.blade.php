@extends('layouts.admin')
@section('title', "Create New Project")
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Create Project</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title:</label>
            <input type="text" name="title" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Description:</label>
            <textarea name="description" rows="6" class="w-full border border-gray-300 p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">GitHub Link (optional):</label>
            <input type="url" name="github_link" class="w-full border border-gray-300 p-2 rounded" placeholder="https://github.com/your-repo">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Project Image (optional):</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Create
        </button>
    </form>
</div>
@endsection
