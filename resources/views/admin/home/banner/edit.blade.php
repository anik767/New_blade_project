@extends('layouts.admin')

@section('title', 'Edit Home Banner')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
        <div class="">
            <!-- Header Section -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
                <div class="flex xl:flex-row flex-col justify-between items-center gap-4">

                    <div class="flex lg:flex-row flex-col justify-between items-center gap-4">
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

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Background Image -->
                        <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg border border-gray-200">
                            <label
                                class="block text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4 flex items-center">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 text-blue-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Background Media (Image/GIF/Video)
                            </label>

                            @if ($banner->background_image)
                                <div
                                    class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
                                    <p class="text-sm font-semibold text-gray-700 mb-4">Current Background:</p>
                                    <div class="relative group">
                                        @php
                                            $ext = strtolower(pathinfo($banner->background_image, PATHINFO_EXTENSION));
                                            $isVideo = in_array($ext, ['mp4', 'webm']);
                                        @endphp
                                        @if ($isVideo)
                                            <video
                                                class="w-full h-48 object-cover rounded-xl border border-gray-200 shadow-lg group-hover:shadow-xl transition-all duration-300"
                                                autoplay muted loop playsinline>
                                                <source src="{{ asset('storage/' . $banner->background_image) }}"
                                                    type="video/{{ $ext == 'webm' ? 'webm' : 'mp4' }}">
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/' . $banner->background_image) }}"
                                                alt="Current background"
                                                class="w-full h-48 object-cover rounded-xl border border-gray-200 shadow-lg group-hover:shadow-xl transition-all duration-300">
                                        @endif
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-xl flex items-center justify-center">
                                            <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="space-y-4">
                                <input id="homeBackgroundMediaInput" type="file" name="background_image"
                                    accept="image/*,video/mp4,video/webm"
                                    class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-gray-100">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Recommended image: 1920x1080+ (JPG/PNG/GIF/WEBP) or video: MP4/WEBM
                                </p>
                                <div id="homeMediaPreviewWrapper" class="hidden">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
                                    <div class="relative w-full rounded-xl overflow-hidden border border-gray-200">
                                        <div id="homeLoadingOverlay"
                                            class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                            <svg class="animate-spin h-8 w-8 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                            </svg>
                                        </div>
                                        <div class="bg-gray-100">
                                            <video id="homeVideoPreview" class="w-full h-auto hidden" autoplay muted loop
                                                playsinline></video>
                                            <img id="homeImagePreview" class="w-full h-auto hidden"
                                                alt="Selected preview" />
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">Shows a loading overlay until media is ready.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Image -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                            <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile Image
                            </label>

                            @if ($banner->person_image)
                                <div
                                    class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
                                    <p class="text-sm font-semibold text-gray-700 mb-4">Current Profile Image:</p>
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $banner->person_image) }}" alt="Current profile"
                                            class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="space-y-4">
                                <input type="file" name="person_image" accept="image/*"
                                    class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-gray-50 hover:bg-gray-100">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Recommended: Square image, 400x400 or larger
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- CV File -->
                    <div class="mt-8 bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            CV/Resume File
                        </label>

                        @if ($banner->cv_file)
                            <div
                                class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
                                <p class="text-sm font-semibold text-gray-700 mb-4">Current CV File:</p>
                                <div
                                    class="flex items-center space-x-4 p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-900">{{ basename($banner->cv_file) }}
                                        </p>
                                        <a href="{{ asset('storage/' . $banner->cv_file) }}" target="_blank"
                                            class="text-xs text-blue-600 hover:text-blue-800 underline font-medium">View
                                            File</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="space-y-4">
                            <input type="file" name="cv_file" accept=".pdf,.doc,.docx"
                                class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 bg-gray-50 hover:bg-gray-100">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                PDF, DOC, or DOCX files only (max 5MB)
                            </p>
                        </div>
                    </div>
                </div>
            </x-forms.admin-form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        (function() {
            const input = document.getElementById('homeBackgroundMediaInput');
            const wrapper = document.getElementById('homeMediaPreviewWrapper');
            const video = document.getElementById('homeVideoPreview');
            const image = document.getElementById('homeImagePreview');
            const overlay = document.getElementById('homeLoadingOverlay');

            function showOverlay() {
                overlay && overlay.classList.remove('hidden');
            }

            function hideOverlay() {
                overlay && overlay.classList.add('hidden');
            }

            function resetPreview() {
                if (video) {
                    video.classList.add('hidden');
                    video.removeAttribute('src');
                    video.load();
                }
                if (image) {
                    image.classList.add('hidden');
                    image.removeAttribute('src');
                }
            }

            if (input) {
                input.addEventListener('change', function(e) {
                    const file = e.target.files && e.target.files[0];
                    if (!file) {
                        return;
                    }
                    const url = URL.createObjectURL(file);
                    if (wrapper) wrapper.classList.remove('hidden');
                    resetPreview();
                    showOverlay();

                    if (file.type && file.type.startsWith('video/')) {
                        if (video) {
                            video.src = url;
                            video.classList.remove('hidden');
                            const onLoaded = function() {
                                hideOverlay();
                                video.removeEventListener('loadeddata', onLoaded);
                            };
                            const onErr = function() {
                                hideOverlay();
                                video.removeEventListener('error', onErr);
                            };
                            video.addEventListener('loadeddata', onLoaded);
                            video.addEventListener('error', onErr);
                        }
                    } else {
                        if (image) {
                            image.src = url;
                            image.classList.remove('hidden');
                            image.onload = function() {
                                hideOverlay();
                            };
                            image.onerror = function() {
                                hideOverlay();
                            };
                        }
                    }
                });
            }
        })();
    </script>
@endpush
