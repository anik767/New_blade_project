@extends('layouts.admin')
@section('title', 'Comment Detail')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Comment Detail</h1>
            <div class="flex items-center space-x-2">
                <form method="POST" action="{{ route('admin.comments.update-status', $comment) }}" class="flex items-center space-x-2">
                    @csrf
                    @method('PUT')
                    <select name="status" class="border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="approved" {{ $comment->is_approved ? 'selected' : '' }}>Approved</option>
                        <option value="pending" {{ !$comment->is_approved ? 'selected' : '' }}>Pending</option>
                    </select>
                    <button class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md text-sm hover:bg-blue-200">Update</button>
                </form>
                <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}" onsubmit="return confirm('Delete this comment?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1.5 bg-red-100 text-red-700 rounded-md text-sm hover:bg-red-200">Delete</button>
                </form>
            </div>
        </div>
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Author</h2>
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="text-gray-900 font-semibold">{{ $comment->name }}</div>
                    <div class="text-gray-600">{{ $comment->email }}</div>
                </div>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Status</h2>
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    @if($comment->is_approved)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Approved</span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                    @endif
                </div>
            </div>
            <div class="md:col-span-2">
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">On</h2>
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="text-gray-900 font-semibold">
                        @if($comment->commentable)
                            {{ class_basename($comment->commentable_type) }}: {{ $comment->commentable->title ?? 'N/A' }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="text-gray-600 text-sm mt-1">Posted: {{ $comment->created_at->format('M d, Y g:i A') }}</div>
                </div>
            </div>
            <div class="md:col-span-2">
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Comment</h2>
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-gray-800 leading-relaxed">{{ $comment->comment }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection