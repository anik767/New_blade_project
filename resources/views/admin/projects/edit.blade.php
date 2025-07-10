@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Post</h1>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block">Title:</label>
            <input type="text" name="title" value="{{ $project->title }}" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label class="block">Description:</label>
            <textarea name="description" rows="6" class="w-full border p-2" required>{{ $project->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
