@props([
    'title' => '',
    'description' => '',
    'icon' => '',
    'iconColor' => 'blue',
    'createRoute' => '',
    'createText' => 'Create New',
    'items' => collect(),
    'columns' => [],
    'emptyMessage' => 'No items found',
    'emptyDescription' => 'Get started by creating your first item.',
    'emptyActionText' => 'Create First Item',
    'emptyActionRoute' => '',
    'pagination' => null,
    'successMessage' => null
])

@php
    // Define color schemes for different icon colors
    $colorSchemes = [
        'blue' => [
            'bg' => 'bg-gradient-to-r from-blue-600 to-blue-700',
            'hover' => 'hover:from-blue-700 hover:to-blue-800',
            'focus' => 'focus:ring-blue-500',
            'text' => 'text-blue-600',
            'bg_light' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'text_dark' => 'text-blue-700'
        ],
        'green' => [
            'bg' => 'bg-gradient-to-r from-green-600 to-green-700',
            'hover' => 'hover:from-green-700 hover:to-green-800',
            'focus' => 'focus:ring-green-500',
            'text' => 'text-green-600',
            'bg_light' => 'bg-green-50',
            'border' => 'border-green-200',
            'text_dark' => 'text-green-700'
        ],
        'purple' => [
            'bg' => 'bg-gradient-to-r from-purple-600 to-purple-700',
            'hover' => 'hover:from-purple-700 hover:to-purple-800',
            'focus' => 'focus:ring-purple-500',
            'text' => 'text-purple-600',
            'bg_light' => 'bg-purple-50',
            'border' => 'border-purple-200',
            'text_dark' => 'text-purple-700'
        ],
        'red' => [
            'bg' => 'bg-gradient-to-r from-red-600 to-red-700',
            'hover' => 'hover:from-red-700 hover:to-red-800',
            'focus' => 'focus:ring-red-500',
            'text' => 'text-red-600',
            'bg_light' => 'bg-red-50',
            'border' => 'border-red-200',
            'text_dark' => 'text-red-700'
        ],
        'yellow' => [
            'bg' => 'bg-gradient-to-r from-yellow-600 to-yellow-700',
            'hover' => 'hover:from-yellow-700 hover:to-yellow-800',
            'focus' => 'focus:ring-yellow-500',
            'text' => 'text-yellow-600',
            'bg_light' => 'bg-yellow-50',
            'border' => 'border-yellow-200',
            'text_dark' => 'text-yellow-700'
        ],
        'indigo' => [
            'bg' => 'bg-gradient-to-r from-indigo-600 to-indigo-700',
            'hover' => 'hover:from-indigo-700 hover:to-indigo-800',
            'focus' => 'focus:ring-indigo-500',
            'text' => 'text-indigo-600',
            'bg_light' => 'bg-indigo-50',
            'border' => 'border-indigo-200',
            'text_dark' => 'text-indigo-700'
        ]
    ];
    
    $colors = $colorSchemes[$iconColor] ?? $colorSchemes['blue'];
@endphp

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="md:flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 {{ $colors['bg'] }} rounded-2xl mr-6 shadow-lg">
                            {!! $icon !!}
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $title }}</h1>
                            <p class="text-gray-600 text-lg">{{ $description }}</p>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center {{ $colors['bg_light'] }} px-5 py-3 rounded-xl {{ $colors['border'] }}">
                            <svg class="w-5 h-5 mr-3 {{ $colors['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span class="{{ $colors['text_dark'] }} font-medium">{{ $items->count() }} items found</span>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold {{ $colors['text'] }} mb-1">📊</div>
                        <div class="text-sm text-gray-600 font-medium">Total</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-green-600 mb-1">⚡</div>
                        <div class="text-sm text-gray-600 font-medium">Active</div>
                    </div>
                </div>
            </div>
        </div>

        @if ($successMessage)
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl shadow-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-green-800 font-medium">{{ $successMessage }}</span>
                </div>
            </div>
        @endif

        <!-- Data Table -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                    <div class="w-8 h-8 {{ $colors['bg'] }} rounded-xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    {{ $title }} Management
                </h2>
                
                @if($createRoute)
                    <a href="{{ $createRoute }}"
                       class="inline-flex items-center px-6 py-3 {{ $colors['bg'] }} text-white font-semibold rounded-xl {{ $colors['hover'] }} focus:outline-none focus:ring-2 {{ $colors['focus'] }} transition-all duration-200 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        {{ $createText }}
                    </a>
                @endif
            </div>

            @if($items->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                @foreach($columns as $column)
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        {{ $column['label'] }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{ $slot }}
                        </tbody>
                    </table>
                </div>

                {{-- Smart Pagination --}}
                @if($pagination && $pagination->hasPages())
                    <div class="mt-8">
                        @php
                            $totalPages = $pagination->lastPage();
                            $currentPage = $pagination->currentPage();

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

                        <nav class="flex justify-center space-x-2">
                            {{-- Previous --}}
                            @if ($pagination->onFirstPage())
                                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded-lg cursor-not-allowed flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Previous
                                </span>
                            @else
                                <a href="{{ $pagination->previousPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 flex items-center transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Previous
                                </a>
                            @endif

                            {{-- First page --}}
                            @if ($pageStart > 1)
                                <a href="{{ $pagination->url(1) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">1</a>
                                @if ($pageStart > 2)
                                    <span class="px-2 py-2 text-gray-500">...</span>
                                @endif
                            @endif

                            {{-- Page window --}}
                            @for ($i = $pageStart; $i <= $pageEnd; $i++)
                                @if ($i == $currentPage)
                                    <span class="px-4 py-2 {{ $colors['bg'] }} text-white rounded-lg">{{ $i }}</span>
                                @else
                                    <a href="{{ $pagination->url($i) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">{{ $i }}</a>
                                @endif
                            @endfor

                            {{-- Last page --}}
                            @if ($pageEnd < $totalPages)
                                @if ($pageEnd < $totalPages - 1)
                                    <span class="px-2 py-2 text-gray-500">...</span>
                                @endif
                                <a href="{{ $pagination->url($totalPages) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">{{ $totalPages }}</a>
                            @endif

                            {{-- Next --}}
                            @if ($pagination->hasMorePages())
                                <a href="{{ $pagination->nextPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 flex items-center transition-colors duration-200">
                                    Next
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @else
                                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded-lg cursor-not-allowed flex items-center">
                                    Next
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            @endif
                        </nav>
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <div class="flex flex-col items-center">
                        <div class="w-24 h-24 {{ $colors['bg_light'] }} rounded-full flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 {{ $colors['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $emptyMessage }}</h3>
                        <p class="text-gray-600 mb-6 max-w-md">{{ $emptyDescription }}</p>
                        @if($emptyActionRoute)
                            <a href="{{ $emptyActionRoute }}" 
                               class="inline-flex items-center px-6 py-3 {{ $colors['bg'] }} text-white font-semibold rounded-xl {{ $colors['hover'] }} transition-all duration-200 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                {{ $emptyActionText }}
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div> 