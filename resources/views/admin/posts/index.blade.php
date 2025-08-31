@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Posts Management</h1>
        <a href="{{ route('admin.posts.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
            Create New Post
        </a>
    </div>

    {{-- Filter Tabs --}}
    <div class="mb-6">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                <a href="{{ route('admin.posts.index', ['type' => 'all']) }}" 
                   class="py-2 px-1 border-b-2 font-medium text-sm {{ $type === 'all' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    All Posts ({{ \App\Models\Post::count() }})
                </a>
                <a href="{{ route('admin.posts.index', ['type' => 'project']) }}" 
                   class="py-2 px-1 border-b-2 font-medium text-sm {{ $type === 'project' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    Projects ({{ \App\Models\Post::projects()->count() }})
                </a>
                <a href="{{ route('admin.posts.index', ['type' => 'blog']) }}" 
                   class="py-2 px-1 border-b-2 font-medium text-sm {{ $type === 'blog' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    Blog Posts ({{ \App\Models\Post::blogPosts()->count() }})
                </a>
                <a href="{{ route('admin.posts.index', ['type' => 'service']) }}" 
                   class="py-2 px-1 border-b-2 font-medium text-sm {{ $type === 'service' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    Services ({{ \App\Models\Post::services()->count() }})
                </a>
            </nav>
        </div>
    </div>

    {{-- Posts Table --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $post->type === 'project' ? 'bg-purple-100 text-purple-800' : 
                               ($post->type === 'blog' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                            {{ ucfirst($post->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
                        <div class="text-sm text-gray-500">{{ $post->slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="h-12 w-12 rounded-lg object-cover">
                        @else
                            <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Image</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($post->type === 'service')
                            <button onclick="toggleStatus({{ $post->id }})" 
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $post->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $post->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        @else
                            <span class="text-gray-400">N/A</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.posts.show', $post) }}" 
                               class="text-blue-600 hover:text-blue-900">View</a>
                            <a href="{{ route('admin.posts.edit', $post) }}" 
                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No posts found for the selected type.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $posts->appends(['type' => $type])->links() }}
    </div>
</div>

<script>
function toggleStatus(postId) {
    fetch(`/admin/posts/${postId}/toggle-status`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the status.');
    });
}
</script>
@endsection 