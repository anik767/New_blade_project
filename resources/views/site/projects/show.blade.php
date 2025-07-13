@extends('layouts.site')
@section('title', "Project - {$project->title}")
@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6">{{ $project->title }}</h1>

    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full  rounded mb-6">
    @endif

    <p class="text-lg text-gray-700 mb-6 whitespace-pre-line">{{ $project->description }}</p>

    @if ($project->github_link)
        <a href="{{ $project->github_link }}" target="_blank" rel="noopener noreferrer" 
           class="inline-block mb-6 px-5 py-3 bg-gray-800 text-white rounded hover:bg-gray-700">
            View on GitHub
        </a>
    @endif

    <br>

    <a href="{{ route('projects.index') }}" class="text-blue-600 underline hover:text-blue-800">
        ← Back to Projects
    </a>
</div>
@endsection
