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

<body class="bg-gray-100 text-gray-900 min-h-full flex flex-col">

  {{-- Site Navigation --}}
  <x-site.navigation />

  <main class="min-h-[95vh]" role="main">
    @yield('content')
  </main>

  <x-site.footer />

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
  

</body>
</html>
