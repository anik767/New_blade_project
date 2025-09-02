@extends('layouts.site')

@section('title', 'Services')
@section('description',
    'Explore my comprehensive web development services. From frontend development to performance
    optimization, I help businesses create exceptional digital experiences.')

@section('content')
    <x-site.banner title="My Services"
        subtitle="Comprehensive web development solutions tailored to your needs. From concept to deployment, I help businesses create exceptional digital experiences."
        :banner="$banner" :pageBanner="$pageBanner" />

    <x-site.content-grid 
        title="Detailed Services"
        subtitle="Explore my comprehensive range of web development services"
        badge="What I offer"
        badgeColor="blue"
        :items="$services"
        emptyIcon="🛠️"
        emptyTitle="Services"
        emptyMessage="My services will be available soon!"
        routeName="services.show"
        routeParam="slug"
        :excerptLength="120"
        ctaLabel="Learn More"
    />
@endsection
