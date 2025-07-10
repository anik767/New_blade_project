<nav class="bg-gray-800 text-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">Admin Panel</a>

        <div class="space-x-4 flex items-center">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.projects.index') }}" class="hover:underline">Projects</a>

            @auth
            <div x-data="{ open: false }" 
            @mouseenter="open = true" 
            @mouseleave="open = false" 
            class="relative ml-4"
       >
           <button class="flex items-center space-x-2 hover:underline cursor-default" type="button">
               <span>{{ Auth::user()->name }}</span>
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
               </svg>
           </button>
       
           <div x-show="open" 
                class="absolute right-0 mt-2 w-48 bg-white text-gray-900 rounded shadow-lg z-50"
                style="display: none;"
           >
               <a href="{{ route('password.request') }}" class="block px-4 py-2 hover:bg-gray-100">Forgot Password</a>
       
               <form method="POST" action="{{ route('logout') }}">
                   @csrf
                   <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100"
                       onclick="return confirm('Are you sure you want to logout?')">Logout</button>
               </form>
           </div>
       </div>
            @endauth
        </div>
    </div>
</nav>
