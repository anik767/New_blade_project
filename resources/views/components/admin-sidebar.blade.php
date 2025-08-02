<div x-data="{ sidebarOpen: true }" class="flex h-screen bg-white">
    <!-- Sidebar -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg lg:relative lg:translate-x-0"
         id="sidebar">
        
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between h-16 px-6 bg-gray-800 text-white">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <!-- Mobile close button -->
            <button @click="sidebarOpen = false" class="lg:hidden" onclick="toggleSidebar(false)">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="mt-6 px-4">
            <div class="space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                    Dashboard
                </a>

                <!-- About Me -->
                <a href="{{ route('admin.about-me.edit') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.about-me.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    About Me
                </a>

                <!-- Services -->
                <a href="{{ route('admin.services.index') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.services.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Services
                </a>

                <!-- Projects -->
                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.projects.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Projects
                </a>

                <!-- Blog -->
                <a href="{{ route('admin.blog.index') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.blog.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Blog
                </a>

                <!-- Contact -->
                <a href="{{ route('admin.contacts.edit') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.contacts.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact
                </a>

                <!-- Messages -->
                <a href="{{ route('admin.contact-messages.index') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.contact-messages.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Messages
                </a>

                <!-- Comments -->
                <a href="{{ route('admin.comments.index') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.comments.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Comments
                </a>

                <!-- Home Banner -->
                <a href="{{ route('admin.home-banner.edit') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.home-banner.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Home Banner
                </a>
            </div>

            <!-- Divider -->
            <div class="my-6 border-t border-gray-200"></div>

            <!-- User Section -->
            <div class="space-y-2">
                <!-- View Site -->
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Site
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" 
                            class="flex items-center w-full px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Mobile overlay -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"
         id="overlay"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top bar with toggle button -->
        <div class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = true" 
                        x-show="!sidebarOpen"
                        class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100"
                        onclick="toggleSidebar(true)">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop menu button - Always visible on desktop -->
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="hidden lg:block p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100"
                        onclick="toggleSidebar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Page title -->
                <h1 class="text-lg font-semibold text-gray-900">
                    @yield('title', 'Dashboard')
                </h1>

                <!-- User info -->
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <main class="flex-1 overflow-y-auto bg-white">
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<!-- Fallback JavaScript for sidebar toggle -->
<script>
function toggleSidebar(forceOpen = null) {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    
    if (forceOpen !== null) {
        // Force open/close
        if (forceOpen) {
            sidebar.style.display = 'block';
            if (overlay) overlay.style.display = 'block';
        } else {
            sidebar.style.display = 'none';
            if (overlay) overlay.style.display = 'none';
        }
    } else {
        // Toggle
        const isVisible = sidebar.style.display !== 'none';
        sidebar.style.display = isVisible ? 'none' : 'block';
        if (overlay) overlay.style.display = isVisible ? 'none' : 'block';
    }
}

// Debug Alpine.js
document.addEventListener('DOMContentLoaded', function() {
    console.log('Alpine.js loaded:', typeof Alpine !== 'undefined');
    if (typeof Alpine !== 'undefined') {
        console.log('Alpine.js version:', Alpine.version);
    }
});
</script> 