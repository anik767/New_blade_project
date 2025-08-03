@extends('layouts.admin')
@section('title', 'Skills & Tech Stack')

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
        :action="route('admin.home.update-skills')" 
        title="Skills & Tech Stack"
        submit-text="Update Skills"
        method="PUT"
    >
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Technical Skills & Technologies
                </label>
                <p class="text-sm text-gray-600 mb-4">Add your technical skills and technologies. These will be displayed on your portfolio.</p>
                
                <div id="skills-container" class="space-y-3">
                    @if($banner->skills && count($banner->skills) > 0)
                        @foreach($banner->skills as $index => $skill)
                            <div class="skill-item flex items-center space-x-3 p-4 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <input type="text" 
                                           name="skills[]" 
                                           value="{{ $skill }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('skills.' . $index) border-red-500 @enderror"
                                           placeholder="e.g., HTML, CSS, Laravel, React, Vue.js">
                                </div>
                                <button type="button" 
                                        onclick="removeSkill(this)"
                                        class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Remove</span>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="skill-item flex items-center space-x-3 p-4 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="flex-1">
                                <input type="text" 
                                       name="skills[]" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="e.g., HTML, CSS, Laravel, React, Vue.js">
                            </div>
                            <button type="button" 
                                    onclick="removeSkill(this)"
                                    class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span>Remove</span>
                            </button>
                        </div>
                    @endif
                </div>
                
                <button type="button" 
                        onclick="addSkill()"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Skill
                </button>
            </div>
        </div>
    </x-admin-form>

    <script>
    function addSkill() {
        const container = document.getElementById('skills-container');
        const skillItem = document.createElement('div');
        skillItem.className = 'skill-item flex items-center space-x-3 p-4 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors';
        skillItem.innerHTML = `
            <div class="flex-1">
                <input type="text" 
                       name="skills[]" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g., HTML, CSS, Laravel, React, Vue.js">
            </div>
            <button type="button" 
                    onclick="removeSkill(this)"
                    class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center space-x-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Remove</span>
            </button>
        `;
        container.appendChild(skillItem);
    }

    function removeSkill(button) {
        const skillItem = button.closest('.skill-item');
        skillItem.remove();
    }
    </script>
@endsection 