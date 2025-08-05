@extends('layouts.site')

@section('title', 'Contact')
@section('description', 'Get in touch with Azmain Iqtidar Anik - Frontend Developer. Let\'s discuss your next project and create something amazing together.')

@section('content')
<div class="bg-background text-text min-h-screen">
    
    {{-- Hero Section --}}
    <section class="relative py-32 bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('images/Home/banner-background-one.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-card/80 via-card/60 to-card/40"></div>

        <div class="container mx-auto px-6 relative font-rajdhani z-10">
            <div class="text-center max-w-4xl mx-auto reveal-on-scroll">
                <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight drop-shadow-lg capitalize leading-tight text-text mb-8">
                    Contact Me
                </h1>
                <p class="text-xl lg:text-2xl text-muted leading-relaxed drop-shadow-md max-w-3xl mx-auto">
                    Let's discuss your project and create something amazing together
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-32">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div class="bg-card rounded-3xl p-8 border border-card shadow-lg">
                    <h2 class="text-3xl font-bold text-text mb-8">Send a Message</h2>
                    
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-text mb-2">Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 bg-background border border-card rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-200"
                                    placeholder="Your name">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-text mb-2">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 bg-background border border-card rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-200"
                                    placeholder="your@email.com">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-text mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" required
                                class="w-full px-4 py-3 bg-background border border-card rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-200"
                                placeholder="What's this about?">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-text mb-2">Message</label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-3 bg-background border border-card rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-200 resize-none"
                                placeholder="Tell me about your project..."></textarea>
                        </div>
                        
                        <button type="submit"
                            class="w-full px-8 py-4 bg-accent text-background rounded-xl font-semibold tracking-wide hover:bg-accent/90 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Send Message
                            <svg class="w-5 h-5 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-8">Get In Touch</h2>
                        <p class="text-muted text-lg leading-relaxed mb-8">
                            I'm always excited to hear about new projects and opportunities. 
                            Whether you have a question or want to work together, feel free to reach out!
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-accent/10 rounded-xl">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-text">Email</h3>
                                <a href="mailto:azmain@example.com" class="text-accent hover:text-accent/80 transition-colors duration-300">
                                    azmain@example.com
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-accent/10 rounded-xl">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-text">Phone</h3>
                                <a href="tel:+8801234567890" class="text-accent hover:text-accent/80 transition-colors duration-300">
                                    +880 1234 567890
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-accent/10 rounded-xl">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-text">Location</h3>
                                <span class="text-muted">Dhaka, Bangladesh</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="pt-8">
                        <h3 class="text-xl font-semibold text-text mb-4">Follow Me</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="p-3 bg-accent/10 rounded-xl text-accent hover:bg-accent hover:text-background transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="p-3 bg-accent/10 rounded-xl text-accent hover:bg-accent hover:text-background transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="#" class="p-3 bg-accent/10 rounded-xl text-accent hover:bg-accent hover:text-background transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Overview Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">What I Can Help You With</h2>
                <p class="text-xl text-muted max-w-3xl mx-auto">From concept to deployment, I provide comprehensive web development services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center hover:scale-105 hover:-translate-y-2">
                    <div class="text-4xl mb-6">🎨</div>
                    <h3 class="text-2xl font-semibold mb-4 text-text">Web Design</h3>
                    <p class="text-muted leading-relaxed">Creating beautiful, user-friendly interfaces that engage and convert visitors into customers.</p>
                </div>
                
                <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center hover:scale-105 hover:-translate-y-2">
                    <div class="text-4xl mb-6">💻</div>
                    <h3 class="text-2xl font-semibold mb-4 text-text">Frontend Development</h3>
                    <p class="text-muted leading-relaxed">Building responsive, fast-loading websites using modern technologies and best practices.</p>
                </div>
                
                <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300 text-center hover:scale-105 hover:-translate-y-2">
                    <div class="text-4xl mb-6">⚡</div>
                    <h3 class="text-2xl font-semibold mb-4 text-text">Performance Optimization</h3>
                    <p class="text-muted leading-relaxed">Optimizing websites for speed, SEO, and user experience to maximize conversions.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">How We'll Work Together</h2>
                <p class="text-xl text-muted max-w-3xl mx-auto">A simple, transparent process to bring your vision to life</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-accent">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-text">Discovery</h3>
                    <p class="text-muted leading-relaxed">We discuss your goals, requirements, and vision for the project.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-accent">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-text">Planning</h3>
                    <p class="text-muted leading-relaxed">I create a detailed plan and timeline for your project.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-accent">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-text">Development</h3>
                    <p class="text-muted leading-relaxed">Building your project with regular updates and feedback.</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-accent/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-accent">4</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-text">Launch</h3>
                    <p class="text-muted leading-relaxed">Deploying your project and providing ongoing support.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">Frequently Asked Questions</h2>
                <p class="text-xl text-muted max-w-3xl mx-auto">Common questions about working together</p>
            </div>
            
            <div class="max-w-4xl mx-auto space-y-6">
                <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-4 text-text">What technologies do you work with?</h3>
                    <p class="text-muted leading-relaxed">I specialize in modern web technologies including HTML5, CSS3, JavaScript, React, Vue.js, Laravel, and more. I choose the best tools for each project's specific needs.</p>
                </div>
                
                <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-4 text-text">How long does a typical project take?</h3>
                    <p class="text-muted leading-relaxed">Project timelines vary based on complexity. A simple website might take 2-4 weeks, while complex applications can take 2-3 months. I'll provide a detailed timeline during our initial discussion.</p>
                </div>
                
                <div class="bg-card rounded-2xl p-8 border border-card shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-4 text-text">Do you provide ongoing support?</h3>
                    <p class="text-muted leading-relaxed">Yes! I offer ongoing maintenance, updates, and support packages to ensure your website continues to perform optimally after launch.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 reveal-on-scroll">
        <div class="container mx-auto px-6">
            <div class="bg-card rounded-3xl p-12 text-center border border-card shadow-lg">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-text mb-6">Ready to Start Your Project?</h2>
                <p class="text-xl text-muted mb-8 max-w-2xl mx-auto leading-relaxed">
                    Let's discuss your ideas and create something amazing together. 
                    I'm excited to hear about your vision and help bring it to life.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:{{ $contact->email ?? 'contact@example.com' }}" 
                       class="inline-flex items-center px-8 py-4 bg-accent text-background rounded-xl font-semibold tracking-wide hover:bg-accent/90 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Send Email
                    </a>
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-8 py-4 border-2 border-accent text-accent rounded-xl font-semibold tracking-wide hover:bg-accent hover:text-background transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
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