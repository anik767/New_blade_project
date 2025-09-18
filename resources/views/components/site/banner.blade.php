@props([
    'title' => '',
    'subtitle' => '',
    'banner' => null,
    'pageBanner' => null,
    'badge' => null,
    'badgeColor' => 'blue',
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

    @if($badge)
        @php
            $badgeColors = [
                'blue' => 'from-blue-100 via-purple-100 to-indigo-100 text-blue-800',
                'green' => 'from-green-100 via-blue-100 to-cyan-100 text-green-800',
                'purple' => 'from-purple-100 via-pink-100 to-rose-100 text-purple-800',
                'orange' => 'from-orange-100 via-yellow-100 to-amber-100 text-orange-800',
                'pink' => 'from-pink-100 via-rose-100 to-fuchsia-100 text-pink-800'
            ];
            $badgeColorClass = $badgeColors[$badgeColor] ?? $badgeColors['blue'];
            $dotColors = [
                'blue' => 'bg-gradient-to-r from-blue-500 to-purple-500',
                'green' => 'bg-gradient-to-r from-green-500 to-blue-500',
                'purple' => 'bg-gradient-to-r from-purple-500 to-pink-500',
                'orange' => 'bg-gradient-to-r from-orange-500 to-yellow-500',
                'pink' => 'bg-gradient-to-r from-pink-500 to-rose-500'
            ];
            $dotColorClass = $dotColors[$badgeColor] ?? $dotColors['blue'];
        @endphp
        
        <!-- Enhanced Badge at the very top of banner -->
        <div class="relative z-10 pt-8">
            <div class="container mx-auto px-6">
                <div class="text-center">
                    <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r {{ $badgeColorClass }} rounded-full text-sm font-medium mb-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <span class="w-3 h-3 {{ $dotColorClass }} rounded-full mr-3 animate-pulse shadow-lg"></span>
                        {{ $badge }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-200 mb-8 drop-shadow-lg">{{ $title }}</h1>
            <p class="text-xl lg:text-2xl text-gray-100 leading-relaxed mb-12 drop-shadow-md">
                {{ $subtitle }}
            </p>
        </div>
    </div>
</section> 