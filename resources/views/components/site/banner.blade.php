@props([
    'title' => '',
    'subtitle' => '',
    'banner' => null,
    'pageBanner' => null,
])

@php
    $bgPath = null;
    if (optional($pageBanner) && optional($pageBanner)->background_media) {
        $bgPath = asset('storage/' . $pageBanner->background_media);
    } elseif (optional($banner) && optional($banner)->background_image) {
        $bgPath = asset('storage/' . $banner->background_image);
    } else {
        $bgPath = asset('images/Home/banner-background-one.jpg');
    }
    $isVideo = false;
    $sourcePath = null;
    if (optional($pageBanner) && optional($pageBanner)->background_media) {
        $sourcePath = $pageBanner->background_media;
    } elseif (optional($banner) && optional($banner)->background_image) {
        $sourcePath = $banner->background_image;
    }
    if ($sourcePath) {
        $ext = strtolower(pathinfo($sourcePath, PATHINFO_EXTENSION));
        $isVideo = in_array($ext, ['mp4','webm']);
    }
@endphp

<section class="relative py-32 overflow-hidden">
    @if($isVideo)
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="{{ $bgPath }}" type="video/{{ strtolower(pathinfo($bgPath, PATHINFO_EXTENSION)) == 'webm' ? 'webm' : 'mp4' }}">
        </video>
    @else
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $bgPath }}')"></div>
    @endif
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