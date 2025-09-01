@props(['paginator'])

@if ($paginator->hasPages())
    @php
        $totalPages = $paginator->lastPage();
        $currentPage = $paginator->currentPage();
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

    <nav class="mt-16 flex justify-center space-x-2 pagination ">
        {{-- Previous Page --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-muted text-black rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">Previous</a>
        @endif

        {{-- First Page --}}
        @if ($pageStart > 1)
            <a href="{{ $paginator->url(1) }}" class="px-4 py-2 bg-muted text-black rounded hover:bg-muted/80">1</a>
            @if ($pageStart > 2)
                <span class="px-2 py-2 text-muted">...</span>
            @endif
        @endif

        {{-- Page Window --}}
        @for ($i = $pageStart; $i <= $pageEnd; $i++)
            @if ($i == $currentPage)
                <span class="px-4 py-2 bg-acttive text-dark font-semibold rounded">{{ $i }}</span>
            @else
                <a href="{{ $paginator->url($i) }}" class="px-4 py-2 bg-muted text-black rounded hover:bg-muted/80">{{ $i }}</a>
            @endif
        @endfor

        {{-- Last Page --}}
        @if ($pageEnd < $totalPages)
            @if ($pageEnd < $totalPages - 1)
                <span class="px-2 py-2 text-muted">...</span>
            @endif
            <a href="{{ $paginator->url($totalPages) }}" class="px-4 py-2 bg-muted text-black rounded hover:bg-muted/80">{{ $totalPages }}</a>
        @endif

        {{-- Next Page --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-acttive text-dark font-semibold rounded hover:bg-acttive-500 transition">Next</a>
        @else
            <span class="px-4 py-2 bg-muted text-black rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
@endif

