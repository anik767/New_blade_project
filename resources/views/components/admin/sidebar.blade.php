<!-- Sidebar -->
<div id="sidebar" class="fixed left-0 top-0 w-64 bg-gray-900 shadow-lg transition-all duration-300 ease-in-out h-screen flex flex-col z-50">
    <!-- Header -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-gray-700 bg-gray-900">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-xl font-bold text-white">Admin Panel</h1>
        </div>
        <button class="lg:hidden text-gray-400 hover:text-white transition-colors duration-200" onclick="toggleSidebar()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    
    <!-- Search Bar -->
    <div class="p-4 border-b border-gray-700">
        <div class="relative">
            <input type="text" id="sidebar-search" placeholder="Search menu..." 
                   class="w-full px-4 py-2 pl-10 text-sm text-gray-300 bg-gray-800 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-500">
            <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>
    
    <nav class="px-4 py-6 space-y-1 overflow-y-auto flex-1" style="height: calc(100vh - 200px);">
        <!-- Main Navigation -->
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- Home Section (Collapsible) -->
            <div class="mb-4">
                <button onclick="toggleSubmenu('home-submenu')" 
                        class="flex items-center justify-between w-full px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.home.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.home.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span class="font-medium">Home</span>
                    </div>
                    <svg id="home-arrow" class="w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Home Submenu -->
                <div id="home-submenu" class="hidden overflow-hidden">
                    <div class="mt-2 ml-4 space-y-1 border-l-2 border-gray-600 pl-4">
                        <a href="{{ route('admin.home.banner.edit') }}" 
                           class="submenu-item flex items-center px-3 py-2.5 text-gray-400 rounded-lg hover:bg-gray-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.home.banner.*') ? 'bg-blue-600 text-white shadow-md' : '' }}">
                            <div class="w-1.5 h-1.5 {{ request()->routeIs('admin.home.banner.*') ? 'bg-white' : 'bg-gray-500' }} rounded-full mr-3 transition-colors duration-200"></div>
                            <span class="text-sm font-medium">Banner</span>
                            @if(request()->routeIs('admin.home.banner.*'))
                                <div class="ml-auto w-1 h-1 bg-white rounded-full"></div>
                            @endif
                        </a>
                        
                        <a href="{{ route('admin.home.skills.edit') }}" 
                           class="submenu-item flex items-center px-3 py-2.5 text-gray-400 rounded-lg hover:bg-gray-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.home.skills.*') ? 'bg-blue-600 text-white shadow-md' : '' }}">
                            <div class="w-1.5 h-1.5 {{ request()->routeIs('admin.home.skills.*') ? 'bg-white' : 'bg-gray-500' }} rounded-full mr-3 transition-colors duration-200"></div>
                            <span class="text-sm font-medium">Skills</span>
                            @if(request()->routeIs('admin.home.skills.*'))
                                <div class="ml-auto w-1 h-1 bg-white rounded-full"></div>
                            @endif
                        </a>
                        
                        <a href="{{ route('admin.home.experience.edit') }}" 
                           class="submenu-item flex items-center px-3 py-2.5 text-gray-400 rounded-lg hover:bg-gray-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.home.experience.*') ? 'bg-blue-600 text-white shadow-md' : '' }}">
                            <div class="w-1.5 h-1.5 {{ request()->routeIs('admin.home.experience.*') ? 'bg-white' : 'bg-gray-500' }} rounded-full mr-3 transition-colors duration-200"></div>
                            <span class="text-sm font-medium">Experience</span>
                            @if(request()->routeIs('admin.home.experience.*'))
                                <div class="ml-auto w-1 h-1 bg-white rounded-full"></div>
                            @endif
                        </a>
                    </div>

            </div>

            <!-- Projects -->
            <a href="{{ route('admin.projects.index') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.projects.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.projects.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <span class="font-medium">Projects</span>
            </a>

            <!-- Blog -->
            <a href="{{ route('admin.blog.index') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.blog.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.blog.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="font-medium">Blogs</span>
            </a>

            <!-- Services -->
            <a href="{{ route('admin.services.index') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.services.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="font-medium">Services</span>
            </a>
        </div>

        <!-- Communication Section -->
        <div class="pt-6 mt-6 border-t border-gray-700">
            <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Communication</h3>
            
            <!-- Comments -->
            <a href="{{ route('admin.comments.index') }}" 
               class="sidebar-item flex items-center justify-between px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.comments.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.comments.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Comments</span>
                </div>
                @php
                    $commentCount = \App\Models\Comment::where('is_approved', false)->count();
                @endphp
                @if($commentCount > 0)
                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $commentCount }}</span>
                @endif
            </a>

            <!-- Contact Messages -->
            <a href="{{ route('admin.contact-messages.index') }}" 
               class="sidebar-item flex items-center justify-between px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.contact-messages.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.contact-messages.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Messages</span>
                </div>
                @php
                    $messageCount = \App\Models\ContactMessage::where('status', 'unread')->count();
                @endphp
                @if($messageCount > 0)
                    <span class="bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $messageCount }}</span>
                @endif
            </a>
        </div>

        <!-- Settings Section -->
        <div class="pt-6 mt-6 border-t border-gray-700">
            <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Settings</h3>
            
            <!-- Profile -->
            <a href="{{ route('admin.profile.edit') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.profile.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.profile.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="font-medium">Profile</span>
            </a>
            
            <!-- About -->
            <a href="{{ route('admin.about.edit') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.about.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.about.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="font-medium">About</span>
            </a>

            <!-- Contact Info -->
            <a href="{{ route('admin.contacts.edit') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <span class="font-medium">Contact Info</span>
            </a>

            <!-- Page Banners -->
            <a href="{{ route('admin.page-banners.index') }}" 
               class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-xl hover:bg-gray-700 hover:text-white transition-all duration-200 group {{ request()->routeIs('admin.page-banners.*') ? 'bg-blue-600 text-white shadow-lg' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.page-banners.*') ? 'bg-blue-500' : 'bg-gray-700 group-hover:bg-gray-600' }} transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 4m0 0l4-4 4 4M4 8h16"></path>
                    </svg>
                </div>
                <span class="font-medium">Page Banners</span>
            </a>
        </div>
    </nav>

    <!-- User Profile Section -->
    <div class="mt-auto p-4 border-t border-gray-700 bg-gray-900">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                @php($avatar = auth()->user()->profile_image ?? null)
                @if($avatar)
                    <img src="{{ asset('storage/' . $avatar) }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-purple-500">
                @else
                    <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                @endif
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-400">Administrator</p>
                </div>
            </div>
            
            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0">
                @csrf
                <button type="submit" class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded-lg transition-all duration-200" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Main Content Area -->
<div id="main-content" class="flex-1 flex flex-col lg:ml-64 transition-all duration-300 ease-in-out">
    <!-- Top Navigation -->
    <div class="sticky top-0 z-30 bg-white shadow-sm border-b border-gray-200">
        <div class="flex items-center justify-between h-16 px-6">
            <div class="flex items-center">
                <!-- Toggle Button -->
                <button id="sidebar-toggle" class="mr-4 text-gray-600 hover:text-gray-900 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg p-1" onclick="toggleSidebar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h2 class="text-lg font-semibold text-gray-900">@yield('title', 'Admin Panel')</h2>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Site
                </a>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <main class="flex-1 bg-gray-50">
        @yield('content')
    </main>
</div>

<!-- Mobile Overlay -->
<div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden transition-opacity duration-300" onclick="toggleSidebar()"></div>

<script>
let sidebarOpen = false;

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const overlay = document.getElementById('sidebar-overlay');
    const toggleButton = document.getElementById('sidebar-toggle');
    
    sidebarOpen = !sidebarOpen;
    
    if (sidebarOpen) {
        // Show sidebar
        sidebar.classList.remove('hidden');
        sidebar.classList.add('block');
        mainContent.classList.add('lg:ml-64');
        mainContent.classList.remove('lg:ml-0');
        overlay.classList.remove('hidden');
        overlay.classList.add('block');
        toggleButton.innerHTML = `
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        `;
    } else {
        // Hide sidebar
        sidebar.classList.remove('block');
        sidebar.classList.add('hidden');
        mainContent.classList.remove('lg:ml-64');
        mainContent.classList.add('lg:ml-0');
        overlay.classList.remove('block');
        overlay.classList.add('hidden');
        toggleButton.innerHTML = `
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        `;
    }
}

// Submenu toggle functionality
function toggleSubmenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    const arrow = document.getElementById(submenuId.replace('-submenu', '-arrow'));
    
    if (submenu.classList.contains('hidden')) {
        // Show submenu with animation
        submenu.classList.remove('hidden');
        submenu.style.maxHeight = '0px';
        submenu.style.opacity = '0';
        
        setTimeout(() => {
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
            submenu.style.opacity = '1';
        }, 10);
        
        arrow.classList.add('rotate-180');
    } else {
        // Hide submenu with animation
        submenu.style.maxHeight = '0px';
        submenu.style.opacity = '0';
        
        setTimeout(() => {
            submenu.classList.add('hidden');
        }, 300);
        
        arrow.classList.remove('rotate-180');
    }
}

