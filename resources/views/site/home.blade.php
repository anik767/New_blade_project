@extends('layouts.site')
@section('title', 'Home')
@section('content')

{{-- Hero Section --}}
<section class="h-screen bg-no-repeat bg-cover bg-center bg-[url('/images/Home/banner-background-one.jpg')]">
    <div class="container mx-auto h-full grid grid-cols-1 md:grid-cols-2 items-center px-6 text-white font-rajdhani">
        
        {{-- Text Content --}}
        <div class="flex flex-col justify-center space-y-4 text-center md:text-left py-10 md:py-0">
            <h1 class="text-4xl md:text-5xl font-bold">Hello</h1>
            <h2 class="text-3xl md:text-5xl font-bold min-h-[60px]">I’m Azmain Iqtidar Anik</h2>
            <p class="text-base md:text-lg text-gray-300">Frontend Developer with a passion for crafting clean and user-friendly websites.</p>
            <div class="flex justify-center md:justify-start">
                <a href="#Download" class="px-6 py-3 border-2 border-blue-600 hover:bg-black/50 rounded font-medium transition-colors w-[160px] text-center">
                    Download CV
                </a>
            </div>
        </div>

        {{-- Image --}}
        <div class="flex justify-center items-end h-full">
            <img src="{{ asset('images/Home/damo.png') }}" alt="Azmain Iqtidar Anik"
                class="object-contain w-full max-w-xs md:max-w-md lg:max-w-lg max-h-[90vh]" />
        </div>
    </div>
</section>

{{-- About Section --}}
<section class="bg-[#F4F1EA] py-20 text-gray-800 font-sans">
    <div class="container mx-auto px-6">
        {{-- Header --}}
        <header class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-wide mb-4">Get to Know Me</h2>
            <p class="text-lg text-gray-600 font-medium">Let me introduce myself</p>
        </header>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            {{-- Left Side: Image + Bio --}}
            <div class="space-y-6">
                <img src="{{ asset('images/Home/damo.png') }}" alt="Azmain Iqtidar Anik"
                     class="w-full max-w-sm mx-auto md:mx-0 rounded-xl shadow-md object-cover" />

                <p class="text-base leading-relaxed text-gray-700">
                    I’m Azmain Iqtidar Anik, a passionate frontend developer with a love for building clean, user-friendly digital experiences. My work is guided by strong attention to detail, performance, and modern design principles.
                </p>

                <a href="#contact"
                   class="inline-block bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">
                    Let's Work Together
                </a>
            </div>

            {{-- Right Side: Highlight Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @php
                    $highlights = [
                        ['icon' => '🧠', 'title' => 'Problem Solver', 'desc' => 'I love tackling UI/UX challenges and turning ideas into real interfaces.'],
                        ['icon' => '🚀', 'title' => 'Fast Learner', 'desc' => 'Always eager to explore new tech and push boundaries.'],
                        ['icon' => '🎨', 'title' => 'Creative Coder', 'desc' => 'Blending code and design to craft engaging user experiences.'],
                        ['icon' => '🤝', 'title' => 'Team Player', 'desc' => 'Great communication and collaboration skills in any environment.'],
                    ];
                @endphp

                @foreach ($highlights as $item)
                    <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition text-center">
                        <div class="text-4xl mb-4">{{ $item['icon'] }}</div>
                        <h3 class="text-xl font-semibold mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Cards Section --}}
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 max-w-6xl mx-auto py-10">
    <article class="group relative bg-blue-50 rounded-xl overflow-hidden shadow-lg transition duration-300 hover:shadow-xl">
        <div class="invisible h-[235px]"></div>
        <div class="absolute top-0 left-0 w-full h-[235px] bg-[url('https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260')] bg-cover bg-center rounded-t-xl transition-all duration-300 ease-out group-hover:h-full group-hover:opacity-30">
        </div>
        <div class="relative z-10 bg-blue-50 px-6 pt-4 pb-6 rounded-b-xl group-hover:bg-transparent transition-colors">
            <span class="uppercase text-xs tracking-wider font-medium text-gray-500">Recipe</span>
            <h3 class="mt-1 mb-2 font-serif text-lg font-semibold">Crisp Spanish tortilla Matzo brei</h3>
            <span class="text-xs font-medium text-gray-700">
                by <a href="#" class="font-semibold text-[#AD7D52] hover:underline">Celeste Mills</a>
            </span>
        </div>
    </article>
</section>

{{-- Projects Section --}}
<section class="bg-gray-100 py-16" id="projects">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold text-center text-green-600 mb-12">Projects</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Project Card -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="{{ asset('https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260') }}" alt="Project" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold mb-2">Project Title</h3>
          <p class="text-gray-600 mb-3">Short description of what the project does.</p>
          <a href="#" class="text-blue-600 hover:underline">View Project</a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Skills Section --}}
