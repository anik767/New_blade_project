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
                {{ $exception->getStatusCode() ?? 'Error' }}
            </h1>
            <h2 class="text-3xl font-bold text-gray-300">
                {{ $exception->getMessage() ?? 'Something went wrong' }}
            </h2>
            <p class="text-lg text-gray-400 max-w-md mx-auto">
                An unexpected error occurred. Please try again or contact support if the problem persists.
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
            
            <button onclick="history.back()" 
                    class="inline-flex items-center px-6 py-3 border border-gray-600 text-base font-medium rounded-lg text-gray-300 bg-gray-800/50 hover:bg-gray-700/50 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Go Back
            </button>
        </div>

        <!-- Additional Help -->
        <div class="mt-8 pt-8 border-t border-gray-700">
            <p class="text-sm text-gray-500">
                Need help? <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">Contact us</a> for assistance.
            </p>
        </div>
    </div>
</div>
@endsection 