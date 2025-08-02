<nav class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                        Admin Panel
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        Dashboard
                    </a>
                    
                    <a href="{{ route('admin.about-me.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.about-me.*') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        About Me
                    </a>
                    
                    <a href="{{ route('admin.services.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.services.*') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        Services
                    </a>
                    
                    <a href="{{ route('admin.projects.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.projects.*') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        Projects
                    </a>
                    
                    <a href="{{ route('admin.blog.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.blog.*') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        Blog
                    </a>
                    
                    <a href="{{ route('admin.contacts.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.contacts.*') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        Contact
                    </a>
                    
                    <a href="{{ route('admin.contact-messages.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('admin.contact-messages.*') ? 'border-blue-500 text-white' : 'border-transparent text-gray-300 hover:border-gray-300 hover:text-white' }}">
                        Messages
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-300 hover:text-white">
                    View Site
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" 
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-300 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" 
                        aria-expanded="false"
                        x-data="{ open: false }"
                        @click="open = !open">
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
         x-data="{ open: false }"
         x-show="open"
         x-transition:enter="transition ease-out duration-100 transform"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75 transform"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                Dashboard
            </a>
            
            <a href="{{ route('admin.about-me.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.about-me.*') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                About Me
            </a>
            
            <a href="{{ route('admin.services.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.services.*') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                Services
            </a>
            
            <a href="{{ route('admin.projects.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.projects.*') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                Projects
            </a>
            
            <a href="{{ route('admin.blog.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.blog.*') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                Blog
            </a>
            
            <a href="{{ route('admin.contacts.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                Contact
            </a>
            
            <a href="{{ route('admin.contact-messages.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('admin.contact-messages.*') ? 'bg-blue-800 border-blue-500 text-white' : 'border-transparent text-gray-300 hover:bg-gray-700 hover:border-gray-300 hover:text-white' }}">
                Messages
            </a>
        </div>
        
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="px-4 space-y-2">
                <a href="{{ route('home') }}" 
                   class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-300 hover:text-white">
                    View Site
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-300 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav> 