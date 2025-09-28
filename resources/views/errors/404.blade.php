@extends('layouts.site')

@section('content')
<div class="min-h-screen  flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto w-full text-center space-y-8">
        <!-- 404 GIF Animation -->
        <div class="flex justify-center mt-10">
            <img src="{{ asset('images/404.gif') }}" alt="404 Not Found" class="w-[70%]  object-contain">
        </div>

        <!-- Error Message -->
        <div class="space-y-4">
            <h1 class="text-6xl font-extrabold text-white">
                404
            </h1>
            <h2 class="text-3xl font-bold text-gray-300">
                Page Not Found
            </h2>
            <p class="text-lg text-gray-400 max-w-md mx-auto">
                Oops! The page you're looking for doesn't exist. It might have been moved, deleted, or you entered the wrong URL.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <x-site.custom-button 
                variant="blue" 
                href="{{ route('home') }}" 
                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>'>
                Back to Home
            </x-site.custom-button>
            
            <x-site.custom-button 
                variant="secondary" 
                onclick="history.back()" 
                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>'>
                Go Back
            </x-site.custom-button>
        </div>

        <!-- Additional Help -->
        <div class="mt-8 pt-8 border-t border-gray-700">
            <p class="text-sm text-gray-500">
                Need help? <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">Contact us</a> or check out our <a href="{{ route('services') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">services</a>.
            </p>
        </div>
    </div>
</div>
@endsection 