// Initialize submenu state - always start collapsed
document.addEventListener('DOMContentLoaded', function() {
    const homeSubmenu = document.getElementById('home-submenu');
    const homeArrow = document.getElementById('home-arrow');
    
    // Ensure submenu starts hidden
    if (homeSubmenu) {
        homeSubmenu.classList.add('hidden');
        homeSubmenu.style.maxHeight = '0px';
        homeSubmenu.style.opacity = '0';
        homeArrow.classList.remove('rotate-180');
    }
    
    // Initialize sidebar state on page load
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    
    if (window.innerWidth >= 1024) {
        sidebar.classList.remove('hidden');
        sidebar.classList.add('block');
        mainContent.classList.add('lg:ml-64');
        mainContent.classList.remove('lg:ml-0');
        sidebarOpen = true;
    } else {
        // On mobile, start with sidebar hidden
        sidebar.classList.add('hidden');
        sidebar.classList.remove('block');
        mainContent.classList.remove('lg:ml-64');
        mainContent.classList.add('lg:ml-0');
        sidebarOpen = false;
    }
});

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('sidebar-search');
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            sidebarItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    item.style.display = 'flex';
                    item.style.opacity = '1';
                } else {
                    item.style.opacity = '0.3';
                }
            });
        });
    }
    
    // Initialize sidebar state on page load
    const sidebar = document.getElementById('sidebar');
    
    if (window.innerWidth >= 1024) {
        sidebar.classList.remove('hidden');
        sidebar.classList.add('block');
        sidebarOpen = true;
    }
});

