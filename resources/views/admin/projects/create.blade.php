@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Create Post</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block">Title:</label>
            <input type="text" name="title" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label class="block">Description:</label>
            <textarea name="description" rows="6" class="w-full border p-2" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
