@extends('layouts.site')
@section('title', 'Home')
@section('content')

    <div class="bg-gradient-to-br from-slate-50 via-white to-blue-50 text-black min-h-screen relative overflow-hidden">
        <!-- Floating background particles -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-2 h-2 bg-blue-400/20 rounded-full animate-ping"></div>
            <div class="absolute top-40 right-20 w-1 h-1 bg-green-400/20 rounded-full animate-pulse delay-1000"></div>
            <div class="absolute top-80 left-1/4 w-1.5 h-1.5 bg-purple-400/20 rounded-full animate-bounce delay-500"></div>
            <div class="absolute top-96 right-1/3 w-1 h-1 bg-pink-400/20 rounded-full animate-pulse delay-2000"></div>
            <div class="absolute top-1/2 left-20 w-2 h-2 bg-yellow-400/20 rounded-full animate-ping delay-1500"></div>
            <div class="absolute bottom-40 right-10 w-1.5 h-1.5 bg-indigo-400/20 rounded-full animate-bounce delay-3000"></div>
        </div>

        {{-- Hero Section --}}
        @php
            $bgMedia =
                optional($banner) && optional($banner)->background_image
                    ? asset('storage/' . $banner->background_image)
                    : asset('images/Image_not_found.jpg');
            $ext =
                optional($banner) && optional($banner)->background_image
                    ? strtolower(pathinfo($banner->background_image, PATHINFO_EXTENSION))
                    : '';
            $isVideo = in_array($ext, ['mp4', 'webm']);
        @endphp
        <section class="relative h-screen overflow-hidden">
            @if ($isVideo)
                <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
                    <source src="{{ $bgMedia }}" type="video/{{ $ext == 'webm' ? 'webm' : 'mp4' }}">
                </video>
            @else
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ $bgMedia }}')"></div>
            @endif
            
            <!-- Enhanced overlay with blur effects -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30 backdrop-blur-sm"></div>
            
            <!-- Floating elements -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-20 left-20 w-32 h-32 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 right-20 w-40 h-40 bg-gradient-to-r from-green-500/10 to-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-gradient-to-r from-pink-500/5 to-yellow-500/5 rounded-full blur-3xl animate-pulse delay-500"></div>
            </div>

            <div class="container mx-auto h-full grid grid-cols-1 lg:grid-cols-2 items-center px-6 relative z-10">
                <div class="flex flex-col justify-center space-y-8 text-center lg:text-left py-10 lg:py-0 max-w-2xl mx-auto lg:mx-0 reveal-on-scroll">
                    
                    <div class="space-y-6">
                        <h1 class="text-6xl lg:text-8xl font-black tracking-tight leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                            <span class="gradient-text-animated drop-shadow-2xl">
                                {{ optional($banner)->title_line1 ?: 'Hello' }}
                            </span>
                        </h1>
                        <h2 class="text-5xl lg:text-7xl font-black tracking-tight min-h-[80px] leading-tight" style="font-family: 'Rajdhani', sans-serif;">
                            <span class="gradient-text-ocean drop-shadow-xl">
                                {{ optional($banner)->title_line2 ?: 'Your Name' }}
                            </span>
                        </h2>
                    </div>
                    
                    <p class="text-xl lg:text-2xl text-slate-700 leading-relaxed max-w-lg font-semibold" style="font-family: 'Rajdhani', sans-serif;">
                        {{ optional($banner)->subtitle ?: 'Frontend Developer passionate about crafting clean, user-friendly websites that delight users.' }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if (optional($banner)->cv_file)
                            <x-site.custom-button 
                                variant="blue" 
                                href="{{ asset('storage/' . $banner->cv_file) }}" 
                                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>'>
                                Download CV
                            </x-site.custom-button>
                        @else
                            <span class="inline-flex items-center px-8 py-4 border-2 border-gray-300 rounded-xl font-semibold tracking-wide text-gray-400 cursor-not-allowed">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                    </path>
                                </svg>
                                CV Not Available
                            </span>
                        @endif
                        <x-site.custom-button 
                            variant="secondary" 
                            href="{{ route('contact') }}" 
                            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>'>
                            Get In Touch
                        </x-site.custom-button>
                    </div>
                </div>

                <div class="flex justify-center items-end h-full reveal-on-scroll">
                    <div class="relative group">
                        <!-- Glow effect behind image -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 via-blue-400/20 to-purple-400/20 rounded-full blur-3xl transition-all duration-1000 animate-pulse"></div>
                        
                        <!-- Floating elements around image -->
                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-gradient-to-r from-green-400 to-blue-400 rounded-full animate-pulse"></div>
                        <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full animate-pulse delay-1000"></div>
                        <div class="absolute top-1/2 -right-6 w-4 h-4 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full animate-bounce delay-500"></div>
                        
                        <img src="{{ optional($banner) && optional($banner)->person_image ? asset('storage/' . $banner->person_image) : asset('images/Image_not_found.jpg') }}"
                            alt="{{ optional($banner)->title_line2 ?? 'Your Name' }}"
                            class="relative object-contain w-full max-w-xs lg:max-w-lg max-h-[90vh] rounded-3xl transition-all duration-500" />
                    </div>
                </div>
            </div>
        </section>

        {{-- Projects Section --}}
        <section class="py-20 font-sans" id="projects">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold mb-6">
                        <span class="gradient-text-forest">
                            Featured Projects
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">Showcasing my latest work and creative
                        solutions</p>
                </header>

                @if ($projects->isEmpty())
                    <div class="text-center py-16 reveal-on-scroll">
                        <div class="relative">
                            <div class="text-6xl mb-4 relative z-10">📁</div>
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-400/20 to-gray-600/20 rounded-full blur-2xl"></div>
                        </div>
                        <p class="text-xl text-gray-600">No projects found.</p>
                    </div>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($projects as $project)
                            @php
                                $img = $project->image ? asset('storage/' . $project->image) : asset('images/Image_not_found.jpg');
                            @endphp
                            <x-site.card 
                                :title="$project->title"
                                :image="$img"
                                :href="route('projects.show', $project->slug)"
                                :excerpt="Str::limit($project->description, 120)"
                                leadingIcon="💻"
                                ctaLabel="View Project"
                            />
                        @endforeach
                    </div>

                    <div class="mt-16 text-center">
                        <x-site.custom-button 
                            variant="alt" 
                            href="{{ route('projects.index') }}" 
                            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>'>
                            View All Projects
                        </x-site.custom-button>
                    </div>

                @endif
            </div>
        </section>

        {{-- Services Section --}}
        <section class="py-20 font-sans" id="services">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold mb-6">
                        <span class="gradient-text-primary">
                            Services
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">What I can help you with</p>
                </header>

                @if ($services->isEmpty())
                    <div class="text-center py-16 reveal-on-scroll">
                        <div class="relative">
                            <div class="text-6xl mb-4 relative z-10">🛠️</div>
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-400/20 to-gray-600/20 rounded-full blur-2xl"></div>
                        </div>
                        <p class="text-xl text-gray-600">No services found.</p>
                    </div>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
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

                    <div class="mt-16 text-center">
                        <x-site.custom-button 
                            variant="primary" 
                            href="{{ route('services') }}" 
                            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>'>
                            View All Services
                        </x-site.custom-button>
                    </div>
                @endif
            </div>
        </section>

        {{-- Skills Section --}}
        <section class="py-20 font-sans" id="skills">
            <div class="container mx-auto px-6 text-center">
                <header class="mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold mb-6">
                        <span class="gradient-text-warning">
                            Skills & Tech Stack
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">Technologies and tools I use to bring ideas
                        to life</p>
                </header>
                
                <div class="flex flex-wrap justify-center gap-6 reveal-on-scroll">
                    @php
                        $skills = optional($banner)->skills ?? [
                            'HTML',
                            'CSS',
                            'Tailwind',
                            'Laravel',
                            'React',
                            'Vue.js',
                            'JavaScript',
                            'PHP',
                            'MySQL',
                            'Git',
                        ];
                    @endphp
                    @foreach ($skills as $skill)
                        <div class="group relative">
                            <!-- Glow effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 via-blue-400/20 to-purple-400/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                            
                            <!-- Skill card -->
                            <div class="relative px-8 py-6 rounded-2xl bg-white/80 backdrop-blur-sm border border-gray-200 shadow-lg hover:shadow-2xl text-gray-700 font-semibold text-lg hover:scale-110 hover:text-black transform transition-all duration-300 group-hover:border-green-300">
                                {{ $skill }}
                                
                                <!-- Floating particles on hover -->
                                <div class="absolute -top-2 -right-2 w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 animate-ping transition-opacity duration-300"></div>
                                <div class="absolute -bottom-2 -left-2 w-1.5 h-1.5 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300 delay-200"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Experience Section --}}
        <section class="py-20 font-sans" id="experience">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold mb-6">
                        <span class="gradient-text-emerald">
                            Professional Experience
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">My journey in the world of web development
                    </p>
                </header>
                <div class="space-y-8 max-w-4xl mx-auto">
                    @php
                        $experiences = optional($banner)->experience ?? [
                            [
                                'title' => 'Frontend Developer',
                                'company' => 'SIMEC System Ltd',
                                'period' => 'July 2023 - Present',
                                'description' =>
                                    'Working with Laravel, Vue, and Tailwind CSS to build responsive web interfaces.',
                            ],
                        ];
                    @endphp
                    @foreach ($experiences as $experience)
                        <div class="group relative reveal-on-scroll">
                            <!-- Glow effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-green-400/10 via-blue-400/10 to-purple-400/10 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                            
                            <!-- Experience card -->
                            <div class="relative border-l-4 border-green-500 hover:border-blue-500 transition-all duration-300 pl-8 space-y-6 rounded-3xl p-8 bg-white/80 backdrop-blur-sm shadow-lg hover:shadow-2xl transform hover:-translate-y-2">
                                <!-- Floating elements -->
                                <div class="absolute -top-2 -right-2 w-4 h-4 bg-gradient-to-r from-green-400 to-blue-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
                                <div class="absolute -bottom-2 -left-2 w-3 h-3 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full opacity-0 group-hover:opacity-100 animate-bounce transition-opacity duration-300 delay-200"></div>
                                
                                <div>
                                    <h3 class="text-2xl font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors duration-300">
                                        {{ $experience['title'] }}
                                        <span class="text-gray-600 font-normal">— {{ $experience['company'] }}</span>
                                    </h3>
                                    <p class="text-sm text-gray-500 mb-4 font-medium">{{ $experience['period'] }}</p>
                                    <p class="text-gray-700 text-lg max-w-3xl leading-relaxed group-hover:text-gray-900 transition-colors duration-300">
                                        {{ $experience['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Blog Section --}}
        <section class="py-20 font-sans" id="blog">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold mb-6">
                        <span class="gradient-text-purple">
                            Latest Articles
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">Insights, tutorials, and thoughts on web
                        development</p>
                </header>

                @if ($posts->isEmpty())
                    <div class="text-center py-16 reveal-on-scroll">
                        <div class="relative">
                            <div class="text-6xl mb-4 relative z-10">📝</div>
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-400/20 to-gray-600/20 rounded-full blur-2xl"></div>
                        </div>
                        <p class="text-xl text-gray-600">No blog posts found.</p>
                    </div>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            @php
                                $img = $post->image ? asset('storage/' . $post->image) : asset('images/Image_not_found.jpg');
                            @endphp
                            <x-site.card 
                                :title="$post->title"
                                :image="$img"
                                :href="route('site.blog.show', $post->slug)"
                                :excerpt="Str::limit(strip_tags($post->content), 120)"
                                leadingIcon="📝"
                                ctaLabel="Read More"
                            />
                        @endforeach
                    </div>

                    <div class="mt-16 text-center reveal-on-scroll">
                        <x-site.custom-button 
                            variant="blue" 
                            href="{{ route('site.blog.index') }}" 
                            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>'>
                            View All Articles
                        </x-site.custom-button>
                    </div>
                @endif
            </div>
        </section>



    </div>

@endsection
