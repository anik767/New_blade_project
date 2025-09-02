@props([
    'name' => 'image',
    'label' => 'Image',
    'currentImage' => null,
    'accept' => 'image/*',
    'helpText' => 'Recommended: Square image, 400x400 or larger',
    'previewHeight' => 'h-32',
    'previewWidth' => 'w-32',
    'previewShape' => 'rounded-xl', // rounded-xl, rounded-full, rounded-lg
    'currentImageClass' => '',
    'showCurrentImage' => true,
    'showPreview' => true,
    'required' => false,
    'disabled' => false
])

<div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
    <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
            </path>
        </svg>
        {{ $label }}
    </label>

    @if($showCurrentImage && $currentImage)
        <div class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
            <p class="text-sm font-semibold text-gray-700 mb-4">Current {{ $label }}:</p>
            <div class="relative group">
                <img src="{{ asset('storage/' . $currentImage) }}" 
                     alt="Current {{ strtolower($label) }}"
                     class="{{ $previewWidth }} {{ $previewHeight }} object-cover {{ $previewShape }} border-4 border-white shadow-xl group-hover:shadow-2xl transition-all duration-300 mx-auto {{ $currentImageClass }}">
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
            <div id="imagePreviewWrapper_{{ $name }}" class="hidden">
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
                        <img id="imagePreview_{{ $name }}" 
                             class="w-full h-auto hidden {{ $previewShape }}" 
                             alt="Selected preview" />
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Shows a loading overlay until image is ready.</p>
            </div>
        @endif
    </div>
</div>

@if($showPreview)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.querySelector('input[name="{{ $name }}"]');
    const imagePreviewWrapper = document.getElementById('imagePreviewWrapper_{{ $name }}');
    const imagePreview = document.getElementById('imagePreview_{{ $name }}');
    const loadingOverlay = document.getElementById('loadingOverlay_{{ $name }}');

    if (imageInput && imagePreviewWrapper && imagePreview && loadingOverlay) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Show new upload preview
                imagePreviewWrapper.classList.remove('hidden');
                loadingOverlay.classList.remove('hidden');
                imagePreview.classList.add('hidden');

                // Create a FileReader to preview the image
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    loadingOverlay.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                // Hide new upload preview if no file selected
                imagePreviewWrapper.classList.add('hidden');
            }
        });
    }
});
</script>
@endif
