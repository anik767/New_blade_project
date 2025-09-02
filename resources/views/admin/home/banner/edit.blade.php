@extends('layouts.admin')

@section('title', 'Edit Home Banner')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
        <div class="">
            <!-- Header Section -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
                <div class="flex xl:flex-row flex-col justify-between items-center gap-4">

                    <div class="flex  flex-col justify-between items-start gap-4">
                        <div class="p-4 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center md:text-left">
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Home Banner</h1>
                            <p class="text-gray-600 text-lg">Update your homepage banner content and media</p>
                        </div>
                    </div>

                    <!-- Banner Status -->
                    <div class="flex md:flex-row flex-col justify-between items-center gap-4">
                        @if ($banner->exists)
                            <div
                                class="flex items-center justify-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-gray-700 font-medium">Last updated:
                                    {{ $banner->updated_at->diffForHumans() }}</span>
                            </div>

                            <div
                                class="flex items-center justify-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 4a2 2 0 012-2h4a2 2 0 012 2">
                                    </path>
                                </svg>
                                <span class="text-gray-700 font-medium">Created:
                                    {{ $banner->created_at->format('M d, Y') }}</span>
                            </div>
                        @else
                            <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-blue-700 font-medium">New banner - will be created when saved</span>
                            </div>
                        @endif
                    </div>

                    <!-- Media Status Cards -->
                    <div class="flex md:flex-row flex-col justify-between items-center gap-4">
                        <div
                            class="text-center p-3 sm:p-4 bg-white rounded-xl sm:rounded-2xl shadow-lg border border-gray-200 min-w-[70px] sm:min-w-[80px]">
                            <div
                                class="text-2xl sm:text-3xl font-bold {{ $banner->background_image ? 'text-green-600' : 'text-red-500' }} mb-1">
                                {{ $banner->background_image ? '✓' : '✗' }}
                            </div>
                            <div class="text-xs sm:text-sm text-gray-600 font-medium">Background</div>
                        </div>

                        <div
                            class="text-center p-3 sm:p-4 bg-white rounded-xl sm:rounded-2xl shadow-lg border border-gray-200 min-w-[70px] sm:min-w-[80px]">
                            <div
                                class="text-2xl sm:text-3xl font-bold {{ $banner->person_image ? 'text-green-600' : 'text-red-500' }} mb-1">
                                {{ $banner->person_image ? '✓' : '✗' }}
                            </div>
                            <div class="text-xs sm:text-sm text-gray-600 font-medium">Profile</div>
                        </div>

                        <div
                            class="text-center p-3 sm:p-4 bg-white rounded-xl sm:rounded-2xl shadow-lg border border-gray-200 min-w-[70px] sm:min-w-[80px]">
                            <div
                                class="text-2xl sm:text-3xl font-bold {{ $banner->cv_file ? 'text-green-600' : 'text-red-500' }} mb-1">
                                {{ $banner->cv_file ? '✓' : '✗' }}
                            </div>
                            <div class="text-xs sm:text-sm text-gray-600 font-medium">CV</div>
                        </div>
                    </div>
                </div>
            </div>

            <x-forms.admin-form :action="route('admin.home.banner.update')" title="" submit-text="Update Banner" method="PUT"
                enctype="multipart/form-data">
                <!-- Banner Content -->
                <div
                    class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 mb-6 sm:mb-8 border border-indigo-200 shadow-lg">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 flex items-center">
                        <div
                            class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl sm:rounded-2xl flex items-center justify-center mr-3 sm:mr-4 shadow-lg">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        Banner Content
                    </h3>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
                        <div class="space-y-4">
                            <x-forms.form-field label="Title Line 1" name="title_line1" placeholder="e.g., Hi, I'm John Doe"
                                :value="$banner->title_line1" />

                            <x-forms.form-field label="Title Line 2" name="title_line2"
                                placeholder="e.g., Full Stack Developer" :value="$banner->title_line2" />
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Preview
                            </h4>
                            <div class="space-y-3">
                                <div class="text-2xl font-bold text-gray-900">
                                    {{ $banner->title_line1 ?: 'Your Title Line 1' }}</div>
                                <div class="text-xl font-semibold text-blue-600">
                                    {{ $banner->title_line2 ?: 'Your Title Line 2' }}</div>
                                <div class="text-gray-600 text-sm">
                                    {{ $banner->subtitle ?: 'Your subtitle will appear here...' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <x-forms.form-field label="Subtitle" name="subtitle" type="textarea"
                            placeholder="A brief description about yourself and what you do. This will appear below your main title..."
                            :value="$banner->subtitle" />
                    </div>
                </div>

                <!-- Banner Media -->
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-3xl p-8 mb-8 border border-blue-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        Banner Media
                    </h3>

                    <x-forms.home-banner-media :banner="$banner" />
                </div>
            </x-forms.admin-form>
        </div>
    </div>
@endsection

