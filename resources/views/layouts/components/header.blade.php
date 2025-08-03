<nav class="bg-gradient-to-tr from-[#1e2024]  to-[#23272b] text-text shadow-lg">
    <div class="container mx-auto px-4 min-h-[56px] flex justify-between items-center">
        {{-- Site Logo / Brand --}}
        <a href="{{ route('home') }}" class="font-bold text-xl text-acttive">MyPortfolio</a>

        {{-- Navigation Links --}}
        <div class="space-x-4 flex items-center text-sm font-medium">
            {{-- Public Links --}}
            <a href="{{ route('home') }}" class="hover:text-accent transition">Home</a>
            <a href="{{ route('about') }}" class="hover:text-accent transition">About Me</a>
            <a href="{{ route('services') }}" class="hover:text-accent transition">Services</a>
            <a href="{{ route('projects.index') }}" class="hover:text-accent transition">Projects</a>
            <a href="{{ route('site.blog.index') }}" class="hover:text-accent transition">Blog</a>
            <a href="{{ route('contact') }}" class="hover:text-accent transition">Contact</a>

            {{-- Authenticated User Links --}}
            @auth
                <a href="{{ route('admin.dashboard') }}" class="hover:text-accent transition">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
                    @csrf
                    <button type="submit" class="hover:text-accent transition" onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="ml-4 hover:text-accent transition">Login</a>
            @endauth
        </div>
    </div>
</nav>
