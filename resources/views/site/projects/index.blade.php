@extends('layouts.site')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Projects</h1>

        @foreach ($projects as $project)
            <div class="mb-6">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('projects.show', $project->slug) }}" class="text-blue-600">{{ $project->title }}</a>
                </h2>
                <p>{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
