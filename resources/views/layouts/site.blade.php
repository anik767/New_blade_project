<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'My Portfolio')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
  @stack('styles')
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

  {{-- Site Navigation --}}
  <x-site-navigation />

  <main class="min-h-[95vh]" role="main">
    @yield('content')
  </main>

  <x-site-footer />

  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')

  {{-- Toast with Notyf (uses npm build) --}}
  @if(session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const notyf = new Notyf({
          duration: 3000,
          position: { x: 'right', y: 'bottom' } // Toast appears bottom right
        });

        // If you want to move it higher from the bottom, modify bottom CSS
        const container = document.querySelector('.notyf__toast-container');
        if (container) {
          container.style.bottom = '150px'; // Push toast 150px up from bottom
        }

        notyf.success(@json(session('success')));
      });
    </script>
  
  @endif
  
  <!-- Comment Form JavaScript -->
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const commentForm = document.getElementById('comment-form');
          if (commentForm) {
              commentForm.addEventListener('submit', function(e) {
                  e.preventDefault();
                  
                  const formData = new FormData(this);
                  const submitButton = this.querySelector('button[type="submit"]');
                  const messageDiv = document.getElementById('comment-message');
                  const successDiv = document.getElementById('comment-success');
                  const errorDiv = document.getElementById('comment-error');
                  
                  // Disable submit button
                  submitButton.disabled = true;
                  submitButton.textContent = 'Submitting...';
                  
                  // Hide previous messages
                  messageDiv.classList.add('hidden');
                  successDiv.classList.add('hidden');
                  errorDiv.classList.add('hidden');
                  
                  fetch('{{ route("comment.store") }}', {
                      method: 'POST',
                      body: formData,
                      headers: {
                          'X-Requested-With': 'XMLHttpRequest'
                      }
                  })
                  .then(response => response.json())
                  .then(data => {
                      messageDiv.classList.remove('hidden');
                      
                      if (data.success) {
                          successDiv.textContent = data.message;
                          successDiv.classList.remove('hidden');
                          
                          // Clear form
                          this.reset();
                          
                          // Reload page after 2 seconds to show new comment
                          setTimeout(() => {
                              window.location.reload();
                          }, 2000);
                      } else {
                          errorDiv.textContent = data.message;
                          errorDiv.classList.remove('hidden');
                      }
                  })
                  .catch(error => {
                      messageDiv.classList.remove('hidden');
                      errorDiv.textContent = 'An error occurred. Please try again.';
                      errorDiv.classList.remove('hidden');
                  })
                  .finally(() => {
                      // Re-enable submit button
                      submitButton.disabled = false;
                      submitButton.textContent = 'Post Comment';
                  });
              });
          }
      });
  </script>

</body>
</html>