// Add smooth scroll to sidebar
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('#sidebar nav');
    if (sidebar) {
        sidebar.style.scrollBehavior = 'smooth';
    }
});
</script>

<style>
/* Custom scrollbar for sidebar */
#sidebar nav::-webkit-scrollbar {
    width: 4px;
}

#sidebar nav::-webkit-scrollbar-track {
    background: transparent;
}

#sidebar nav::-webkit-scrollbar-thumb {
    background: rgba(156, 163, 175, 0.3);
    border-radius: 2px;
}

#sidebar nav::-webkit-scrollbar-thumb:hover {
    background: rgba(156, 163, 175, 0.5);
}

/* Smooth transitions for sidebar items */
.sidebar-item {
    position: relative;
    overflow: hidden;
}

.sidebar-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.sidebar-item:hover::before {
    left: 100%;
}

/* Active state glow effect */
.sidebar-item.active {
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
}

/* Submenu animations */
#home-submenu {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    max-height: 0;
    opacity: 0;
}

#home-submenu.show {
    max-height: 200px;
    opacity: 1;
}

.submenu-item {
    position: relative;
    transition: all 0.2s ease-in-out;
}

.submenu-item:hover {
    transform: translateX(6px);
    background: rgba(55, 65, 81, 0.8) !important;
}

.submenu-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, #3B82F6, transparent);
    transition: width 0.3s ease;
    border-radius: 0.5rem 0 0 0.5rem;
}

.submenu-item:hover::before {
    width: 3px;
}

/* Active submenu item */
.submenu-item.active {
    background: #2563EB !important;
    color: white !important;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.submenu-item.active::before {
    width: 3px;
    background: #60A5FA;
}
</style> 