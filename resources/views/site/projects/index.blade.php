@extends('layouts.site')
@section('title', 'Projects')
@section('content')
    <div class="bg-gradient-to-tl from-[#1c1f23] via-[#2c3136]/60 to-[#0f1114]




 text-text min-h-screen py-16 px-4">
        <div class="container mx-auto">
            <h1 class="text-5xl font-extrabold text-center text-text mb-16">Projects</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($projects as $project)
                    <div
                        class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10  to-[#1e2024] rounded-3xl overflow-hidden  shadow-lg shadow-accent/30  hover:shadow-acttive/50 transition-shadow duration-300"  >
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                class="w-full h-56 object-cover rounded-t-3xl">
                        @endif

                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-3">
                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="hover:underline text-text capitalize antialiased ">
                                    {{ $project->title }}
                                </a>
                            </h2>
                            <p class="text-muted mb-5 ">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>

                            @if ($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank"
                                    class="inline-block mt-2 px-4 py-2 bg-accent text-dark font-semibold rounded hover:bg-acttive transition">
                                    View on GitHub
                                </a>
                            @endif
                        </div>
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

            <nav class="mt-12 flex justify-center space-x-2">
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
        </div>


      

    </div>
@endsection
