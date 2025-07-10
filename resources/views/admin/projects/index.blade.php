@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold mb-4">All Posts</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">Create New Post</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="border px-4 py-2">{{ $project->title }}</td> <!-- Use $project here -->
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf <!-- Fix the typo -->
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this project?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
