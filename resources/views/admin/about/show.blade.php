@extends('layouts.admin')

@section('title', 'View About Me')

@section('content')
<div class="p-6">
    <div>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-text">View About Me</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.about-me.edit', $aboutMe->id) }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Edit
                </a>
                <a href="{{ route('admin.about-me.index') }}" 
                   class="bg-muted text-text px-4 py-2 rounded hover:bg-muted/80 transition">
                    Back to List
                </a>
            </div>
        </div>

        <div class=" rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @if($aboutMe->image)
                    <div>
                        <h3 class="text-lg font-semibold text-text mb-3">Image</h3>
                        <img src="{{ asset('storage/' . $aboutMe->image) }}" 
                             alt="{{ $aboutMe->title }}" 
                             class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-text mb-3">Title</h3>
                    <p class="text-muted mb-6">{{ $aboutMe->title }}</p>

                    <h3 class="text-lg font-semibold text-text mb-3">Content</h3>
                    <div class="text-muted mb-6 whitespace-pre-wrap">{{ $aboutMe->content }}</div>

                    @if($aboutMe->skills)
                        <h3 class="text-lg font-semibold text-text mb-3">Skills</h3>
                        <p class="text-muted mb-6">{{ $aboutMe->skills }}</p>
                    @endif

                    @if($aboutMe->experience)
                        <h3 class="text-lg font-semibold text-text mb-3">Experience</h3>
                        <p class="text-muted mb-6">{{ $aboutMe->experience }}</p>
                    @endif

                    @if($aboutMe->education)
                        <h3 class="text-lg font-semibold text-text mb-3">Education</h3>
                        <p class="text-muted mb-6">{{ $aboutMe->education }}</p>
                    @endif

                    <div class="mt-6 pt-6 border-t border-muted">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="font-semibold text-text">Status:</span>
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $aboutMe->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $aboutMe->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            <div>
                                <span class="font-semibold text-text">Created:</span>
                                <span class="text-muted">{{ $aboutMe->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-semibold text-text">Updated:</span>
                                <span class="text-muted">{{ $aboutMe->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 