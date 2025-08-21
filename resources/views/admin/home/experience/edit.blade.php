@extends('layouts.admin')

@section('title', 'Edit Home Experience')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Home Experience</h1>
                            <p class="text-gray-600 text-lg">Manage your work experience for the homepage</p>
                        </div>
                    </div>
                    
                    <!-- Experience Status -->
                    <div class="flex flex-wrap items-center gap-4">
                        @if($banner->exists)
                            <div class="flex items-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-gray-700 font-medium">Last updated: {{ $banner->updated_at->diffForHumans() }}</span>
                            </div>
                        @else
                            <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-blue-700 font-medium">New experience section - will be created when saved</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Experience Count Card -->
                <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[120px]">
                    <div class="text-4xl font-bold text-purple-600 mb-2">{{ count($banner->experience ?? []) }}</div>
                    <div class="text-sm text-gray-600 font-medium">Experiences</div>
                </div>
            </div>
        </div>

        <x-forms.admin-form 
            :action="route('admin.home.experience.update')" 
            title=""
            submit-text="Update Experience"
            method="PUT"
        >
            <!-- Experience Content -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 mb-8 border border-purple-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8z"></path>
                        </svg>
                    </div>
                    Work Experience
                </h3>
                
                <div id="experience-container" class="space-y-6">
                    @if(is_array($banner->experience) && count($banner->experience) > 0)
                        @foreach($banner->experience as $index => $exp)
                            <div class="experience-item bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-gray-900 text-sm font-bold">{{ $index + 1 }}</span>
                                        </div>
                                        <h4 class="text-xl font-bold text-gray-900">Experience #{{ $index + 1 }}</h4>
                                    </div>
                                    <button type="button" onclick="removeExperience(this)" class="text-red-500 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Job Title</label>
                                        <input type="text" name="experience[{{ $index }}][title]" value="{{ $exp['title'] ?? '' }}" 
                                               class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                                               placeholder="e.g., Senior Developer">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Company</label>
                                        <input type="text" name="experience[{{ $index }}][company]" value="{{ $exp['company'] ?? '' }}" 
                                               class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                                               placeholder="e.g., Tech Corp">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Period</label>
                                        <input type="text" name="experience[{{ $index }}][period]" value="{{ $exp['period'] ?? '' }}" 
                                               class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                                               placeholder="e.g., 2020 - Present">
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                                        <textarea name="experience[{{ $index }}][description]" rows="4" 
                                                  class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                                                  placeholder="Brief description of your role and achievements...">{{ $exp['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <button type="button" onclick="addExperience()" class="mt-6 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-xl hover:from-purple-600 hover:to-pink-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Experience
                </button>
            </div>

            @if(is_array($banner->experience) && count($banner->experience) > 0)
                <!-- Experience Preview -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 border border-blue-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        Experience Preview
                    </h3>
                    
                    <div class="space-y-6">
                        @foreach($banner->experience as $index => $exp)
                            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-3">
                                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-gray-900 text-sm font-bold">{{ $index + 1 }}</span>
                                            </div>
                                            <h4 class="text-xl font-bold text-gray-900">{{ $exp['title'] ?? 'Job Title' }}</h4>
                                        </div>
                                        <p class="text-purple-600 font-semibold text-lg mb-1">{{ $exp['company'] ?? 'Company' }}</p>
                                        <p class="text-sm text-gray-500 mb-3">{{ $exp['period'] ?? 'Period' }}</p>
                                        @if(isset($exp['description']) && $exp['description'])
                                            <p class="text-gray-600 leading-relaxed">{{ $exp['description'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </x-forms.admin-form>
    </div>
</div>

<script>
let experienceIndex = {{ is_array($banner->experience) ? count($banner->experience) : 0 }};

function addExperience() {
    const container = document.getElementById('experience-container');
    const template = `
        <div class="experience-item bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
            <div class="flex justify-between items-start mb-6">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white text-sm font-bold">${experienceIndex + 1}</span>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900">Experience #${experienceIndex + 1}</h4>
                </div>
                <button type="button" onclick="removeExperience(this)" class="text-red-500 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Job Title</label>
                    <input type="text" name="experience[${experienceIndex}][title]" 
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                           placeholder="e.g., Senior Developer">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Company</label>
                    <input type="text" name="experience[${experienceIndex}][company]" 
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                           placeholder="e.g., Tech Corp">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Period</label>
                    <input type="text" name="experience[${experienceIndex}][period]" 
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                           placeholder="e.g., 2020 - Present">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="experience[${experienceIndex}][description]" rows="4" 
                              class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white shadow-sm"
                              placeholder="Brief description of your role and achievements..."></textarea>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', template);
    experienceIndex++;
}

function removeExperience(button) {
    button.closest('.experience-item').remove();
}
</script>
@endsection 
