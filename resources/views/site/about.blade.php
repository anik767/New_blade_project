@extends('layouts.site')

@section('title', 'About Me')

@section('content')
    <div class="bg-gray-900 text-gray-100 min-h-screen">
        <!-- Get to Know Me Section -->
        <section class="relative py-20">
            <div class="container mx-auto px-6">
                @if ($aboutMe)
                    <div class="max-w-6xl mx-auto">
                        <!-- Header Section -->
                        <div class="text-center mb-16">
                            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6 text-white">
                                Get to Know Me
                            </h1>

                        </div>

                        <!-- Main Content Grid -->
                        <div class="">
                            <!-- Left Section - Profile Photo and Bio -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-20">
                                <!-- Profile Photo -->
                                @if ($aboutMe->image)
                                    <div class="h-full">
                                        <img src="{{ asset('storage/' . $aboutMe->image) }}" alt="{{ $aboutMe->name }}"
                                            class="w-full h-full mx-auto rounded-2xl object-cover shadow-2xl">
                                    </div>
                                @else
                                    <!-- Placeholder for profile photo -->
                                    <div class="h-full">
                                        <div
                                            class="w-full max-w-md mx-auto h-96 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-2xl flex items-center justify-center">
                                            <div class="text-6xl text-white opacity-50">👤</div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Bio Text -->
                                <div class="space-y-6">
                                    <div class="text-lg leading-relaxed text-gray-300">
                                        {!! nl2br(e($aboutMe->content)) !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Right Section - Skill Cards -->
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Problem Solver Card -->
                                    <div
                                        class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-all duration-300 hover:border-gray-600">
                                        <div class="text-center">
                                            <div class="text-4xl mb-4">🧠</div>
                                            <h3 class="text-xl font-semibold mb-3 text-gray-100">Problem Solver</h3>
                                            <p class="text-gray-400 text-sm leading-relaxed">
                                                I love tackling UI/UX challenges and turning ideas into real interfaces.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Fast Learner Card -->
                                    <div
                                        class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-all duration-300 hover:border-gray-600">
                                        <div class="text-center">
                                            <div class="text-4xl mb-4">🚀</div>
                                            <h3 class="text-xl font-semibold mb-3 text-gray-100">Fast Learner</h3>
                                            <p class="text-gray-400 text-sm leading-relaxed">
                                                Always eager to explore new tech and push boundaries.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Creative Coder Card -->
                                    <div
                                        class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-all duration-300 hover:border-gray-600">
                                        <div class="text-center">
                                            <div class="text-4xl mb-4">🎨</div>
                                            <h3 class="text-xl font-semibold mb-3 text-gray-100">Creative Coder</h3>
                                            <p class="text-gray-400 text-sm leading-relaxed">
                                                Blending code and design to craft engaging user experiences.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Team Player Card -->
                                    <div
                                        class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-all duration-300 hover:border-gray-600">
                                        <div class="text-center">
                                            <div class="text-4xl mb-4">🤝</div>
                                            <h3 class="text-xl font-semibold mb-3 text-gray-100">Team Player</h3>
                                            <p class="text-gray-400 text-sm leading-relaxed">
                                                Great communication and collaboration skills in any environment.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Skills Progress Bar Section -->
                        <div class="mt-20">
                            <div class="max-w-4xl mx-auto rounded-2xl p-8 shadow-lg">
                                @php
                                    $skills = [];
                                    if ($aboutMe->skills) {
                                        $skills = json_decode($aboutMe->skills, true) ?: [];
                                    }
                                @endphp
                                <x-site.skills-progress :skills="$skills" />
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        @if ($aboutMe->email || $aboutMe->phone || $aboutMe->location || $aboutMe->linkedin || $aboutMe->github)
                            <div class="mt-20">
                                <h2 class="text-3xl font-bold text-center mb-12 text-gray-100">Get In Touch</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    @if ($aboutMe->email)
                                        <div class="flex items-center space-x-3">
                                            
                                            <a href="mailto:{{ $aboutMe->email }}"
                                                class="flex items-center gap-2 text-gray-300 hover:text-blue-400 transition-colors">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                        <path stroke-dasharray="64" stroke-dashoffset="64" d="M4 5h16c0.55 0 1 0.45 1 1v12c0 0.55 -0.45 1 -1 1h-16c-0.55 0 -1 -0.45 -1 -1v-12c0 -0.55 0.45 -1 1 -1Z">
                                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                                                        </path>
                                                        <path stroke-dasharray="24" stroke-dashoffset="24" d="M3 6.5l9 5.5l9 -5.5">
                                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="24;0" />
                                                        </path>
                                                    </g>
                                                </svg>
                                                {{ $aboutMe->email }}
                                            </a>

                                        </div>
                                    @endif

                                    @if ($aboutMe->phone)
                                        <div class="flex items-center ">
                                            
                                            <a href="tel:{{ $aboutMe->phone }}"
                                                class="flex items-center gap-2 text-gray-300 hover:text-blue-400 transition-colors">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="currentColor" stroke-dasharray="64" stroke-dashoffset="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 3c0.5 0 2.5 4.5 2.5 5c0 1 -1.5 2 -2 3c-0.5 1 0.5 2 1.5 3c0.39 0.39 2 2 3 1.5c1 -0.5 2 -2 3 -2c0.5 0 5 2 5 2.5c0 2 -1.5 3.5 -3 4c-1.5 0.5 -2.5 0.5 -4.5 0c-2 -0.5 -3.5 -1 -6 -3.5c-2.5 -2.5 -3 -4 -3.5 -6c-0.5 -2 -0.5 -3 0 -4.5c0.5 -1.5 2 -3 4 -3Z">
                                                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                                                    </path>
                                                </svg>
                                                {{ $aboutMe->phone }}
                                            </a>
                                        </div>
                                    @endif

                                    @if ($aboutMe->location)
                                        <div class="flex items-center gap-2">
                                            
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="0" fill="currentColor">
                                                    <animate fill="freeze" attributeName="r" begin="0.7s" dur="0.2s" values="0;4" />
                                                </circle>
                                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path stroke-dasharray="56" stroke-dashoffset="56" d="M12 4c4.42 0 8 3.58 8 8c0 4.42 -3.58 8 -8 8c-4.42 0 -8 -3.58 -8 -8c0 -4.42 3.58 -8 8 -8Z">
                                                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="56;0" />
                                                    </path>
                                                    <path stroke-dasharray="4" stroke-dashoffset="4" d="M12 4v0M20 12h0M12 20v0M4 12h0" opacity="0">
                                                        <animate fill="freeze" attributeName="d" begin="1s" dur="0.2s" values="M12 4v0M20 12h0M12 20v0M4 12h0;M12 4v-2M20 12h2M12 20v2M4 12h-2" />
                                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s" values="4;0" />
                                                        <set fill="freeze" attributeName="opacity" begin="1s" to="1" />
                                                        <animateTransform attributeName="transform" dur="30s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12" />
                                                    </path>
                                                </g>
                                            </svg>
                                            <span class="text-gray-300">{{ $aboutMe->location }}</span>
                                        </div>
                                    @endif

                                    @if ($aboutMe->linkedin || $aboutMe->github)

                                        <div class="flex items-center space-x-3">
                                            
                                            <div class="flex space-x-4">
                                                @if ($aboutMe->linkedin)
                                                    <a href="{{ $aboutMe->linkedin }}" target="_blank"
                                                        class="flex items-center gap-2 text-gray-300 hover:text-blue-400 transition-colors">
                                                        
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <circle cx="4" cy="4" r="2" fill="currentColor" fill-opacity="0">
                                                                <animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;1" />
                                                            </circle>
                                                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                                                <path stroke-dasharray="12" stroke-dashoffset="12" d="M4 10v10">
                                                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="12;0" />
                                                                </path>
                                                                <path stroke-dasharray="12" stroke-dashoffset="12" d="M10 10v10">
                                                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.45s" dur="0.2s" values="12;0" />
                                                                </path>
                                                                <path stroke-dasharray="24" stroke-dashoffset="24" d="M10 15c0 -2.76 2.24 -5 5 -5c2.76 0 5 2.24 5 5v5">
                                                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.65s" dur="0.2s" values="24;0" />
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        LinkedIn
                                                    </a>
                                                @endif
                                                @if ($aboutMe->github)
                                                    <a href="{{ $aboutMe->github }}" target="_blank"
                                                        class="flex items-center gap-2 text-gray-300 hover:text-blue-400 transition-colors">
                                                        
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <mask id="lineMdGithubLoop0" width="24" height="24" x="0" y="0">
                                                                <g fill="#fff">
                                                                    <ellipse cx="9.5" cy="9" rx="1.5" ry="1" />
                                                                    <ellipse cx="14.5" cy="9" rx="1.5" ry="1" />
                                                                </g>
                                                            </mask>
                                                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                                <path stroke-dasharray="32" stroke-dashoffset="32" d="M12 4c1.67 0 2.61 0.4 3 0.5c0.53 -0.43 1.94 -1.5 3.5 -1.5c0.34 1 0.29 2.22 0 3c0.75 1 1 2 1 3.5c0 2.19 -0.48 3.58 -1.5 4.5c-1.02 0.92 -2.11 1.37 -3.5 1.5c0.65 0.54 0.5 1.87 0.5 2.5c0 0.73 0 3 0 3M12 4c-1.67 0 -2.61 0.4 -3 0.5c-0.53 -0.43 -1.94 -1.5 -3.5 -1.5c-0.34 1 -0.29 2.22 0 3c-0.75 1 -1 2 -1 3.5c0 2.19 0.48 3.58 1.5 4.5c1.02 0.92 2.11 1.37 3.5 1.5c-0.65 0.54 -0.5 1.87 -0.5 2.5c0 0.73 0 3 0 3">
                                                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.7s" values="32;0" />
                                                                </path>
                                                                <path stroke-dasharray="10" stroke-dashoffset="10" d="M9 19c-1.406 0-2.844-.563-3.688-1.188C4.47 17.188 4.22 16.157 3 15.5">
                                                                    <animate attributeName="d" dur="3s" repeatCount="indefinite" values="M9 19c-1.406 0-2.844-.563-3.688-1.188C4.47 17.188 4.22 16.157 3 15.5;M9 19c-1.406 0-3-.5-4-.5-.532 0-1 0-2-.5;M9 19c-1.406 0-2.844-.563-3.688-1.188C4.47 17.188 4.22 16.157 3 15.5" />
                                                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="10;0" />
                                                                </path>
                                                            </g>
                                                            <rect width="8" height="4" x="8" y="11" fill="currentColor" mask="url(#lineMdGithubLoop0)">
                                                                <animate attributeName="y" dur="10s" keyTimes="0;0.45;0.46;0.54;0.55;1" repeatCount="indefinite" values="11;11;7;7;11;11" />
                                                            </rect>
                                                        </svg>
                                                        GitHub
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-20">
                        <div class="bg-gray-800 rounded-3xl p-16 max-w-md mx-auto shadow-2xl border border-gray-700">
                            <div class="text-8xl mb-6">👤</div>
                            <h2 class="text-3xl font-bold text-gray-100 mb-4">About Me</h2>
                            <p class="text-gray-400 text-lg">Information about me will be available soon!</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        
        <!-- Location Map Section -->
        @if ($aboutMe && $aboutMe->map_embed_code)
            <section class="py-20 bg-gray-800">
                <div class="container mx-auto px-6">
                    <div class="max-w-6xl mx-auto">
                        <h2 class="text-3xl font-bold text-center mb-12 text-gray-100">Find Me Here</h2>
                        <div class="w-full">
                            <div class="map-container" style="position: relative; width: 100%; height: 450px; overflow: hidden;">
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
