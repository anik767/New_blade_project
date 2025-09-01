@extends('layouts.site')
@section('title', "Service - {$service->title}")
@section('content')
    <div class="bg-background text-black min-h-screen">
        <!-- Main Content -->
        <div class="container mx-auto px-6 py-16">
            <div class="max-w-4xl mx-auto">
                <!-- Page Title -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-black mb-4">Service with Title, Image and Meta Info</h1>
                </div>

                <!-- Author and Meta Information -->
                <div class="text-center mb-6">
                    <div class="flex items-center justify-center mb-2">
                        <div class="w-10 h-10 bg-gray-600 rounded-full mr-3"></div>
                        <span class="text-muted">Portfolio</span>
                    </div>
                    <p class="text-muted text-sm mb-4">Published in Services, Portfolio</p>

                    <!-- Meta Info Line -->
                    <div
                        class="flex items-center justify-center space-x-6 text-sm text-muted border-t border-gray-700 pt-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $service->created_at->format('F d, Y') }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $service->created_at->format('g:i A') }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            No Comments
                        </span>
                    </div>
                </div>

                <!-- Header Image -->
                @if ($service->image)
                    <div class="mb-8">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                            class="w-full h-96 object-cover object-top rounded-lg">
                    </div>
                @else
                    <div class="mb-8">
                        <img src="{{ asset('images/Image_not_found.jpg') }}" alt="{{ $service->title }}"
                            class="w-full h-96 object-cover  rounded-lg">
                    </div>
                @endif


                <!-- Service Title -->
                <div class="flex items-center mb-4">
                    @if ($service->icon)
                        <span class="text-4xl mr-4">{{ $service->icon }}</span>
                    @endif
                    <h2 class="text-3xl font-bold text-black">{{ $service->title }}</h2>
                </div>

                <!-- Service Content -->
                <div class="prose prose-lg text-muted max-w-none">
                    <div class="whitespace-pre-line leading-relaxed">
                        {{ $service->description }}
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="mt-12 pt-8 border-t border-gray-700">
                    <h3 class="text-2xl font-bold text-black mb-6">Comments ({{ $service->comments->count() }})</h3>

                    <!-- Display Comments -->
                    @if ($service->comments->count() > 0)
                        <div class="space-y-6 mb-8">
                            @foreach ($service->comments as $comment)
                                <div class="bg-card border border-gray-700 rounded-lg p-6">
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="w-10 h-10 bg-accent rounded-full flex items-center justify-center text-background font-bold">
                                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <h4 class="font-semibold text-black">{{ $comment->name }}</h4>
                                                <span
                                                    class="text-muted text-sm">{{ $comment->created_at->format('M d, Y g:i A') }}</span>
                                            </div>
                                            <p class="text-muted">{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-8">No comments yet. Be the first to comment!</p>
                    @endif

                    <!-- Comment Form -->
                    <div class="bg-card border border-gray-700 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-black mb-4">Leave a Comment</h4>
                        <form id="comment-form" class="space-y-6">
                            @csrf
                            <input type="hidden" name="type" value="service">
                            <input type="hidden" name="id" value="{{ $service->id }}">

                            <div>
                                <label for="comment" class="block text-sm font-medium text-muted mb-2">Comment *</label>
                                <textarea id="comment" name="comment" rows="6" required
                                    class="w-full px-4 py-3 bg-background border border-gray-700 rounded-lg text-black placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent resize-none"></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-muted mb-2">Name *</label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full px-4 py-3 bg-background border border-gray-700 rounded-lg text-black placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-muted mb-2">Email *</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full px-4 py-3 bg-background border border-gray-700 rounded-lg text-black placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent">
                                </div>
                            </div>

                            <div id="comment-message" class="hidden">
                                <div id="comment-success"
                                    class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded text-sm hidden">
                                </div>
                                <div id="comment-error"
                                    class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded text-sm hidden">
                                </div>
                            </div>

                            <button type="submit"
                                class="bg-accent text-background px-8 py-3 rounded-lg hover:bg-acttive transition duration-300 font-medium">
                                Post Comment
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Share Service Section -->
                <div class="mt-12 pt-8 border-t border-gray-700">
                    <div class="flex items-center mb-4">
                        <span class="text-muted font-medium mr-4">Share Service:</span>
                        <div class="flex space-x-3">
                            <a href="#"
                                class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center text-white hover:bg-blue-800 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- More Recommended Section -->
                <div class="mt-12 pt-8 border-t border-gray-700">
                    <h3 class="text-2xl font-bold text-black mb-6">More Recommended</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @php
                            $recentServices = \App\Models\Service::where('is_active', true)->latest()->take(3)->get();
                        @endphp
                        @foreach ($recentServices as $recentService)
                            <div
                                class="bg-card border border-gray-700 rounded-lg overflow-hidden shadow-lg shadow-accent/30 hover:shadow-acttive/50 transition-shadow">
                                @if ($recentService->image)
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $recentService->image) }}"
                                            alt="{{ $recentService->title }}" class="w-full h-48 object-cover">
                                        <div
                                            class="absolute top-2 right-2 bg-accent text-background px-2 py-1 rounded text-xs font-medium">
                                            SERV
                                        </div>
                                    </div>
                                @else
                                    <div class="relative">
                                        <img src="{{ asset('images/Image_not_found.jpg') }}"
                                            alt="{{ $recentService->title }}" class="w-full h-48 object-cover">
                                        <div
                                            class="absolute top-2 right-2 bg-accent text-background px-2 py-1 rounded text-xs font-medium">
                                            SERV
                                        </div>
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h4 class="font-bold text-black mb-2 line-clamp-2">{{ $recentService->title }}</h4>
                                    <a href="{{ route('services.show', $recentService->slug) }}"
                                        class="text-black hover:text-acttive text-sm font-medium">
                                        READ MORE »
                                    </a>
                                    <p class="text-muted text-sm mt-2">
                                        {{ $recentService->created_at->format('F d, Y') }} • No Comments
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
@endsection
