@extends('layouts.site')
@section('title', 'Home')
@section('content')

    {{-- Wrap all sections in a div with background color --}}
    <div class="bg-[#212428]">

        {{-- Hero Section --}}
<section
class="relative h-screen bg-cover bg-center bg-no-repeat"
style="background-image: url('{{ optional($banner) && optional($banner)->background_image ? asset('storage/' . $banner->background_image) : asset('images/Home/banner-background-one.jpg') }}')"
>
<div class="absolute inset-0 bg-black bg-opacity-60"></div>

<div
    class="container mx-auto h-full grid grid-cols-1 md:grid-cols-2 items-center px-6 relative text-white font-rajdhani z-10"
>
    <div
        class="flex flex-col justify-center space-y-6 text-center md:text-left py-10 md:py-0 max-w-xl mx-auto md:mx-0"
    >
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight drop-shadow-lg capitalize">
            {{ optional($banner)->title_line1 ?? 'Hello' }}
        </h1>
        <h2
            class="text-4xl md:text-5xl font-extrabold tracking-tight drop-shadow-lg min-h-[70px] text-[#59C378] "
        >
            {{ optional($banner)->title_line2 ?? 'I’m Azmain Iqtidar Anik' }}
        </h2>
        <p
            class="text-lg md:text-xl text-gray-300 leading-relaxed drop-shadow-md max-w-md"
        >
            {{ optional($banner)->subtitle ?? 'Frontend Developer passionate about crafting clean, user-friendly websites that delight users.' }}
        </p>
        <div class="flex justify-center md:justify-start">
            @if (optional($banner)->cv_file)
                <a
                    href="{{ asset('storage/' . $banner->cv_file) }}"
                    download
                    class="inline-block px-8 py-3 border-2 border-[#59C378] rounded-lg font-semibold tracking-wide text-[#59C378] hover:bg-[#59C378] hover:text-white transition duration-300 shadow-lg"
                >
                    Download CV
                </a>
            @else
                <span
                    class="inline-block px-8 py-3 border-2 border-gray-500 rounded-lg font-semibold tracking-wide text-gray-500 cursor-not-allowed"
                >
                    CV Not Available
                </span>
            @endif
        </div>
    </div>

    <div class="flex justify-center items-end h-full">
        <img
            src="{{ optional($banner) && optional($banner)->person_image ? asset('storage/' . $banner->person_image) : asset('images/Home/damo.png') }}"
            alt="{{ optional($banner)->title_line2 ?? 'Azmain Iqtidar Anik' }}"
            class="object-contain w-full max-w-xs md:max-w-md lg:max-w-lg max-h-[90vh] shadow-xl"
        />
    </div>
