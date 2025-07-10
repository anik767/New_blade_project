@extends('layouts.site')
@section('title', 'Home')
@section('content')

    {{-- Hero Section --}}
    <section class="h-screen bg-no-repeat bg-cover bg-top"
        style="background-image: url('{{ asset('images/Home/banner-background-one.jpg') }}')">
        <div
            class="container mx-auto h-full grid grid-cols-1 md:grid-cols-2 items-center gap-8 text-white font-rajdhani px-4">

            {{-- Content Banner --}}
            <div class="h-full flex flex-col justify-center space-y-4">
                <h1 class="text-5xl font-bold mb-4">Hello</h1>

                {{-- Typewriter effect: 
                 For a real typewriter effect, you need to add JS. 
                 Here a static fallback: --}}
                <h1 class="text-5xl font-bold mb-4 min-h-[60px]">
                    I’m Azmain Iqtidar Anik
                </h1>

                <p class="text-lg text-gray-300 mb-6">
                    Frontend Developer with a passion for crafting clean and user-friendly websites.
                </p>

                <a href="#Download"
                    class="px-6 py-3 border-2 border-blue-600 hover:bg-black/50 rounded font-medium transition-colors flex justify-center w-[150px]">
                    Download CV
                </a>
            </div>

            {{-- Person Banner --}}
            <div class="h-full flex justify-center items-center">
                <img src="{{ asset('images/Home/damo.png') }}" alt="Azmain Iqtidar Anik"
                    class="object-contain h-full w-auto" width="600" height="700" />
            </div>
        </div>
    </section>

    {{-- About Me Section --}}
    <section class="bg-[#F4F1EA] py-16 font-sans text-gray-800">
        <div class="container mx-auto rounded-xl p-12">
            <header class="text-center mb-12">
                <h1 class="text-5xl font-extrabold tracking-wide mb-2">About Me</h1>
                <p class="text-lg font-semibold text-gray-600">Frontend Developer</p>
            </header>

            <div class="grid md:flex md:flex-row gap-8">

                {{-- Personal Info --}}
                <section class="text-black md:w-1/2">
                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2 list-none p-0 m-0">
                        <li class="font-semibold">Age: <span class="font-normal">1 Years</span></li>
                        <li class="font-semibold">Nationality: <span class="font-normal">Tunisian</span></li>
                        <li class="font-semibold">Freelance: <span class="font-normal">Available</span></li>
                        <li class="font-semibold">Address: <span class="font-normal">Tunis</span></li>
                        <li class="font-semibold">Phone: <span class="font-normal">+21621184010</span></li>
                        <li class="font-semibold">Email: <span class="font-normal">you@mail.com</span></li>
                        <li class="font-semibold">Skype: <span class="font-normal">steve.milner</span></li>
                        <li class="font-semibold">Languages: <span class="font-normal">French, English</span></li>
                    </ul>
                </section>

                {{-- Stats --}}
                <section class="md:flex-1 mt-12 md:mt-0 grid grid-cols-2 gap-8">
                    @php
                        $stats = [
                            ['num' => 12, 'label' => 'Years of Experience'],
                            ['num' => 97, 'label' => 'Completed Projects'],
                            ['num' => 81, 'label' => 'Happy Customers'],
                            ['num' => 53, 'label' => 'Awards Won'],
                        ];
                    @endphp

                    @foreach ($stats as $stat)
                        <div class="bg-blue-600  rounded-lg p-8 shadow-lg text-center hover:bg-blue-700 transition-colors">
                            <div class="text-5xl font-extrabold tracking-wide">{{ $stat['num'] }}</div>
                            <div class="mt-2 uppercase font-semibold text-lg">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </section>

    {{-- Cards Section --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 max-w-6xl mx-auto py-10">
        <article
            class="group relative bg-blue-50 rounded-xl overflow-hidden shadow-[0px_13px_10px_-7px_rgba(0,0,0,0.1)] transition-all duration-300 hover:shadow-[0px_30px_18px_-8px_rgba(0,0,0,0.1)]">

            {{-- Hidden image to preserve space --}}
            <div class="invisible h-[235px]"></div>

            {{-- Hover image overlay --}}
            <div class="absolute top-0 left-0 w-full h-[235px] rounded-t-xl bg-cover bg-center bg-no-repeat transition-all duration-300 ease-out group-hover:h-full group-hover:opacity-30"
                style="background-image: url('https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');">
            </div>

            {{-- Info Box --}}
            <div
                class="relative z-10 bg-blue-50 px-6 pt-4 pb-6 rounded-b-xl transition-colors duration-300 group-hover:bg-transparent">
                <span class="uppercase text-[13px] tracking-[2px] font-medium text-gray-500">Recipe</span>
                <h3 class="mt-1 mb-2 font-serif text-lg font-semibold">Crisp Spanish tortilla Matzo brei</h3>
                <span class="text-xs font-medium text-gray-700">
                    by <a href="#" class="font-semibold text-[#AD7D52] hover:underline">Celeste Mills</a>
                </span>
            </div>
        </article>
    </section>

    {{-- Swiper Slider Section --}}


@endsection
