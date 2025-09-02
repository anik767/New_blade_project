@props([
    'banner' => null,
    'showBackgroundMedia' => true,
    'showProfileImage' => true,
    'showCVFile' => true
])

<div class="space-y-6">
    @if($showBackgroundMedia)
        <!-- Background Media (Image/GIF/Video) -->
        <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg border border-gray-200">
            <label class="block text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4 flex items-center">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 text-blue-600" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Background Media (Image/GIF/Video)
            </label>

            @if ($banner && $banner->background_image)
                <div class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
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
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-xl flex items-center justify-center">
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
    @endif

    @if($showProfileImage)
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

            @if ($banner && $banner->person_image)
                <div class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
                    <p class="text-sm font-semibold text-gray-700 mb-4">Current Profile Image:</p>
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $banner->person_image) }}" alt="Current profile"
                            class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-full flex items-center justify-center">
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
    @endif

    @if($showCVFile)
        <!-- CV File -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
            <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                CV/Resume File
            </label>

            @if ($banner && $banner->cv_file)
                <div class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
                    <p class="text-sm font-semibold text-gray-700 mb-4">Current CV File:</p>
                    <div class="flex items-center space-x-4 p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
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
    @endif
</div>

@if($showBackgroundMedia)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('homeBackgroundMediaInput');
    const imagePreviewWrapper = document.getElementById('homeMediaPreviewWrapper');
    const imagePreview = document.getElementById('homeImagePreview');
    const videoPreview = document.getElementById('homeVideoPreview');
    const loadingOverlay = document.getElementById('homeLoadingOverlay');

    if (imageInput && imagePreviewWrapper && imagePreview && videoPreview && loadingOverlay) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Show new upload preview
                imagePreviewWrapper.classList.remove('hidden');
                loadingOverlay.classList.remove('hidden');
                imagePreview.classList.add('hidden');
                videoPreview.classList.add('hidden');

                // Determine file type and show appropriate preview
                const fileType = file.type;
                
                if (fileType.startsWith('image/')) {
                    // Image preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        loadingOverlay.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else if (fileType.startsWith('video/')) {
                    // Video preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        videoPreview.src = e.target.result;
                        videoPreview.classList.remove('hidden');
                        loadingOverlay.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                // Hide new upload preview if no file selected
                imagePreviewWrapper.classList.add('hidden');
            }
        });
    }
});
</script>
@endif
