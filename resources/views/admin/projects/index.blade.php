@extends('layouts.admin')
@section('title', 'All Projects')

@section('content')
<x-admin.data-table
    title="All Projects"
    description="Manage your portfolio projects and showcase your work"
    icon='<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>'
    iconColor="purple"
    :createRoute="route('admin.projects.create')"
    createText="Create New Project"
    :items="$projects"
    :columns="[
        ['label' => 'Image'],
        ['label' => 'Title'],
        ['label' => 'Description'],
        ['label' => 'GitHub'],
        ['label' => 'Created'],
        ['label' => 'Actions']
    ]"
    emptyMessage="No projects found"
    emptyDescription="Get started by creating your first project."
    emptyActionText="Create First Project"
    :emptyActionRoute="route('admin.projects.create')"
    :pagination="$projects"
    :successMessage="session('success')"
>
    @forelse ($projects as $project)
        <tr class="hover:bg-gray-50 transition-colors duration-200">
            <td class="px-6 py-4 whitespace-nowrap">
                @if($project->image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $project->image) }}"
                             alt="Project image for {{ $project->title }}"
                             class="min-w-28 h-16 w-full object-cover rounded-lg border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200"
                             style="aspect-ratio: 16/9; object-position: center;">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                @else
                    <div class="min-w-28 h-16 w-full bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-semibold text-gray-900">{{ $project->title }}</div>
                <div class="text-sm text-gray-500">{{ $project->created_at->format('M d, Y') }}</div>
            </td>
            <td class="px-6 py-4">
                <div class="max-w-xs">
                    <p class="text-sm text-gray-900 truncate" title="{{ $project->description }}">
                        {{ Str::limit($project->description, 80) }}
                    </p>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if ($project->github_link)
                    <a href="{{ $project->github_link }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 text-xs font-medium transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        View on GitHub
                    </a>
                @else
                    <span class="text-gray-400 italic text-sm">No Link</span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $project->created_at->diffForHumans() }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs font-medium transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this project?');"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-md hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs font-medium transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <!-- Empty state is handled by the component -->
    @endforelse
</x-admin.data-table>
@endsection
