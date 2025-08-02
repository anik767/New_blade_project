<footer class="bg-background text-text border-t border-gray-700">
    <div class="container mx-auto px-6 py-8">
        <!-- Main Footer Content - Three Columns -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Contact Form Section -->
            <div>
                <h3 class="text-xl font-bold mb-4">
                    <span class="text-text">CONTACT</span>
                    <span class="text-accent">ME</span>
                </h3>
                
                <form id="contact-form" class="space-y-3">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <input type="text" id="name" name="name" required
                               class="w-full px-3 py-2 bg-card border border-gray-700 rounded-lg text-text placeholder-muted focus:outline-none focus:border-accent"
                               placeholder="Your Name">
                        <input type="email" id="email" name="email" required
                               class="w-full px-3 py-2 bg-card border border-gray-700 rounded-lg text-text placeholder-muted focus:outline-none focus:border-accent"
                               placeholder="Your Email">
                    </div>
                    
                    <input type="tel" id="phone" name="phone"
                           class="w-full px-3 py-2 bg-card border border-gray-700 rounded-lg text-text placeholder-muted focus:outline-none focus:border-accent"
                           placeholder="Your Phone">
                    
                    <textarea id="message" name="message" rows="3" required
                              class="w-full px-3 py-2 bg-card border border-gray-700 rounded-lg text-text placeholder-muted focus:outline-none focus:border-accent resize-none"
                              placeholder="Your Message"></textarea>
                    
                    <button type="submit" 
                            class="bg-accent text-background px-6 py-2 rounded-lg hover:bg-accent/80 transition duration-300 font-medium">
                        Send Message
                    </button>
                </form>
                
                <!-- Success/Error Messages -->
                <div id="form-message" class="mt-3 hidden">
                    <div id="success-message" class="bg-acttive/20 border border-acttive text-acttive px-3 py-2 rounded text-sm hidden"></div>
                    <div id="error-message" class="bg-red-500/20 border border-red-500 text-red-400 px-3 py-2 rounded text-sm hidden"></div>
                </div>
            </div>
            
            <!-- Contact Info Section -->
            <div>
                <h3 class="text-lg font-bold mb-4 text-text">Get In Touch</h3>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-500 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-muted text-sm">info@example.com</span>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-pink-500 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <span class="text-muted text-sm">+1 (555) 123-4567</span>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-pink-500 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-muted text-sm">123 Main St, City, State</span>
                    </div>
                </div>
            </div>

            <!-- Page Links Section -->
            <div>
                <h3 class="text-lg font-bold mb-4 text-text">Quick Links</h3>
                <div class="space-y-2">
                    <div><a href="{{ route('home') }}" class="text-muted hover:text-accent transition-colors text-sm">Home</a></div>
                    <div><a href="{{ route('about') }}" class="text-muted hover:text-accent transition-colors text-sm">About Me</a></div>
                    <div><a href="{{ route('services') }}" class="text-muted hover:text-accent transition-colors text-sm">Services</a></div>
                    <div><a href="{{ route('projects.index') }}" class="text-muted hover:text-accent transition-colors text-sm">Projects</a></div>
                    <div><a href="{{ route('site.blog.index') }}" class="text-muted hover:text-accent transition-colors text-sm">Blog</a></div>
                    <div><a href="{{ route('contact') }}" class="text-muted hover:text-accent transition-colors text-sm">Contact</a></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-gray-700">
        <div class="container mx-auto px-6 py-4">
            <div class="text-center text-muted text-sm">
                &copy; {{ date('Y') }} My Portfolio. All rights reserved.
            </div>
        </div>
    </div>
</footer>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Reset error messages
    document.querySelectorAll('[id$="-error"]').forEach(el => el.classList.add('hidden'));
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
            document.getElementById('success-message').textContent = data.message;
            document.getElementById('success-message').classList.remove('hidden');
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
                document.getElementById('error-message').textContent = data.message || 'Something went wrong. Please try again.';
                document.getElementById('error-message').classList.remove('hidden');
                document.getElementById('form-message').classList.remove('hidden');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('error-message').textContent = 'Something went wrong. Please try again.';
        document.getElementById('error-message').classList.remove('hidden');
        document.getElementById('form-message').classList.remove('hidden');
    });
});
</script> 