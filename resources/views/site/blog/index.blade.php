@extends('layouts.site')

@section('title', 'Blog')
@section('description', 'Read my latest articles about web development, design trends, and technology insights. Stay updated with industry best practices and innovative solutions.')

@section('content')
    <div class="bg-background text-black min-h-screen">
        
        <x-site.banner 
            title="My Blog"
            subtitle="Insights, tutorials, and thoughts on web development, design, and technology. Sharing knowledge and experiences to help you grow as a developer."
            :banner="$banner" :pageBanner="$pageBanner"
        />

        {{-- Blog Posts Section --}}
        <section class="py-20 reveal-on-scroll">
            <div class="container mx-auto px-6">
                @if ($posts->isEmpty())
                    <div class="text-center py-16">
                        <div class=" rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                            <div class="text-6xl mb-4">📝</div>
                            <h2 class="text-2xl font-semibold text-black mb-2">Blog Posts</h2>
                            <p class="text-muted">My blog posts will be available soon!</p>
                        </div>
                    </div>
                @else
                    <div class="text-center mb-16">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">Featured Articles</h2>
                        <p class="text-xl text-muted max-w-3xl mx-auto">Latest insights and tutorials to help you grow as a developer</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            @php
                                $img = $post->image ? asset('storage/' . $post->image) : asset('images/Image_not_found.jpg');
                            @endphp
                            <x-site.card 
                                :title="$post->title"
                                :image="$img"
                                :href="route('site.blog.show', $post->slug)"
                                :excerpt="Str::limit(strip_tags($post->content), 150)"
                                leadingIcon="📝"
                                ctaLabel="Read More"
                            />
                        @endforeach
                    </div>

                    <x-site.pagination :paginator="$posts" />
                @endif
            </div>
        </section>







    </div>
@endsection
