@extends('layouts.admin')

@section('title', 'View Contact')

@section('content')
<div class="p-6">
    <div>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-black">View Contact</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.contacts.edit', $contact->id) }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Edit
                </a>
                <a href="{{ route('admin.contacts.index') }}" 
                   class="bg-muted text-black px-4 py-2 rounded hover:bg-muted/80 transition">
                    Back to List
                </a>
            </div>
        </div>

        <div class=" rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-black mb-3">Title</h3>
                    <p class="text-muted mb-6">{{ $contact->title }}</p>

                    <h3 class="text-lg font-semibold text-black mb-3">Content</h3>
                    <div class="text-muted mb-6 whitespace-pre-wrap">{{ $contact->content }}</div>

                    <h3 class="text-lg font-semibold text-black mb-3">Email</h3>
                    <p class="text-muted mb-6">{{ $contact->email }}</p>

                    @if($contact->phone)
                        <h3 class="text-lg font-semibold text-black mb-3">Phone</h3>
                        <p class="text-muted mb-6">{{ $contact->phone }}</p>
                    @endif

                    @if($contact->address)
                        <h3 class="text-lg font-semibold text-black mb-3">Address</h3>
                        <p class="text-muted mb-6 whitespace-pre-wrap">{{ $contact->address }}</p>
                    @endif

                    @if($contact->social_links)
                        <h3 class="text-lg font-semibold text-black mb-3">Social Links</h3>
                        <div class="text-muted mb-6">
                            <pre class="bg-muted p-3 rounded text-sm overflow-x-auto">{{ $contact->social_links }}</pre>
                        </div>
                    @endif
                </div>

                <div>
                    <div class="mt-6 pt-6 border-t border-muted">
                        <div class="grid grid-cols-1 gap-4 text-sm">
                            <div>
                                <span class="font-semibold text-black">Status:</span>
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $contact->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $contact->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            <div>
                                <span class="font-semibold text-black">Created:</span>
                                <span class="text-muted">{{ $contact->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-semibold text-black">Updated:</span>
                                <span class="text-muted">{{ $contact->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
