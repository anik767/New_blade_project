@extends('layouts.site')
@section('title', 'Projects')
@section('description', 'Explore my portfolio of web development projects. From responsive websites to complex applications, see how I bring ideas to life with modern technologies.')

@section('content')
    <div class="bg-background text-text min-h-screen">
        




        {{-- Projects List Section --}}
        <section class="py-20 reveal-on-scroll">
            <div class="container mx-auto px-6">
                @if ($projects->isEmpty())
                    <div class="text-center py-16">
                        <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                            <div class="text-6xl mb-4">🚀</div>
                            <h2 class="text-2xl font-semibold text-text mb-2">Projects</h2>
                            <p class="text-muted">My projects will be available soon!</p>
                        </div>
                    </div>
                @else
                    <div class="text-center mb-16">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">Featured Projects</h2>
                        <p class="text-xl text-muted max-w-3xl mx-auto">A selection of my best work showcasing different skills and technologies</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($projects as $project)
                        <div class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl overflow-hidden shadow-lg shadow-accent/30 hover:shadow-acttive/50 transform transition-all duration-300 group hover:scale-105 hover:-translate-y-2 reveal-on-scroll">
                            <a href="{{ route('projects.show', $project->slug) }}" class="block">
                                @if ($project->image)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $project->image) }}" 
                                             alt="{{ $project->title }}" 
                                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>
                                @endif

                                <div class="p-8">
                                    <div class="flex items-center mb-6">
                                        <span class="text-4xl mr-4">💻</span>
                                        <h2 class="text-2xl font-semibold text-text group-hover:text-accent transition-colors duration-300">
                                            {{ $project->title }}
                                        </h2>
                                    </div>

                                    <p class="text-muted mb-6 leading-relaxed">{{ \Illuminate\Support\Str::limit($project->description, 150) }}</p>

                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-accent font-medium">{{ $project->created_at->format('M d, Y') }}</span>
                                        <div class="flex space-x-2">
                                            @if ($project->github_link)
                                                <a href="{{ $project->github_link }}" target="_blank"
                                                   class="inline-flex items-center px-3 py-2 bg-gray-700 text-background rounded-lg hover:bg-gray-600 transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                                    GitHub
                                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                                    </svg>
                                                </a>
                                            @endif
                                            <a href="{{ route('projects.show', $project->slug) }}" 
                                               class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-acttive transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                                View Project
                                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    {{-- Custom Pagination --}}
                    @php
                        $totalPages = $projects->lastPage();
                        $currentPage = $projects->currentPage();
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

                    {{-- Only show pagination if there are more than 6 projects --}}
                    @if($projects->total() > 6)
                        <nav class="mt-16 flex justify-center space-x-2">
                        {{-- Previous Page --}}
                        @if ($projects->onFirstPage())
                            <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Previous</span>
                        @else
                            <a href="{{ $projects->previousPageUrl() }}"
                                class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">
                                Previous
                            </a>
                        @endif

                        {{-- First Page --}}
                        @if ($pageStart > 1)
                            <a href="{{ $projects->url(1) }}" class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">1</a>
                            @if ($pageStart > 2)
                                <span class="px-2 py-2 text-muted">...</span>
                            @endif
                        @endif

                        {{-- Page Window --}}
                        @for ($i = $pageStart; $i <= $pageEnd; $i++)
                            @if ($i == $currentPage)
                                <span class="px-4 py-2 bg-acttive text-dark font-semibold rounded">{{ $i }}</span>
                            @else
                                <a href="{{ $projects->url($i) }}"
                                    class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Last Page --}}
                        @if ($pageEnd < $totalPages)
                            @if ($pageEnd < $totalPages - 1)
                                <span class="px-2 py-2 text-muted">...</span>
                            @endif
                            <a href="{{ $projects->url($totalPages) }}"
                                class="px-4 py-2 bg-muted text-text rounded hover:bg-muted/80">{{ $totalPages }}</a>
                        @endif

                        {{-- Next Page --}}
                        @if ($projects->hasMorePages())
                            <a href="{{ $projects->nextPageUrl() }}"
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
