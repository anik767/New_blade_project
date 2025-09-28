@extends('layouts.site')
@section('title', 'About')
@section('description', 'Learn more about Azmain Iqtidar Anik - Frontend Developer.')
@section('content')
    
    
            <div class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 text-gray-800 min-h-screen relative overflow-hidden">
                     <!-- Clean Scroll Progress Indicator -->
             <div class="scroll-indicator" id="scrollIndicator" style="position:fixed;top:0;left:0;height:3px;width:100%;transform:scaleX(0);transform-origin:left;background:linear-gradient(90deg,#1e40af,#3b82f6,#60a5fa);z-index:50;transition:transform 120ms linear"></div>
             
             <!-- Clean Scroll to Top Button -->
             <div class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-r from-purple-500 to-indigo-500 border-0 rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 cursor-pointer z-40 opacity-0 invisible">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </div>
        
                     <!-- Light Theme Background Elements -->
             <div class="absolute inset-0 pointer-events-none">
                 <!-- Soft floating orbs -->
                 <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-r from-blue-200/40 to-indigo-200/40 rounded-full blur-3xl animate-pulse"></div>
                 <div class="absolute top-40 right-20 w-48 h-48 bg-gradient-to-r from-indigo-200/40 to-purple-200/40 rounded-full blur-3xl animate-pulse delay-1000"></div>
                 <div class="absolute top-80 left-1/4 w-56 h-56 bg-gradient-to-r from-purple-200/40 to-pink-200/40 rounded-full blur-3xl animate-pulse delay-500"></div>
                 <div class="absolute top-96 right-1/3 w-40 h-40 bg-gradient-to-r from-pink-200/40 to-rose-200/40 rounded-full blur-3xl animate-pulse delay-2000"></div>
                 <div class="absolute top-1/2 left-20 w-72 h-72 bg-gradient-to-r from-rose-200/40 to-orange-200/40 rounded-full blur-3xl animate-pulse delay-1500"></div>
                 <div class="absolute bottom-40 right-10 w-60 h-60 bg-gradient-to-r from-orange-200/40 to-yellow-200/40 rounded-full blur-3xl animate-pulse delay-3000"></div>
                 
                 <!-- Subtle geometric patterns -->
                 <div class="absolute top-32 right-32 w-24 h-24 border border-blue-200/30 rounded-full animate-spin-slow"></div>
                 <div class="absolute bottom-32 left-32 w-20 h-20 border border-indigo-200/30 rounded-full animate-spin-slow-reverse"></div>
             </div>
        <x-site.banner title="About Me"
            subtitle="Passionate frontend developer with a love for creating beautiful, functional, and user-friendly web experiences."
            :badge="optional($pageBanner)->badge ?? 'My Story'"
            :badgeColor="optional($pageBanner)->badge_color ?? 'blue'"
            :banner="$banner" :pageBanner="$pageBanner" />

        <!-- Main Content Section -->
        <section class="py-24">
            <div class="container mx-auto px-6">
                @if ($aboutMe)
                    <div class="max-w-7xl mx-auto">
                        <!-- Enhanced Profile Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32 scroll-fade-in">
                            <!-- Enhanced Profile Photo -->
                            <div class="relative group">
                                @if ($aboutMe->image)
                                    <div class="relative">
                                        <!-- Enhanced background blur effect -->
                                        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[90%] h-[90%] bg-gradient-to-br from-green-400/30 via-blue-500/20 to-purple-500/30 rounded-full blur-3xl group-hover:blur-2xl transition-all duration-1000 animate-pulse"></div>
                                        
                                        <!-- Main image with enhanced styling -->
                                        <div class="relative z-10">
                                            <img src="{{ asset('storage/' . $aboutMe->image) }}" alt="{{ $aboutMe->name }}"
                                                class="relative w-full h-auto max-h-[600px] mx-auto rounded-3xl object-contain transition-all duration-700 group-hover:scale-105  ">
                                        </div>
                                        
                                        <!-- Enhanced floating elements -->
                                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-full animate-pulse shadow-lg"></div>
                                        <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full animate-pulse delay-1000 shadow-lg"></div>
                                        <div class="absolute top-1/2 -right-6 w-4 h-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full animate-pulse delay-500 shadow-lg"></div>
                                        
                                        <!-- Additional floating elements for more visual interest -->
                                        <div class="absolute top-1/4 -left-8 w-3 h-3 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full animate-bounce delay-300"></div>
                                        <div class="absolute bottom-1/4 -right-8 w-5 h-5 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full animate-ping delay-700"></div>
                                    </div>
                                @else
                                    <div class="relative">
                                        <!-- Enhanced background blur effect -->
                                        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[90%] h-[90%] bg-gradient-to-br from-green-400/30 via-blue-500/20 to-purple-500/30 rounded-full blur-3xl group-hover:blur-2xl transition-all duration-700 animate-pulse"></div>
                                        
                                        <!-- Placeholder image with enhanced styling -->
                                        <div class="relative z-10">
                                            <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 via-blue-500/20 to-purple-500/20 rounded-3xl blur-xl"></div>
                                            <img src="/images/Image_not_found.jpg" alt="{{ $aboutMe->name }}"
                                                class="relative w-full h-[500px] mx-auto rounded-3xl object-cover shadow-2xl border-4 border-white/50 transition-all duration-700 group-hover:scale-105 group-hover:shadow-3xl">
                                        </div>
                                        
                                        <!-- Enhanced floating elements -->
                                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-full animate-spin shadow-lg"></div>
                                        <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full animate-ping delay-1000 shadow-lg"></div>
                                        <div class="absolute top-1/2 -right-6 w-4 h-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full animate-bounce delay-500 shadow-lg"></div>
                                        
                                        <!-- Additional floating elements -->
                                        <div class="absolute top-1/4 -left-8 w-3 h-3 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full animate-bounce delay-300"></div>
                                        <div class="absolute bottom-1/4 -right-8 w-5 h-5 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full animate-ping delay-700"></div>
                                    </div>
                                @endif
                            </div>

                            <!-- Clean Bio Text -->
                            <div class="space-y-8">
                                @if ($aboutMe->name)
                                    <div class="mb-8">
                                        <!-- Clean status badge -->
                                        <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-rose-100 to-pink-100 rounded-full text-sm font-medium text-rose-700 mb-6 border border-rose-200 shadow-sm">
                                            <span class="w-3 h-3 bg-gradient-to-r from-rose-400 to-pink-400 rounded-full mr-3 animate-pulse"></span>
                                            Available for new opportunities
                                        </div>
                                        
                                        <!-- Clean name with rose gradient -->
                                        <h1 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-blue-600 via-blue-500 to-fuchsia-600 bg-clip-text text-transparent mb-6 leading-tight">
                                            {{ $aboutMe->name }}
                                        </h1>
                                        
                                        @if ($aboutMe->title)
                                            <p class="text-2xl text-gray-600 font-semibold capitalize">{{ $aboutMe->title }}</p>
                                        @endif
                                    </div>
                                @endif

                                <!-- Clean content area -->
                                <div class="relative group">
                                    <div class="absolute inset-0 bg-gradient-to-br from-rose-100 to-pink-100 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                                    <div class="relative text-xl leading-relaxed h-[400px] overflow-y-auto text-gray-700 bg-white/90 backdrop-blur-sm p-8 rounded-2xl custom-scrollbar border border-rose-200 shadow-xl hover:shadow-2xl transition-all duration-500">
                                        {!! nl2br(e($aboutMe->content)) !!}
                                    </div>
                                </div>

                                <!-- Clean Quick Stats -->
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="group relative">
                                        <div class="absolute inset-0 bg-gradient-to-br from-rose-100 to-pink-100 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                                        <div class="relative text-center p-6 bg-white/90 backdrop-blur-sm rounded-2xl border border-rose-200 shadow-lg hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2 group-hover:scale-105">
                                            <div class="text-3xl font-bold text-rose-600 group-hover:text-rose-700 transition-colors duration-300">{{ count($aboutMe->skills_array ?? []) }}</div>
                                            <div class="text-sm text-gray-600 font-medium">Skills</div>
                                        </div>
                                    </div>
                                    <div class="group relative">
                                        <div class="absolute inset-0 bg-gradient-to-br from-pink-100 to-fuchsia-100 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                                        <div class="relative text-center p-6 bg-white/90 backdrop-blur-sm rounded-2xl border border-pink-200 shadow-lg hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2 group-hover:scale-105">
                                            <div class="text-3xl font-bold text-pink-600 group-hover:text-pink-700 transition-colors duration-300">{{ count($aboutMe->strengths_array ?? []) }}</div>
                                            <div class="text-sm text-gray-600 font-medium">Strengths</div>
                                        </div>
                                    </div>
                                    <div class="group relative">
                                        <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-100 to-purple-100 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                                        <div class="relative text-center p-6 bg-white/90 backdrop-blur-sm rounded-2xl border border-fuchsia-200 shadow-lg hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2 group-hover:scale-105">
                                            <div class="text-3xl font-bold text-fuchsia-600 group-hover:text-fuchsia-700 transition-colors duration-300">5+</div>
                                            <div class="text-sm text-gray-600 font-medium">Years Exp</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Clean Experience & Education Section -->
                        @if($aboutMe->experience || $aboutMe->education)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <!-- Clean badge -->
                                    <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-rose-100 to-pink-100 rounded-full text-sm font-medium text-rose-700 mb-8 border border-rose-200 shadow-sm">
                                        <span class="w-3 h-3 bg-gradient-to-r from-rose-400 to-pink-400 rounded-full mr-3 animate-pulse"></span>
                                        My journey
                                    </div>
                                    
                                    <!-- Clean title with rose gradient -->
                                    <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-rose-600 via-pink-600 to-fuchsia-600 bg-clip-text text-transparent mb-8 leading-tight">Experience & Education</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">The path that shaped me into the developer I am today</p>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                                    @if($aboutMe->experience)
                                        <div class="group">
                                            <div class="relative">
                                                <!-- Clean timeline line -->
                                                <div class="absolute left-6 top-0 bottom-0 w-1 bg-gradient-to-b from-rose-400 via-pink-400 to-fuchsia-400 shadow-lg"></div>
                                                
                                                <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-8 border border-rose-200 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2 group-hover:scale-105">
                                                    <!-- Clean timeline dot -->
                                                    <div class="absolute left-6 top-8 w-5 h-5 bg-gradient-to-r from-rose-400 to-pink-400 rounded-full transform -translate-x-1/2 shadow-xl animate-pulse"></div>
                                                    
                                                    <div class="ml-12">
                                                        <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-rose-600 transition-colors duration-300">
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
                                                <!-- Clean timeline line -->
                                                <div class="absolute left-6 top-0 bottom-0 w-1 bg-gradient-to-b from-pink-400 via-fuchsia-400 to-purple-400 shadow-lg"></div>
                                                
                                                <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-8 border border-pink-200 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2 group-hover:scale-105">
                                                    <!-- Clean timeline dot -->
                                                    <div class="absolute left-6 top-8 w-5 h-5 bg-gradient-to-r from-pink-400 to-fuchsia-400 rounded-full transform -translate-x-1/2 shadow-xl animate-pulse"></div>
                                                    
                                                    <div class="ml-12">
                                                        <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-pink-600 transition-colors duration-300">
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

                        <!-- New Light Theme Strengths Section -->
                        @if($aboutMe && $aboutMe->strengths_array && count($aboutMe->strengths_array) > 0)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <!-- Badge -->
                                    <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-full text-sm font-medium text-blue-700 mb-8 border border-blue-200 shadow-sm">
                                        <span class="w-3 h-3 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-full mr-3 animate-pulse"></span>
                                        What makes me unique
                                    </div>
                                    
                                    <!-- Title -->
                                    <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent mb-8 leading-tight">My Strengths</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Discover the qualities that set me apart as a developer and problem solver</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                                    @foreach($aboutMe->strengths_array as $index => $strength)
                                        <div class="group relative scroll-fade-in">
                                            <!-- Modern Card Design -->
                                            <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl p-10 border border-blue-100 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 overflow-hidden">
                                                
                                                <!-- Left Border Accent -->
                                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-400 via-indigo-400 to-purple-400 group-hover:scale-y-110 transition-transform duration-500 origin-top"></div>
                                                
                                                <!-- Top Right Corner Number -->
                                                <div class="absolute top-6 right-6 w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                    <span class="text-white font-bold text-lg">{{ $index + 1 }}</span>
                                                </div>
                                                
                                                <!-- Content -->
                                                <div class="relative z-10 pr-16">
                                                    <!-- Title -->
                                                    <h3 class="text-2xl font-bold text-gray-800 mb-4 leading-tight capitalize group-hover:text-blue-600 transition-colors duration-300">
                                                        {{ $strength['title'] }}
                                                    </h3>
                                                    
                                                    <!-- Subtitle -->
                                                    <div class="mb-4">
                                                        <span class="inline-block px-4 py-2 text-sm font-medium rounded-full bg-blue-50 text-blue-700 border border-blue-200 capitalize shadow-sm">
                                                            {{ $strength['subtitle'] }}
                                                        </span>
                                                    </div>
                                                    
                                                    <!-- Description Text -->
                                                    <div class="mb-6">
                                                        <p class="text-gray-600 leading-relaxed text-base">
                                                            {{ $strength['subtitle'] }}
                                                        </p>
                                                    </div>
                                                    
                                                    <!-- Bottom Glow Line -->
                                                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-400 via-indigo-400 to-purple-400 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-700 ease-out"></div>
                                                </div>
                                                
                                                <!-- Background Pattern -->
                                                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-200/20 to-indigo-200/20 rounded-full blur-2xl group-hover:blur-xl transition-all duration-500"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Enhanced Skills Section -->
                        @if($aboutMe->skills_array && count($aboutMe->skills_array) > 0)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <!-- Enhanced badge -->
                                    <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-100 via-purple-100 to-indigo-100 rounded-full text-sm font-medium text-blue-800 mb-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                        <span class="w-3 h-3 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mr-3 animate-pulse shadow-lg"></span>
                                        Technical expertise
                                    </div>
                                    
                                    <!-- Enhanced title with gradient -->
                                    <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent mb-8 leading-tight">Technical Skills</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Technologies and tools I master to bring innovative ideas to life</p>
                                </div>

                                <div class="max-w-5xl mx-auto">
                                    @foreach($aboutMe->skills_array as $skill)
                                        <div class="mb-10 group">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 capitalize">
                                                    {{ $skill['name'] }}
                                                </h3>
                                                <span class="text-lg font-bold text-blue-600 group-hover:scale-110 transition-transform duration-300 bg-white/80 backdrop-blur-sm px-3 py-1 rounded-full shadow-sm">
                                                    {{ $skill['percentage'] }}%
                                                </span>
                                            </div>
                                            
                                            <div class="relative">
                                                <!-- Enhanced background bar -->
                                                <div class="w-full h-5 bg-gray-200 rounded-full overflow-hidden shadow-inner border border-gray-100">
                                                    <!-- Enhanced progress bar with gradient -->
                                                    <div class="h-full bg-gradient-to-r from-blue-500 via-purple-600 to-indigo-600 rounded-full transition-all duration-1000 ease-out group-hover:shadow-lg relative overflow-hidden shadow-md"
                                                         style="width: {{ $skill['percentage'] }}%">
                                                        <!-- Enhanced animated shine effect -->
                                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent transform -skew-x-12 group-hover:animate-pulse"></div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Enhanced animated glow effect -->
                                                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/30 to-purple-400/30 rounded-full blur-md opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Enhanced Contact Information Section -->
                        @if ($aboutMe->email || $aboutMe->phone || $aboutMe->location || $aboutMe->linkedin || $aboutMe->github)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <!-- Enhanced badge -->
                                    <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-100 via-pink-100 to-rose-100 rounded-full text-sm font-medium text-purple-800 mb-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                        <span class="w-3 h-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mr-3 animate-pulse shadow-lg"></span>
                                        Let's connect
                                    </div>
                                    
                                    <!-- Enhanced title with gradient -->
                                    <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-gray-900 via-purple-800 to-pink-800 bg-clip-text text-transparent mb-8 leading-tight">Get In Touch</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Ready to discuss your next project? Let's create something amazing together</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                                    @if ($aboutMe->email)
                                        <div class="group relative">
                                            
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
                                            
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                                <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300 group-hover:rotate-3">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg group-hover:text-blue-600 transition-colors duration-300">Phone</h3>
                                                        <a href="tel:{{ $aboutMe->phone }}" class="text-blue-600 hover:text-blue-700 transition-colors duration-300 font-medium group-hover:scale-105 inline-block break-all">
                                                            {{ $aboutMe->phone }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->location)
                                        <div class="group relative">
                                            
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                                <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300 group-hover:rotate-3">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg group-hover:text-purple-600 transition-colors duration-300">Location</h3>
                                                        <span class="text-purple-600 font-medium break-words capitalize group-hover:scale-105 inline-block">{{ $aboutMe->location }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($aboutMe->linkedin || $aboutMe->github)
                                        <div class="group relative">
                                            
                                            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                                                <div class="flex items-center space-x-4">
                                                    <div class="p-4 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300 group-hover:rotate-3">
                                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="font-bold text-gray-900 mb-2 text-lg group-hover:text-pink-600 transition-colors duration-300">Social</h3>
                                                        <div class="flex space-x-4">
                                                            @if ($aboutMe->linkedin)
                                                                <a href="{{ $aboutMe->linkedin }}" target="_blank" class="text-pink-600 hover:text-pink-700 transition-colors duration-300 transform hover:scale-110 group-hover:scale-105 inline-block">
                                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                                                    </svg>
                                                                </a>
                                                            @endif
                                                            @if ($aboutMe->github)
                                                                <a href="{{ $aboutMe->github }}" target="_blank" class="text-pink-600 hover:text-pink-700 transition-colors duration-300 transform hover:scale-110 group-hover:scale-105 inline-block">
                                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                                        <path d="M12.017 0C5.396 0 .029 5.367 .029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z" />
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

                        <!-- Map Section -->
                        @if($aboutMe && $aboutMe->map_embed_code)
                            <div class="mb-32 scroll-fade-in">
                                <div class="text-center mb-20">
                                    <!-- Badge -->
                                    <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-100 to-teal-100 rounded-full text-sm font-medium text-emerald-700 mb-8 border border-emerald-200 shadow-sm">
                                        <span class="w-3 h-3 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full mr-3 animate-pulse"></span>
                                        Find me here
                                    </div>
                                    
                                    <!-- Title -->
                                    <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent mb-8 leading-tight">Location</h2>
                                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Based in {{ $aboutMe->location ?? 'Dhaka, Bangladesh' }} - Ready to work with clients worldwide</p>
                                </div>

                                <div class="max-w-6xl mx-auto">
                                    <div class="relative">
                                        <!-- Background decoration -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-100/40 via-teal-100/40 to-cyan-100/40 rounded-3xl blur-3xl"></div>
                                        
                                        <!-- Map container -->
                                        <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-8 border border-emerald-200 shadow-2xl overflow-hidden">
                                            <div class="w-full h-96 rounded-2xl overflow-hidden border-2 border-emerald-100 shadow-lg">
                                                {!! $aboutMe->map_embed_code !!}
                                            </div>
                                            
                                            <!-- Location info overlay -->
                                            @if($aboutMe->location)
                                                <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-sm rounded-2xl px-6 py-4 border border-emerald-200 shadow-lg">
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h3 class="font-bold text-gray-800">Location</h3>
                                                            <p class="text-emerald-600 font-medium">{{ $aboutMe->location }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Enhanced Call to Action Section -->
                        <div class="text-center py-20 scroll-fade-in">
                            <div class="relative">
                                <!-- Enhanced background decoration -->
                                <div class="absolute inset-0 bg-gradient-to-br from-green-100/40 via-blue-100/40 to-purple-100/40 rounded-3xl blur-3xl"></div>
                                
                                <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-20 border border-gray-100 shadow-2xl hover:shadow-3xl transition-all duration-500">
                                    <div class="max-w-4xl mx-auto">
                                        <!-- Enhanced title with better gradient -->
                                        <h2 class="text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent mb-8 leading-tight">
                                            Ready to Work Together?
                                        </h2>
                                        <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                                            Let's turn your ideas into reality. I'm passionate about creating exceptional digital experiences that drive results.
                                        </p>
                                        
                                        <!-- Enhanced buttons -->
                                        <div class="flex flex-col sm:flex-row gap-8 justify-center">
                                            <x-site.custom-button 
                                                variant="blue" 
                                                href="{{ route('contact') }}" 
                                                size="large"
                                                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>'>
                                                Start a Project
                                            </x-site.custom-button>
                                            <x-site.custom-button 
                                                variant="secondary" 
                                                href="{{ route('services') }}" 
                                                size="large"
                                                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>'>
                                                View Services
                                            </x-site.custom-button>
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
    
    <style>
        /* Enhanced Scroll to Top Button */
        .scroll-to-top {
            transition: all 0.3s ease-in-out;
        }
        
        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #22c55e, #3b82f6);
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #16a34a, #2563eb);
        }
        
        /* Enhanced animations */
        .scroll-fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        
        .scroll-fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
                             /* Enhanced hover effects */
                     .group:hover .group-hover\:scale-105 {
                         transform: scale(1.05);
                     }
                     
                     .group:hover .group-hover\:-translate-y-2 {
                         transform: translateY(-0.5rem);
                     }
                     
                     /* Custom animations for new design */
                     @keyframes spin-slow {
                         from { transform: rotate(0deg); }
                         to { transform: rotate(360deg); }
                     }
                     
                     @keyframes spin-slow-reverse {
                         from { transform: rotate(360deg); }
                         to { transform: rotate(0deg); }
                     }
                     
                     .animate-spin-slow {
                         animation: spin-slow 20s linear infinite;
                     }
                     
                     .animate-spin-slow-reverse {
                         animation: spin-slow-reverse 25s linear infinite;
                     }
    </style>
    
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
                scrollToTopBtn.classList.remove('opacity-0', 'invisible');
                scrollToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollToTopBtn.classList.remove('visible', 'opacity-100');
                scrollToTopBtn.classList.add('opacity-0', 'invisible');
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