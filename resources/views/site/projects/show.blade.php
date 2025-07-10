@extends('layouts.site')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <a href="{{ route('projects.index') }}" class="text-blue-600 underline mt-4 inline-block">← Back to Projects</a>
</div>
@endsection
