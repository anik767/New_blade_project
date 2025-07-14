<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>

<body class="bg-white text-gray-900 min-h-screen flex flex-col">

    {{-- Admin Navigation --}}
    @include('layouts.admin-header')

    <div class="container mx-auto px-4 py-6 flex-grow">
        @yield('content')
    </div>

    <footer class="bg-gray-100 text-center py-3 text-gray-500 text-sm">
        &copy; {{ date('Y') }} Admin Panel
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

    @if(session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const notyf = new Notyf({
          duration: 3000,
          position: { x: 'right', y: 'bottom' } 
        });

    
        notyf.success(@json(session('success')));
      });
    </script>
    @endif

</body>

</html>
