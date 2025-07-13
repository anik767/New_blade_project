<nav class="bg-green-600 text-white shadow">
    <div class="container mx-auto px-4 min-h-[50px] flex justify-between items-center">
        {{-- Site Logo / Brand --}}
        <a href="{{ route('home') }}" class="font-bold text-xl">MyPortfolio</a>

        {{-- Navigation Links --}}
        <div class="space-x-4 flex items-center">
            {{-- Public Links --}}
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>

            {{-- Authenticated User Links --}}
            @auth
                {{-- Admin Dashboard --}}
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>

                {{-- Logout Form --}}
                <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
                    @csrf
                    
                </form>
            @else
                {{-- Guest User Login --}}
                <a href="{{ route('login') }}" class="hover:underline ml-4">Login</a>
            @endauth
        </div>
    </div>
</nav>
