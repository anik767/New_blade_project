<nav class="bg-transparent max-w-7xl mx-auto rounded-[16px] translate-y-[10px] shadow-none fixed top-0 left-0 right-0 z-50  transition-transform duration-300 ease-in-out" 
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
     :style="isVisible ? 'transform: translateY(10px)' : 'transform: translateY(-100%)'"
     :class="{ 
       'shadow-lg   backdrop-blur-sm ': scrolled, 
       'bg-transparent border-b border-transparent shadow-none': !scrolled
     }">
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-10">
            <!-- Left side -->
            <div class="flex">
                
                
                <!-- Desktop navigation -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-2">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-3 py-1 border-b-2 text-sm font-medium rounded-lg backdrop-blur-sm transition-all duration-200 {{ request()->routeIs('home') ? 'border-blue-500 text-gray-900 bg-white/50' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 hover:bg-white/30' }}">
                        Home
                    </a>
                    
                    <a href="{{ route('about') }}" 
                       class="inline-flex items-center px-3 py-1 border-b-2 text-sm font-medium rounded-lg backdrop-blur-sm transition-all duration-200 {{ request()->routeIs('about') ? 'border-blue-500 text-gray-900 bg-white/50' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 hover:bg-white/30' }}">
                        About Me
                    </a>
                    
                    <a href="{{ route('services') }}" 
                       class="inline-flex items-center px-3 py-1 border-b-2 text-sm font-medium rounded-lg backdrop-blur-sm transition-all duration-200 {{ request()->routeIs('services') ? 'border-blue-500 text-gray-900 bg-white/50' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 hover:bg-white/30' }}">
                        Services
                    </a>
                    
                    <a href="{{ route('projects.index') }}" 
                       class="inline-flex items-center px-3 py-1 border-b-2 text-sm font-medium rounded-lg backdrop-blur-sm transition-all duration-200 {{ request()->routeIs('projects.*') ? 'border-blue-500 text-gray-900 bg-white/50' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 hover:bg-white/30' }}">
                        Projects
                    </a>
                    
                    <a href="{{ route('site.blog.index') }}" 
                       class="inline-flex items-center px-3 py-1 border-b-2 text-sm font-medium rounded-lg backdrop-blur-sm transition-all duration-200 {{ request()->routeIs('site.blog.*') ? 'border-blue-500 text-gray-900 bg-white/50' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 hover:bg-white/30' }}">
                        Blog
                    </a>
                    
                    <a href="{{ route('contact') }}" 
                       class="inline-flex items-center px-3 py-1 border-b-2 text-sm font-medium rounded-lg backdrop-blur-sm transition-all duration-200 {{ request()->routeIs('contact') ? 'border-blue-500 text-gray-900 bg-white/50' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 hover:bg-white/30' }}">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                    <a href="{{ route('admin.dashboard') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                        Admin Panel
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200 transition-colors duration-200">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-colors duration-200"
                        aria-controls="mobile-menu" 
                        aria-expanded="false"
                        @click="mobileMenuOpen = !mobileMenuOpen">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" 
         id="mobile-menu" 
         x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-100 transform"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75 transform"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Home
            </a>
            
            <a href="{{ route('about') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                About Me
            </a>
            
            <a href="{{ route('services') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('services') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Services
            </a>
            
            <a href="{{ route('projects.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('projects.*') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Projects
            </a>
            
            <a href="{{ route('site.blog.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('site.blog.*') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Blog
            </a>
            
            <a href="{{ route('contact') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Contact
            </a>
        </div>
        
        <div class="pt-4 pb-3 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 transition-colors duration-200">
                        Admin Panel
                    </a>
                </div>
            @else
                <div class="px-4">
                    <a href="{{ route('login') }}" 
                       class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 transition-colors duration-200">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav> 