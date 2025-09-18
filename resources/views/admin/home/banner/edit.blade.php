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

                    <div class="space-y-8">
                        <!-- Background Media -->
                        <x-forms.image-upload 
                            name="background_image"
                            label="Background Media (Image/GIF/Video)"
                            :currentImage="$banner->background_image"
                            accept="image/*,video/mp4,video/webm"
                            helpText="Recommended image: 1920x1080+ (JPG/PNG/GIF/WEBP) or video: MP4/WEBM"
                            previewHeight="h-48"
                            previewWidth="w-full"
                            previewShape="rounded-xl"
                        />

                        <!-- Profile Image -->
                        <x-forms.image-upload 
                            name="person_image"
                            label="Profile Image"
                            :currentImage="$banner->person_image"
                            accept="image/*"
                            helpText="Recommended: Square image, 400x400 or larger (JPG, PNG, GIF, WEBP)"
                            previewHeight="h-32"
                            previewWidth="w-32"
                            previewShape="rounded-full"
                        />

                        <!-- CV File Upload -->
                        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-6">
                            <label class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <div class="p-2 bg-green-500 rounded-xl mr-3 shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                CV/Resume File
                            </label>

                            <!-- Side by Side CV Comparison -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                                <!-- Current CV Section -->
                                @if($banner && $banner->cv_file)
                                    <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-green-100 border-2 border-green-200 rounded-3xl p-4 h-32 flex flex-col shadow-xl">
                                        <h4 class="text-sm font-bold text-green-800 mb-3 flex items-center">
                                            <div class="p-1.5 bg-green-500 rounded-lg mr-2 shadow-sm">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            Current CV
                                        </h4>
                                        <div class="flex-1 flex items-center justify-center">
                                            <div class="text-center">
                                                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-xs text-green-700 font-medium text-center">{{ basename($banner->cv_file) }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-2 p-2 bg-green-100 rounded-lg border border-green-200">
                                            <p class="text-xs text-green-700 text-center font-medium">✓ Currently uploaded</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200 border-2 border-gray-300 rounded-3xl p-4 h-48 flex flex-col shadow-xl">
                                        <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                                            <div class="p-1.5 bg-gray-500 rounded-lg mr-2 shadow-sm">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            Current CV
                                        </h4>
                                        <div class="flex-1 flex items-center justify-center">
                                            <div class="text-center">
                                                <div class="w-16 h-full bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-gray-500 font-medium text-sm">No CV uploaded</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- New CV Upload Section -->
                                <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 border-2 border-blue-200 rounded-3xl p-4 h-48 flex flex-col shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                    <h4 class="text-sm font-bold text-blue-800 mb-3 flex items-center">
                                        <div class="p-1.5 bg-blue-500 rounded-lg mr-2 shadow-sm">
                                            <svg class="w-4 h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        New CV Upload
                                    </h4>
                                    <div id="cvPreviewWrapper" class="hidden flex-1 items-center justify-center overflow-hidden bg-white rounded-2xl p-2 shadow-inner">
                                        <div class="text-center">
                                            <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <p id="cvFileName" class="text-xs text-blue-700 font-medium text-center"></p>
                                        </div>
                                    </div>
                                    <div id="cvPlaceholder" class="flex-1 flex items-center justify-center bg-white rounded-2xl border-2 border-dashed border-blue-300">
                                        <div class="text-center">
                                            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                            </div>
                                            <p class="text-blue-600 font-medium text-sm">Select CV file</p>
                                        </div>
                                    </div>
                                    <!-- Status message for new CV upload -->
                                    <div id="cvUploadStatus" class="hidden mt-2 p-2 bg-blue-100 rounded-lg border border-blue-200">
                                        <p class="text-xs text-blue-700 text-center font-medium">✓ New CV selected</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Modern CV File Input -->
                            <div class="bg-gradient-to-r from-gray-50 to-blue-50 border-2 border-dashed border-blue-300 rounded-2xl p-4 hover:border-blue-400 transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Select a new CV file</p>
                                            <p class="text-xs text-gray-500">PDF, DOC, or DOCX files only (max 5MB)</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Hidden file input -->
                                    <input type="file" name="cv_file" accept=".pdf,.doc,.docx"
                                        class="hidden" id="cvFileInput">
                                    
                                    <!-- Custom button -->
                                    <label for="cvFileInput" 
                                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Choose File
                                    </label>
                                </div>
                                
                                <!-- File name display -->
                                <div id="cvFileNameDisplay" class="hidden mt-3 p-2 bg-white rounded-lg border border-blue-200">
                                    <p class="text-xs text-blue-700 text-center">
                                        <span class="font-medium">Selected:</span> 
                                        <span id="cvSelectedFileName"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
            </x-forms.admin-form>
        </div>
    </div>

    <!-- CV Upload JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cvFileInput = document.getElementById('cvFileInput');
            const cvPreviewWrapper = document.getElementById('cvPreviewWrapper');
            const cvPlaceholder = document.getElementById('cvPlaceholder');
            const cvUploadStatus = document.getElementById('cvUploadStatus');
            const cvFileName = document.getElementById('cvFileName');
            const cvFileNameDisplay = document.getElementById('cvFileNameDisplay');
            const cvSelectedFileName = document.getElementById('cvSelectedFileName');

            if (cvFileInput && cvPreviewWrapper && cvPlaceholder && cvUploadStatus && cvFileName && cvFileNameDisplay && cvSelectedFileName) {
                cvFileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    
                    if (file) {
                        // Show new CV preview
                        cvPreviewWrapper.classList.remove('hidden');
                        cvPlaceholder.classList.add('hidden');
                        cvUploadStatus.classList.remove('hidden');
                        cvFileNameDisplay.classList.remove('hidden');
                        
                        // Update file name displays
                        cvFileName.textContent = file.name;
                        cvSelectedFileName.textContent = file.name;
                    } else {
                        // Hide new CV preview if no file selected
                        cvPreviewWrapper.classList.add('hidden');
                        cvPlaceholder.classList.remove('hidden');
                        cvUploadStatus.classList.add('hidden');
                        cvFileNameDisplay.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endsection

