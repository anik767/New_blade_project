@extends('layouts.admin')
@section('title', 'Experience')

@section('content')
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">
                        There were errors with your submission:
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-admin-form 
        :action="route('admin.home.update-experience')" 
        title="Work Experience"
        submit-text="Update Experience"
        method="PUT"
    >
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Professional Experience
                </label>
                <p class="text-sm text-gray-600 mb-4">Add your work experience and professional background. These will be displayed on your portfolio.</p>
                
                <div id="experience-container" class="space-y-6">
                    @if($banner->experience && count($banner->experience) > 0)
                        @foreach($banner->experience as $index => $exp)
                            <div class="experience-item border border-gray-200 rounded-lg p-6 bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                                        <input type="text" 
                                               name="experience[{{ $index }}][title]" 
                                               value="{{ $exp['title'] ?? '' }}"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('experience.' . $index . '.title') border-red-500 @enderror"
                                               placeholder="e.g., Frontend Developer">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                                        <input type="text" 
                                               name="experience[{{ $index }}][company]" 
                                               value="{{ $exp['company'] ?? '' }}"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('experience.' . $index . '.company') border-red-500 @enderror"
                                               placeholder="e.g., SIMEC System Ltd">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Period</label>
                                    <input type="text" 
                                           name="experience[{{ $index }}][period]" 
                                           value="{{ $exp['period'] ?? '' }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('experience.' . $index . '.period') border-red-500 @enderror"
                                           placeholder="e.g., July 2023 - Present">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="experience[{{ $index }}][description]" 
                                              rows="3"
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('experience.' . $index . '.description') border-red-500 @enderror"
                                              placeholder="Describe your role, responsibilities, and achievements...">{{ $exp['description'] ?? '' }}</textarea>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <button type="button" 
                                            onclick="removeExperience(this)"
                                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        <span>Remove Experience</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="experience-item border border-gray-200 rounded-lg p-6 bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                                    <input type="text" 
                                           name="experience[0][title]" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="e.g., Frontend Developer">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                                    <input type="text" 
                                           name="experience[0][company]" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="e.g., SIMEC System Ltd">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Period</label>
                                <input type="text" 
                                       name="experience[0][period]" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="e.g., July 2023 - Present">
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="experience[0][description]" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Describe your role, responsibilities, and achievements..."></textarea>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button type="button" 
                                        onclick="removeExperience(this)"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Remove Experience</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                
                <button type="button" 
                        onclick="addExperience()"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Experience
                </button>
            </div>
        </div>
    </x-admin-form>

    <script>
    let experienceIndex = {{ $banner->experience ? count($banner->experience) : 1 }};

    function addExperience() {
        const container = document.getElementById('experience-container');
        const experienceItem = document.createElement('div');
        experienceItem.className = 'experience-item border border-gray-200 rounded-lg p-6 bg-gray-50 hover:bg-gray-100 transition-colors';
        experienceItem.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                    <input type="text" 
                           name="experience[${experienceIndex}][title]" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., Frontend Developer">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                    <input type="text" 
                           name="experience[${experienceIndex}][company]" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., SIMEC System Ltd">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Period</label>
                <input type="text" 
                       name="experience[${experienceIndex}][period]" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g., July 2023 - Present">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="experience[${experienceIndex}][description]" 
                          rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Describe your role, responsibilities, and achievements..."></textarea>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" 
                        onclick="removeExperience(this)"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span>Remove Experience</span>
                </button>
            </div>
        `;
        container.appendChild(experienceItem);
        experienceIndex++;
    }

    function removeExperience(button) {
        const experienceItem = button.closest('.experience-item');
        experienceItem.remove();
    }
    </script>
@endsection 