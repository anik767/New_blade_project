@extends('layouts.site')
@section('title', 'Projects')
@section('description', 'Explore my portfolio of web development projects. From responsive websites to complex applications, see how I bring ideas to life with modern technologies.')

@section('content')
    <x-site.banner 
        title="Featured Projects"
        subtitle="A selection of my best work showcasing different skills and technologies"
        badge="Portfolio"
        badgeColor="green"
        :banner="$banner" :pageBanner="$pageBanner"
    />

    <x-site.content-grid 
        :items="$projects"
        emptyIcon="🚀"
        emptyTitle="Projects"
        emptyMessage="My projects will be available soon!"
        routeName="projects.show"
        routeParam="slug"
        :excerptLength="150"
        leadingIcon="💻"
        ctaLabel="View Project"
    />
@endsection
