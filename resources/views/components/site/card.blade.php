@props([
  'title' => '',
  'image' => null,
  'href' => '#',
  'excerpt' => '',
  'leadingIcon' => null,
  'ctaLabel' => 'View Project',
])

<a href="{{ $href }}"
   tabindex="0"
   class="group block rounded-3xl overflow-hidden shadow-lg shadow-black/30 hover:shadow-green-500/30 transition-all duration-300 ease-out cursor-pointer Card_content_animation reveal-on-scroll hover:-translate-y-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 motion-reduce:transform-none motion-reduce:transition-none">
  <div class="relative overflow-hidden">
    <img src="{{ $image }}" alt="{{ $title }}" loading="lazy" decoding="async"
         class="w-full h-64 object-cover transition-transform duration-300 ease-out group-hover:scale-110 object-top origin-top motion-reduce:transform-none">
    <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-out"></div>
  </div>
  <div class="p-8">
    <div class="flex flex-col gap-2">
      @if($leadingIcon)
        <span class="text-lg mr-4"><span class="font-semibold">Type:</span> {{ $leadingIcon }}</span>
      @endif
      <h3 class="text-xl font-semibold mb-4 text-black two-line-ellipsis capitalize group-hover:text-black transition-colors duration-300 ease-out" title="{{ $title }}">
        {{ $title }}
      </h3>
    </div>
    @if($excerpt)
      <p class="text-muted mb-6 leading-relaxed">{{ $excerpt }}</p>
    @endif
    <span class="inline-flex items-center text-acttive font-semibold cursor-pointer group hover:text-black ">
      {{ $ctaLabel }}
      <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1 left_right_animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </span>
  </div>
</a>

