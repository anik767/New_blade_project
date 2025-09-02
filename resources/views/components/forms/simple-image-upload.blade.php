@props([
    'name' => 'image',
    'label' => 'Image',
    'currentImage' => null,
    'accept' => 'image/*',
    'helpText' => 'Upload your image',
    'previewHeight' => 'h-32',
    'previewWidth' => 'w-48',
    'previewShape' => 'rounded-lg',
    'showCurrentImage' => true,
    'showPreview' => false,
    'required' => false,
    'disabled' => false
])

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        {{ $label }}
    </label>

    @if($showCurrentImage && $currentImage)
        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
            <p class="text-sm font-medium text-gray-700 mb-3">Current {{ $label }}:</p>
            <div class="relative group">
                <img src="{{ asset('storage/' . $currentImage) }}" 
                     alt="Current {{ strtolower($label) }}" 
                     class="{{ $previewWidth }} {{ $previewHeight }} object-cover {{ $previewShape }} border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 {{ $previewShape }} flex items-center justify-center">
                    <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    @endif
    
    <div class="relative">
        <input type="file" 
               name="{{ $name }}" 
               accept="{{ $accept }}"
               {{ $required ? 'required' : '' }}
               {{ $disabled ? 'disabled' : '' }}
               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}">
    </div>
    
    @if($helpText)
        <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-start">
                <svg class="w-4 h-4 text-blue-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="text-sm font-medium text-blue-800">{{ $label }} Requirements:</p>
                    <p class="text-sm text-blue-700 mt-1">{{ $helpText }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
