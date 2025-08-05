<nav class="header_bg text-text  fixed top-0 left-0 right-0 z-50 transition-transform duration-300 ease-in-out"
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
     :style="isVisible ? 'transform: translateY(0)' : 'transform: translateY(-100%)'"
     :class="{ 
       ' header_bg backdrop-blur-sm text-text': scrolled, 
       'header_bg text-text': !scrolled
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-text">
                        Your Name
                    </a>
                </div>
                
                <!-- Desktop navigation -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}" 
                       class="inline-flex text-text items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'border-accent text-text' : 'border-transparent text-muted hover:border-muted hover:text-text' }}">
                        Home
                    </a>
                    
                    <a href="{{ route('about') }}" 
                       class="inline-flex text-text items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'border-accent text-text' : 'border-transparent text-muted hover:border-muted hover:text-text' }}">
                        About Me
                    </a>
                    
                    <a href="{{ route('services') }}" 
                       class="inline-flex text-text items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('services') ? 'border-accent text-text' : 'border-transparent text-muted hover:border-muted hover:text-text' }}">
                        Services
                    </a>
                    
                    <a href="{{ route('projects.index') }}" 
                       class="inline-flex text-text items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('projects.*') ? 'border-accent text-text' : 'border-transparent text-muted hover:border-muted hover:text-text' }}">
                        Projects
                    </a>
                    
                    <a href="{{ route('site.blog.index') }}" 
                       class="inline-flex text-text items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('site.blog.*') ? 'border-accent text-text' : 'border-transparent text-muted hover:border-muted hover:text-text' }}">
                        Blog
                    </a>
                    
                    <a href="{{ route('contact') }}" 
                       class="inline-flex text-text items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'border-accent text-text' : 'border-transparent text-muted hover:border-muted hover:text-text' }}">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                    <a href="{{ route('admin.dashboard') }}" 
                       class="inline-flex text-text items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-background bg-accent hover:bg-accent/90 transition-colors duration-200 shadow-btn hover:shadow-btn-hover">
                        Admin Panel
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="inline-flex text-text items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-accent bg-accent/10 hover:bg-accent/20 transition-colors duration-200 shadow-btn hover:shadow-btn-hover">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-muted hover:text-text hover:bg-muted/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent transition-colors duration-200 shadow-btn hover:shadow-btn-hover"
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
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-accent/10 border-accent text-accent' : 'border-transparent text-muted hover:bg-muted/10 hover:border-muted hover:text-text' }}">
                Home
            </a>
            
            <a href="{{ route('about') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'bg-accent/10 border-accent text-accent' : 'border-transparent text-muted hover:bg-muted/10 hover:border-muted hover:text-text' }}">
                About Me
            </a>
            
            <a href="{{ route('services') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('services') ? 'bg-accent/10 border-accent text-accent' : 'border-transparent text-muted hover:bg-muted/10 hover:border-muted hover:text-text' }}">
                Services
            </a>
            
            <a href="{{ route('projects.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('projects.*') ? 'bg-accent/10 border-accent text-accent' : 'border-transparent text-muted hover:bg-muted/10 hover:border-muted hover:text-text' }}">
                Projects
            </a>
            
            <a href="{{ route('site.blog.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('site.blog.*') ? 'bg-accent/10 border-accent text-accent' : 'border-transparent text-muted hover:bg-muted/10 hover:border-muted hover:text-text' }}">
                Blog
            </a>
            
            <a href="{{ route('contact') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'bg-accent/10 border-accent text-accent' : 'border-transparent text-muted hover:bg-muted/10 hover:border-muted hover:text-text' }}">
                Contact
            </a>
        </div>
        
        <div class="pt-4 pb-3 border-t border-card">
            @auth
                <div class="px-4">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="block px-4 py-2 text-base font-medium text-muted hover:text-text hover:bg-muted/10 transition-colors duration-200 shadow-btn hover:shadow-btn-hover">
                        Admin Panel
                    </a>
                </div>
            @else
                <div class="px-4">
                    <a href="{{ route('login') }}" 
                       class="block px-4 py-2 text-base font-medium text-muted hover:text-text hover:bg-muted/10 transition-colors duration-200 shadow-btn hover:shadow-btn-hover">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav> 