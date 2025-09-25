@extends('layouts.site')
@section('title', $post->title)
@section('content')

@php
    $recentPosts = \App\Models\Blog::inRandomOrder()->take(3)->get();
@endphp

<x-site.item-detail 
    :item="$post"
    type="blog"
    :title="$post->title"
    :content="$post->content"
    :image="$post->image ? asset('storage/' . $post->image) : asset('images/Image_not_found.jpg')"
    :created_at="$post->created_at"
    :comments="$post->comments"
    routeName="site.blog.show"
    :relatedItems="$recentPosts"
    relatedType="blog"
/>

@endsection
