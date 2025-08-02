@extends('layouts.admin')

@section('title', 'View Contact Message')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-text">View Contact Message</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.contact-messages.index') }}" 
                   class="bg-muted text-text px-4 py-2 rounded hover:bg-muted/80 transition">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-text mb-3">Contact Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <span class="font-semibold text-text">Name:</span>
                            <p class="text-muted">{{ $contactMessage->name }}</p>
                        </div>
                        
                        <div>
                            <span class="font-semibold text-text">Email:</span>
                            <p class="text-muted">{{ $contactMessage->email }}</p>
                        </div>
                        
                        @if($contactMessage->phone)
                            <div>
                                <span class="font-semibold text-text">Phone:</span>
                                <p class="text-muted">{{ $contactMessage->phone }}</p>
                            </div>
                        @endif
                        
                        <div>
                            <span class="font-semibold text-text">Status:</span>
                            <select id="status-select" class="ml-2 px-3 py-1 border border-muted rounded bg-background text-text">
                                <option value="unread" {{ $contactMessage->status === 'unread' ? 'selected' : '' }}>Unread</option>
                                <option value="read" {{ $contactMessage->status === 'read' ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $contactMessage->status === 'replied' ? 'selected' : '' }}>Replied</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-text mb-3">Message</h3>
                    <div class="bg-muted p-4 rounded-lg">
                        <div class="text-muted whitespace-pre-wrap">{{ $contactMessage->message }}</div>
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-muted">
                        <div class="grid grid-cols-1 gap-4 text-sm">
                            <div>
                                <span class="font-semibold text-text">Received:</span>
                                <span class="text-muted">{{ $contactMessage->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-semibold text-text">Last Updated:</span>
                                <span class="text-muted">{{ $contactMessage->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-muted">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <a href="mailto:{{ $contactMessage->email }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Reply via Email
                        </a>
                        @if($contactMessage->phone)
                            <a href="tel:{{ $contactMessage->phone }}" 
                               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                Call
                            </a>
                        @endif
                    </div>
                    
                    <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" 
                          method="POST" class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('status-select').addEventListener('change', function() {
    const status = this.value;
    const messageId = {{ $contactMessage->id }};
    
    fetch(`/admin/contact-messages/${messageId}/status`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            alert('Status updated successfully');
        } else {
            alert('Failed to update status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update status');
    });
});
</script>
@endsection 