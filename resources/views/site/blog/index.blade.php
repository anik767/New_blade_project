@extends('layouts.site')

@section('title', 'Blog')
@section('description', 'Read my latest articles about web development, design trends, and technology insights. Stay updated with industry best practices and innovative solutions.')

@section('content')
    <x-site.banner 
        title="My Blog"
        subtitle="Insights, tutorials, and thoughts on web development, design, and technology. Sharing knowledge and experiences to help you grow as a developer."
        badge="Latest Posts"
        badgeColor="purple"
        :banner="$banner" :pageBanner="$pageBanner"
    />

    <x-site.content-grid 
        :items="$posts"
        emptyIcon="📝"
        emptyTitle="Blog Posts"
        emptyMessage="My blog posts will be available soon!"
        routeName="site.blog.show"
        routeParam="slug"
        :excerptLength="150"
        leadingIcon="📝"
        ctaLabel="Read More"
    />
@endsection
