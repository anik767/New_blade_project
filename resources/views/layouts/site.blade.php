<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Azmain Iqtidar Anik - Frontend Developer')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Global Scroll Progress Indicator -->
        <div id="globalScrollIndicator" style="position:fixed;top:0;left:0;height:4px;width:100%;transform:scaleX(0);transform-origin:left;background:linear-gradient(90deg,#1e40af,#3b82f6,#60a5fa);z-index:50;transition:transform 120ms linear"></div>
        <!-- Navigation -->
        <x-site.navigation />

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <x-site.footer />
    </div>
    <!-- Global Scroll To Top Button -->
    <button id="globalScrollTop" aria-label="Scroll to top" style="position:fixed;right:18px;bottom:18px;width:48px;height:48px;border-radius:9999px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#22c55e,#3b82f6);color:white;border:none;box-shadow:0 10px 20px rgba(0,0,0,.15);opacity:0;pointer-events:none;transform:translateY(8px);transition:opacity .25s,transform .25s;z-index:50">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:22px;height:22px">
            <path d="M5 15l7-7 7 7"/>
        </svg>
    </button>

    <script>
        (function() {
            const globalBar = document.getElementById('globalScrollIndicator');
            const pageSpecificBar = document.getElementById('scrollIndicator');
            // If a page-specific indicator exists, hide the global one to avoid duplication
            if (pageSpecificBar && globalBar) {
                globalBar.style.display = 'none';
            }

            const globalTopBtn = document.getElementById('globalScrollTop');
            const pageTopBtn = document.getElementById('scrollToTop');
            // Hide global button if page provides its own
            if (pageTopBtn && globalTopBtn) {
                globalTopBtn.style.display = 'none';
            }

            function updateProgress() {
                const bar = pageSpecificBar && pageSpecificBar.style.display !== 'none' ? pageSpecificBar : globalBar;
                if (!bar) return;
                const scrollTop = window.pageYOffset;
                const docHeight = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
                const ratio = Math.min(1, Math.max(0, scrollTop / docHeight));
                bar.style.transform = `scaleX(${ratio})`;
            }

            function updateTopButton() {
                const btn = (pageTopBtn && pageTopBtn.style.display !== 'none') ? pageTopBtn : globalTopBtn;
                if (!btn) return;
                const shouldShow = window.pageYOffset > 300;
                if (btn === globalTopBtn) {
                    btn.style.opacity = shouldShow ? '1' : '0';
                    btn.style.pointerEvents = shouldShow ? 'auto' : 'none';
                    btn.style.transform = shouldShow ? 'translateY(0)' : 'translateY(8px)';
                } else {
                    // Page-specific button may rely on CSS classes
                    if (shouldShow) btn.classList.add('visible'); else btn.classList.remove('visible');
                }
            }

            function scrollToTopSmooth() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            if (globalTopBtn) {
                globalTopBtn.addEventListener('click', scrollToTopSmooth);
            }
            if (pageTopBtn) {
                pageTopBtn.addEventListener('click', scrollToTopSmooth);
            }

            function onScroll() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        updateProgress();
                        updateTopButton();
                        ticking = false;
                    });
                    ticking = true;
                }
            }

            let ticking = false;
            window.addEventListener('scroll', onScroll, { passive: true });
            window.addEventListener('resize', onScroll);
            window.addEventListener('pageshow', () => { updateProgress(); updateTopButton(); });
            document.addEventListener('DOMContentLoaded', () => { updateProgress(); updateTopButton(); });
        })();
    </script>
</body>
</html> 