</div>
</section>




        {{-- About Section --}}
        <section class="py-24 font-sans">
            <div class="container mx-auto px-6 ">
                {{-- Header --}}
                <header class="text-center mb-20">
                    <h2 class="text-5xl font-extrabold tracking-wide mb-4 text-[#59C378]">Get to Know Me</h2>
                    <p class="text-lg text-gray-400 font-medium max-w-2xl mx-auto">Let me introduce myself</p>
                </header>

                {{-- Content Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    {{-- Left Side: Image + Bio --}}
                    <div class="space-y-8">
                        <img src="{{ asset('images/Home/damo.png') }}" alt="Azmain Iqtidar Anik"
                            class="w-full max-w-sm mx-auto md:mx-0 rounded-3xl object-cover" />

                        <p class="text-lg leading-relaxed text-gray-300 max-w-lg mx-auto md:mx-0">
                            I’m Azmain Iqtidar Anik, a passionate frontend developer with a love for building clean,
                            user-friendly digital experiences.
                            My work is guided by strong attention to detail, performance, and modern design principles.
                        </p>


                    </div>

                    {{-- Right Side: Highlight Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        @php
                            $highlights = [
                                [
                                    'icon' => '🧠',
                                    'title' => 'Problem Solver',
                                    'desc' =>
                                        'I love tackling UI/UX challenges and turning ideas into real interfaces.',
                                ],
                                [
                                    'icon' => '🚀',
                                    'title' => 'Fast Learner',
                                    'desc' => 'Always eager to explore new tech and push boundaries.',
                                ],
                                [
                                    'icon' => '🎨',
                                    'title' => 'Creative Coder',
                                    'desc' => 'Blending code and design to craft engaging user experiences.',
                                ],
                                [
                                    'icon' => '🤝',
                                    'title' => 'Team Player',
                                    'desc' => 'Great communication and collaboration skills in any environment.',
                                ],
                            ];
                        @endphp

                        @foreach ($highlights as $item)
                            <div
                                class="bg-[#2a2e33] rounded-2xl p-8 border border-gray-700 shadow-lg shadow-[#59C378]/30 hover:shadow-2xl hover:shadow-[#59C378]/50 transition duration-300 text-center">
                                <div class="text-5xl mb-5 text-[#59C378]">{{ $item['icon'] }}</div>
                                <h3 class="text-2xl font-semibold mb-3 text-white">{{ $item['title'] }}</h3>
                                <p class="text-gray-400 text-base">{{ $item['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Cards Section --}}
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 container mx-auto py-10">
            <article
                class="group relative bg-[#2a2e33] rounded-xl overflow-hidden border border-gray-700 shadow-lg shadow-[#59C378]/30 transition duration-300  hover:bg-[#353940]">

                <div class="invisible h-[235px]"></div>

                <!-- Background image -->
                <div
                    class="absolute top-0 left-0 w-full h-[235px] bg-[url('https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260')] bg-cover bg-center rounded-t-xl transition-all duration-300 ease-out group-hover:h-full group-hover:blur-[0px] group-hover:opacity-30">
                </div>

                <!-- Dark overlay that appears on hover -->
                <div
                    class="absolute top-0 left-0 w-full h-[235px] bg-gradient-to-t from-green-500 to-transparent opacity-0 rounded-t-xl transition-all duration-300 group-hover:opacity-20 group-hover:h-full pointer-events-none">
                </div>

                <div
                    class="relative z-10 bg-[#2a2e33] px-6 pt-4 pb-6 rounded-b-xl group-hover:bg-transparent transition-colors">
                    <span class="uppercase text-xs tracking-wider font-medium text-gray-400">Recipe</span>
                    <h3 class="mt-1 mb-2 font-serif text-lg font-semibold text-white">Crisp Spanish tortilla Matzo brei</h3>
                    <span class="text-xs font-medium text-[#AD7D52]">
                        by <a href="#" class="font-semibold hover:underline">Celeste Mills</a>
                    </span>
                </div>
            </article>
        </section>


        <section class="py-20" id="projects">
            <div class="container mx-auto px-6 ">
                <h2 class="text-5xl font-extrabold text-center text-[#59C378] mb-16">Projects</h2>

                @if ($projects->isEmpty())
                    <p class="text-center text-gray-400">No projects found.</p>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach ($projects as $project)
                            <div
                                class="bg-[#2a2e33] rounded-3xl overflow-hidden border border-gray-700 shadow-lg shadow-[#59C378]/30 hover:shadow-2xl hover:shadow-[#59C378]/50 transition-shadow duration-300 cursor-pointer">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                        class="w-full h-56 object-cover rounded-t-3xl">
                                @else
                                    <img src="https://via.placeholder.com/400x224?text=No+Image" alt="No image"
                                        class="w-full h-56 object-cover rounded-t-3xl">
                                @endif
                                <div class="p-6">
                                    <h3 class="text-2xl font-semibold mb-3 text-white two-line-ellipsis cursor-default"
                                        title="{{ $project->title }}">
                                        {{ $project->title }}
                                    </h3>

                                    <p class="text-gray-400 mb-5">{{ Str::limit($project->description, 120) }}</p>
                                    @if ($project->github_link)
                                        <a href="{{ $project->github_link }}" target="_blank" rel="noopener noreferrer"
                                            class="text-[#59C378] font-semibold hover:underline">View Project →</a>
                                    @else
                                        <span class="text-gray-500">No project link</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add View More button here -->
                    <div class="mt-12 text-center">
                        <a href="{{ route('projects.index') }}"
                            class="inline-block px-8 py-3 bg-[#59C378] text-white font-semibold rounded-full hover:bg-green-600 transition">
                            View More Projects
                        </a>
                    </div>
                @endif
            </div>
        </section>



        {{-- Skills Section --}}
        <section class="py-20" id="skills">
            <div class="container mx-auto px-6 text-center ">
                <h2 class="text-5xl font-extrabold text-[#59C378] mb-14">Skills & Tech Stack</h2>
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach (['HTML', 'CSS', 'Tailwind', 'Laravel', 'React'] as $skill)
                        <div
                            class="bg-[#2a2e33] px-8 py-5 rounded-3xl border border-gray-700 shadow-lg shadow-[#59C378]/30 text-gray-300 font-semibold text-lg hover:scale-105 hover:shadow-2xl hover:shadow-[#59C378]/50 transform transition">
                            {{ $skill }}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Experience Section --}}
        <section class="py-20" id="experience">
            <div class="container mx-auto px-6  ">
                <h2 class="text-5xl font-extrabold text-center text-[#59C378] mb-16">Experience</h2>
                <div class="border-l-4 border-[#59C378] pl-8 space-y-12 bg-[#3b3f46] rounded-xl p-8">
                    <div>
                        <h3 class="text-2xl font-semibold text-white">Frontend Developer <span
                                class="text-gray-400 font-normal">— SIMEC System Ltd</span></h3>
                        <p class="text-sm text-gray-400 mb-3">July 2023 - Present</p>
                        <p class="text-gray-300 text-lg max-w-3xl">Working with Laravel, Vue, and Tailwind CSS to build
                            responsive web interfaces.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Blog Section --}}
        <section class="py-20" id="blog">
            <div class="container mx-auto px-6">
                <h2 class="text-5xl font-extrabold text-[#59C378] text-center mb-16">Latest Blogs</h2>

                @if ($posts->isEmpty())
                    <p class="text-center text-gray-400">No blog posts found.</p>
                @else
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach ($posts as $post)
                            <article
                                class="bg-[#2a2e33] rounded-3xl p-8 cursor-pointer flex flex-col border border-gray-700 shadow-lg shadow-[#59C378]/30 
                            hover:shadow-2xl hover:shadow-[#59C378]/50 transition duration-300">

                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-48 object-cover rounded-2xl mb-6" />
                                @else
                                    <img src="https://via.placeholder.com/400x200?text=No+Image" alt="No image"
                                        class="w-full h-48 object-cover rounded-2xl mb-6" />
                                @endif

                                <h3 class="text-2xl font-semibold mb-3 text-white">
                                    <a href="{{ route('site.blog.show', $post->slug) }}"
                                        class="hover:text-[#59C378] transition">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-400 text-base mb-6">
                                    {!! Str::limit(strip_tags($post->content), 120) !!}
                                </p>

                                <a href="{{ route('site.blog.show', $post->slug) }}"
                                    class="mt-auto font-semibold text-[#59C378] text-lg hover:underline">
                                    Read More →
                                </a>
                            </article>
                        @endforeach
                    </div>

                    {{-- Optional "View All Blogs" button --}}
                    <div class="mt-12 text-center">
                        <a href="{{ route('site.blog.index') }}"
                            class="inline-block px-8 py-3 border-2 border-[#59C378] rounded-lg font-semibold tracking-wide text-[#59C378] hover:bg-[#59C378] hover:text-white transition duration-300 shadow-lg">
                            View All Blogs
                        </a>
                    </div>
                @endif
            </div>
        </section>







        {{-- Case Studies Section --}}
        <section class="py-20" id="case-studies">
            <div class="container mx-auto px-6 ">
                <h2 class="text-5xl font-extrabold text-[#59C378] text-center mb-16">Case Studies</h2>
                <div class="space-y-12">
                    <div
                        class="bg-[#2a2e33] p-8 rounded-3xl border border-gray-700 shadow-lg shadow-[#59C378]/30 hover:shadow-2xl transition duration-300 hover:shadow-[#59C378]/50">
                        <h3 class="text-3xl font-semibold mb-4 text-white">Speed Optimization for a Laravel App</h3>
                        <p class="text-gray-300 text-lg mb-4">Reduced load time from 4s to under 1s by implementing
                            caching,
                            lazy loading, and queue jobs.</p>
                        <span class="text-gray-400 font-medium text-sm">Tools: Laravel, Redis, Debugbar</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Design and Develop Section --}}
        <section class="container mx-auto px-6 py-20">
            <div class="grid md:grid-cols-2 gap-16 items-start">

                {{-- Design Section --}}
                <div>
                    <h2 class="text-5xl font-extrabold mb-6 text-white">Design</h2>
                    <p class="text-gray-300 mb-8 leading-relaxed text-lg max-w-lg">
                        Immersed in the vibrant world of creativity, I specialize in designing visually striking and
                        user-centric digital experiences.
                    </p>

                    <ul class="space-y-5 list-disc list-inside text-gray-400 font-semibold text-xl max-w-md">
                        <li>Web User Interface</li>
                        <li>Marketing and Branding</li>
                        <li>3D Animation</li>
                        <li>Icon Design</li>
                    </ul>
                </div>

                {{-- Develop Section --}}
                <div>
                    <h2 class="text-5xl font-extrabold mb-6 text-white">Develop</h2>
                    <p class="text-gray-300 mb-8 leading-relaxed text-lg max-w-lg">
                        As a seasoned developer, I translate design concepts into functional and responsive websites that go
                        beyond aesthetics.
                    </p>

                    <ul class="space-y-5 list-disc list-inside text-gray-400 font-semibold text-xl max-w-md">
                        <li>HTML, CSS, and JavaScript</li>
                        <li>CMS WordPress</li>
                        <li>Webflow</li>
                    </ul>
                </div>

            </div>
        </section>

    </div> {{-- End bg div --}}

@endsection
