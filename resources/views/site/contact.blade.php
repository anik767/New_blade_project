@extends('layouts.site')

@section('title', 'Contact')

@section('content')
<div class="bg-background text-text min-h-screen pb-16 px-4">
    <div class="container mx-auto">
        @if($contact)
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl font-extrabold text-center text-text mb-16 pt-8">{{ $contact->title }}</h1>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl p-8 shadow-lg">
                        <h2 class="text-3xl font-semibold mb-6 text-accent">Get In Touch</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <span class="text-2xl mr-4">📧</span>
                                <div>
                                    <h3 class="font-semibold text-text">Email</h3>
                                    <a href="mailto:{{ $contact->email }}" class="text-accent hover:text-acttive transition">
                                        {{ $contact->email }}
                                    </a>
                                </div>
                            </div>

                            @if($contact->phone)
                                <div class="flex items-center">
                                    <span class="text-2xl mr-4">📞</span>
                                    <div>
                                        <h3 class="font-semibold text-text">Phone</h3>
                                        <a href="tel:{{ $contact->phone }}" class="text-accent hover:text-acttive transition">
                                            {{ $contact->phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($contact->address)
                                <div class="flex items-start">
                                    <span class="text-2xl mr-4 mt-1">📍</span>
                                    <div>
                                        <h3 class="font-semibold text-text">Address</h3>
                                        <p class="text-muted">{{ $contact->address }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($contact->social_links)
                            <div class="mt-8">
                                <h3 class="font-semibold text-text mb-4">Follow Me</h3>
                                <div class="flex space-x-4">
                                    @php
                                        $socialLinks = json_decode($contact->social_links, true);
                                    @endphp
                                    @if($socialLinks)
                                        @foreach($socialLinks as $platform => $url)
                                            <a href="{{ $url }}" target="_blank" 
                                               class="text-2xl hover:text-accent transition">
                                                @switch($platform)
                                                    @case('github')
                                                        📱
                                                        @break
                                                    @case('linkedin')
                                                        💼
                                                        @break
                                                    @case('twitter')
                                                        🐦
                                                        @break
                                                    @default
                                                        🔗
                                                @endswitch
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="bg-gradient-to-tl from-[#1e2024] via-white/10 to-[#23272b] rounded-3xl p-8 shadow-lg">
                        <h2 class="text-3xl font-semibold mb-6 text-accent">Message</h2>
                        <div class="prose prose-lg text-text">
                            {!! nl2br(e($contact->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="bg-gradient-to-tl from-[#23272b] via-[#e2e2e2]/10 to-[#1e2024] rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                    <div class="text-6xl mb-4">📞</div>
                    <h2 class="text-2xl font-semibold text-text mb-2">Contact</h2>
                    <p class="text-muted">Contact information will be available soon!</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection 