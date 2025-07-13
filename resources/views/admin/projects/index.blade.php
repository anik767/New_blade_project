@extends('layouts.admin')
@section('title', 'All Projects')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">All Projects</h1>

    <a href="{{ route('admin.projects.create') }}"
       class="inline-block mb-4 px-5 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
        + Create New Project
    </a>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow-sm">
        <table class="min-w-full bg-white border border-gray-200 text-sm text-gray-800">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 border">Image</th>
                    <th class="px-4 py-3 border">Title</th>
                    <th class="px-4 py-3 border">GitHub</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 border">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}"
                                     alt="Project image for {{ $project->title }}"
                                     class="w-12 h-12 rounded object-cover">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border font-medium">{{ $project->title }}</td>
                        <td class="px-2 py-3 border whitespace-normal break-words max-w-[200px]">
                            @if ($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" rel="noopener noreferrer"
                                   class="text-blue-600 hover:underline focus:outline-none focus:ring-1 focus:ring-blue-400">
                                    View Link
                                </a>
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        
                        <td class="px-4 py-3 border">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-1 focus:ring-red-500 text-sm transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500 italic border">
                            No projects found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</div>
@endsection
