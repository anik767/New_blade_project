<nav class="bg-gray-800 text-white shadow">
    <div class="container mx-auto px-4 min-h-[50px] flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">Admin Panel</a>

        <div class="space-x-4 flex items-center">

            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.about-me.index') }}" class="hover:underline">About Me</a>
            <a href="{{ route('admin.services.index') }}" class="hover:underline">Services</a>
            <a href="{{ route('admin.projects.index') }}" class="hover:underline">Projects</a>
            <a href="{{ route('admin.blog.index') }}" class="hover:underline">Blog</a>
            <a href="{{ route('admin.contacts.index') }}" class="hover:underline">Contact</a>
            <a href="{{ route('admin.contact-messages.index') }}" class="hover:underline">Messages</a>

            <!-- Settings Dropdown -->
            <div x-data="{ open: false }" class="relative inline-block">
                <button
                    @click="open = !open"
                    class="hover:underline flex items-center space-x-1 "
                    aria-haspopup="true"
                    :aria-expanded="open.toString()"
                    type="button"
                >
                    <span>Settings</span>
                    <svg
                        :class="{'transform rotate-180': open, 'transform rotate-0': !open}"
                        class="w-5 h-4 transition-transform duration-300"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute mt-2 right-0 w-60 bg-white text-gray-900 rounded shadow-lg z-50"
                    style="display: none;"
                    role="menu"
                    aria-label="Settings menu"
                >
                    <a href="{{ route('admin.home-banner.edit') }}"
                       class="block px-4 py-2 hover:bg-gray-100"
                       role="menuitem"
                    >
                        Home Page Banner Edit
                    </a>
                    <!-- Add more items here if needed -->
                </div>
            </div>

            @auth
            <!-- User Dropdown -->
            <div x-data="{ open: false }" class="relative ml-4">
                <button
                    @click="open = !open"
                    class="flex items-center space-x-2 hover:underline cursor-pointer "
                    type="button"
                    aria-haspopup="true"
                    :aria-expanded="open.toString()"
                >
                    <span>{{ Auth::user()->name }}</span>
                    <svg
                        :class="{'transform rotate-180': open, 'transform rotate-0': !open}"
                        class="w-4 h-4 transition-transform duration-300"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 bg-white text-gray-900 rounded shadow-lg z-50"
                    style="display: none;"
                    role="menu"
                    aria-label="User menu"
                >
                    <a href="{{ route('password.request') }}"
                       class="block px-4 py-2 hover:bg-gray-100"
                       role="menuitem"
                    >
                        Forgot Password
                    </a>

                    <form method="POST" action="{{ route('logout') }}" role="none">
                        @csrf
                        <button
                            type="submit"
                            class="w-full text-left px-4 py-2 hover:bg-gray-100 "
                            role="menuitem"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @endauth

        </div>
    </div>
</nav>
