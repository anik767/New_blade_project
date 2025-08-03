@extends('layouts.admin')
@section('title', 'Contact Information')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Contact Information</h1>

    <a href="{{ route('admin.contacts.create') }}"
       class="inline-block mb-4 px-5 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
        + Create New Contact
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
                    <th class="px-4 py-3 border">Email</th>
                    <th class="px-4 py-3 border">Phone</th>
                    <th class="px-4 py-3 border">City</th>
                    <th class="px-4 py-3 border">LinkedIn</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 border font-medium">{{ $contact->email ?? 'N/A' }}</td>
                        <td class="px-4 py-3 border">{{ $contact->phone ?? 'N/A' }}</td>
                        <td class="px-4 py-3 border">{{ $contact->city ?? 'N/A' }}</td>
                        <td class="px-4 py-3 border">
                            @if($contact->linkedin)
                                <a href="{{ $contact->linkedin }}" target="_blank" rel="noopener noreferrer"
                                   class="text-blue-600 hover:underline focus:outline-none focus:ring-1 focus:ring-blue-400">
                                    View Link
                                </a>
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.contacts.edit', $contact->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this contact?');">
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
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500 italic border">
                            No contact information found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Smart Pagination --}}
    @php
        $totalPages = $contacts->lastPage();
        $currentPage = $contacts->currentPage();

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
        @if ($contacts->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $contacts->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Previous</a>
        @endif

        {{-- First page --}}
        @if ($pageStart > 1)
            <a href="{{ $contacts->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">1</a>
            @if ($pageStart > 2)
                <span class="px-2 py-2">...</span>
            @endif
        @endif

        {{-- Page window --}}
        @for ($i = $pageStart; $i <= $pageEnd; $i++)
            @if ($i == $currentPage)
                <span class="px-4 py-2 bg-green-800 text-white rounded">{{ $i }}</span>
            @else
                <a href="{{ $contacts->url($i) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $i }}</a>
            @endif
        @endfor

        {{-- Last page --}}
        @if ($pageEnd < $totalPages)
            @if ($pageEnd < $totalPages - 1)
                <span class="px-2 py-2">...</span>
            @endif
            <a href="{{ $contacts->url($totalPages) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $totalPages }}</a>
        @endif

        {{-- Next --}}
        @if ($contacts->hasMorePages())
            <a href="{{ $contacts->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Next</a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-700 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
</div>
@endsection 