@extends('layouts.admin')
@section('title', 'Edit About Me')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Edit About Me
                </h1>
                <p class="text-gray-600 mt-2">Update your personal information and professional details</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $aboutMe->skills ? count(json_decode($aboutMe->skills, true) ?: []) : 0 }}</div>
                    <div class="text-sm text-gray-500">Skills Added</div>
                </div>
            </div>
        </div>
    </div>

    <x-admin-form 
        :action="route('admin.about-me.update')" 
        title="Personal Information"
        submit-text="Update Profile"
        method="POST"
    >
        <!-- Basic Information Section -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Basic Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Full Name" 
                    name="name" 
                    required 
                    placeholder="Enter your full name"
                    :value="$aboutMe->name"
                />
                
                <x-form-field 
                    label="Professional Title" 
                    name="title" 
                    placeholder="e.g., Full Stack Developer, UI/UX Designer"
                    :value="$aboutMe->title"
                />
            </div>
            
            <x-form-field 
                label="About Me Content" 
                name="content" 
                type="textarea" 
                required 
                placeholder="Tell visitors about yourself, your experience, skills, and what you do. You can use HTML formatting..."
                :value="$aboutMe->content"
            />
        </div>

        <!-- Contact Information Section -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Contact Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Email Address" 
                    name="email" 
                    type="email"
                    placeholder="your.email@example.com"
                    :value="$aboutMe->email"
                />
                
                <x-form-field 
                    label="Phone Number" 
                    name="phone" 
                    placeholder="+1 (555) 123-4567"
                    :value="$aboutMe->phone"
                />
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Location" 
                    name="location" 
                    placeholder="City, Country"
                    :value="$aboutMe->location"
                />
                
                <x-form-field 
                    label="LinkedIn Profile" 
                    name="linkedin" 
                    type="url"
                    placeholder="https://linkedin.com/in/yourprofile"
                    :value="$aboutMe->linkedin"
                />
            </div>
            
            <x-form-field 
                label="GitHub Profile" 
                name="github" 
                type="url"
                placeholder="https://github.com/yourusername"
                :value="$aboutMe->github"
            />
        </div>

        <!-- Profile Image Section -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Profile Image
            </h3>
            
            @if($aboutMe->image)
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-700 mb-3">Current Profile Image:</p>
                    <div class="relative inline-block">
                        <img src="{{ asset('storage/' . $aboutMe->image) }}" 
                             alt="Current profile image" 
                             class="w-32 h-32 object-cover rounded-xl border-4 border-white shadow-lg">
                        <div class="absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
            
            <x-form-field 
                label="Upload New Image" 
                name="image" 
                type="file"
                help="Upload a new profile image (JPG, PNG, GIF - recommended size: 400x400px)"
                accept="image/*"
            />
        </div>

        <!-- Skills Section -->
        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                Technical Skills
            </h3>
            <p class="text-sm text-gray-600 mb-6">Add your technical skills with proficiency percentages. These will be displayed on your portfolio.</p>
            
            <div id="skills-container" class="space-y-4">
                <!-- Skills will be added here dynamically -->
            </div>
            
            <button type="button" 
                    onclick="addSkill()" 
                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Skill
            </button>
        </div>

        <!-- Location Section -->
        <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Location & Map
            </h3>
            
            <x-form-field 
                label="Google Maps Embed Code" 
                name="map_embed_code" 
                type="textarea"
                placeholder="Paste your Google Maps embed iframe code here..."
                :value="$aboutMe->map_embed_code"
            />
            <div class="mt-3 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-blue-800">How to get the embed code:</p>
                        <ol class="text-sm text-blue-700 mt-1 list-decimal list-inside space-y-1">
                            <li>Go to Google Maps and search for your location</li>
                            <li>Click "Share" and select "Embed a map"</li>
                            <li>Copy the iframe code and paste it here</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-form>
</div>

<script>
    let skillCount = 0;
    
    function addSkill(name = '', percentage = '') {
        const container = document.getElementById('skills-container');
        const skillDiv = document.createElement('div');
        skillDiv.className = 'skill-row bg-white rounded-lg border border-gray-200 p-6 shadow-sm hover:shadow-md transition-shadow duration-200';
        skillDiv.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Skill Name</label>
                    <input type="text" 
                           name="skills[${skillCount}][name]" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200"
                           placeholder="e.g., HTML/CSS, JavaScript, React" required value="${name}">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Proficiency (%)</label>
                    <input type="number" 
                           name="skills[${skillCount}][percentage]" 
                           min="0" max="100"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200"
                           placeholder="85" required value="${percentage}">
                </div>
                <div class="flex items-center">
                    <button type="button" 
                            onclick="removeSkill(this)" 
                            class="inline-flex items-center px-4 py-3 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Remove
                    </button>
                </div>
            </div>
        `;
        container.appendChild(skillDiv);
        skillCount++;
    }
    
    function removeSkill(button) {
        const skillRow = button.closest('.skill-row');
        if (skillRow) {
            skillRow.style.opacity = '0';
            skillRow.style.transform = 'scale(0.95)';
            setTimeout(() => {
                skillRow.remove();
            }, 200);
        }
    }
    
    // Load existing skills on page load
    document.addEventListener('DOMContentLoaded', function() {
        @php
            $existingSkills = [];
            if ($aboutMe->skills) {
                $existingSkills = json_decode($aboutMe->skills, true) ?: [];
            }
        @endphp
        
        const existingSkills = @json($existingSkills);
        
        if (existingSkills.length > 0) {
            existingSkills.forEach(skill => {
                addSkill(skill.name, skill.percentage);
            });
        }
    });
</script>
@endsection 