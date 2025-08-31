@extends('layouts.admin')
@section('title', 'All Services')

@section('content')
<x-admin.data-table
    title="All Services"
    description="Manage your portfolio services and offerings"
    icon='<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>'
    iconColor="blue"
    :createRoute="route('admin.services.create')"
    createText="Create New Service"
    :items="$services"
    :columns="[
        ['label' => 'Image'],
        ['label' => 'Title'],
        ['label' => 'Description'],
        ['label' => 'Icon'],
        ['label' => 'Status'],
        ['label' => 'Created'],
        ['label' => 'Actions']
    ]"
    emptyMessage="No services found"
    emptyDescription="Get started by creating your first service."
    emptyActionText="Create First Service"
    :emptyActionRoute="route('admin.services.create')"
    :pagination="$services"
    :successMessage="session('success')"
>
    @forelse ($services as $service)
        <tr class="hover:bg-gray-50 transition-colors duration-200">
            <td class="px-6 py-4 whitespace-nowrap">
                @if($service->image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->title }}" 
                             class="w-28 h-16 object-cover rounded-lg border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200"
                             style="aspect-ratio: 16/9; object-position: center;">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                @else
                    <div class="w-28 h-16 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-semibold text-gray-900">{{ $service->title }}</div>
                <div class="text-sm text-gray-500">{{ $service->created_at->format('M d, Y') }}</div>
            </td>
            <td class="px-6 py-4">
                <div class="max-w-xs">
                    <p class="text-sm text-gray-900 truncate" title="{{ $service->description }}">
                        {{ Str::limit($service->description, 80) }}
                    </p>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($service->icon)
                    <div class="flex items-center">
                        <span class="text-2xl mr-2">{{ $service->icon }}</span>
                        <span class="text-xs text-gray-500">{{ $service->icon }}</span>
                    </div>
                @else
                    <span class="text-gray-400 italic text-sm">No Icon</span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($service->is_active)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Inactive
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $service->created_at->diffForHumans() }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('services.show', $service->slug) }}" target="_blank"
                       class="inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-md hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 text-xs font-medium transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View
                    </a>
                    <a href="{{ route('admin.services.edit', $service->id) }}"
                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs font-medium transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this service?');"
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
