@props([
    'name' => 'media',
    'label' => 'Media',
    'currentMedia' => null,
    'accept' => 'image/*',
    'helpText' => 'Upload your media file',
    'previewHeight' => 'h-32',
    'previewWidth' => 'w-32',
    'previewShape' => 'rounded-xl', // rounded-xl, rounded-full, rounded-lg
    'currentMediaClass' => '',
    'showCurrentMedia' => true,
    'showPreview' => true,
    'required' => false,
    'disabled' => false,
    'mediaType' => 'image', // image, video, file, mixed
    'layout' => 'vertical', // vertical, horizontal, grid
    'fileSize' => null,
    'fileType' => null
])

<div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
    <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
        @if($mediaType === 'image')
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
        @elseif($mediaType === 'video')
            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                </path>
            </svg>
        @elseif($mediaType === 'file')
            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
        @else
            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v.01">
                </path>
            </svg>
        @endif
        {{ $label }}
    </label>

    @if($showCurrentMedia && $currentMedia)
        <div class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
            <p class="text-sm font-semibold text-gray-700 mb-4">Current {{ $label }}:</p>
            <div class="relative group">
                @if($mediaType === 'image' || $mediaType === 'mixed')
                    @php
                        $ext = strtolower(pathinfo($currentMedia, PATHINFO_EXTENSION));
                        $isVideo = in_array($ext, ['mp4', 'webm', 'avi', 'mov']);
                    @endphp
                    
                    @if($isVideo)
                        <video class="{{ $previewWidth }} {{ $previewHeight }} object-cover {{ $previewShape }} border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto {{ $currentMediaClass }}"
                               autoplay muted loop playsinline>
                            <source src="{{ asset('storage/' . $currentMedia) }}" type="video/{{ $ext }}">
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $currentMedia) }}" 
                             alt="Current {{ strtolower($label) }}"
                             class="{{ $previewWidth }} {{ $previewHeight }} object-cover {{ $previewShape }} border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto {{ $currentMediaClass }}">
                    @endif
                @elseif($mediaType === 'video')
                    <video class="{{ $previewWidth }} {{ $previewHeight }} object-cover {{ $previewShape }} border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto {{ $currentMediaClass }}"
                           autoplay muted loop playsinline>
                        <source src="{{ asset('storage/' . $currentMedia) }}" type="video/mp4">
                    </video>
                @elseif($mediaType === 'file')
                    <div class="{{ $previewWidth }} {{ $previewHeight }} bg-gray-100 {{ $previewShape }} border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-12 h-12 text-gray-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <p class="text-xs text-gray-600 font-medium">{{ basename($currentMedia) }}</p>
                        </div>
                    </div>
                @endif
                
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 {{ $previewShape }} flex items-center justify-center">
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
        <input type="file" 
               name="{{ $name }}" 
               accept="{{ $accept }}"
               {{ $required ? 'required' : '' }}
               {{ $disabled ? 'disabled' : '' }}
               class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-gray-100 {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}">
        
        <p class="text-sm text-gray-600 flex items-center">
            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ $helpText }}
        </p>

        @if($showPreview)
            <div id="mediaPreviewWrapper_{{ $name }}" class="hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">New Upload Preview</label>
                <div class="relative w-full rounded-xl overflow-hidden border border-gray-200">
                    <div id="loadingOverlay_{{ $name }}"
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
                        @if($mediaType === 'image' || $mediaType === 'mixed')
                            <img id="imagePreview_{{ $name }}" 
                                 class="w-full h-auto hidden {{ $previewShape }}" 
                                 alt="Selected preview" />
                            <video id="videoPreview_{{ $name }}" 
                                   class="w-full h-auto hidden {{ $previewShape }}" 
                                   autoplay muted loop playsinline></video>
                        @elseif($mediaType === 'video')
                            <video id="videoPreview_{{ $name }}" 
                                   class="w-full h-auto hidden {{ $previewShape }}" 
                                   autoplay muted loop playsinline></video>
                        @elseif($mediaType === 'file')
                            <div id="filePreview_{{ $name }}" 
                                 class="w-full h-32 bg-gray-100 {{ $previewShape }} flex items-center justify-center hidden">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p class="text-sm text-gray-600 font-medium" id="fileName_{{ $name }}"></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Shows a loading overlay until media is ready.</p>
            </div>
        @endif
    </div>
</div>

@if($showPreview)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mediaInput = document.querySelector('input[name="{{ $name }}"]');
    const mediaPreviewWrapper = document.getElementById('mediaPreviewWrapper_{{ $name }}');
    const loadingOverlay = document.getElementById('loadingOverlay_{{ $name }}');

    if (mediaInput && mediaPreviewWrapper && loadingOverlay) {
        mediaInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Show new upload preview
                mediaPreviewWrapper.classList.remove('hidden');
                loadingOverlay.classList.remove('hidden');

                // Hide all preview elements
                const imagePreview = document.getElementById('imagePreview_{{ $name }}');
                const videoPreview = document.getElementById('videoPreview_{{ $name }}');
                const filePreview = document.getElementById('filePreview_{{ $name }}');
                const fileName = document.getElementById('fileName_{{ $name }}');

                if (imagePreview) imagePreview.classList.add('hidden');
                if (videoPreview) videoPreview.classList.add('hidden');
                if (filePreview) filePreview.classList.add('hidden');

                // Determine file type and show appropriate preview
                const fileType = file.type;
                const fileNameStr = file.name;

                if (fileType.startsWith('image/')) {
                    // Image preview
                    if (imagePreview) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.classList.remove('hidden');
                            loadingOverlay.classList.add('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                } else if (fileType.startsWith('video/')) {
                    // Video preview
                    if (videoPreview) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            videoPreview.src = e.target.result;
                            videoPreview.classList.remove('hidden');
                            loadingOverlay.classList.add('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                } else {
                    // File preview
                    if (filePreview && fileName) {
                        fileName.textContent = fileNameStr;
                        filePreview.classList.remove('hidden');
                        loadingOverlay.classList.add('hidden');
                    }
                }
            } else {
                // Hide new upload preview if no file selected
                mediaPreviewWrapper.classList.add('hidden');
            }
        });
    }
});
</script>
@endif
