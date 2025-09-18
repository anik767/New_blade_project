@props([
  'title' => '',
  'image' => null,
  'href' => '#',
  'excerpt' => '',
  'leadingIcon' => null,
  'ctaLabel' => 'View Project',
  'badge' => null,
  'badgeColor' => 'blue',
])

<a href="{{ $href }}"
   tabindex="0"
   class="group block rounded-3xl overflow-hidden bg-white/80 backdrop-blur-sm border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300 ease-out cursor-pointer Card_content_animation reveal-on-scroll hover:-translate-y-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 motion-reduce:transform-none motion-reduce:transition-none">
  <div class="relative overflow-hidden">
    <img src="{{ $image }}" alt="{{ $title }}" loading="lazy" decoding="async"
         class="w-full h-64 object-cover transition-transform duration-300 ease-out group-hover:scale-105 object-top origin-top motion-reduce:transform-none">
    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-out"></div>
  </div>
  <div class="p-8">
    <div class="flex flex-col gap-2">
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
        
        <!-- Card Badge -->
        <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r {{ $badgeColorClass }} rounded-full text-xs font-medium mb-3 w-fit shadow-sm">
            <span class="w-2 h-2 {{ $dotColorClass }} rounded-full mr-2 animate-pulse"></span>
            {{ $badge }}
        </div>
      @endif
      
      @if($leadingIcon)
        <span class="text-lg mr-4 text-gray-600"><span class="font-semibold">Type:</span> {{ $leadingIcon }}</span>
      @endif
      <h3 class="text-xl font-semibold mb-4 text-gray-900 two-line-ellipsis capitalize group-hover:text-green-600 transition-colors duration-300 ease-out" title="{{ $title }}">
        {{ $title }}
      </h3>
    </div>
    @if($excerpt)
      <p class="text-gray-600 mb-6 leading-relaxed">{{ $excerpt }}</p>
    @endif
    <span class="inline-flex items-center text-green-600 font-semibold cursor-pointer group-hover:text-green-700 transition-colors duration-300">
      {{ $ctaLabel }}
      <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1 left_right_animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </span>
  </div>
</a>

