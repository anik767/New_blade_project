@extends('layouts.site')

@section('title', 'Contact')
@section('description', 'Get in touch with Azmain Iqtidar Anik - Frontend Developer. Let\'s discuss your next project and create something amazing together.')

@section('content')
<div class="bg-gradient-to-br from-slate-50 via-white to-blue-50 text-black min-h-screen relative overflow-hidden">
    
    <!-- Floating background particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 left-10 w-2 h-2 bg-blue-400/20 rounded-full animate-ping"></div>
        <div class="absolute top-40 right-20 w-1 h-1 bg-green-400/20 rounded-full animate-pulse delay-1000"></div>
        <div class="absolute top-80 left-1/4 w-1.5 h-1.5 bg-purple-400/20 rounded-full animate-bounce delay-500"></div>
        <div class="absolute top-96 right-1/3 w-1 h-1 bg-pink-400/20 rounded-full animate-pulse delay-2000"></div>
        <div class="absolute top-1/2 left-20 w-2 h-2 bg-yellow-400/20 rounded-full animate-ping delay-1500"></div>
        <div class="absolute bottom-40 right-10 w-1.5 h-1.5 bg-indigo-400/20 rounded-full animate-bounce delay-3000"></div>
    </div>

    <x-site.banner 
        title="Let's Connect"
        subtitle="Ready to start your next project? I'm here to help bring your ideas to life. Let's discuss your vision and create something amazing together."
        badge="Get In Touch"
        badgeColor="orange"
        :banner="$banner" :pageBanner="$pageBanner"
    />

    {{-- Contact Information Section --}}
    <section class="py-20 reveal-on-scroll relative">
        <div class="container mx-auto px-6">
            @if($contact)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    {{-- Contact Details Card --}}
                    <div class="lg:col-span-1 scroll-fade-in">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 via-blue-400/20 to-purple-400/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all duration-500"></div>
                            <div class="relative bg-white/90 backdrop-blur-sm border border-gray-200 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8 rounded-3xl">
                                <h2 class="text-3xl font-bold mb-8 bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">Get In Touch</h2>
                                
                                <div class="space-y-8">
                                    <div class="flex items-start space-x-4 group">
                                        <div class="flex-shrink-0 p-3 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300 group-hover:rotate-3">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900 mb-2">Email</h3>
                                            <a href="mailto:{{ $contact->email }}" class="text-green-600 hover:text-green-700 transition-colors duration-300 text-lg break-all font-medium">
                                                {{ $contact->email }}
                                            </a>
                                        </div>
                                    </div>

                                    @if($contact->phone)
                                        <div class="flex items-start space-x-4 group">
                                            <div class="flex-shrink-0 p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900 mb-2">Phone</h3>
                                                <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-700 transition-colors duration-300 text-lg font-medium">
                                                    {{ $contact->phone }}
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if($contact->address)
                                        <div class="flex items-start space-x-4 group">
                                            <div class="flex-shrink-0 p-3 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900 mb-2">Location</h3>
                                                <p class="text-gray-600 text-lg leading-relaxed font-medium">{{ $contact->address }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if($contact->social_links)
                                    <div class="mt-10 pt-8 border-t border-gray-200">
                                        <h3 class="font-semibold text-gray-900 mb-6">Follow Me</h3>
                                        <div class="flex space-x-4">
                                            @php
                                                $socialLinks = json_decode($contact->social_links, true);
                                            @endphp
                                            @if($socialLinks)
                                                @foreach($socialLinks as $platform => $url)
                                                    <a href="{{ $url }}" target="_blank" 
                                                       class="p-3 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl hover:from-green-100 hover:to-blue-100 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                                        @switch($platform)
                                                            @case('github')
                                                                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                                                </svg>
                                                                @break
                                                            @case('linkedin')
                                                                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                                                </svg>
                                                                @break
                                                            @case('twitter')
                                                                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                                                </svg>
                                                                @break
                                                            @default
                                                                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 via-purple-400/20 to-pink-400/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all duration-500"></div>
                            <div class="relative bg-white/90 backdrop-blur-sm border border-gray-200 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8 rounded-3xl">
                                <h2 class="text-3xl font-bold mb-8 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">A Message from Me</h2>
                                <div class="prose prose-lg text-gray-700 leading-relaxed">
                                    {!! nl2br(e($contact->content)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-16 reveal-on-scroll">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-400/20 to-gray-600/20 rounded-3xl blur-2xl"></div>
                        <div class="relative bg-white/90 backdrop-blur-sm border border-gray-200 rounded-3xl p-12 max-w-md mx-auto shadow-xl">
                            <div class="text-6xl mb-4">📞</div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Contact</h2>
                            <p class="text-gray-600">Contact information will be available soon!</p>
                        </div>
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
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                    Let's connect
                </div>
                <h2 class="text-4xl lg:text-5xl font-extrabold mb-6 bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">What I Can Help You With</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">From concept to deployment, I provide comprehensive web development services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 via-blue-400/20 to-purple-400/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                    <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300 text-center transform hover:-translate-y-2">
                        <div class="text-4xl mb-6 group-hover:scale-110 transition-transform duration-300">🎨</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Web Design</h3>
                        <p class="text-gray-600 leading-relaxed">Creating beautiful, user-friendly interfaces that engage and convert visitors into customers.</p>
                    </div>
                </div>
                
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 via-purple-400/20 to-pink-400/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                    <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300 text-center transform hover:-translate-y-2">
                        <div class="text-4xl mb-6 group-hover:scale-110 transition-transform duration-300">💻</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Frontend Development</h3>
                        <p class="text-gray-600 leading-relaxed">Building responsive, fast-loading websites using modern technologies and best practices.</p>
                    </div>
                </div>
                
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400/20 via-pink-400/20 to-yellow-400/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                    <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300 text-center transform hover:-translate-y-2">
                        <div class="text-4xl mb-6 group-hover:scale-110 transition-transform duration-300">⚡</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Performance Optimization</h3>
                        <p class="text-gray-600 leading-relaxed">Optimizing websites for speed, SEO, and user experience to maximize conversions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 scroll-fade-in">
                <h2 class="text-4xl lg:text-5xl font-extrabold mb-6 bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">How We'll Work Together</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">A simple, transparent process to bring your vision to life</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-blue-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                        <div class="relative bg-gradient-to-br from-green-500 to-blue-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">1</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Discovery</h3>
                    <p class="text-gray-600 leading-relaxed">We discuss your goals, requirements, and vision for the project.</p>
                </div>
                
                <div class="text-center group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                        <div class="relative bg-gradient-to-br from-blue-500 to-purple-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">2</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Planning</h3>
                    <p class="text-gray-600 leading-relaxed">I create a detailed plan and timeline for your project.</p>
                </div>
                
                <div class="text-center group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-400/20 to-pink-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                        <div class="relative bg-gradient-to-br from-purple-500 to-pink-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">3</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Development</h3>
                    <p class="text-gray-600 leading-relaxed">Building your project with regular updates and feedback.</p>
                </div>
                
                <div class="text-center group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-400/20 to-yellow-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                        <div class="relative bg-gradient-to-br from-pink-500 to-yellow-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">4</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Launch</h3>
                    <p class="text-gray-600 leading-relaxed">Deploying your project and providing ongoing support.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-extrabold mb-6 bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Common questions about working together</p>
            </div>
            
            <div class="max-w-4xl mx-auto space-y-4">
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-400/10 via-blue-400/10 to-purple-400/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                    <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300">
                        <button class="w-full p-8 text-left focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 rounded-2xl" onclick="toggleFAQ(1)">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-900">What technologies do you work with?</h3>
                                <svg id="faq-icon-1" class="w-6 h-6 text-gray-500 transform transition-transform duration-300 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div id="faq-content-1" class="faq-content overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 200px;">
                            <div class="px-8 pb-8">
                                <div class="border-t border-gray-200 pt-6">
                                    <p class="text-gray-600 leading-relaxed">I specialize in modern web technologies including HTML5, CSS3, JavaScript, React, Vue.js, Laravel, and more. I choose the best tools for each project's specific needs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 via-purple-400/10 to-pink-400/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                    <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300">
                        <button class="w-full p-8 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-2xl" onclick="toggleFAQ(2)">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-900">How long does a typical project take?</h3>
                                <svg id="faq-icon-2" class="w-6 h-6 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div id="faq-content-2" class="faq-content overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 0;">
                            <div class="px-8 pb-8">
                                <div class="border-t border-gray-200 pt-6">
                                    <p class="text-gray-600 leading-relaxed">Project timelines vary based on complexity. A simple website might take 2-4 weeks, while complex applications can take 2-3 months. I'll provide a detailed timeline during our initial discussion.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400/10 via-pink-400/10 to-yellow-400/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                    <div class="relative bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300">
                        <button class="w-full p-8 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 rounded-2xl" onclick="toggleFAQ(3)">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-900">Do you provide ongoing support?</h3>
                                <svg id="faq-icon-3" class="w-6 h-6 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div id="faq-content-3" class="faq-content overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 0;">
                            <div class="px-8 pb-8">
                                <div class="border-t border-gray-200 pt-6">
                                    <p class="text-gray-600 leading-relaxed">Yes! I offer ongoing maintenance, updates, and support packages to ensure your website continues to perform optimally after launch.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="relative group">
                <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 via-blue-400/20 to-purple-400/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all duration-500"></div>
                <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-12 text-center border border-gray-200 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <h2 class="text-4xl lg:text-5xl font-extrabold mb-6 bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">Ready to Start Your Project?</h2>
                    <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Let's discuss your ideas and create something amazing together. 
                        I'm excited to hear about your vision and help bring it to life.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <x-site.custom-button 
                            variant="warning" 
                            size="large"
                            type="submit"
                            href="mailto:{{ $contact->email ?? 'contact@example.com' }}" 
                            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'>
                            Send Email
                        </x-site.custom-button>
                        <x-site.custom-button 
                            variant="success" 
                            href="{{ route('home') }}" 
                            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>'>
                            View My Work
                        </x-site.custom-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // FAQ Toggle Function
        function toggleFAQ(id) {
            console.log('toggleFAQ called with id:', id);
            
            const content = document.getElementById(`faq-content-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            
            if (!content || !icon) {
                console.error('Content or icon not found for id:', id);
                return;
            }
            
            console.log('Current maxHeight:', content.style.maxHeight);
            
            // Close all other FAQs
            const allContents = document.querySelectorAll('.faq-content');
            const allIcons = document.querySelectorAll('[id^="faq-icon-"]');
            
            allContents.forEach((item, index) => {
                if (item.id !== `faq-content-${id}`) {
                    item.style.maxHeight = '0px';
                    if (allIcons[index]) {
                        allIcons[index].classList.remove('rotate-180');
                    }
                }
            });
            
            // Toggle current FAQ
            const currentHeight = content.style.maxHeight;
            if (currentHeight === '0px' || currentHeight === '' || currentHeight === '0') {
                // Expand
                const scrollHeight = content.scrollHeight;
                console.log('Expanding to height:', scrollHeight);
                content.style.maxHeight = scrollHeight + 'px';
                icon.classList.add('rotate-180');
            } else {
                // Collapse
                console.log('Collapsing');
                content.style.maxHeight = '0px';
                icon.classList.remove('rotate-180');
            }
        }

        // Initialize all FAQs as collapsed when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing FAQs');
            const allContents = document.querySelectorAll('.faq-content');
            const allIcons = document.querySelectorAll('[id^="faq-icon-"]');
            
            allContents.forEach((content, index) => {
                if (index === 0) {
                    // First FAQ should be expanded by default
                    content.style.maxHeight = content.scrollHeight + 'px';
                    if (allIcons[index]) {
                        allIcons[index].classList.add('rotate-180');
                    }
                    console.log('Set first FAQ as expanded:', content.id);
                } else {
                    // All other FAQs should be collapsed
                    content.style.maxHeight = '0px';
                    if (allIcons[index]) {
                        allIcons[index].classList.remove('rotate-180');
                    }
                    console.log('Set maxHeight to 0 for:', content.id);
                }
            });
        });

        // Also initialize immediately if DOM is already loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded (delayed), initializing FAQs');
                const allContents = document.querySelectorAll('.faq-content');
                const allIcons = document.querySelectorAll('[id^="faq-icon-"]');
                
                allContents.forEach((content, index) => {
                    if (index === 0) {
                        // First FAQ should be expanded by default
                        content.style.maxHeight = content.scrollHeight + 'px';
                        if (allIcons[index]) {
                            allIcons[index].classList.add('rotate-180');
                        }
                    } else {
                        // All other FAQs should be collapsed
                        content.style.maxHeight = '0px';
                        if (allIcons[index]) {
                            allIcons[index].classList.remove('rotate-180');
                        }
                    }
                });
            });
        } else {
            console.log('DOM already loaded, initializing FAQs immediately');
            const allContents = document.querySelectorAll('.faq-content');
            const allIcons = document.querySelectorAll('[id^="faq-icon-"]');
            
            allContents.forEach((content, index) => {
                if (index === 0) {
                    // First FAQ should be expanded by default
                    content.style.maxHeight = content.scrollHeight + 'px';
                    if (allIcons[index]) {
                        allIcons[index].classList.add('rotate-180');
                    }
                } else {
                    // All other FAQs should be collapsed
                    content.style.maxHeight = '0px';
                    if (allIcons[index]) {
                        allIcons[index].classList.remove('rotate-180');
                    }
                }
            });
        }
    </script>

</div>
@endsection 