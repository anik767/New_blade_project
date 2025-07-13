<nav class="bg-gray-800 text-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">Admin Panel</a>

        <div class="space-x-4 flex items-center">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.projects.index') }}" class="hover:underline">Projects</a>

            @auth
            <div x-data="{ open: false }" class="relative ml-4">
                <button 
                    @click="open = !open" 
                    class="flex items-center space-x-2 hover:underline cursor-pointer focus:outline-none focus:ring-2 focus:ring-white rounded" 
                    type="button"
                    aria-haspopup="true"
                    :aria-expanded="open.toString()"
                >
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
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
                       class="block px-4 py-2 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none" 
                       role="menuitem"
                    >
                        Forgot Password
                    </a>
            
                    <form method="POST" action="{{ route('logout') }}" role="none">
                        @csrf
                        <button 
                            type="submit" 
                            class="w-full text-left px-4 py-2 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none" 
                            role="menuitem"
                            onclick="return confirm('Are you sure you want to logout?');"
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

@if(session('logout_alert'))
<script>
    alert(@json(session('logout_alert')));
</script>
@endif
