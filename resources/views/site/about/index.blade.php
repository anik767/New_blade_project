@extends('layouts.site')
@section('title', 'About Me')
@section('description', 'Learn more about Azmain Iqtidar Anik - Frontend Developer. Discover my journey, skills, and
    passion for creating exceptional web experiences.')
@section('content')
    <div class="bg-background text-black min-h-screen">

        <x-site.banner title="About Me"
            subtitle="Passionate frontend developer with a love for creating beautiful, functional, and user-friendly web experiences."
            :banner="$banner" :pageBanner="$pageBanner" />

        <!-- Main Content Section -->
        <section class="py-20">
            <div class="container mx-auto px-6">
                @if ($aboutMe)
                    <div class="max-w-6xl mx-auto">
                        <!-- Profile Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start mb-20">
                            <!-- Profile Photo -->

                            @if ($aboutMe->image)
                                <div class="relative">
                                    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[70%] h-[70%] bg-gradient-to-br from-green-500/70 to-transparent rounded-3xl blur-3xl ">
                                    </div>
                                    <img src="{{ asset('storage/' . $aboutMe->image) }}" alt="{{ $aboutMe->name }}"
                                        class="relative w-full  mx-auto  rounded-3xl object-cover transition-transform duration-500 z-10">
                                </div>
                            @else
                            <div class="relative">
                                <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[70%] h-[70%] bg-gradient-to-br from-green-500/70 to-transparent rounded-3xl blur-3xl ">
                                </div>
                                <img src="/images/image_not_found1.jpg" alt="{{ $aboutMe->name }}"
                                    class="relative w-full  mx-auto  rounded-3xl object-cover transition-transform duration-500 z-10">
                            </div>
                            @endif


                            <!-- Bio Text -->
                            <div class="space-y-8">
                                @if ($aboutMe->name)
                                    <div class="mb-6">
                                        <h1 class="text-4xl lg:text-5xl font-extrabold text-black mb-2">{{ $aboutMe->name }}
                                        </h1>
                                        @if ($aboutMe->title)
                                            <p class="text-xl text-black font-medium">{{ $aboutMe->title }}</p>
                                        @endif
                                    </div>
                                @endif

                                <div class="text-xl leading-relaxed text-muted">
                                    {!! nl2br(e($aboutMe->content)) !!}
                                </div>

                                <!-- Quick Stats -->

                            </div>
                        </div>

                        <!-- Skills & Strengths Section -->
                        <div class="mb-20">
                            <div class="text-center mb-16">
                                <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">My Strengths</h2>
                                <p class="text-xl text-muted max-w-3xl mx-auto">What makes me stand out as a developer</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div
                                    class=" rounded-2xl p-8 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                                    <div class="text-5xl mb-6">🧠</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-black">Problem Solver</h3>
                                    <p class="text-muted leading-relaxed">
                                        I love tackling complex UI/UX challenges and turning innovative ideas into real,
                                        functional interfaces that users love.
                                    </p>
                                </div>

                                <div
                                    class=" rounded-2xl p-8 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                                    <div class="text-5xl mb-6">🚀</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-black">Fast Learner</h3>
                                    <p class="text-muted leading-relaxed">
                                        Always eager to explore new technologies and push boundaries. I adapt quickly to new
                                        tools and frameworks.
                                    </p>
                                </div>

                                <div
                                    class=" rounded-2xl p-8 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                                    <div class="text-5xl mb-6">🎨</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-black">Creative Coder</h3>
                                    <p class="text-muted leading-relaxed">
                                        Blending clean code with beautiful design to craft engaging user experiences that
                                        convert visitors into customers.
                                    </p>
                                </div>

                                <div
                                    class=" rounded-2xl p-8 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                                    <div class="text-5xl mb-6">🤝</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-black">Team Player</h3>
                                    <p class="text-muted leading-relaxed">
                                        Excellent communication and collaboration skills. I work well in any environment and
                                        love sharing knowledge.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Skills Progress Section -->
                        <div class="mb-20">
                            <div class="text-center mb-16">
                                <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">Technical Skills</h2>
                                <p class="text-xl text-muted max-w-3xl mx-auto">Technologies and tools I use to bring ideas
                                    to life</p>
                            </div>

                            <div class="max-w-4xl mx-auto">
                                @php
                                    $skills = $aboutMe->skills_array ?? [];
                                @endphp
                                <x-site.skills-progress :skills="$skills" />
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        @if ($aboutMe->email || $aboutMe->phone || $aboutMe->location || $aboutMe->linkedin || $aboutMe->github)
                            <div class="mb-20">
                                <div class="text-center mb-16">
                                    <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">Get In Touch</h2>
                                    <p class="text-xl text-muted max-w-3xl mx-auto">Let's discuss your next project and
                                        create something amazing together</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    @if ($aboutMe->email)
                                        <div
                                            class="rounded-2xl p-6 border  shadow-lg shadow-[#f8a27e]/30 hover:shadow-acttive/30 transition-all duration-300 ">
                                            <div class="flex items-center space-x-4">
                                                <div class="p-3 bg-green-500/10 rounded-xl">
                                                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-black mb-1">Email</h3>
                                                    <a href="mailto:{{ $aboutMe->email }}"
                                                        class="text-black hover:text-acttive transition-colors duration-300">
                                                        {{ $aboutMe->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->phone)
                                        <div
                                            class=" rounded-2xl p-6 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 ">
                                            <div class="flex items-center space-x-4">
                                                <div class="p-3 bg-green-500/10 rounded-xl">
                                                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-black mb-1">Phone</h3>
                                                    <a href="tel:{{ $aboutMe->phone }}"
                                                        class="text-black hover:text-acttive transition-colors duration-300">
                                                        {{ $aboutMe->phone }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->location)
                                        <div
                                            class=" rounded-2xl p-6 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 ">
                                            <div class="flex items-center space-x-4">
                                                <div class="p-3 bg-green-500/10 rounded-xl">
                                                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-black mb-1">Location</h3>
                                                    <span class="text-muted">{{ $aboutMe->location }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->linkedin || $aboutMe->github)
                                        <div
                                            class=" rounded-2xl p-6 border  shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 ">
                                            <div class="flex items-center space-x-4">
                                                <div class="p-3 bg-green-500/10 rounded-xl">
                                                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-green-500 mb-2">Social</h3>
                                                    <div class="flex space-x-3">
                                                        @if ($aboutMe->linkedin)
                                                            <a href="{{ $aboutMe->linkedin }}" target="_blank"
                                                                class="text-black hover:text-acttive transition-colors duration-300">
                                                                <svg class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        @if ($aboutMe->github)
                                                            <a href="{{ $aboutMe->github }}" target="_blank"
                                                                class="text-black hover:text-acttive transition-colors duration-300">
                                                                <svg class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-20 reveal-on-scroll">
                        <div class=" rounded-3xl p-16 max-w-md mx-auto shadow-2xl border ">
                            <div class="text-8xl mb-6">👤</div>
                            <h2 class="text-3xl font-bold text-black mb-4">About Me</h2>
                            <p class="text-muted text-lg">Information about me will be available soon!</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Location Map Section -->
        @if ($aboutMe && $aboutMe->map_embed_code)
            <section class="py-20  reveal-on-scroll">
                <div class="container mx-auto px-6">
                    <div class="max-w-6xl mx-auto">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">Find Me Here</h2>
                            <p class="text-xl text-muted max-w-3xl mx-auto">Based in a beautiful location, ready to work
                                with clients worldwide</p>
                        </div>
                        <div class="w-full">
                            <div class="map-container rounded-3xl overflow-hidden shadow-2xl"
                                style="position: relative; width: 100%; height: 450px; overflow: hidden;">
                                {!! $aboutMe->map_embed_code !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <style>
                .map-container iframe {
                    position: absolute !important;
                    top: 0 !important;
                    left: 0 !important;
                    width: 100% !important;
                    height: 100% !important;
                    border: none !important;
                }
            </style>
        @endif
    </div>
@endsection
