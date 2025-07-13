<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'My Portfolio')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  @stack('styles')
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

  {{-- Site Navigation --}}
  @include('layouts.site-header')

  <main class="min-h-[95vh]" role="main">
    @yield('content')
  </main>

  <footer class="bg-gray-200 text-center py-4 text-sm text-gray-700 ">
    &copy; {{ date('Y') }} My Portfolio. All rights reserved.
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')

  <script>
    @if(session('success'))
      window.notyf?.success(@json(session('success')));
    @endif

    @if(session('error'))
      window.notyf?.error(@json(session('error')));
    @endif
  </script>
</body>
</html>
