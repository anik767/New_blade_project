@props([
    'title' => '',
    'subtitle' => '',
    'banner' => null
])

<section class="relative py-32 bg-cover bg-center bg-no-repeat overflow-hidden"
    style="background-image: url('{{ optional($banner) && optional($banner)->background_image ? asset('storage/' . $banner->background_image) : asset('images/Home/banner-background-one.jpg') }}')">
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#22292a]/90 via-[#22292a]/80 to-[#22292a]/70 "></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-200 mb-8 drop-shadow-lg">{{ $title }}</h1>
            <p class="text-xl lg:text-2xl text-gray-100 leading-relaxed mb-12 drop-shadow-md">
                {{ $subtitle }}
            </p>
        </div>
    </div>
</section> 