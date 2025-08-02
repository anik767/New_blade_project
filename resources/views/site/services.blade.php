@extends('layouts.site')

@section('title', 'Services')

@section('content')
<div class="bg-background text-text min-h-screen py-16 px-4">
    <div class="container mx-auto">
        <h1 class="text-5xl font-extrabold text-center text-text mb-16">Services</h1>

        @if($services->isEmpty())
            <div class="text-center py-16">
                <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                    <div class="text-6xl mb-4">🛠️</div>
                    <h2 class="text-2xl font-semibold text-text mb-2">Services</h2>
                    <p class="text-muted">My services will be available soon!</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl overflow-hidden shadow-lg shadow-accent/30 hover:shadow-acttive/50 transform transition duration-300 group">
                        @if($service->image)
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                @if($service->icon)
                                    <span class="text-3xl mr-3">{{ $service->icon }}</span>
                                @endif
                                <h2 class="text-2xl font-semibold text-text group-hover:text-accent transition-colors">
                                    <a href="{{ route('services.show', $service->slug) }}" class="hover:underline">
                                        {{ $service->title }}
                                    </a>
                                </h2>
                            </div>

                            <p class="text-muted mb-4 line-clamp-3">{{ Str::limit($service->description, 120) }}</p>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-accent font-medium">Order: {{ $service->order }}</span>
                                <a href="{{ route('services.show', $service->slug) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-acttive transition duration-300 font-medium text-sm">
                                    Learn More
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection 