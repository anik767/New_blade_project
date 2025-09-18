<footer class="relative text-white border-t border-white/10 overflow-hidden"
    style="background-image: url('/images/Round_effects.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <!-- Dark Overlay for better text readability -->
    <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/60 to-black/50"></div>
    
    <!-- Floating Elements -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-32 h-32 bg-blue-500/20 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-40 h-40 bg-purple-500/20 rounded-full blur-2xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-indigo-500/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>
    
    <div class="relative container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-[50%_25%_25%] gap-8">

            <!-- Contact Form Section -->
            <div class="">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white">Get In Touch</h3>
                </div>

                <form id="contact-form" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300"
                                placeholder="Your Name">
                            <div id="name-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                        
                        <div>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300"
                                placeholder="Your Email">
                            <div id="email-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                    </div>

                    <div>
                        <input type="tel" id="phone" name="phone"
                            class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300"
                            placeholder="Your Phone">
                        <div id="phone-error" class="text-red-400 text-xs mt-1 hidden"></div>
                    </div>

                    <div>
                        <textarea id="message" name="message" rows="3" required
                            class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300 resize-none"
                            placeholder="Your Message"></textarea>
                        <div id="message-error" class="text-red-400 text-xs mt-1 hidden"></div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Send Message
                    </button>
                </form>

                <!-- Success/Error Messages -->
                <div id="form-message" class="mt-4 hidden">
                    <div id="success-message"
                        class="bg-green-500/20 border border-green-400/30 text-green-300 px-4 py-3 rounded-xl backdrop-blur-sm hidden"></div>
                    <div id="error-message"
                        class="bg-red-500/20 border border-red-400/30 text-red-300 px-4 py-3 rounded-xl backdrop-blur-sm hidden">
                    </div>
                </div>
            </div>

            <!-- Quick Access Links -->
            <div>
                <div class="flex items-center mb-4">
                    <div class="w-6 h-6 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center mr-2">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-white">Quick Links</h4>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300 py-2 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('about') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300 py-2 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span>About</span>
                    </a>
                    <a href="{{ route('services') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300 py-2 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <span>Services</span>
                    </a>
                    <a href="{{ route('projects.index') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300 py-2 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span>Projects</span>
                    </a>
                    <a href="{{ route('site.blog.index') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300 py-2 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span>Blog</span>
                    </a>
                    <a href="{{ route('contact') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300 py-2 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span>Contact</span>
                    </a>
                </div>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="flex items-center mb-4">
                    <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-2">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-white">Contact Info</h4>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300 text-sm">info@azmainanik.com</span>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300 text-sm">+1 (555) 123-4567</span>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-300 text-sm">Dubai, UAE</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<script>
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Reset error messages
        document.querySelectorAll('[id$="-error"]').forEach(el => {
            el.classList.add('hidden');
            el.textContent = '';
        });
        document.getElementById('form-message').classList.add('hidden');
        document.getElementById('success-message').classList.add('hidden');
        document.getElementById('error-message').classList.add('hidden');

        const formData = new FormData(this);

        fetch('{{ route('contact.submit') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    const successEl = document.getElementById('success-message');
                    successEl.textContent = data.message;
                    successEl.classList.remove('hidden');
                    document.getElementById('form-message').classList.remove('hidden');

                    // Reset form
                    this.reset();
                } else {
                    // Show validation errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.getElementById(field + '-error');
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                                errorElement.classList.remove('hidden');
                            }
                        });
                    } else {
                        // Show general error message
                        const errorEl = document.getElementById('error-message');
                        errorEl.textContent = data.message || 'Something went wrong. Please try again.';
                        errorEl.classList.remove('hidden');
                        document.getElementById('form-message').classList.remove('hidden');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const errorEl = document.getElementById('error-message');
                errorEl.textContent = 'Something went wrong. Please try again.';
                errorEl.classList.remove('hidden');
                document.getElementById('form-message').classList.remove('hidden');
            });
    });
</script>
