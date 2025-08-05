@extends('layouts.site')
@section('title', 'About Me')
@section('content')

<div class="bg-background text-text min-h-screen">

    {{-- Hero Section --}}
    <section class="relative py-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/Home/banner-background-one.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-card/80 via-card/60 to-card/40"></div>

        <div class="container mx-auto px-6 relative font-rajdhani z-10">
            <div class="text-center max-w-4xl mx-auto reveal-on-scroll">
                <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight text-text mb-8">
                    About Me
                </h1>
                <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-3xl mx-auto">
                    Get to know me better and discover my journey in web development
                </p>
            </div>
        </div>
    </section>

    {{-- Profile Section --}}
    <section class="py-32 font-sans reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8 reveal-on-scroll">
                    <div class="relative">
                        <div class="absolute inset-0"></div>
                        <img src="{{ asset('images/Home/damo.png') }}" alt="Azmain Iqtidar Anik"
                            class="relative w-full max-w-md mx-auto lg:mx-0 rounded-3xl object-cover transition-transform duration-500" />
                    </div>
                </div>

                <div class="space-y-8 reveal-on-scroll">
                    <div>
                        <h2 class="text-4xl font-bold text-text mb-6">Who I Am</h2>
                        <p class="text-lg text-muted leading-relaxed mb-6">
                            I'm Azmain Iqtidar Anik, a passionate frontend developer with a love for creating beautiful, 
                            functional, and user-friendly web experiences. My journey in web development started with a 
                            curiosity about how websites work, and it has evolved into a deep passion for crafting 
                            digital solutions that make a difference.
                        </p>
                        <p class="text-lg text-muted leading-relaxed">
                            I believe in writing clean, maintainable code and creating interfaces that not only look 
                            great but also provide exceptional user experiences. Every project I work on is an opportunity 
                            to learn, grow, and push the boundaries of what's possible on the web.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">2+</div>
                            <div class="text-muted">Years Experience</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">50+</div>
                            <div class="text-muted">Projects Completed</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Strengths Section --}}
    <section class="py-32 bg-card">
        <div class="container mx-auto px-6">
            <header class="text-center mb-24 reveal-on-scroll">
                <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">My Strengths</h2>
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">What makes me stand out in the world of web development</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $strengths = [
                        ['icon' => '🎨', 'title' => 'Creative Design', 'desc' => 'Creating visually appealing and intuitive user interfaces that engage users.'],
                        ['icon' => '⚡', 'title' => 'Performance Focus', 'desc' => 'Optimizing websites for speed and efficiency to provide the best user experience.'],
                        ['icon' => '📱', 'title' => 'Responsive Design', 'desc' => 'Building websites that work perfectly on all devices and screen sizes.'],
                        ['icon' => '🔧', 'title' => 'Problem Solving', 'desc' => 'Finding innovative solutions to complex technical challenges.'],
                        ['icon' => '🚀', 'title' => 'Fast Learning', 'desc' => 'Quickly adapting to new technologies and frameworks as needed.'],
                        ['icon' => '🤝', 'title' => 'Team Collaboration', 'desc' => 'Working effectively with designers, developers, and stakeholders.'],
                    ];
                @endphp

                @foreach ($strengths as $strength)
                    <div class="bg-background rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center hover:scale-105 hover:-translate-y-2">
                        <div class="text-5xl mb-5 text-accent">{{ $strength['icon'] }}</div>
                        <h3 class="text-2xl font-semibold mb-3 text-text">{{ $strength['title'] }}</h3>
                        <p class="text-muted text-base leading-relaxed">{{ $strength['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Skills Section --}}
    <section class="py-32">
        <div class="container mx-auto px-6">
            <header class="text-center mb-24 reveal-on-scroll">
                <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Technical Skills</h2>
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Technologies and tools I use to bring ideas to life</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $skillCategories = [
                        'Frontend' => ['HTML5', 'CSS3', 'JavaScript', 'React', 'Vue.js', 'Tailwind CSS'],
                        'Backend' => ['PHP', 'Laravel', 'MySQL', 'REST APIs'],
                        'Tools' => ['Git', 'VS Code', 'Figma', 'Adobe XD'],
                        'Other' => ['WordPress', 'Webflow', 'Responsive Design', 'UI/UX']
                    ];
                @endphp

                @foreach ($skillCategories as $category => $skills)
                    <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300">
                        <h3 class="text-2xl font-semibold mb-6 text-text text-center">{{ $category }}</h3>
                        <div class="space-y-3">
                            @foreach ($skills as $skill)
                                <div class="flex items-center justify-between">
                                    <span class="text-muted">{{ $skill }}</span>
                                    <div class="w-2 h-2 bg-accent rounded-full"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact Info Section --}}
    <section class="py-32 bg-card">
        <div class="container mx-auto px-6">
            <header class="text-center mb-24 reveal-on-scroll">
                <h2 class="text-5xl lg:text-6xl font-extrabold text-text mb-6">Get In Touch</h2>
                <p class="text-xl text-muted font-medium max-w-3xl mx-auto">Ready to work together? Let's discuss your project</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-background rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-4 text-accent">📧</div>
                    <h3 class="text-xl font-semibold mb-2 text-text">Email</h3>
                    <p class="text-muted">azmain@example.com</p>
                </div>

                <div class="bg-background rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-4 text-accent">📱</div>
                    <h3 class="text-xl font-semibold mb-2 text-text">Phone</h3>
                    <p class="text-muted">+880 1234 567890</p>
                </div>

                <div class="bg-background rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-4 text-accent">📍</div>
                    <h3 class="text-xl font-semibold mb-2 text-text">Location</h3>
                    <p class="text-muted">Dhaka, Bangladesh</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center px-8 py-4 bg-accent text-background rounded-xl font-semibold tracking-wide hover:bg-accent/90 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    Start a Project
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="py-32">
        <div class="container mx-auto px-6">
            <div class="bg-card rounded-3xl p-8 border border-card shadow-lg">
                <h3 class="text-3xl font-semibold mb-6 text-text text-center">Find Me Here</h3>
                <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9024424301397!2d90.3653!3d23.8103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQ4JzM3LjEiTiA5MMKwMjEnNTUuMCJF!5e0!3m2!1sen!2sbd!4v1234567890"
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
