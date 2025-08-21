@extends('layouts.site')
@section('title', 'Home')
@section('content')

    <div class="bg-background text-text min-h-screen">

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
            <div
                class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#22262a]/80 via-[#22262a]/60 to-[#22262a]/40">
            </div>

            <div
                class="container mx-auto h-full grid grid-cols-1 lg:grid-cols-2 items-center px-6 relative font-rajdhani z-10 text-[#c4cfde]">
                <div
                    class="flex flex-col justify-center space-y-8 text-center lg:text-left py-10 lg:py-0 max-w-2xl mx-auto lg:mx-0 reveal-on-scroll">
                    <div class="space-y-4">
                        <h1
                            class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight">
                            {{ optional($banner)->title_line1 ?: 'Hello' }}
                        </h1>
                        <h2
                            class="text-4xl lg:text-6xl font-extrabold tracking-tight drop-shadow-lg min-h-[70px] text-accent leading-tight">
                            {{ optional($banner)->title_line2 ?: 'I\'m Azmain Iqtidar Anik' }}
                        </h2>
                    </div>
                    <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-lg">
                        {{ optional($banner)->subtitle ?: 'Frontend Developer passionate about crafting clean, user-friendly websites that delight users.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if (optional($banner)->cv_file)
                            <a href="{{ asset('storage/' . $banner->cv_file) }}" download
                                class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent hover:bg-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-xl ">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Download CV
                            </a>
                        @else
                            <span
                                class="inline-flex items-center px-8 py-4 border-2 border-muted rounded-xl font-semibold tracking-wide text-muted cursor-not-allowed">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                    </path>
                                </svg>
                                CV Not Available
                            </span>
                        @endif
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-8 py-4 bg-accent text-dark rounded-xl font-semibold tracking-wide hover:bg-accent/90 transition-all duration-300 shadow-lg hover:shadow-xl ">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Get In Touch
                        </a>
                    </div>
                </div>

                <div class="flex justify-center items-end h-full reveal-on-scroll">
                    <div class="relative">
                        <div class=" rounded-full "></div>
                        <img src="{{ optional($banner) && optional($banner)->person_image ? asset('storage/' . $banner->person_image) : asset('images/Image_not_found.jpg') }}"
                            alt="{{ optional($banner)->title_line2 ?? 'Azmain Iqtidar Anik' }}"
                            class="relative object-contain w-full max-w-xs lg:max-w-lg max-h-[90vh]  rounded-2xl  transition-transform duration-500" />
                    </div>
                </div>
            </div>
        </section>

        {{-- About Section --}}
        <section class="py-32 font-sans reveal-on-scroll">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24">
                    <h2 class="text-5xl lg:text-6xl font-extrabold tracking-wide mb-6 text-text">Get to Know Me</h2>
                    <p class="text-xl text-muted font-medium max-w-3xl mx-auto leading-relaxed">Let me introduce myself and
                        share my passion for creating exceptional digital experiences</p>
                </header>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                    <div class="space-y-8 reveal-on-scroll">
                        <div class="relative">
                            <div class="absolute inset-0  "></div>
                            <img src="{{ asset('images/Home/damo.png') }}" alt="Azmain Iqtidar Anik"
                                class="relative w-full max-w-md mx-auto lg:mx-0 rounded-3xl object-cover   transition-transform duration-500" />
                        </div>

                        <p class="text-xl leading-relaxed text-muted max-w-lg mx-auto lg:mx-0">
                            I'm Azmain Iqtidar Anik, a passionate frontend developer with a love for building clean,
                            user-friendly digital experiences. My work is guided by strong attention to detail, performance,
                            and modern design principles.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 reveal-on-scroll">
                        @php
                            $highlights = [
                                [
                                    'icon' => '🧠',
                                    'title' => 'Problem Solver',
                                    'desc' =>
                                        'I love tackling UI/UX challenges and turning ideas into real interfaces.',
                                ],
                                [
                                    'icon' => '🚀',
                                    'title' => 'Fast Learner',
                                    'desc' => 'Always eager to explore new tech and push boundaries.',
                                ],
                                [
                                    'icon' => '🎨',
                                    'title' => 'Creative Coder',
                                    'desc' => 'Blending code and design to craft engaging user experiences.',
                                ],
                                [
                                    'icon' => '🤝',
                                    'title' => 'Team Player',
                                    'desc' => 'Great communication and collaboration skills in any environment.',
                                ],
                            ];
                        @endphp

                        @foreach ($highlights as $item)
                            <div
                                class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                                <div class="text-5xl mb-5 text-accent">{{ $item['icon'] }}</div>
                                <h3 class="text-2xl font-semibold mb-3 text-text">{{ $item['title'] }}</h3>
                                <p class="text-muted text-base leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Projects Section --}}
        <section class="py-32" id="projects">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Featured Projects</h2>
                    <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Showcasing my latest work and creative
                        solutions</p>
                </header>

                @if ($projects->isEmpty())
                    <div class="text-center py-16 reveal-on-scroll">
                        <div class="text-6xl mb-4">📁</div>
                        <p class="text-xl text-muted">No projects found.</p>
                    </div>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 ">
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
                        <a href="{{ route('projects.index') }}"
                            class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent
                               hover:bg-accent hover:border-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1">
                            View All Projects
                            <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>

                @endif
            </div>
        </section>

        {{-- Services Section --}}
        <section class="py-32" id="services">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Services</h2>
                    <p class="text-xl text-muted font-medium max-w-3xl mx-auto">What I can help you with</p>
                </header>

                @if ($services->isEmpty())
                    <div class="text-center py-16 reveal-on-scroll">
                        <div class="text-6xl mb-4">🛠️</div>
                        <p class="text-xl text-muted">No services found.</p>
                    </div>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 ">
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
                        <a href="{{ route('services') }}"
                            class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent
                               hover:bg-accent hover:border-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1">
                            View All Services
                            <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        {{-- Skills Section --}}
        <section class="py-32" id="skills">
            <div class="container mx-auto px-6 text-center">
                <header class="mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Skills & Tech Stack</h2>
                    <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Technologies and tools I use to bring ideas
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
                        <div
                            class=" px-8 py-6 rounded-2xl border border-gray-700 shadow-lg shadow-accent/30 text-muted font-semibold text-lg hover:scale-110 hover:shadow-acttive/50 transform transition-all duration-300 hover:text-accent">
                            {{ $skill }}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Experience Section --}}
        <section class="py-32" id="experience">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Professional Experience</h2>
                    <p class="text-xl text-muted font-medium max-w-3xl mx-auto">My journey in the world of web development
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
                        <div
                            class="border-l-4 border-accent hover:border-acttive transition-all duration-300 pl-8 space-y-6  rounded-2xl p-8  hover:shadow-xl reveal-on-scroll">
                            <div>
                                <h3 class="text-2xl font-semibold text-text mb-2">{{ $experience['title'] }}
                                    <span class="text-muted font-normal">— {{ $experience['company'] }}</span>
                                </h3>
                                <p class="text-sm text-muted mb-4">{{ $experience['period'] }}</p>
                                <p class="text-muted text-lg max-w-3xl leading-relaxed">{{ $experience['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Blog Section --}}
        <section class="py-32" id="blog">
            <div class="container mx-auto px-6">
                <header class="text-center mb-24 reveal-on-scroll">
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Latest Articles</h2>
                    <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Insights, tutorials, and thoughts on web
                        development</p>
                </header>

                @if ($posts->isEmpty())
                    <div class="text-center py-16 reveal-on-scroll">
                        <div class="text-6xl mb-4">📝</div>
                        <p class="text-xl text-muted">No blog posts found.</p>
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
                        <a href="{{ route('site.blog.index') }}"
                            class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent hover:bg-accent hover:border-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-xl ">
                            View All Articles
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>



    </div>

@endsection
