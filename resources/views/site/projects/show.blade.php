@extends('layouts.site')
@section('title', "Project - {$project->title}")
@section('content')

@php
    $recentProjects = \App\Models\ProjectPost::inRandomOrder()->take(3)->get();
@endphp

<x-site.item-detail 
    :item="$project"
    type="project"
    :title="$project->title"
    :description="$project->description"
    :image="$project->image ? asset('storage/' . $project->image) : asset('images/Image_not_found.jpg')"
    :created_at="$project->created_at"
    :comments="$project->comments"
    routeName="projects.show"
    :relatedItems="$recentProjects"
    relatedType="project"
/>

@endsection
