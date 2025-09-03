@props([
    'name' => 'image',
    'label' => 'Image',
    'currentImage' => null,
    'accept' => 'image/*',
    'helpText' => 'Recommended: Square image, 400x400 or larger',
    'previewShape' => 'rounded-xl', // rounded-xl, rounded-full, rounded-lg
    'currentImageClass' => '',
    'showCurrentImage' => true,
    'showPreview' => true,
    'required' => false,
    'disabled' => false,
])

<div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8">
    <label class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <div class="p-3 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl mr-4 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z">
                </path>
            </svg>
        </div>
        {{ $label }}
    </label>

    <!-- Side by Side Image Comparison -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Current Image Section -->
        @if ($showCurrentImage && $currentImage)
            <div
                class="bg-gradient-to-br from-emerald-50 via-green-50 to-emerald-100 border-2 border-emerald-200 rounded-3xl p-6 h-96 flex flex-col shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <h4 class="text-lg font-bold text-emerald-800 mb-4 flex items-center">
                    <div class="p-2 bg-emerald-500 rounded-xl mr-3 shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    Current {{ $label }}
                </h4>
                <div
                    class="flex-1 flex items-center justify-center overflow-hidden bg-white rounded-2xl p-2 shadow-inner">
                    <img src="{{ asset('storage/' . $currentImage) }}" alt="Current {{ strtolower($label) }}"
                        class="max-w-full max-h-full object-contain {{ $previewShape }} border-4 border-emerald-200 shadow-lg hover:shadow-xl transition-all duration-300">
                </div>
                <div class="mt-4 p-3 bg-emerald-100 rounded-xl border border-emerald-200">
                    <p class="text-sm text-emerald-700 text-center font-medium">✓ Currently displayed on your site</p>
                </div>
            </div>
        @else
            <div
                class="bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200 border-2 border-gray-300 rounded-3xl p-6 h-96 flex flex-col shadow-xl">
                <h4 class="text-lg font-bold text-gray-700 mb-4 flex items-center">
                    <div class="p-2 bg-gray-500 rounded-xl mr-3 shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    Current {{ $label }}
                </h4>
                <div
                    class="flex-1 flex items-center justify-center bg-white rounded-2xl border-2 border-dashed border-gray-300">
                    <div class="text-center">
                        <div
                            class="p-4 bg-gray-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-500 font-medium">No current image</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- New Upload Preview Section -->
        <div
            class="bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 border-2 border-blue-200 rounded-3xl p-6 h-96 flex flex-col shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
            <h4 class="text-lg font-bold text-blue-800 mb-4 flex items-center">
                <div class="p-2 bg-blue-500 rounded-xl mr-3 shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                </div>
                New Upload Preview
            </h4>
            <div id="imagePreviewWrapper_{{ $name }}"
                class="hidden flex-1 flex items-center justify-center overflow-hidden bg-white rounded-2xl p-2 shadow-inner">
                <img id="imagePreview_{{ $name }}"
                    class="max-w-full max-h-full object-contain {{ $previewShape }} border-4 border-blue-200 shadow-lg"
                    alt="New upload preview" />
            </div>
            <div id="placeholder_{{ $name }}"
                class="flex-1 flex items-center justify-center bg-white rounded-2xl border-2 border-dashed border-blue-300">
                <div class="text-center">
                    <div class="p-4 bg-blue-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                    </div>
                    <p class="text-blue-600 font-medium">Select a new image to preview</p>
                </div>
            </div>
            <!-- Status message for new upload -->
            <div id="newUploadStatus_{{ $name }}" class="hidden mt-4 p-3 bg-blue-100 rounded-xl border border-blue-200">
                <p class="text-sm text-blue-700 text-center font-medium">✓ New image selected for upload</p>
            </div>
        </div>
    </div>

    <div class="space-y-6">

        <!-- Modern File Input Button -->
        <label for="fileInput_{{ $name }}" class="block cursor-pointer">
            <div class="bg-gradient-to-r from-gray-50 to-blue-50 border-2 border-dashed border-blue-300 rounded-2xl p-4 hover:border-blue-400 hover:from-blue-100 hover:to-indigo-100 transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 group-hover:text-gray-800 transition-colors duration-300">Select a new image file</p>
                            <p class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors duration-300">{{ $helpText }}</p>
                        </div>
                    </div>
                    
                    <!-- Custom button -->
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-xl shadow-md group-hover:shadow-lg transform group-hover:-translate-y-0.5 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Choose File
                    </div>
                </div>
                
                <!-- File name display -->
                <div id="fileName_{{ $name }}" class="hidden mt-3 p-2 bg-white rounded-lg border border-blue-200">
                    <p class="text-xs text-blue-700 text-center">
                        <span class="font-medium">Selected:</span> 
                        <span id="selectedFileName_{{ $name }}"></span>
                    </p>
                </div>
            </div>
        </label>
        
        <!-- Hidden file input -->
        <input type="file" name="{{ $name }}" accept="{{ $accept }}"
            {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }}
            class="hidden" id="fileInput_{{ $name }}">

        <div
            class="flex items-start space-x-3 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl border border-blue-200">
            <div class="p-2 bg-blue-500 rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-blue-800 mb-1">Upload Guidelines</p>
                <p class="text-sm text-blue-700">{{ $helpText }}</p>
            </div>
        </div>
    </div>
</div>

@if ($showPreview)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.querySelector('input[name="{{ $name }}"]');
            const imagePreviewWrapper = document.getElementById('imagePreviewWrapper_{{ $name }}');
            const imagePreview = document.getElementById('imagePreview_{{ $name }}');
            const placeholder = document.getElementById('placeholder_{{ $name }}');
            const newUploadStatus = document.getElementById('newUploadStatus_{{ $name }}');
            const fileName = document.getElementById('fileName_{{ $name }}');
            const selectedFileName = document.getElementById('selectedFileName_{{ $name }}');

            if (imageInput && imagePreviewWrapper && imagePreview && placeholder && newUploadStatus && fileName && selectedFileName) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    
                    if (file) {
                        // Show new upload preview
                        imagePreviewWrapper.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                        newUploadStatus.classList.remove('hidden');
                        
                        // Show file name
                        selectedFileName.textContent = file.name;
                        fileName.classList.remove('hidden');

                        // Create a FileReader to preview the image
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Hide new upload preview if no file selected
                        imagePreviewWrapper.classList.add('hidden');
                        placeholder.classList.remove('hidden');
                        newUploadStatus.classList.add('hidden');
                        fileName.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endif