<section class="bg-white py-16" id="skills">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-green-600 mb-10">Skills & Tech Stack</h2>
    <div class="flex flex-wrap justify-center gap-6">
      <div class="bg-gray-100 px-6 py-4 rounded shadow text-gray-800 font-medium">HTML</div>
      <div class="bg-gray-100 px-6 py-4 rounded shadow text-gray-800 font-medium">CSS</div>
      <div class="bg-gray-100 px-6 py-4 rounded shadow text-gray-800 font-medium">Tailwind</div>
      <div class="bg-gray-100 px-6 py-4 rounded shadow text-gray-800 font-medium">Laravel</div>
      <div class="bg-gray-100 px-6 py-4 rounded shadow text-gray-800 font-medium">React</div>
    </div>
  </div>
</section>

{{-- Experience Section --}}
<section class="bg-[#F9FAFB] py-16" id="experience">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold text-center text-green-600 mb-12">Experience</h2>
    <div class="border-l-4 border-green-600 pl-6 space-y-8">
      <div>
        <h3 class="text-xl font-semibold">Frontend Developer <span class="text-gray-500">— SIMEC System Ltd</span></h3>
        <p class="text-sm text-gray-600 mb-2">July 2023 - Present</p>
        <p class="text-gray-700">Working with Laravel, Vue, and Tailwind CSS to build responsive web interfaces.</p>
      </div>
    </div>
  </div>
</section>

{{-- Blog Section --}}
<section class="bg-white py-16" id="blog">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold text-green-600 text-center mb-12">Latest Articles</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <article class="bg-gray-50 p-6 rounded shadow hover:shadow-md transition flex flex-col">
        <img
          src="{{ asset('images/blog/laravel-portfolio.jpg') }}"
          alt="How I Built My Laravel Portfolio"
          class="w-full h-40 object-cover rounded mb-4"
        />
        <h3 class="text-xl font-semibold mb-2">How I Built My Laravel Portfolio</h3>
        <p class="text-gray-600 text-sm mb-4">Tips on structuring and deploying a Laravel-based portfolio with Tailwind.</p>
        <a href="#" class="text-blue-600 hover:underline text-sm">Read More →</a>
      </article>
    </div>
  </div>
</section>


{{-- Case Studies Section --}}
<section class="bg-gray-100 py-16" id="case-studies">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold text-center text-green-600 mb-12">Case Studies</h2>
    <div class="space-y-8">
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-2xl font-semibold mb-2">Speed Optimization for a Laravel App</h3>
        <p class="text-gray-700 mb-2">Reduced load time from 4s to under 1s by implementing caching, lazy loading, and queue jobs.</p>
        <span class="text-sm text-gray-500">Tools: Laravel, Redis, Debugbar</span>
      </div>
    </div>
  </div>
</section>

{{-- Design and Develop Section --}}
<section class="max-w-6xl mx-auto px-6 py-16">
  <div class="grid md:grid-cols-2 gap-12 items-start">

    {{-- Design Section --}}
    <div>
      <h2 class="text-4xl font-extrabold mb-4 text-gray-900">Design</h2>
      <p class="text-gray-700 mb-6 leading-relaxed">
        Immersed in the vibrant world of creativity, I specialize in designing visually striking and user-centric digital experiences.
      </p>

      <ul class="space-y-3 list-disc list-inside text-gray-800 font-semibold text-lg">
        <li>Web User Interface</li>
        <li>Marketing and Branding</li>
        <li>Animation 3D</li>
        <li>Icon Design</li>
      </ul>
    </div>

    {{-- Develop Section --}}
    <div>
      <h2 class="text-4xl font-extrabold mb-4 text-gray-900">Develop</h2>
      <p class="text-gray-700 mb-6 leading-relaxed">
        As a seasoned developer, I translate design concepts into functional and responsive websites that go beyond aesthetics.
      </p>

      <ul class="space-y-3 list-disc list-inside text-gray-800 font-semibold text-lg">
        <li>HTML, CSS and JavaScript</li>
        <li>CMS WordPress</li>
        <li>Webflow</li>
      </ul>
    </div>

  </div>
