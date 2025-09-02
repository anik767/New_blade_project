@extends('layouts.site')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full text-center space-y-8">
        <!-- Error Icon -->
        <div class="flex justify-center">
            <div class="w-32 h-32 bg-red-500/20 rounded-full flex items-center justify-center">
                <svg class="w-20 h-20 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
        </div>

        <!-- Error Message -->
        <div class="space-y-4">
            <h1 class="text-6xl font-extrabold text-white">
                500
            </h1>
            <h2 class="text-3xl font-bold text-gray-300">
                Server Error
            </h2>
            <p class="text-lg text-gray-400 max-w-md mx-auto">
                Something went wrong on our end. We're working to fix the problem. Please try again later.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Back to Home
            </a>
            
            <button onclick="location.reload()" 
                    class="inline-flex items-center px-6 py-3 border border-gray-600 text-base font-medium rounded-lg text-gray-300 bg-gray-800/50 hover:bg-gray-700/50 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Try Again
            </button>
        </div>

        <!-- Additional Help -->
        <div class="mt-8 pt-8 border-t border-gray-700">
            <p class="text-sm text-gray-500">
                If the problem persists, please <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">contact us</a> for assistance.
            </p>
        </div>
    </div>
</div>
@endsection 