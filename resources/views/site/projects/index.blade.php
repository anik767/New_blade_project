@extends('layouts.site')
@section('title', 'Projects')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-green-500">Projects</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-blue-600 hover:underline">
                                {{ $project->title }}
                            </a>
                        </h2>
                        <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>

                        @if ($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                                View on GitHub
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
