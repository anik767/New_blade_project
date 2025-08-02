@extends('layouts.site')

@section('title', 'About Me')

@section('content')
<div class="bg-background text-text min-h-screen">
    <!-- Hero Section -->
    <section class="relative py-20">
        <div class="container mx-auto px-6">
            @if($aboutMe)
                <div class="max-w-6xl mx-auto">
                    <!-- Header Section -->
                    <div class="text-center mb-16">
                        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6 text-text">
                            {{ $aboutMe->name ?? 'About Me' }}
                        </h1>
                        @if($aboutMe->title)
                            <p class="text-xl md:text-2xl text-accent font-semibold">{{ $aboutMe->title }}</p>
                        @endif
                    </div>

                    <!-- Main Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                        <!-- Image Section -->
                        @if($aboutMe->image)
                            <div class="order-2 lg:order-1">
                                <img src="{{ asset('storage/' . $aboutMe->image) }}" 
                                     alt="{{ $aboutMe->name }}" 
                                     class="w-full max-w-md mx-auto rounded-3xl object-cover shadow-xl">
                            </div>
                        @endif

                        <!-- Content Section -->
                        <div class="order-1 lg:order-2 space-y-8">
                            <div class="prose prose-lg text-text max-w-none">
                                <div class="text-lg leading-relaxed text-muted">
                                    {!! nl2br(e($aboutMe->content)) !!}
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if($aboutMe->email)
                                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-6 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="text-2xl">📧</div>
                                            <a href="mailto:{{ $aboutMe->email }}" class="text-text hover:text-accent transition-colors">
                                                {{ $aboutMe->email }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($aboutMe->phone)
                                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-6 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="text-2xl">📞</div>
                                            <a href="tel:{{ $aboutMe->phone }}" class="text-text hover:text-accent transition-colors">
                                                {{ $aboutMe->phone }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($aboutMe->location)
                                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-6 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="text-2xl">📍</div>
                                            <span class="text-text">{{ $aboutMe->location }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if($aboutMe->linkedin || $aboutMe->github)
                                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-6 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="text-2xl">🔗</div>
                                            <div class="flex space-x-4">
                                                @if($aboutMe->linkedin)
                                                    <a href="{{ $aboutMe->linkedin }}" target="_blank" class="text-text hover:text-accent transition-colors">
                                                        LinkedIn
                                                    </a>
                                                @endif
                                                @if($aboutMe->github)
                                                    <a href="{{ $aboutMe->github }}" target="_blank" class="text-text hover:text-accent transition-colors">
                                                        GitHub
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Skills, Experience, Education Section -->
                    @if($aboutMe->skills || $aboutMe->experience || $aboutMe->education)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @if($aboutMe->skills)
                                <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300 text-center">
                                    <div class="text-5xl mb-5 text-accent">🧠</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-text">Skills</h3>
                                    <p class="text-muted leading-relaxed">{{ $aboutMe->skills }}</p>
                                </div>
                            @endif

                            @if($aboutMe->experience)
                                <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300 text-center">
                                    <div class="text-5xl mb-5 text-accent">💼</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-text">Experience</h3>
                                    <p class="text-muted leading-relaxed">{{ $aboutMe->experience }}</p>
                                </div>
                            @endif

                            @if($aboutMe->education)
                                <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition duration-300 text-center">
                                    <div class="text-5xl mb-5 text-accent">🎓</div>
                                    <h3 class="text-2xl font-semibold mb-4 text-text">Education</h3>
                                    <p class="text-muted leading-relaxed">{{ $aboutMe->education }}</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/5 to-[#1e2024] rounded-3xl p-16 max-w-md mx-auto shadow-lg border border-gray-700">
                        <div class="text-8xl mb-6">👤</div>
                        <h2 class="text-3xl font-bold text-text mb-4">About Me</h2>
                        <p class="text-muted text-lg">Information about me will be available soon!</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection 