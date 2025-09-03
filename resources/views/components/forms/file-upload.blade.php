@props([
    'name' => 'file',
    'label' => 'Select a file',
    'accept' => '*/*',
    'required' => false,
    'disabled' => false,
])

<div class="space-y-2">
    <!-- Minimal dashed clickable area -->
    <label for="fileInput_{{ $name }}" class="block cursor-pointer">
        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-gray-400 transition-colors text-center">
            <div class="mx-auto w-10 h-10 mb-2 flex items-center justify-center text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
            </div>
            <p class="text-sm font-medium text-gray-700">{{ $label }}</p>
            <p class="text-xs text-gray-500">Click to choose</p>
        </div>
    </label>

    <!-- Hidden file input -->
    <input type="file" name="{{ $name }}" accept="{{ $accept }}"
        {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }}
        class="hidden" id="fileInput_{{ $name }}">

    <!-- Selected filename (optional) -->
    <p id="selectedFileName_{{ $name }}" class="hidden text-xs text-gray-600"></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('fileInput_{{ $name }}');
        const fileName = document.getElementById('selectedFileName_{{ $name }}');
        if (input && fileName) {
            input.addEventListener('change', function(e) {
                const file = e.target.files && e.target.files[0];
                if (file) {
                    fileName.textContent = `Selected: ${file.name}`;
                    fileName.classList.remove('hidden');
                } else {
                    fileName.classList.add('hidden');
                }
            });
        }
    });
</script>