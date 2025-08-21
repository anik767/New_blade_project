@extends('layouts.site')

@section('title', 'Services')
@section('description',
    'Explore my comprehensive web development services. From frontend development to performance
    optimization, I help businesses create exceptional digital experiences.')

@section('content')
    <div class="bg-background text-text min-h-screen">

        <x-site.banner title="My Services"
            subtitle="Comprehensive web development solutions tailored to your needs. From concept to deployment, I help businesses create exceptional digital experiences."
            :banner="$banner" :pageBanner="$pageBanner" />

        {{-- Services List Section --}}
        <section class="py-20 reveal-on-scroll">
            <div class="container mx-auto px-6">
                @if ($services->isEmpty())
                    <div class="text-center py-16">
                        <div
                            class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                            <div class="text-6xl mb-4">🛠️</div>
                            <h2 class="text-2xl font-semibold text-text mb-2">Services</h2>
                            <p class="text-muted">My services will be available soon!</p>
                        </div>
                    </div>
                @else
                    <div class="text-center mb-16">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">Detailed Services</h2>
                        <p class="text-xl text-muted max-w-3xl mx-auto">Explore my comprehensive range of web development
                            services</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($services as $service)
                            @php
                                $img = $service->image ? asset('storage/' . $service->image) : asset('images/Image_not_found.jpg');
                            @endphp
                            <x-site.card 
                                :title="$service->title"
                                :image="$img"
                                :href="route('services.show', $service->slug)"
                                :excerpt="Str::limit($service->description, 120)"
                                :leadingIcon="$service->icon"
                                ctaLabel="Learn More"
                            />
                        @endforeach
                    </div>


                    <x-site.pagination :paginator="$services" />
                @endif
            </div>
        </section>





    </div>
@endsection
