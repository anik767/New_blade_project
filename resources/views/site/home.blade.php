@extends('layouts.site')
@section('title', 'Home')
@section('content')

<div class="bg-background text-text min-h-screen">

    {{-- Hero Section --}}
    <section class="relative h-screen bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ optional($banner) && optional($banner)->background_image ? asset('storage/' . $banner->background_image) : asset('images/Home/banner-background-one.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-background/80 via-background/60 to-background/40"></div>

        <div class="container mx-auto h-full grid grid-cols-1 lg:grid-cols-2 items-center px-6 relative font-rajdhani z-10 text-[#c4cfde]">
            <div class="flex flex-col justify-center space-y-8 text-center lg:text-left py-10 lg:py-0 max-w-2xl mx-auto lg:mx-0 reveal-on-scroll">
                <div class="space-y-4">
                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight">
                        {{ optional($banner)->title_line1 ?: 'Hello' }}
                    </h1>
                    <h2 class="text-4xl lg:text-6xl font-extrabold tracking-tight drop-shadow-lg min-h-[70px] text-accent leading-tight">
                        {{ optional($banner)->title_line2 ?: 'I\'m Azmain Iqtidar Anik' }}
                    </h2>
                </div>
                <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-lg">
                    {{ optional($banner)->subtitle ?: 'Frontend Developer passionate about crafting clean, user-friendly websites that delight users.' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @if (optional($banner)->cv_file)
                        <a href="{{ asset('storage/' . $banner->cv_file) }}" download
                            class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent hover:bg-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download CV
                        </a>
                    @else
                        <span class="inline-flex items-center px-8 py-4 border-2 border-muted rounded-xl font-semibold tracking-wide text-muted cursor-not-allowed">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            CV Not Available
                        </span>
                    @endif
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center px-8 py-4 bg-accent text-dark rounded-xl font-semibold tracking-wide hover:bg-accent/90 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Get In Touch
                    </a>
                </div>
            </div>

            <div class="flex justify-center items-end h-full reveal-on-scroll">
                <div class="relative">
                    <div class=" rounded-full "></div>
                    <img src="{{ optional($banner) && optional($banner)->person_image ? asset('storage/' . $banner->person_image) : asset('images/Home/damo.png') }}"
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
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto leading-relaxed">Let me introduce myself and share my passion for creating exceptional digital experiences</p>
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
                        user-friendly digital experiences. My work is guided by strong attention to detail, performance, and modern design principles.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 reveal-on-scroll">
                    @php
                        $highlights = [
                            ['icon' => '🧠', 'title' => 'Problem Solver', 'desc' => 'I love tackling UI/UX challenges and turning ideas into real interfaces.'],
                            ['icon' => '🚀', 'title' => 'Fast Learner', 'desc' => 'Always eager to explore new tech and push boundaries.'],
                            ['icon' => '🎨', 'title' => 'Creative Coder', 'desc' => 'Blending code and design to craft engaging user experiences.'],
                            ['icon' => '🤝', 'title' => 'Team Player', 'desc' => 'Great communication and collaboration skills in any environment.'],
                        ];
                    @endphp

                    @foreach ($highlights as $item)
                        <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center hover:scale-105 hover:-translate-y-2">
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
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Showcasing my latest work and creative solutions</p>
            </header>

            @if ($projects->isEmpty())
                <div class="text-center py-16 reveal-on-scroll">
                    <div class="text-6xl mb-4">📁</div>
                    <p class="text-xl text-muted">No projects found.</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <a href="{{ route('projects.show', $project->slug) }}"
                            class="group block rounded-3xl overflow-hidden border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/50 transition-all duration-300 cursor-pointer bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] hover:scale-105 hover:-translate-y-2 reveal-on-scroll">
                            <div class="relative overflow-hidden">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                        class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <img src="https://via.placeholder.com/400x256?text=No+Image" alt="No image"
                                        class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-semibold mb-4 text-text two-line-ellipsis capitalize group-hover:text-accent transition-colors duration-300"
                                    title="{{ $project->title }}">
                                    {{ $project->title }}
                                </h3>

                                <p class="text-muted mb-6 leading-relaxed">{{ Str::limit($project->description, 120) }}</p>

                                @if ($project->github_link)
                                    <span class="inline-flex items-center text-acttive font-semibold group-hover:underline cursor-pointer">
                                        View Project
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                @else
                                    <span class="text-muted">No project link</span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-16 text-center reveal-on-scroll">
                    <a href="{{ route('projects.index') }}"
                        class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent hover:bg-accent hover:border-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        View All Projects
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
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
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Technologies and tools I use to bring ideas to life</p>
            </header>
            <div class="flex flex-wrap justify-center gap-6 reveal-on-scroll">
                @php
                    $skills = optional($banner)->skills ?? ['HTML', 'CSS', 'Tailwind', 'Laravel', 'React', 'Vue.js', 'JavaScript', 'PHP', 'MySQL', 'Git'];
                @endphp
                @foreach ($skills as $skill)
                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] px-8 py-6 rounded-2xl border border-gray-700 shadow-lg shadow-accent/30 text-muted font-semibold text-lg hover:scale-110 hover:shadow-acttive/50 transform transition-all duration-300 hover:text-accent">
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
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">My journey in the world of web development</p>
            </header>
            <div class="space-y-8 max-w-4xl mx-auto">
                @php
                    $experiences = optional($banner)->experience ?? [
                        [
                            'title' => 'Frontend Developer',
                            'company' => 'SIMEC System Ltd',
                            'period' => 'July 2023 - Present',
                            'description' => 'Working with Laravel, Vue, and Tailwind CSS to build responsive web interfaces.'
                        ]
                    ];
                @endphp
                @foreach ($experiences as $experience)
                    <div class="border-l-4 border-accent hover:border-acttive transition-all duration-300 pl-8 space-y-6 bg-gradient-to-l from-[#23272b] to-[#1e2024] rounded-2xl p-8 hover:scale-105 hover:shadow-xl reveal-on-scroll">
                        <div>
                            <h3 class="text-2xl font-semibold text-text mb-2">{{ $experience['title'] }} 
                                <span class="text-muted font-normal">— {{ $experience['company'] }}</span>
                            </h3>
                            <p class="text-sm text-muted mb-4">{{ $experience['period'] }}</p>
                            <p class="text-muted text-lg max-w-3xl leading-relaxed">{{ $experience['description'] }}</p>
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
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Insights, tutorials, and thoughts on web development</p>
            </header>

            @if ($posts->isEmpty())
                <div class="text-center py-16 reveal-on-scroll">
                    <div class="text-6xl mb-4">📝</div>
                    <p class="text-xl text-muted">No blog posts found.</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <a href="{{ route('site.blog.show', $post->slug) }}"
                            class="group bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-8 cursor-pointer flex flex-col border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/50 transition-all duration-300 no-underline hover:scale-105 hover:-translate-y-2 reveal-on-scroll">

                            <div class="relative overflow-hidden rounded-2xl mb-6">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110" />
                                @else
                                    <img src="https://via.placeholder.com/400x200?text=No+Image" alt="No image"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110" />
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>

                            <h3 class="text-2xl font-semibold mb-4 text-text group-hover:text-accent transition-colors duration-300">
                                {{ $post->title }}
                            </h3>

                            <p class="text-muted text-base mb-6 leading-relaxed flex-grow">
                                {!! Str::limit(strip_tags($post->content), 120) !!}
                            </p>

                            <span class="inline-flex items-center mt-auto font-semibold text-acttive text-lg group-hover:underline">
                                Read More
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>

                <div class="mt-16 text-center reveal-on-scroll">
                    <a href="{{ route('site.blog.index') }}"
                        class="inline-flex items-center px-8 py-4 border-2 border-accent rounded-xl font-semibold tracking-wide text-accent hover:bg-accent hover:border-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        View All Articles
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Case Studies Section --}}
    <section class="py-32" id="case-studies">
        <div class="container mx-auto px-6">
            <header class="text-center mb-24 reveal-on-scroll">
                <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Case Studies</h2>
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Real-world solutions and performance improvements</p>
            </header>
            <div class="space-y-8 max-w-4xl mx-auto">
                <div class="bg-gradient-to-l from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] p-8 rounded-3xl border border-gray-700 shadow-lg shadow-accent/30 transition-all duration-300 hover:shadow-acttive/50 hover:scale-105 reveal-on-scroll">
                    <h3 class="text-3xl font-semibold mb-6 text-text">Speed Optimization for a Laravel App</h3>
                    <p class="text-muted text-lg mb-6 leading-relaxed">Reduced load time from 4s to under 1s by implementing caching, lazy loading, and queue jobs.</p>
                    <div class="flex items-center space-x-4">
                        <span class="text-muted font-medium text-sm">Tools: Laravel, Redis, Debugbar</span>
                        <span class="text-accent font-semibold">Performance +75%</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Design and Develop Section --}}
    <section class="container mx-auto px-6 py-32">
        <div class="grid md:grid-cols-2 gap-20 items-start">
            <div class="reveal-on-scroll">
                <h2 class="text-5xl lg:text-6xl font-extrabold mb-8 text-text">Design</h2>
                <p class="text-muted mb-10 leading-relaxed text-xl max-w-lg">
                    Immersed in the vibrant world of creativity, I specialize in designing visually striking and
                    user-centric digital experiences.
                </p>

                <ul class="space-y-6 list-none text-muted font-semibold text-xl max-w-md">
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>Web User Interface</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>Marketing and Branding</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>3D Animation</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>Icon Design</span>
                    </li>
                </ul>
            </div>

            <div class="reveal-on-scroll">
                <h2 class="text-5xl lg:text-6xl font-extrabold mb-8 text-text">Develop</h2>
                <p class="text-muted mb-10 leading-relaxed text-xl max-w-lg">
                    As a seasoned developer, I translate design concepts into functional and responsive websites that go
                    beyond aesthetics.
                </p>

                <ul class="space-y-6 list-none text-muted font-semibold text-xl max-w-md">
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>HTML, CSS, and JavaScript</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>CMS WordPress</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                        <span>Webflow</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</div>

@endsection
