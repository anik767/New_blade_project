<footer class="bg-[#222] text-text border-t border-accent/20">
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Contact Form Section - Made Smaller -->
            <div class="lg:col-span-2">
                <h3 class="text-lg font-bold mb-3 text-text">
                    <span class="text-text">Contact</span>
                    <span class="text-accent">Me</span>
                </h3>
                
                <form id="contact-form" class="space-y-3">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="name" class="block text-xs font-medium mb-1 text-text">Name</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-3 py-2 bg-background border border-accent/20 rounded-[12px] text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 text-sm"
                                   placeholder="Your Name">
                            <div id="name-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-xs font-medium mb-1 text-text">Email</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-3 py-2 bg-background border border-accent/20 rounded-[12px] text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 text-sm"
                                   placeholder="Your Email">
                            <div id="email-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="phone" class="block text-xs font-medium mb-1 text-text">Phone</label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-3 py-2 bg-background border border-accent/20 rounded-[12px] text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 text-sm"
                                   placeholder="Your Phone">
                            <div id="phone-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                        
                        <div>
                            <button type="submit" 
                                    class="w-full bg-accent text-dark font-medium py-2 px-4 rounded-[12px] text-sm hover:bg-accent/90 transition-all duration-300 focus-ring mt-6">
                                Send Message
                            </button>
                        </div>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-xs font-medium mb-1 text-text">Message</label>
                        <textarea id="message" name="message" rows="2" required
                                  class="w-full px-3 py-2 bg-background border border-accent/20 rounded-[12px] text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 resize-none text-sm"
                                  placeholder="Your Message"></textarea>
                        <div id="message-error" class="text-red-400 text-xs mt-1 hidden"></div>
                    </div>
                </form>
                
                <!-- Success/Error Messages -->
                <div id="form-message" class="mt-3 hidden">
                    <div id="success-message" class="bg-accent/20 border border-accent/30 text-accent px-3 py-2 rounded text-sm hidden"></div>
                    <div id="error-message" class="bg-red-400/20 border border-red-400/30 text-red-400 px-3 py-2 rounded text-sm hidden"></div>
                </div>
            </div>
            
            <!-- Quick Access & Contact Info Section -->
            <div class="space-y-4">
                <!-- Quick Access Links -->
                <div>
                    <h4 class="text-sm font-semibold mb-3 text-text">Quick Access</h4>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <a href="{{ route('home') }}" class="text-muted hover:text-accent transition-colors duration-300 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Home</span>
                        </a>
                        <a href="{{ route('about') }}" class="text-muted hover:text-accent transition-colors duration-300 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>About</span>
                        </a>
                        <a href="{{ route('services') }}" class="text-muted hover:text-accent transition-colors duration-300 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                            <span>Services</span>
                        </a>
                        <a href="{{ route('projects.index') }}" class="text-muted hover:text-accent transition-colors duration-300 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span>Projects</span>
                        </a>
                        <a href="{{ route('site.blog.index') }}" class="text-muted hover:text-accent transition-colors duration-300 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span>Blog</span>
                        </a>
                        <a href="{{ route('contact') }}" class="text-muted hover:text-accent transition-colors duration-300 flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Contact</span>
                        </a>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-sm font-semibold mb-3 text-text">Get In Touch</h4>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-muted text-sm">info@azmainanik.com</span>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-muted text-sm">+1 (555) 123-4567</span>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-muted text-sm">123 Main St, City, State 12345</span>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div>
                    <h4 class="text-sm font-semibold mb-2 text-text">Follow Me</h4>
                    <div class="flex space-x-2">
                        <a href="#" class="p-2 bg-background border border-accent/20 rounded-lg text-muted hover:text-accent hover:border-accent transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-2 bg-background border border-accent/20 rounded-lg text-muted hover:text-accent hover:border-accent transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-2 bg-background border border-accent/20 rounded-lg text-muted hover:text-accent hover:border-accent transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-2 bg-background border border-accent/20 rounded-lg text-muted hover:text-accent hover:border-accent transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
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
    
    fetch('{{ route("contact.submit") }}', {
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