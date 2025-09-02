@extends('layouts.site')

@section('title', 'Contact')
@section('description', 'Get in touch with Azmain Iqtidar Anik - Frontend Developer. Let\'s discuss your next project and create something amazing together.')

@section('content')
<div class="bg-background text-black min-h-screen">
    
    <x-site.banner 
        title="Let's Connect"
        subtitle="Ready to start your next project? I'm here to help bring your ideas to life. Let's discuss your vision and create something amazing together."
        :banner="$banner" :pageBanner="$pageBanner"
    />

    {{-- Contact Information Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            @if($contact)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    {{-- Contact Details Card --}}
                    <div class="lg:col-span-1 scroll-fade-in">
                        <div class="p-[1.5px] rounded-3xl bg-gradient-to-br from-green-400 via-blue-400 to-purple-400">
                        <div class="relative rounded-3xl bg-white/90 backdrop-blur-sm border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8">
                            <h2 class="text-3xl font-semibold mb-8 text-black">Get In Touch</h2>
                            
                            <div class="space-y-8">
                                <div class="flex items-start space-x-4 group">
                                    <div class="flex-shrink-0 p-3 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300 group-hover:rotate-3">
                                        <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-black mb-2">Email</h3>
                                        <a href="mailto:{{ $contact->email }}" class="text-black hover:text-acttive transition-colors duration-300 text-lg break-all">
                                            {{ $contact->email }}
                                        </a>
                                    </div>
                                </div>

                                @if($contact->phone)
                                    <div class="flex items-start space-x-4 group">
                                        <div class="flex-shrink-0 p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-black mb-2">Phone</h3>
                                            <a href="tel:{{ $contact->phone }}" class="text-black hover:text-acttive transition-colors duration-300 text-lg">
                                                {{ $contact->phone }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($contact->address)
                                    <div class="flex items-start space-x-4 group">
                                        <div class="flex-shrink-0 p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-black mb-2">Location</h3>
                                            <p class="text-muted text-lg leading-relaxed">{{ $contact->address }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if($contact->social_links)
                                <div class="mt-10 pt-8 border-t border-accent/20">
                                    <h3 class="font-semibold text-black mb-6">Follow Me</h3>
                                    <div class="flex space-x-4">
                                        @php
                                            $socialLinks = json_decode($contact->social_links, true);
                                        @endphp
                                        @if($socialLinks)
                                            @foreach($socialLinks as $platform => $url)
                                                <a href="{{ $url }}" target="_blank" 
                                                   class="p-3 bg-accent/10 rounded-xl hover:bg-accent/20 transition-all duration-300 hover:scale-110">
                                                    @switch($platform)
                                                        @case('github')
                                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                                            </svg>
                                                            @break
                                                        @case('linkedin')
                                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                                            </svg>
                                                            @break
                                                        @case('twitter')
                                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                                            </svg>
                                                            @break
                                                        @default
                                                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                            </svg>
                                                    @endswitch
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        </div>
                    </div>

                    {{-- Message Content Card --}}
                    <div class="lg:col-span-2 scroll-fade-in">
                        <div class="p-[1.5px] rounded-3xl bg-gradient-to-br from-green-400 via-blue-400 to-purple-400">
                        <div class="relative rounded-3xl bg-white/90 backdrop-blur-sm border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8">
                            <h2 class="text-3xl font-semibold mb-8 text-black">A Message from Me</h2>
                            <div class="prose prose-lg text-black leading-relaxed">
                                {!! nl2br(e($contact->content)) !!}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-16 reveal-on-scroll">
                    <div class=" rounded-3xl p-12 max-w-md mx-auto shadow-lg">
                        <div class="text-6xl mb-4">📞</div>
                        <h2 class="text-2xl font-semibold text-black mb-2">Contact</h2>
                        <p class="text-muted">Contact information will be available soon!</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Services Overview Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 scroll-fade-in">
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-100 to-blue-100 rounded-full text-sm font-medium text-green-800 mb-6">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                    Let's connect
                </div>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">What I Can Help You With</h2>
                <p class="text-xl text-muted max-w-3xl mx-auto">From concept to deployment, I provide comprehensive web development services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                    <div class="text-4xl mb-6">🎨</div>
                    <h3 class="text-2xl font-semibold mb-4 text-black">Web Design</h3>
                    <p class="text-muted leading-relaxed">Creating beautiful, user-friendly interfaces that engage and convert visitors into customers.</p>
                </div>
                
                <div class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                    <div class="text-4xl mb-6">💻</div>
                    <h3 class="text-2xl font-semibold mb-4 text-black">Frontend Development</h3>
                    <p class="text-muted leading-relaxed">Building responsive, fast-loading websites using modern technologies and best practices.</p>
                </div>
                
                <div class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300 text-center  ">
                    <div class="text-4xl mb-6">⚡</div>
                    <h3 class="text-2xl font-semibold mb-4 text-black">Performance Optimization</h3>
                    <p class="text-muted leading-relaxed">Optimizing websites for speed, SEO, and user experience to maximize conversions.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 scroll-fade-in">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">How We'll Work Together</h2>
                <p class="text-xl text-muted max-w-3xl mx-auto">A simple, transparent process to bring your vision to life</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-black">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-black">Discovery</h3>
                    <p class="text-muted leading-relaxed">We discuss your goals, requirements, and vision for the project.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-black">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-black">Planning</h3>
                    <p class="text-muted leading-relaxed">I create a detailed plan and timeline for your project.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-black">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-black">Development</h3>
                    <p class="text-muted leading-relaxed">Building your project with regular updates and feedback.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-black">4</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-black">Launch</h3>
                    <p class="text-muted leading-relaxed">Deploying your project and providing ongoing support.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">Frequently Asked Questions</h2>
                <p class="text-xl text-muted max-w-3xl mx-auto">Common questions about working together</p>
            </div>
            
            <div class="max-w-4xl mx-auto space-y-6">
                <div class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-4 text-black">What technologies do you work with?</h3>
                    <p class="text-muted leading-relaxed">I specialize in modern web technologies including HTML5, CSS3, JavaScript, React, Vue.js, Laravel, and more. I choose the best tools for each project's specific needs.</p>
                </div>
                
                <div class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-4 text-black">How long does a typical project take?</h3>
                    <p class="text-muted leading-relaxed">Project timelines vary based on complexity. A simple website might take 2-4 weeks, while complex applications can take 2-3 months. I'll provide a detailed timeline during our initial discussion.</p>
                </div>
                
                <div class=" rounded-2xl p-8 border border-gray-700 shadow-lg shadow-accent/30 hover:shadow-acttive/30 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-4 text-black">Do you provide ongoing support?</h3>
                    <p class="text-muted leading-relaxed">Yes! I offer ongoing maintenance, updates, and support packages to ensure your website continues to perform optimally after launch.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class=" rounded-3xl p-12 text-center border border-gray-700 shadow-lg shadow-accent/30">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-black mb-6">Ready to Start Your Project?</h2>
                <p class="text-xl text-muted mb-8 max-w-2xl mx-auto leading-relaxed">
                    Let's discuss your ideas and create something amazing together. 
                    I'm excited to hear about your vision and help bring it to life.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:{{ $contact->email ?? 'contact@example.com' }}" 
                       class="inline-flex items-center px-8 py-4 bg-accent text-dark rounded-xl font-semibold tracking-wide hover:bg-accent/90 transition-all duration-300 shadow-lg hover:shadow-xl ">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Send Email
                    </a>
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-8 py-4 border-2 border-accent text-black rounded-xl font-semibold tracking-wide hover:bg-accent hover:text-dark transition-all duration-300 shadow-lg hover:shadow-xl ">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        View My Work
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection 