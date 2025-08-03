<footer class="bg-card text-text border-t border-accent/20">
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Contact Form Section -->
            <div>
                <h3 class="text-lg font-bold mb-4 text-text">
                    <span class="text-text">Contact</span>
                    <span class="text-accent">Me</span>
                </h3>
                
                <form id="contact-form" class="space-y-3">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="name" class="block text-xs font-medium mb-1 text-text">Name</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-3 py-2 bg-background border border-accent/20 rounded text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 text-sm"
                                   placeholder="Your Name">
                            <div id="name-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-xs font-medium mb-1 text-text">Email</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-3 py-2 bg-background border border-accent/20 rounded text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 text-sm"
                                   placeholder="Your Email">
                            <div id="email-error" class="text-red-400 text-xs mt-1 hidden"></div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-xs font-medium mb-1 text-text">Phone</label>
                        <input type="tel" id="phone" name="phone"
                               class="w-full px-3 py-2 bg-background border border-accent/20 rounded text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 text-sm"
                               placeholder="Your Phone">
                        <div id="phone-error" class="text-red-400 text-xs mt-1 hidden"></div>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-xs font-medium mb-1 text-text">Message</label>
                        <textarea id="message" name="message" rows="3" required
                                  class="w-full px-3 py-2 bg-background border border-accent/20 rounded text-text placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition-all duration-300 resize-none text-sm"
                                  placeholder="Your Message"></textarea>
                        <div id="message-error" class="text-red-400 text-xs mt-1 hidden"></div>
                    </div>
                    
                    <button type="submit" 
                            class="bg-accent text-dark font-medium py-2 px-4 rounded text-sm hover:bg-accent/90 transition-all duration-300 focus-ring">
                        Send Message
                    </button>
                </form>
                
                <!-- Success/Error Messages -->
                <div id="form-message" class="mt-3 hidden">
                    <div id="success-message" class="bg-accent/20 border border-accent/30 text-accent px-3 py-2 rounded text-sm hidden"></div>
                    <div id="error-message" class="bg-red-400/20 border border-red-400/30 text-red-400 px-3 py-2 rounded text-sm hidden"></div>
                </div>
            </div>
            
            <!-- Contact Info Section -->
            <div>
                <h3 class="text-lg font-bold mb-4 text-text">Get In Touch</h3>
                <div class="space-y-3">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-muted text-sm">info@example.com</span>
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
                
                <!-- Social Links -->
                <div class="mt-4">
                    <h4 class="text-sm font-semibold mb-2 text-text">Follow Me</h4>
                    <div class="flex space-x-3">
                        <a href="#" class="p-1 text-muted hover:text-accent transition-colors duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-1 text-muted hover:text-accent transition-colors duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-1 text-muted hover:text-accent transition-colors duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-accent/20 mt-4">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
                <div class="text-center md:text-left">
                    <p class="text-muted text-xs">&copy; {{ date('Y') }} Azmain Iqtidar Anik. All rights reserved.</p>
                </div>
                <div class="flex items-center space-x-4 text-xs">
                    <a href="#" class="text-muted hover:text-accent transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="text-muted hover:text-accent transition-colors duration-300">Terms of Service</a>
                    <a href="#" class="text-muted hover:text-accent transition-colors duration-300">Cookie Policy</a>
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