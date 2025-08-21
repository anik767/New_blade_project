@extends('layouts.site')
@section('title', 'Projects')
@section('description', 'Explore my portfolio of web development projects. From responsive websites to complex applications, see how I bring ideas to life with modern technologies.')

@section('content')
    <div class="bg-background text-text min-h-screen">
        
        <x-site.banner 
            title="My Projects"
            subtitle="A showcase of my best work, demonstrating creativity, technical skills, and attention to detail. Each project tells a unique story of innovation and problem-solving."
            :banner="$banner" :pageBanner="$pageBanner"
        />

        {{-- Projects List Section --}}
        <section class="py-20 reveal-on-scroll">
            <div class="container mx-auto px-6">
                @if ($projects->isEmpty())
                    <div class="text-center py-16">
                        <div class=" rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                            <div class="text-6xl mb-4">🚀</div>
                            <h2 class="text-2xl font-semibold text-text mb-2">Projects</h2>
                            <p class="text-muted">My projects will be available soon!</p>
                        </div>
                    </div>
                @else
                    <div class="text-center mb-16">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">Featured Projects</h2>
                        <p class="text-xl text-muted max-w-3xl mx-auto">A selection of my best work showcasing different skills and technologies</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($projects as $project)
                            @php
                                $img = $project->image ? asset('storage/' . $project->image) : asset('images/Image_not_found.jpg');
                            @endphp
                            <x-site.card 
                                :title="$project->title"
                                :image="$img"
                                :href="route('projects.show', $project->slug)"
                                :excerpt="\Illuminate\Support\Str::limit($project->description, 150)"
                                leadingIcon="💻"
                                ctaLabel="View Project"
                            />
                        @endforeach
                    </div>

                    <x-site.pagination :paginator="$projects" />
                @endif
            </div>
        </section>





    </div>
@endsection
