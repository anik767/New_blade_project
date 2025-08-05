@extends('layouts.site')

@section('title', 'Services')
@section('description', 'Explore my comprehensive web development services. From frontend development to performance optimization, I help businesses create exceptional digital experiences.')

@section('content')
<div class="bg-background text-text min-h-screen">
    
    



    {{-- Services List Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            @if($services->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                        <div class="text-6xl mb-4">🛠️</div>
                        <h2 class="text-2xl font-semibold text-text mb-2">Services</h2>
                        <p class="text-muted">My services will be available soon!</p>
                    </div>
                </div>
            @else
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">Detailed Services</h2>
                    <p class="text-xl text-muted max-w-3xl mx-auto">Explore my comprehensive range of web development services</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                    <div class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl overflow-hidden shadow-lg shadow-accent/30 hover:shadow-acttive/50 transform transition-all duration-300 group hover:scale-105 hover:-translate-y-2 reveal-on-scroll flex flex-col h-full">
                        <a href="{{ route('services.show', $service->slug) }}" class="block flex flex-col h-full">
                            @if($service->image)
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         alt="{{ $service->title }}" 
                                         class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                            @endif

                            <div class="p-4 flex flex-col flex-grow">
                                <div class="flex items-center mb-3">
                                    @if($service->icon)
                                        <span class="text-4xl mr-4">{{ $service->icon }}</span>
                                    @endif
                                    <h2 class="text-2xl font-semibold text-text group-hover:text-accent transition-colors duration-300">
                                        {{ $service->title }}
                                    </h2>
                                </div>

                                <p class="text-muted mb-3 leading-tight flex-grow">{{ Str::limit($service->description, 150) }}</p>

                                <div class="flex justify-between items-center mt-auto">
                                    <span class="text-sm text-accent font-medium">Order: {{ $service->order }}</span>
                                    <a href="{{ route('services.show', $service->slug) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-acttive transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                        Learn More
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                {{-- Custom Pagination --}}
                @php
                    $totalPages = $services->lastPage();
                    $currentPage = $services->currentPage();
                    $pageStart = 1;
                    $pageEnd = min(5, $totalPages);

                    if ($currentPage > 3 && $totalPages > 5) {
                        $pageStart = $currentPage - 2;
                        $pageEnd = $currentPage + 2;
                        if ($pageEnd > $totalPages) {
                            $pageEnd = $totalPages;
                            $pageStart = max($totalPages - 3, 1);
                        }
                    }
                @endphp

                {{-- Only show pagination if there are more than 6 services --}}
                @if($services->total() > 6)
                    <nav class="mt-16 flex justify-center space-x-2">
                    {{-- Previous Page --}}
                    @if ($services->onFirstPage())
                        <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Previous</span>
                    @else
                        <a href="{{ $services->previousPageUrl() }}"
                            class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">
                            Previous
                        </a>
                    @endif

                    {{-- First Page --}}
                    @if ($pageStart > 1)
                        <a href="{{ $services->url(1) }}" class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">1</a>
                        @if ($pageStart > 2)
                            <span class="px-2 py-2 text-muted">...</span>
                        @endif
                    @endif

                    {{-- Page Window --}}
                    @for ($i = $pageStart; $i <= $pageEnd; $i++)
                        @if ($i == $currentPage)
                            <span class="px-4 py-2 bg-acttive text-dark font-semibold rounded">{{ $i }}</span>
                        @else
                            <a href="{{ $services->url($i) }}"
                                class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">{{ $i }}</a>
                        @endif
                    @endfor

                    {{-- Last Page --}}
                    @if ($pageEnd < $totalPages)
                        @if ($pageEnd < $totalPages - 1)
                            <span class="px-2 py-2 text-muted">...</span>
                        @endif
                        <a href="{{ $services->url($totalPages) }}"
                            class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">{{ $totalPages }}</a>
                    @endif

                    {{-- Next Page --}}
                    @if ($services->hasMorePages())
                        <a href="{{ $services->nextPageUrl() }}"
                            class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">
                            Next
                        </a>
                    @else
                        <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Next</span>
                    @endif
                    </nav>
                @endif
            @endif
        </div>
    </section>





</div>
@endsection 