@extends('layouts.site')
@section('title', "Service - {$service->title}")
@section('content')

@php
    $recentServices = \App\Models\Service::where('is_active', true)->inRandomOrder()->take(3)->get();
@endphp

<x-site.item-detail 
    :item="$service"
    type="service"
    :title="$service->title"
    :description="$service->description"
    :image="$service->image ? asset('storage/' . $service->image) : asset('images/Image_not_found.jpg')"
    :icon="$service->icon"
    :created_at="$service->created_at"
    :comments="$service->comments"
    routeName="services.show"
    :relatedItems="$recentServices"
    relatedType="service"
/>

@endsection
