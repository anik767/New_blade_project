<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Notyf for notifications -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
    
    
</head>
<body class="bg-white text-gray-900 w-full">
    <!-- Fallback notifications -->
    <x-notification />
    
    
        <x-admin.sidebar />
    
    
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        let notyfLoaded = false;
        
        try {
          if (typeof Notyf !== 'undefined') {
            const notyf = new Notyf({
              duration: 4000,
              position: { x: 'right', y: 'bottom' },
              dismissible: true,
              types: [
                {
                  type: 'success',
                  background: '#10B981',
                  icon: {
                    className: 'fas fa-check',
                    tagName: 'i',
                    text: ''
                  }
                },
                {
                  type: 'error',
                  background: '#EF4444',
                  icon: {
                    className: 'fas fa-times',
                    tagName: 'i',
                    text: ''
                  }
                },
                {
                  type: 'warning',
                  background: '#F59E0B',
                  icon: {
                    className: 'fas fa-exclamation-triangle',
                    tagName: 'i',
                    text: ''
                  }
                },
                {
                  type: 'info',
                  background: '#3B82F6',
                  icon: {
                    className: 'fas fa-info-circle',
                    tagName: 'i',
                    text: ''
                  }
                }
              ],
              // Ensure notifications stay on one line
              ripple: false,
              // Prevent text wrapping
              className: 'notyf__toast--single-line'
            });

            notyfLoaded = true;

            // Success notifications
            @if(session('success'))
              notyf.success(@json(session('success')));
            @endif

            // Error notifications
            @if(session('error'))
              notyf.error(@json(session('error')));
            @endif

            // Warning notifications
            @if(session('warning'))
              notyf.open({
                type: 'warning',
                message: @json(session('warning'))
              });
            @endif

            // Info notifications
            @if(session('info'))
              notyf.open({
                type: 'info',
                message: @json(session('info'))
              });
            @endif

            // Validation errors
            @if($errors->any())
              @foreach($errors->all() as $error)
                notyf.error(@json($error));
              @endforeach
            @endif

            // Hide custom notifications if notyf is working
            const customNotifications = document.getElementById('notification-container');
            if (customNotifications) {
              customNotifications.style.display = 'none';
            }

          } else {
            console.warn('Notyf not loaded, using custom notifications');
          }
        } catch (error) {
          console.error('Notyf error:', error);
          console.warn('Using custom notifications as fallback');
        }
      });
    </script>
</body>
</html>
