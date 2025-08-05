@extends('layouts.site')

@section('title', 'Services')
@section('description', 'Explore my comprehensive web development services. From frontend development to performance optimization, I help businesses create exceptional digital experiences.')

@section('content')
<div class="bg-background text-text min-h-screen">

    {{-- Hero Section --}}
    <section class="relative py-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/Home/banner-background-one.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-card/80 via-card/60 to-card/40"></div>
        <div class="container mx-auto px-6 relative font-rajdhani z-10">
            <div class="text-center max-w-4xl mx-auto reveal-on-scroll">
                <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight text-text mb-8">
                    My Services
                </h1>
                <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-3xl mx-auto">
                    Explore my comprehensive web development services and discover how I can help your business grow.
                </p>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-32">
        <div class="container mx-auto px-6">
            @if($services->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-card rounded-3xl p-12 max-w-md mx-auto shadow-lg border border-card">
                        <div class="text-6xl mb-4">🛠️</div>
                        <h2 class="text-2xl font-semibold text-text mb-2">Services</h2>
                        <p class="text-muted">My services will be available soon!</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                    <div class="bg-card rounded-3xl overflow-hidden shadow-lg border border-card hover:shadow-xl transform transition-all duration-300 group hover:scale-105 hover:-translate-y-2 reveal-on-scroll">
                        <a href="{{ route('services.show', $service->slug) }}" class="block">
                            @if($service->image)
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         alt="{{ $service->title }}" 
                                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-card/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                            @endif
                            <div class="p-8">
                                <div class="flex items-center mb-6">
                                    @if($service->icon)
                                        <span class="text-4xl mr-4">{{ $service->icon }}</span>
                                    @endif
                                    <h2 class="text-2xl font-semibold text-text group-hover:text-accent transition-colors duration-300">
                                        {{ $service->title }}
                                    </h2>
                                </div>
                                <p class="text-muted mb-6 leading-relaxed">{{ Str::limit($service->description, 150) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-accent font-medium">Order: {{ $service->order }}</span>
                                    <a href="{{ route('services.show', $service->slug) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-accent/90 transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                        Learn More
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                @if($services->total() > 6)
                    <div class="mt-16 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            @php
                                $currentPage = $services->currentPage();
                                $totalPages = $services->lastPage();
                                $pageStart = max(1, $currentPage - 2);
                                $pageEnd = min($totalPages, $currentPage + 2);
                            @endphp
                            {{-- Previous Page --}}
                            @if ($services->onFirstPage())
                                <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $services->previousPageUrl() }}"
                                    class="px-4 py-2 bg-accent text-background font-semibold rounded hover:bg-accent/90 transition">
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
                                    <span class="px-4 py-2 bg-accent text-background font-semibold rounded">{{ $i }}</span>
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
                                    class="px-4 py-2 bg-accent text-background font-semibold rounded hover:bg-accent/90 transition">
                                    Next
                                </a>
                            @else
                                <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Next</span>
                            @endif
                        </nav>
                    </div>
                @endif
            @endif
        </div>
    </section>

</div>
@endsection 