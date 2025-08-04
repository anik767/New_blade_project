@extends('layouts.admin')

@section('title', 'View Service')

@section('content')
<div class="p-6">
    <div>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-text">View Service</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.services.edit', $service->id) }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Edit
                </a>
                <a href="{{ route('admin.services.index') }}" 
                   class="bg-muted text-text px-4 py-2 rounded hover:bg-muted/80 transition">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @if($service->image)
                    <div>
                        <h3 class="text-lg font-semibold text-text mb-3">Image</h3>
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <div>
                    <div class="flex items-center mb-4">
                        @if($service->icon)
                            <span class="text-4xl mr-4">{{ $service->icon }}</span>
                        @endif
                        <h3 class="text-lg font-semibold text-text">Title</h3>
                    </div>
                    <p class="text-muted mb-6">{{ $service->title }}</p>

                    <h3 class="text-lg font-semibold text-text mb-3">Description</h3>
                    <div class="text-muted mb-6 whitespace-pre-wrap">{{ $service->description }}</div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <span class="font-semibold text-text">Display Order:</span>
                            <span class="text-muted">{{ $service->order }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-text">Status:</span>
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-muted">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="font-semibold text-text">Created:</span>
                                <span class="text-muted">{{ $service->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-semibold text-text">Updated:</span>
                                <span class="text-muted">{{ $service->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 