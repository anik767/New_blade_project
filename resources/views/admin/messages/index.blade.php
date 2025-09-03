@extends('layouts.admin')
@section('title', 'Contact Messages')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Contact Messages</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow-sm">
        <table class="min-w-full bg-white border border-gray-200 text-sm text-gray-800">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 border">Name</th>
                    <th class="px-4 py-3 border">Email</th>
                    <th class="px-4 py-3 border">Phone</th>
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border">Date</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 border font-medium">{{ $message->name }}</td>
                        <td class="px-4 py-3 border">
                            <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:underline">
                                {{ $message->email }}
                            </a>
                        </td>
                        <td class="px-4 py-3 border">
                            @if($message->phone)
                                <a href="tel:{{ $message->phone }}" class="text-blue-600 hover:underline">
                                    {{ $message->phone }}
                                </a>
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($message->status === 'unread') bg-red-100 text-red-800
                                @elseif($message->status === 'read') bg-yellow-100 text-yellow-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ ucfirst($message->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border">
                            <div class="text-sm text-gray-600">{{ $message->created_at->format('M d, Y H:i') }}</div>
                        </td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.contact-messages.show', $message->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm transition">
                                    View
                                </a>
                                <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this message?');">
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
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500 italic border">
                            No contact messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Smart Pagination --}}
    @php
        $totalPages = $messages->lastPage();
        $currentPage = $messages->currentPage();

        $pageStart = 1;
        $pageEnd = min(5, $totalPages);

        if ($currentPage > 3 && $totalPages > 5) {
            $pageStart = $currentPage - 2;
            $pageEnd = $currentPage + 2;

            if ($pageEnd > $totalPages) {
                $pageEnd = $totalPages;
                $pageStart = max($totalPages - 4, 1);
            }
        }
    @endphp

    <nav class="mt-6 flex justify-center space-x-2">
        {{-- Previous --}}
        @if ($messages->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $messages->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Previous</a>
        @endif

        {{-- First page --}}
        @if ($pageStart > 1)
            <a href="{{ $messages->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">1</a>
            @if ($pageStart > 2)
                <span class="px-2 py-2">...</span>
            @endif
        @endif

        {{-- Page window --}}
        @for ($i = $pageStart; $i <= $pageEnd; $i++)
            @if ($i == $currentPage)
                <span class="px-4 py-2 bg-green-800 text-white rounded">{{ $i }}</span>
            @else
                <a href="{{ $messages->url($i) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $i }}</a>
            @endif
        @endfor

        {{-- Last page --}}
        @if ($pageEnd < $totalPages)
            @if ($pageEnd < $totalPages - 1)
                <span class="px-2 py-2">...</span>
            @endif
            <a href="{{ $messages->url($totalPages) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $totalPages }}</a>
        @endif

        {{-- Next --}}
        @if ($messages->hasMorePages())
            <a href="{{ $messages->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next</a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
</div>
@endsection 
