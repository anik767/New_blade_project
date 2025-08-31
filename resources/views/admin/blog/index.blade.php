@extends('layouts.admin')
@section('title', 'All Blog Posts')

@section('content')
<x-admin.data-table
    title="All Blog Posts"
    description="Manage your blog content and articles"
    icon='<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>'
    iconColor="green"
    :createRoute="route('admin.blog.create')"
    createText="Create New Post"
    :items="$posts"
    :columns="[
        ['label' => 'Image'],
        ['label' => 'Title'],
        ['label' => 'Content'],
        ['label' => 'Created'],
        ['label' => 'Actions']
    ]"
    emptyMessage="No blog posts found"
    emptyDescription="Get started by creating your first blog post."
    emptyActionText="Create First Post"
    :emptyActionRoute="route('admin.blog.create')"
    :pagination="$posts"
    :successMessage="session('success')"
>
    @forelse ($posts as $post)
        <tr class="hover:bg-gray-50 transition-colors duration-200">
            <td class="px-6 py-4 whitespace-nowrap">
                @if($post->image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $post->image) }}"
                             alt="Blog image for {{ $post->title }}"
                             class="w-full h-16 object-cover rounded-lg border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200"
                             style="aspect-ratio: 16/9; object-position: center;">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                @else
                    <div class="w-full h-16 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-semibold text-gray-900">{{ $post->title }}</div>
                <div class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</div>
            </td>
            <td class="px-6 py-4">
                <div class="max-w-xs">
                    <p class="text-sm text-gray-900 truncate" title="{{ strip_tags($post->content) }}">
                        {{ Str::limit(strip_tags($post->content), 80) }}
                    </p>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $post->created_at->diffForHumans() }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.blog.edit', $post->id) }}"
                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs font-medium transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this blog post?');"
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
