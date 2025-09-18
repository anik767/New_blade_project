@props([
    'items' => [],
    'emptyIcon' => '📦',
    'emptyTitle' => 'No Items',
    'emptyMessage' => 'Items will be available soon!',
    'cardComponent' => 'site.card',
    'routeName' => '',
    'routeParam' => 'slug',
    'excerptLength' => 120,
    'leadingIcon' => null,
    'ctaLabel' => 'View Details'
])

{{-- <div class="bg-gradient-to-br from-slate-50 via-white to-blue-50 text-black min-h-screen relative overflow-hidden"> --}}
    

    {{-- Enhanced Content Grid Section --}}
    <section class="py-20 reveal-on-scroll relative">
        <div class="container mx-auto px-6">
            @if ($items->isEmpty())
                <div class="text-center py-16 reveal-on-scroll">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-400/20 to-gray-600/20 rounded-3xl blur-2xl"></div>
                        <div class="relative bg-white/90 backdrop-blur-sm border border-gray-200 rounded-3xl p-12 max-w-md mx-auto shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                            <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">{{ $emptyIcon }}</div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $emptyTitle }}</h2>
                            <p class="text-gray-600">{{ $emptyMessage }}</p>
                        </div>
                    </div>
                </div>
            @else
                
                <!-- Enhanced Grid with better spacing and animations -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 scroll-fade-in">
                    @foreach ($items as $item)
                        @php
                            $img = $item->image ? asset('storage/' . $item->image) : asset('images/Image_not_found.jpg');
                            $href = $routeName ? route($routeName, [$routeParam => $item->slug]) : '#';
                            $excerpt = isset($item->description) 
                                ? Str::limit($item->description, $excerptLength)
                                : (isset($item->content) ? Str::limit(strip_tags($item->content), $excerptLength) : '');
                            $itemLeadingIcon = $leadingIcon ?: ($item->icon ?? '📄');
                        @endphp
                        
                        <!-- Enhanced Card Container -->
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/10 via-blue-400/10 to-purple-400/10 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                            <div class="relative transform transition-all duration-500 group-hover:-translate-y-3 group-hover:scale-105">
                                <x-dynamic-component :component="$cardComponent" 
                                    :title="$item->title"
                                    :image="$img"
                                    :href="$href"
                                    :excerpt="$excerpt"
                                    :leadingIcon="$itemLeadingIcon"
                                    :ctaLabel="$ctaLabel"
                                />
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Modern Red Theme Pagination -->
                @if (method_exists($items, 'hasPages') && $items->hasPages())
                    <div class="mt-20">
                        <!-- Pagination Container with Backdrop Blur -->
                        <div class="backdrop-blur-xl bg-white/20 rounded-3xl p-6 relative ">
                            <!-- Animated background elements -->
                            <div class="absolute inset-0 w-full h-full">
                               
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-32 bg-gradient-to-r from-red-400/40 to-purple-400/40 rounded-full blur-3xl animate-pulse"></div>
                               
                            </div>
                            <nav class="flex items-center justify-center space-x-3" aria-label="Pagination">
                                
                                <!-- Previous Page Button -->
                                @if ($items->onFirstPage())
                                    <div class="w-10 h-10 backdrop-blur-lg bg-gray-200/60 rounded-full flex items-center justify-center cursor-not-allowed">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </div>
                                @else
                                    <a href="{{ $items->previousPageUrl() }}" class="group">
                                        <div class="w-10 h-10 backdrop-blur-lg bg-white/60 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                            <svg class="w-5 h-5 text-gray-700 group-hover:text-red-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </div>
                                    </a>
                                @endif

                                <!-- Page Numbers Container -->
                                <div class="backdrop-blur-lg bg-white/40 rounded-2xl px-6 py-3 flex items-center space-x-2 relative overflow-hidden">
                                    <!-- Animated background for page numbers -->
                                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-white/20 to-gray-100/20 rounded-2xl animate-pulse"></div>
                                    @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                                        @if ($page == $items->currentPage())
                                            <!-- Current Page - Red Circle -->
                                            <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center relative overflow-hidden">
                                                <!-- Animated glow effect -->
                                                <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-red-600 rounded-full animate-pulse"></div>
                                                <div class="relative">
                                                    <span class="text-white font-bold text-lg">{{ $page }}</span>
                                                </div>
                                            </div>
                                        @elseif ($page <= 3 || $page > $items->lastPage() - 2 || ($page >= $items->currentPage() - 1 && $page <= $items->currentPage() + 1))
                                            <!-- Visible Page Numbers -->
                                            <a href="{{ $url }}" class="group">
                                                <div class="w-10 h-10 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center hover:border-red-300 hover:bg-red-50 transition-all duration-300 transform hover:scale-105">
                                                    <span class="text-gray-600 font-medium group-hover:text-red-600 transition-colors duration-300">{{ $page }}</span>
                                                </div>
                                            </a>
                                        @elseif ($page == 4 && $items->currentPage() > 6)
                                            <!-- Ellipsis -->
                                            <div class="w-10 h-10 flex items-center justify-center">
                                                <span class="text-gray-400 text-lg font-medium">...</span>
                                            </div>
                                        @elseif ($page == $items->lastPage() - 3 && $items->currentPage() < $items->lastPage() - 5)
                                            <!-- Ellipsis -->
                                            <div class="w-10 h-10 flex items-center justify-center">
                                                <span class="text-gray-400 text-lg font-medium">...</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Next Page Button -->
                                @if ($items->hasMorePages())
                                    <a href="{{ $items->nextPageUrl() }}" class="group">
                                        <div class="w-10 h-10 backdrop-blur-lg bg-white/60 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                                            <svg class="w-5 h-5 text-gray-700 group-hover:text-red-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </a>
                                @else
                                    <div class="w-10 h-10 backdrop-blur-lg bg-gray-200/60 rounded-full flex items-center justify-center cursor-not-allowed">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                @endif
                            </nav>

                            <!-- Page Info -->
                            <div class="text-center mt-6">
                                <div class="inline-flex items-center px-6 py-3 backdrop-blur-xl bg-white/30 rounded-2xl relative overflow-hidden">
                                    <!-- Animated background for page info -->
                                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-red-500/10 to-purple-500/10 rounded-2xl animate-pulse"></div>
                                    <div class="relative flex items-center">
                                        <div class="w-3 h-3 bg-red-600 rounded-full mr-3 animate-pulse"></div>
                                        <p class="text-gray-800 text-sm font-medium">
                                            Showing 
                                            <span class="font-bold text-red-600 mx-1">{{ $items->firstItem() ?? 0 }}</span>
                                            to 
                                            <span class="font-bold text-red-600 mx-1">{{ $items->lastItem() ?? 0 }}</span>
                                            of 
                                            <span class="font-bold text-red-600 mx-1">{{ $items->total() }}</span>
                                            results
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>
</div>
