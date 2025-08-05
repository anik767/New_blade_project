

@extends('layouts.site')
@section('title', 'Projects')
@section('description', 'Explore my portfolio of web development projects. From responsive websites to complex applications, see how I bring ideas to life with modern technologies.')

@section('content')

<div class="bg-background text-text min-h-screen">

    {{-- Hero Section --}}
    <section class="relative py-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/Home/banner-background-one.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-card/80 via-card/60 to-card/40"></div>

        <div class="container mx-auto px-6 relative font-rajdhani z-10">
            <div class="text-center max-w-4xl mx-auto reveal-on-scroll">
                <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight text-text mb-8">
                    My Projects
                </h1>
                <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-3xl mx-auto">
                    Explore my latest work and creative solutions
                </p>
            </div>
        </div>
    </section>

    {{-- Projects Section --}}
    <section class="py-32">
        <div class="container mx-auto px-6">
            @if ($projects->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-card rounded-3xl p-12 max-w-md mx-auto shadow-lg border border-card">
                        <div class="text-6xl mb-4">🚀</div>
                        <h2 class="text-2xl font-semibold text-text mb-2">Projects</h2>
                        <p class="text-muted">No projects found at the moment.</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div class="bg-card rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transform transition-all duration-300 group hover:scale-105 hover:-translate-y-2 reveal-on-scroll border border-card">
                            <a href="{{ route('projects.show', $project->slug) }}" class="block">
                                @if ($project->image)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $project->image) }}" 
                                            alt="{{ $project->title }}" 
                                            class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-card/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
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
                                                    class="inline-flex items-center px-3 py-2 bg-muted text-background rounded-lg hover:bg-accent transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                                    GitHub
                                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                                    </svg>
                                                </a>
                                            @endif
                                            <a href="{{ route('projects.show', $project->slug) }}" 
                                                class="inline-flex items-center px-4 py-2 bg-accent text-background rounded-lg hover:bg-accent/90 transition-all duration-300 font-medium text-sm group-hover:scale-105">
                                                View Project
                                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($projects->hasPages())
                    <div class="mt-16 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            @php
                                $currentPage = $projects->currentPage();
                                $totalPages = $projects->lastPage();
                                $pageStart = max(1, $currentPage - 2);
                                $pageEnd = min($totalPages, $currentPage + 2);
                            @endphp

                            {{-- Previous Page --}}
                            @if ($projects->onFirstPage())
                                <span class="px-4 py-2 bg-muted text-text rounded cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $projects->previousPageUrl() }}"
                                    class="px-4 py-2 bg-accent text-background font-semibold rounded hover:bg-accent/90 transition">
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
                                    <span class="px-4 py-2 bg-accent text-background font-semibold rounded">{{ $i }}</span>
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
