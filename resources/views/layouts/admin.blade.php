<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Notyf for notifications -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</head>
<body class="bg-white text-gray-900">
    {{-- Admin Sidebar Component --}}
    <x-admin-sidebar />
    
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
