@extends('layouts.site')
@section('title', 'About')
@section('description', 'Learn more about Azmain Iqtidar Anik - Frontend Developer.')
@section('content')
    
    
    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 min-h-screen relative overflow-hidden">
        <!-- Scroll Progress Indicator -->
        <div class="scroll-indicator" id="scrollIndicator" style="position:fixed;top:0;left:0;height:4px;width:100%;transform:scaleX(0);transform-origin:left;background:linear-gradient(90deg,#22c55e,#3b82f6,#8b5cf6);z-index:50;transition:transform 120ms linear"></div>
        
        <!-- Scroll to Top Button -->
        <div class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </div>
        
        <!-- Floating background particles -->
        <div class="absolute inset-0 pointer-events-none parallax-bg">
            <div class="absolute top-20 left-10 w-2 h-2 bg-blue-400/20 rounded-full animate-ping"></div>
            <div class="absolute top-40 right-20 w-1 h-1 bg-green-400/20 rounded-full animate-pulse delay-1000"></div>
            <div class="absolute top-80 left-1/4 w-1.5 h-1.5 bg-purple-400/20 rounded-full animate-bounce delay-500"></div>
            <div class="absolute top-96 right-1/3 w-1 h-1 bg-pink-400/20 rounded-full animate-pulse delay-2000"></div>
            <div class="absolute top-1/2 left-20 w-2 h-2 bg-yellow-400/20 rounded-full animate-ping delay-1500"></div>
            <div class="absolute bottom-40 right-10 w-1.5 h-1.5 bg-indigo-400/20 rounded-full animate-bounce delay-3000"></div>
        </div>
        <x-site.banner title="About Me"
            subtitle="Passionate frontend developer with a love for creating beautiful, functional, and user-friendly web experiences."
            :banner="$banner" :pageBanner="$pageBanner" />

        <!-- Main Content Section -->
        <section class="py-24">
            <div class="container mx-auto px-6">
                @if ($aboutMe)
                    <div class="max-w-7xl mx-auto">
                        <!-- Profile Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32 scroll-fade-in">
                            <!-- Profile Photo -->
                            <div class="relative group">
                            @if ($aboutMe->image)
                                <div class="relative">
                                        <!-- Background blur effect -->
                                        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[80%] h-[80%] bg-gradient-to-br from-green-400/40 via-blue-500/30 to-purple-500/40 rounded-full blur-3xl group-hover:blur-2xl transition-all duration-1000 animate-pulse"></div>
                                        
                                        <!-- Main image with enhanced styling -->
                                        <div class="relative z-10">
                                            
                                            <img src="{{ asset('storage/' . $aboutMe->image) }}" alt="{{ $aboutMe->name }}"
                                                class="relative w-full  mx-auto rounded-3xl object-cover transition-all duration-500  group-hover:shadow-3xl">
                                        </div>
                                        
                                        <!-- Floating elements -->
                                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-green-500 rounded-full animate-pulse"></div>
                                        <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-blue-500 rounded-full animate-pulse delay-1000"></div>
                                        <div class="absolute top-1/2 -right-6 w-4 h-4 bg-purple-500 rounded-full animate-pulse delay-500"></div>
                                </div>
                            @else
                                <div class="relative">
                                        <!-- Background blur effect -->
                                        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[80%] h-[80%] bg-gradient-to-br from-green-400/40 via-blue-500/30 to-purple-500/40 rounded-full blur-3xl group-hover:blur-2xl transition-all duration-700"></div>
                                        
                                        <!-- Placeholder image with enhanced styling -->
                                        <div class="relative z-10">
                                            <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 via-blue-500/20 to-purple-500/20 rounded-3xl blur-xl"></div>
                                            <img src="/images/Image_not_found.jpg" alt="{{ $aboutMe->name }}"
                                                class="relative w-full h-[500px] mx-auto rounded-3xl object-cover shadow-2xl border-4 border-white/50 transition-all duration-500 group-hover:scale-105 group-hover:shadow-3xl">
                                    </div>
                                        
                                        <!-- Floating elements -->
                                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-green-500 rounded-full animate-spin"></div>
                                        <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-blue-500 rounded-full animate-ping delay-1000"></div>
                                        <div class="absolute top-1/2 -right-6 w-4 h-4 bg-purple-500 rounded-full animate-bounce delay-500"></div>
                                    </div>
                                @endif
                                </div>

                            <!-- Bio Text -->
                            <div class="space-y-8">
                                @if ($aboutMe->name)
                                    <div class="mb-8">
                                        <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-100 to-blue-100 rounded-full text-sm font-medium text-green-800 mb-4">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                            Available for new opportunities
                                        </div>
                                        <h1 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-gray-900 via-green-800 to-blue-800 bg-clip-text text-transparent mb-4">
                                            {{ $aboutMe->name }}
                                        </h1>
                                        @if ($aboutMe->title)
                                            <p class="text-2xl text-gray-600 font-semibold capitalize">{{ $aboutMe->title }}</p>
                                        @endif
                                    </div>
                                @endif

                                <div class="text-xl leading-relaxed h-[400px] overflow-y-auto text-gray-700 bg-white/60 backdrop-blur-sm p-6 rounded-xl custom-scrollbar">
                                    {!! nl2br(e($aboutMe->content)) !!}
                                </div>

                                <!-- Quick Stats -->
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="text-center p-4 bg-white/80 backdrop-blur-sm rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                        <div class="text-2xl font-bold text-green-600">{{ count($aboutMe->skills_array ?? []) }}</div>
                                        <div class="text-sm text-gray-600">Skills</div>
                                    </div>
                                    <div class="text-center p-4 bg-white/80 backdrop-blur-sm rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                        <div class="text-2xl font-bold text-blue-600">{{ count($aboutMe->strengths_array ?? []) }}</div>
                                        <div class="text-sm text-gray-600">Strengths</div>
                                    </div>
                                    <div class="text-center p-4 bg-white/80 backdrop-blur-sm rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                        <div class="text-2xl font-bold text-purple-600">5+</div>
                                        <div class="text-sm text-gray-600">Years Exp</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Experience & Education Section -->
                        @if($aboutMe->experience || $aboutMe->education)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-100 to-red-100 rounded-full text-sm font-medium text-orange-800 mb-6">
                                        <span class="w-3 h-3 bg-orange-500 rounded-full mr-2"></span>
                                        My journey
                            </div>
                                    <h2 class="text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6">Experience & Education</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">The path that shaped me into the developer I am today</p>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                                    @if($aboutMe->experience)
                                        <div class="group">
                                            <div class="relative">
                                                <!-- Timeline line -->
                                                <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-orange-400 to-red-400"></div>
                                                
                                                <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                                    <!-- Timeline dot -->
                                                    <div class="absolute left-6 top-8 w-4 h-4 bg-gradient-to-r from-orange-500 to-red-500 rounded-full transform -translate-x-1/2 shadow-lg"></div>
                                                    
                                                    <div class="ml-12">
                                                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300">
                                                            Professional Experience
                                                        </h3>
                                                        <div class="text-gray-600 leading-relaxed">
                                                            {!! nl2br(e($aboutMe->experience)) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($aboutMe->education)
                                        <div class="group">
                                            <div class="relative">
                                                <!-- Timeline line -->
                                                <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-400 to-purple-400"></div>
                                                
                                                <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                                    <!-- Timeline dot -->
                                                    <div class="absolute left-6 top-8 w-4 h-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transform -translate-x-1/2 shadow-lg"></div>
                                                    
                                                    <div class="ml-12">
                                                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">
                                                            Education
                                                        </h3>
                                                        <div class="text-gray-600 leading-relaxed">
                                                            {!! nl2br(e($aboutMe->education)) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Strengths Section -->
                        @if($aboutMe->strengths_array && count($aboutMe->strengths_array) > 0)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-100 to-blue-100 rounded-full text-sm font-medium text-green-800 mb-6">
                                        <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                        What makes me unique
                                    </div>
                                    <h2 class="text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6">My Strengths</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover the qualities that set me apart as a developer and problem solver</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    @foreach($aboutMe->strengths_array as $index => $strength)
                                        <div class="group relative scroll-fade-in">
                                            <!-- Gradient outline wrapper -->
                                            <div class="p-[1.5px] rounded-2xl bg-gradient-to-br from-green-400 via-blue-400 to-purple-400">
                                                <!-- Card -->
                                                <div class="relative rounded-2xl bg-white/90 backdrop-blur-sm border border-gray-100 shadow-sm transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1">
                                                    <div class="p-6 md:p-7">
                                                        <!-- Header row -->
                                                        <div class="flex items-start justify-between mb-4">
                                                            <h3 class="text-2xl font-bold text-gray-900 leading-snug capitalize">
                                                                {{ $strength['title'] }}
                                                            </h3>
                                                            <span class="shrink-0 inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-green-100 to-blue-100 text-green-700 border border-green-200/70">
                                                                #{{ $index + 1 }}
                                                            </span>
                                                        </div>

                                                        <div class="mb-4">
                                                            <span class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-blue-50 text-blue-700 border border-blue-200 capitalize">
                                                                {{ $strength['subtitle'] }}
                                                            </span>
                                                        </div>

                                                        <p class="text-gray-700 leading-relaxed">
                                                            {{ $strength['description'] }}
                                                        </p>
                                                    </div>

                                                    <!-- Previous bottom hover bar kept -->
                                                    <div class="absolute bottom-0 left-1/2 translate-x-[-50%] w-0 h-1 bg-gradient-to-r from-green-500 to-blue-600 rounded-full group-hover:w-[92%] transition-all duration-500"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Skills Section -->
                        @if($aboutMe->skills_array && count($aboutMe->skills_array) > 0)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full text-sm font-medium text-blue-800 mb-6">
                                        <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                                        Technical expertise
                                    </div>
                                    <h2 class="text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6">Technical Skills</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Technologies and tools I master to bring innovative ideas to life</p>
                        </div>

                                <div class="max-w-5xl mx-auto">
                                    @foreach($aboutMe->skills_array as $skill)
                                        <div class="mb-8 group">
                                            <div class="flex items-center justify-between mb-3">
                                                <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 capitalize">
                                                    {{ $skill['name'] }}
                                                </h3>
                                                <span class="text-lg font-bold text-blue-600 group-hover:scale-110 transition-transform duration-300">{{ $skill['percentage'] }}%</span>
                                            </div>
                                                                                         <div class="relative">
                                                 <!-- Background bar -->
                                                 <div class="w-full h-4 bg-gray-200 rounded-full overflow-hidden shadow-inner">
                                                     <!-- Progress bar with gradient -->
                                                     <div class="h-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full transition-all duration-1000 ease-out group-hover:shadow-lg relative overflow-hidden"
                                                          style="width: {{ $skill['percentage'] }}%">
                                                         <!-- Animated shine effect -->
                                                         <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent transform -skew-x-12 group-hover:animate-pulse"></div>
                                                     </div>
                                                 </div>
                                                 <!-- Animated glow effect -->
                                                 <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                             </div>
                                        </div>
                                    @endforeach
                            </div>
                            </div>
                        @endif

                        <!-- Contact Information Section -->
                        @if ($aboutMe->email || $aboutMe->phone || $aboutMe->location || $aboutMe->linkedin || $aboutMe->github)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full text-sm font-medium text-purple-800 mb-6">
                                        <span class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                                        Let's connect
                                    </div>
                                    <h2 class="text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6">Get In Touch</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Ready to discuss your next project? Let's create something amazing together</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                                    @if ($aboutMe->email)
                                        <div class="group relative">
                                            <div class="absolute inset-0 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl transform group-hover:scale-105 transition-all duration-500"></div>
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                            <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300 group-hover:rotate-3">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg group-hover:text-green-600 transition-colors duration-300">Email</h3>
                                                        <a href="mailto:{{ $aboutMe->email }}" class="text-green-600 hover:text-green-700 transition-colors duration-300 font-medium group-hover:scale-105 inline-block break-all">
                                                        {{ $aboutMe->email }}
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->phone)
                                        <div class="group relative">
                                            <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl transform group-hover:scale-105 transition-all duration-500"></div>
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                            <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg">Phone</h3>
                                                        <a href="tel:{{ $aboutMe->phone }}" class="text-blue-600 hover:text-blue-700 transition-colors duration-300 font-medium">
                                                        {{ $aboutMe->phone }}
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->location)
                                        <div class="group relative">
                                            <div class="absolute inset-0 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl transform group-hover:scale-105 transition-all duration-500"></div>
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                            <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg">Location</h3>
                                                        <span class="text-purple-600 font-medium break-words capitalize">{{ $aboutMe->location }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->linkedin || $aboutMe->github)
                                        <div class="group relative">
                                            <div class="absolute inset-0 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl transform group-hover:scale-105 transition-all duration-500"></div>
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                            <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg">Social</h3>
                                                        <div class="flex space-x-4">
                                                        @if ($aboutMe->linkedin)
                                                                <a href="{{ $aboutMe->linkedin }}" target="_blank" class="text-pink-600 hover:text-pink-700 transition-colors duration-300 transform hover:scale-110">
                                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        @if ($aboutMe->github)
                                                                <a href="{{ $aboutMe->github }}" target="_blank" class="text-pink-600 hover:text-pink-700 transition-colors duration-300 transform hover:scale-110">
                                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Call to Action Section -->
                        <div class="text-center py-20 scroll-fade-in">
                            <div class="relative">
                                <!-- Background decoration -->
                                <div class="absolute  inset-0 bg-gradient-to-br from-green-100/50 via-blue-100/50 to-purple-100/50 rounded-3xl blur-3xl"></div>
                                
                                <div class="relative bg-white/80 backdrop-blur-sm rounded-3xl p-16 border border-gray-100 shadow-2xl">
                                    <div class="max-w-4xl mx-auto">
                                        <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent mb-8">
                                            Ready to Work Together?
                                        </h2>
                                        <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto">
                                            Let's turn your ideas into reality. I'm passionate about creating exceptional digital experiences that drive results.
                                        </p>
                                        <div class="flex flex-col sm:flex-row gap-6 justify-center">
                                            <a href="{{ route('contact') }}" 
                                               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-blue-600 text-white font-semibold rounded-2xl hover:from-green-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                </svg>
                                                Start a Project
                                            </a>
                                            <a href="{{ route('services') }}" 
                                               class="inline-flex items-center px-8 py-4 border-2 border-gray-300 text-gray-700 font-semibold rounded-2xl hover:border-blue-500 hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                View Services
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-32">
                        <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-20 max-w-lg mx-auto shadow-2xl border border-gray-100">
                            <div class="text-8xl mb-8">👤</div>
                            <h2 class="text-4xl font-bold text-gray-900 mb-6">About Me</h2>
                            <p class="text-gray-600 text-xl">Information about me will be available soon!</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
    
    <script>
        // Scroll Progress Indicator
        function updateScrollIndicator() {
            const scrollIndicator = document.getElementById('scrollIndicator');
            if (!scrollIndicator) return;
            const scrollTop = window.pageYOffset;
            const docHeight = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
            const scrollPercent = Math.min(100, Math.max(0, (scrollTop / docHeight) * 100));
            scrollIndicator.style.transform = `scaleX(${scrollPercent / 100})`;
        }
        
        // Scroll to Top functionality
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Show/Hide Scroll to Top button
        function toggleScrollToTop() {
            const scrollToTopBtn = document.getElementById('scrollToTop');
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        }
        
        // Scroll Animation Observer
        function initScrollAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);
            
            // Observe all scroll-fade-in elements
            document.querySelectorAll('.scroll-fade-in').forEach(el => {
                observer.observe(el);
            });
        }
        
        // Parallax Background Effect
        function initParallax() {
            const parallaxElements = document.querySelectorAll('.parallax-bg');
            
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                parallaxElements.forEach(element => {
                    element.style.transform = `translateY(${rate}px)`;
                });
            });
        }
        
        // Smooth scroll for anchor links
        function initSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
        
        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initScrollAnimations();
            initParallax();
            initSmoothScroll();
            
            // Add scroll event listeners
            window.addEventListener('scroll', () => {
                updateScrollIndicator();
                toggleScrollToTop();
            });
            
            // Initial call
            updateScrollIndicator();
            toggleScrollToTop();
        });

        // Ensure progress bar resets correctly when navigating back/forward with bfcache
        window.addEventListener('pageshow', function() {
            requestAnimationFrame(() => updateScrollIndicator());
        });
        
        // Enhanced scroll performance
        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateScrollIndicator);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick, { passive: true });
    </script>
@endsection