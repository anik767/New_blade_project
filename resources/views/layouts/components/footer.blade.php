<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Contact Form Section -->
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-6">
                    <span class="text-white">CONTACT</span>
                    <span class="text-green-400">ME</span>
                </h3>
                
                <form id="contact-form" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Name</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-green-400"
                                   placeholder="Your Name">
                            <div id="name-error" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-green-400"
                                   placeholder="Your Email">
                            <div id="email-error" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone"
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-green-400"
                               placeholder="Your Phone">
                        <div id="phone-error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" required
                                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-green-400 resize-none"
                                  placeholder="Your Message"></textarea>
                        <div id="message-error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>
                    
                    <button type="submit" 
                            class="bg-black border border-white text-white px-6 py-3 rounded-lg hover:bg-white hover:text-black transition duration-300">
                        Submit
                    </button>
                </form>
                
                <!-- Success/Error Messages -->
                <div id="form-message" class="mt-4 hidden">
                    <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded hidden"></div>
                    <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded hidden"></div>
                </div>
            </div>
            
            <!-- Contact Info Section -->
            <div>
                <h3 class="text-xl font-bold mb-6">Get In Touch</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-gray-300">info@example.com</span>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-gray-300">+1 (555) 123-4567</span>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-gray-300">123 Main St, City, State 12345</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    
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