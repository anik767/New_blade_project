<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Azmain Iqtidar Anik - Frontend Developer')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @php
        $themeId = \DB::table('settings')->where('key', 'selected_theme')->value('value');
        $theme = $themeId ? \App\Models\Theme::find($themeId) : null;
        $colors = $theme ? json_decode($theme->colors, true) : [];
    @endphp
    <style>
    :root {
        @foreach($colors as $key => $value)
            --color-{{ str_replace('_', '-', $key) }}: {{ $value }};
        @endforeach
    }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-background bg-background-gradient">
        <!-- Navigation -->
        @include('layouts.components.navigation')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.components.footer')
    </div>
</body>
</html> 