</section>

{{-- Blog Posts Section --}}
<section class="max-w-6xl mx-auto px-6 py-16">
  <header class="mb-12 text-center">
    <h2 class="text-4xl font-extrabold text-gray-900 mb-2">Blog Posts</h2>
    <p class="text-gray-600 max-w-xl mx-auto">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
    </p>
  </header>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    {{-- Example Blog Card --}}
    <article class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
      <img src="https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=350" alt="The Art of Coffee Making" class="w-full h-48 object-cover">
      <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center text-sm text-gray-500 space-x-3 mb-4">
          <span class="uppercase font-semibold tracking-wide">Category</span>
          <span>by <span class="font-medium">admin</span></span>
          <time datetime="2023-11-08" class="text-gray-400">Nov 8</time>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-green-600 cursor-pointer">
          The Art of Coffee Making
        </h3>
        <p class="text-gray-700 text-sm flex-grow">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </article>

    <article class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
      <img src="https://images.pexels.com/photos/374631/pexels-photo-374631.jpeg?auto=compress&cs=tinysrgb&h=350" alt="Optimizing Work Environment" class="w-full h-48 object-cover">
      <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center text-sm text-gray-500 space-x-3 mb-4">
          <span class="uppercase font-semibold tracking-wide">Category</span>
          <span>by <span class="font-medium">admin</span></span>
          <time datetime="2023-11-08" class="text-gray-400">Nov 8</time>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-green-600 cursor-pointer">
          Optimizing Work Environment
        </h3>
        <p class="text-gray-700 text-sm flex-grow">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </article>

    <article class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
      <img src="https://images.pexels.com/photos/210647/pexels-photo-210647.jpeg?auto=compress&cs=tinysrgb&h=350" alt="How I Came Up With Ideas" class="w-full h-48 object-cover">
      <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center text-sm text-gray-500 space-x-3 mb-4">
          <span class="uppercase font-semibold tracking-wide">Category</span>
          <span>by <span class="font-medium">admin</span></span>
          <time datetime="2023-11-08" class="text-gray-400">Nov 8</time>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-green-600 cursor-pointer">
          How I Came Up With Ideas
        </h3>
        <p class="text-gray-700 text-sm flex-grow">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </article>
  </div>
</section>

{{-- Core Features Section --}}
<section class="max-w-6xl mx-auto px-6 py-16">
  <header class="text-center mb-12">
    <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Core Features</h2>
    <p class="text-gray-600 max-w-xl mx-auto">
      Due to its widespread use as filler text for layouts, non-readability is of great importance.
    </p>
  </header>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
    {{-- Feature Card --}}
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
      <div class="text-green-600 mb-4">
        <!-- You can replace this SVG with any icon you like -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
          <circle cx="12" cy="12" r="10" />
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-center mb-2">Bootstrap</h3>
      <p class="text-gray-700 text-center">Responsive front-end framework for faster and easier web development.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
      <div class="text-green-600 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4m0 0l-4 4m4-4v12" />
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-center mb-2">Typescript</h3>
      <p class="text-gray-700 text-center">Typed superset of JavaScript that compiles to plain JavaScript.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
      <div class="text-green-600 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <rect width="20" height="14" x="2" y="5" rx="2" ry="2" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M2 10h20" />
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-center mb-2">HTML</h3>
      <p class="text-gray-700 text-center">The standard markup language for documents designed to be displayed in a web browser.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
      <div class="text-green-600 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18" />
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-center mb-2">Responsive</h3>
      <p class="text-gray-700 text-center">Design and development that responds to the user’s device and screen size.</p>
    </div>
  </div>
</section>

@endsection
