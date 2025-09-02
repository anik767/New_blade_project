@props([
    'item' => null,
    'type' => 'project', // 'project', 'service', 'blog'
    'title' => '',
    'description' => '',
    'content' => '',
    'image' => '',
    'icon' => '',
    'created_at' => null,
    'comments' => [],
    'routeName' => '',
    'relatedItems' => [],
    'relatedType' => 'project'
])

<div class="bg-gradient-to-br from-slate-50 via-white to-blue-50 text-black min-h-screen relative overflow-hidden">
    
    <!-- Enhanced floating background particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 left-10 w-3 h-3 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full animate-ping opacity-60"></div>
        <div class="absolute top-40 right-20 w-2 h-2 bg-gradient-to-r from-green-400 to-blue-400 rounded-full animate-pulse delay-1000 opacity-50"></div>
        <div class="absolute top-80 left-1/4 w-4 h-4 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full animate-bounce delay-500 opacity-40"></div>
        <div class="absolute top-96 right-1/3 w-2 h-2 bg-gradient-to-r from-pink-400 to-yellow-400 rounded-full animate-pulse delay-2000 opacity-60"></div>
        <div class="absolute top-1/2 left-20 w-3 h-3 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full animate-ping delay-1500 opacity-50"></div>
        <div class="absolute bottom-40 right-10 w-4 h-4 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full animate-bounce delay-3000 opacity-40"></div>
        <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-gradient-to-r from-cyan-400 to-blue-400 rounded-full animate-pulse delay-700 opacity-60"></div>
        <div class="absolute bottom-1/3 left-1/3 w-3 h-3 bg-gradient-to-r from-rose-400 to-pink-400 rounded-full animate-bounce delay-1200 opacity-50"></div>
    </div>

    <!-- Floating gradient orbs -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-32 left-1/4 w-64 h-64 bg-gradient-to-r from-blue-500/5 to-purple-500/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-32 right-1/4 w-80 h-80 bg-gradient-to-r from-green-500/5 to-blue-500/5 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-purple-500/3 to-pink-500/3 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Main Content Section -->
    <section class="py-20 reveal-on-scroll relative">
        <div class="container mx-auto px-6">
            <div class=" mx-auto">
                
                <!-- Enhanced Page Header -->
                <div class="text-center mb-12 scroll-fade-in">
                    @php
                        $typeColors = [
                            'project' => 'from-green-100 via-blue-100 to-cyan-100 text-green-800',
                            'service' => 'from-blue-100 via-purple-100 to-indigo-100 text-blue-800',
                            'blog' => 'from-purple-100 via-pink-100 to-rose-100 text-purple-800'
                        ];
                        $typeColorClass = $typeColors[$type] ?? $typeColors['project'];
                        $typeLabels = [
                            'project' => 'PROJECT',
                            'service' => 'SERVICE', 
                            'blog' => 'ARTICLE'
                        ];
                        $typeLabel = $typeLabels[$type] ?? 'ITEM';
                    @endphp
                    
                    <!-- Type Badge -->
                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r {{ $typeColorClass }} rounded-full text-sm font-medium mb-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <span class="w-2 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-full mr-2 animate-pulse"></span>
                        {{ $typeLabel }}
                    </div>
                    
                    <!-- Enhanced Title -->
                    <h1 class="text-5xl lg:text-6xl font-extrabold mb-6 bg-gradient-to-r from-gray-900 via-green-800 to-blue-800 bg-clip-text text-transparent leading-tight">
                        {{ $title }}
                    </h1>
                </div>

                <!-- Enhanced Meta Information -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-full mr-4 flex items-center justify-center text-white font-bold text-lg">
                            {{ strtoupper(substr($title, 0, 1)) }}
                        </div>
                        <span class="text-gray-600 font-medium">Portfolio</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Published in {{ ucfirst($type) }}s, Portfolio</p>
                    
                    <!-- Enhanced Meta Info Line -->
                    <div class="flex items-center justify-center space-x-8 text-sm text-gray-500 border-t border-gray-200 pt-4">
                        <span class="flex items-center group hover:text-green-600 transition-colors">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 002 2v12a2 2 0 002 2z"></path>
                            </svg>
                            @if($created_at && is_object($created_at) && method_exists($created_at, 'format'))
                                {{ $created_at->format('F d, Y') }}
                            @elseif($created_at)
                                {{ \Carbon\Carbon::parse($created_at)->format('F d, Y') }}
                            @else
                                N/A
                            @endif
                        </span>
                        <span class="flex items-center group hover:text-green-600 transition-colors">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            @if($created_at && is_object($created_at) && method_exists($created_at, 'format'))
                                {{ $created_at->format('g:i A') }}
                            @elseif($created_at)
                                {{ \Carbon\Carbon::parse($created_at)->format('g:i A') }}
                            @else
                                N/A
                            @endif
                        </span>
                        <span class="flex items-center group hover:text-green-600 transition-colors">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            {{ is_array($comments) ? count($comments) : (is_object($comments) ? $comments->count() : 0) }} Comments
                        </span>
                    </div>
                </div>

                                 <!-- Enhanced Header Image -->
                 <div class="mb-12 relative group">
                     <div class="absolute inset-0 bg-gradient-to-br from-green-400/10 via-blue-400/10 to-purple-400/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                     <div class="relative overflow-hidden rounded-2xl shadow-2xl h-96">
                         @if ($image)
                             <img src="{{ $image }}" 
                                  alt="{{ $title }}" 
                                  class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-700">
                         @else
                             <img src="{{ asset('images/Image_not_found.jpg') }}" 
                                  alt="{{ $title }}" 
                                  class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-700">
                         @endif
                         
                         <!-- Floating overlay elements -->
                         <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                         <div class="absolute top-4 right-4 bg-gradient-to-r from-green-500 to-blue-500 text-white px-4 py-2 rounded-full text-sm font-medium shadow-lg transform translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                             {{ $typeLabel }}
                         </div>
                     </div>
                 </div>

                <!-- Enhanced Content Section -->
                <div class="mb-12">
                    @if ($icon)
                        <div class="flex items-center mb-6">
                            <span class="text-5xl mr-4 transform hover:scale-110 transition-transform duration-300">{{ $icon }}</span>
                            <h2 class="text-3xl font-bold text-gray-900">{{ $title }}</h2>
                        </div>
                    @endif
                    
                    <div class="prose prose-lg text-gray-600 max-w-none">
                        @if ($content)
                            <div class="whitespace-pre-wrap leading-relaxed">
                                {!! $content !!}
                            </div>
                        @elseif ($description)
                            <div class="whitespace-pre-line leading-relaxed">
                                {{ $description }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Enhanced Comments Section -->
                <div class="mt-16 pt-12 border-t border-gray-200">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Comments ({{ is_array($comments) ? count($comments) : (is_object($comments) ? $comments->count() : 0) }})</h3>
                        <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-blue-500 mx-auto rounded-full"></div>
                    </div>
                    
                    <!-- Display Comments -->
                    @if((is_array($comments) && count($comments) > 0) || (is_object($comments) && $comments->count() > 0))
                        <div class="space-y-6 mb-8">
                            @foreach($comments as $comment)
                                <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3 mb-3">
                                                <h4 class="font-semibold text-gray-900 text-lg">{{ $comment->name }}</h4>
                                                                                             <span class="text-gray-500 text-sm bg-gray-100 px-3 py-1 rounded-full">
                                                 @if($comment->created_at && is_object($comment->created_at) && method_exists($comment->created_at, 'format'))
                                                     {{ $comment->created_at->format('M d, Y g:i A') }}
                                                 @elseif($comment->created_at)
                                                     {{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y g:i A') }}
                                                 @else
                                                     N/A
                                                 @endif
                                             </span>
                                            </div>
                                            <p class="text-gray-600 leading-relaxed">{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="text-6xl mb-4">💬</div>
                            <p class="text-gray-500 text-lg">No comments yet. Be the first to comment!</p>
                        </div>
                    @endif

                    <!-- Enhanced Comment Form -->
                    <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl p-8 shadow-xl">
                        <h4 class="text-xl font-semibold text-gray-900 mb-6 text-center">Leave a Comment</h4>
                        <form id="comment-form" class="space-y-6">
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}">
                            <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
                            
                            <div>
                                <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Comment *</label>
                                <textarea id="comment" name="comment" rows="6" required 
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none transition-all duration-300"></textarea>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                                    <input type="text" id="name" name="name" required 
                                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                    <input type="email" id="name" name="email" required 
                                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300">
                                </div>
                            </div>
                            
                            <div id="comment-message" class="hidden">
                                <div id="comment-success" class="bg-green-500/20 border border-green-500 text-green-600 px-4 py-3 rounded-xl text-sm hidden"></div>
                                <div id="comment-error" class="bg-red-500/20 border border-red-500 text-red-600 px-4 py-3 rounded-xl text-sm hidden"></div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-10 py-4 rounded-xl hover:from-green-600 hover:to-blue-600 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Enhanced Share Section -->
                <div class="mt-16 pt-12 border-t border-gray-200">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Share This {{ ucfirst($type) }}</h3>
                        <div class="w-16 h-1 bg-gradient-to-r from-green-500 to-blue-500 mx-auto rounded-full"></div>
                    </div>
                    
                    <div class="flex items-center justify-center space-x-4">
                        <a href="#" class="w-14 h-14 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center text-white hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-110 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-14 h-14 bg-gradient-to-r from-blue-400 to-blue-500 rounded-full flex items-center justify-center text-white hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-110 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-14 h-14 bg-gradient-to-r from-blue-700 to-blue-800 rounded-full flex items-center justify-center text-white hover:from-blue-800 hover:to-blue-900 transition-all duration-300 transform hover:scale-110 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-14 h-14 bg-gradient-to-r from-red-600 to-red-700 rounded-full flex items-center justify-center text-white hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:scale-110 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Enhanced More Recommended Section -->
                @if((is_array($relatedItems) && count($relatedItems) > 0) || (is_object($relatedItems) && $relatedItems->count() > 0))
                    <div class="mt-16 pt-12 border-t border-gray-200">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">More Recommended</h3>
                            <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-blue-500 mx-auto rounded-full"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach($relatedItems as $relatedItem)
                                <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                                    @if($relatedItem->image)
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $relatedItem->image) }}" 
                                                 alt="{{ $relatedItem->title }}" 
                                                 class="w-full h-48 object-cover">
                                            <div class="absolute top-3 right-3 bg-gradient-to-r from-green-500 to-blue-500 text-white px-3 py-1 rounded-full text-xs font-medium shadow-lg">
                                                {{ strtoupper(substr($relatedType, 0, 4)) }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="relative">
                                            <img src="{{ asset('images/Image_not_found.jpg') }}" 
                                                 alt="{{ $relatedItem->title }}" 
                                                 class="w-full h-48 object-cover">
                                            <div class="absolute top-3 right-3 bg-gradient-to-r from-green-500 to-blue-500 text-white px-3 py-1 rounded-full text-xs font-medium shadow-lg">
                                                {{ strtoupper(substr($relatedType, 0, 4)) }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="p-6">
                                        <h4 class="font-bold text-gray-900 mb-3 line-clamp-2 text-lg">{{ $relatedItem->title }}</h4>
                                        <a href="{{ route($routeName, $relatedItem->slug) }}" 
                                           class="text-green-600 hover:text-green-700 text-sm font-medium transition-colors duration-300">
                                            READ MORE »
                                        </a>
                                                                                 <p class="text-gray-500 text-sm mt-3">
                                             @if($relatedItem->created_at && is_object($relatedItem->created_at) && method_exists($relatedItem->created_at, 'format'))
                                                 {{ $relatedItem->created_at->format('F d, Y') }}
                                             @elseif($relatedItem->created_at)
                                                 {{ \Carbon\Carbon::parse($relatedItem->created_at)->format('F d, Y') }}
                                             @else
                                                 N/A
                                             @endif
                                             • {{ is_array($relatedItem->comments ?? []) ? count($relatedItem->comments) : (is_object($relatedItem->comments) ? $relatedItem->comments->count() : 0) }} Comments
                                         </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('comment-form');
        if (!form) return;

        const successBox = document.getElementById('comment-success');
        const errorBox = document.getElementById('comment-error');
        const wrapper = document.getElementById('comment-message');
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const endpoint = "{{ route('comment.store') }}";

        function showMessage(el, msg) {
            wrapper.classList.remove('hidden');
            successBox.classList.add('hidden');
            errorBox.classList.add('hidden');
            el.textContent = msg;
            el.classList.remove('hidden');
        }

        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(form);

            try {
                const res = await fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await res.json();

                if (res.ok && data.success) {
                    showMessage(successBox, data.message || 'Comment submitted successfully!');
                    form.reset();
                } else if (res.status === 422 && data.errors) {
                    const firstError = Object.values(data.errors)[0]?.[0] || 'Validation failed.';
                    showMessage(errorBox, firstError);
                } else {
                    showMessage(errorBox, data.message || 'Failed to submit comment. Please try again.');
                }
            } catch (err) {
                showMessage(errorBox, 'Network error. Please try again.');
            }
        });
    });
</script>
