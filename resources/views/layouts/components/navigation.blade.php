<nav class="glass fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out" 
     x-data="{ mobileMenuOpen: false, scrolled: false, lastScrollY: 0, isVisible: true }"
     x-init="
        window.addEventListener('scroll', () => { 
          scrolled = window.pageYOffset > 10;
          const currentScrollY = window.pageYOffset;
          
          if (currentScrollY > lastScrollY && currentScrollY > 100) {
            // Scrolling down - hide navbar
            isVisible = false;
          } else if (currentScrollY < lastScrollY) {
            // Scrolling up - show navbar
            isVisible = true;
          }
          
          lastScrollY = currentScrollY;
        })
     "
     :style="isVisible ? 'transform: translateY(0)' : 'transform: translateY(-110%)'"
     :class="{ 
       'shadow-2xl backdrop-blur-xl bg-white/10 border-b border-white/20': scrolled, 
       'bg-transparent': !scrolled
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Left side -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <span class="text-white font-bold text-lg">A</span>
                        </div>
                        <div>
                            <div class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300">
                                Azmain Anik
                            </div>
                            <div class="text-xs text-gray-400 font-medium">Frontend Developer</div>
                        </div>
                    </a>
                </div>
                
                <!-- Desktop navigation -->
                <div class="hidden sm:ml-8 sm:flex sm:space-x-1">
                    <a href="{{ route('home') }}" 
                       class="nav-link inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('home') ? 'text-blue-400 active' : 'text-gray-300 hover:text-white' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                    
                    <a href="{{ route('about') }}" 
                       class="nav-link inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('about') ? 'text-blue-400 active' : 'text-gray-300 hover:text-white' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        About Me
                    </a>
                    
                    <a href="{{ route('services') }}" 
                       class="nav-link inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('services') ? 'text-blue-400 active' : 'text-gray-300 hover:text-white' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Services
                    </a>
                    
                    <a href="{{ route('projects.index') }}" 
                       class="nav-link inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('projects.*') ? 'text-blue-400 active' : 'text-gray-300 hover:text-white' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Projects
                    </a>
                    
                    <a href="{{ route('site.blog.index') }}" 
                       class="nav-link inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('site.blog.*') ? 'text-blue-400 active' : 'text-gray-300 hover:text-white' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Blog
                    </a>
                    
                    <a href="{{ route('contact') }}" 
                       class="nav-link inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('contact') ? 'text-blue-400 active' : 'text-gray-300 hover:text-white' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                    <a href="{{ route('admin.dashboard') }}" 
                       class="btn-modern inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Admin Panel
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="btn-modern inline-flex items-center px-6 py-3 border border-blue-500 text-sm font-medium rounded-xl text-blue-400 bg-blue-500/10 hover:bg-blue-500/20 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button type="button" 
                        class="inline-flex items-center justify-center p-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-300"
                        aria-controls="mobile-menu" 
                        aria-expanded="false"
                        @click="mobileMenuOpen = !mobileMenuOpen">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!mobileMenuOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="mobileMenuOpen" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" 
         id="mobile-menu" 
         x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         style="display: none;">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white/10 backdrop-blur-xl border-t border-white/20">
            <a href="{{ route('home') }}" 
               class="block px-3 py-3 rounded-xl text-base font-medium transition-all duration-300 {{ request()->routeIs('home') ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                </div>
            </a>
            
            <a href="{{ route('about') }}" 
               class="block px-3 py-3 rounded-xl text-base font-medium transition-all duration-300 {{ request()->routeIs('about') ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    About Me
                </div>
            </a>
            
            <a href="{{ route('services') }}" 
               class="block px-3 py-3 rounded-xl text-base font-medium transition-all duration-300 {{ request()->routeIs('services') ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Services
                </div>
            </a>
            
            <a href="{{ route('projects.index') }}" 
               class="block px-3 py-3 rounded-xl text-base font-medium transition-all duration-300 {{ request()->routeIs('projects.*') ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Projects
                </div>
            </a>
            
            <a href="{{ route('site.blog.index') }}" 
               class="block px-3 py-3 rounded-xl text-base font-medium transition-all duration-300 {{ request()->routeIs('site.blog.*') ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Blog
                </div>
            </a>
            
            <a href="{{ route('contact') }}" 
               class="block px-3 py-3 rounded-xl text-base font-medium transition-all duration-300 {{ request()->routeIs('contact') ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact
                </div>
            </a>
        </div>
        
        <div class="pt-4 pb-3 border-t border-white/20 bg-white/5">
            @auth
                <div class="px-4">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="btn-modern block px-4 py-3 text-base font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300 rounded-xl">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Admin Panel
                        </div>
                    </a>
                </div>
            @else
                <div class="px-4">
                    <a href="{{ route('login') }}" 
                       class="btn-modern block px-4 py-3 text-base font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300 rounded-xl">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </div>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav> 