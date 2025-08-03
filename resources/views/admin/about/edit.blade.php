@extends('layouts.admin')
@section('title', 'Edit About Me')

@section('content')
    <x-admin-form 
        :action="route('admin.about-me.update')" 
        title="Edit About Me"
        submit-text="Update About Me"
        method="POST"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Name" 
                name="name" 
                required 
                placeholder="Enter your full name"
                :value="$aboutMe->name"
            />
            
            <x-form-field 
                label="Title/Position" 
                name="title" 
                placeholder="e.g., Full Stack Developer"
                :value="$aboutMe->title"
            />
        </div>
        
        <x-form-field 
            label="About Me Content" 
            name="content" 
            type="textarea" 
            required 
            placeholder="Tell visitors about yourself, your experience, and what you do..."
            :value="$aboutMe->content"
        />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Email" 
                name="email" 
                type="email"
                placeholder="your.email@example.com"
                :value="$aboutMe->email"
            />
            
            <x-form-field 
                label="Phone" 
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
                label="LinkedIn URL" 
                name="linkedin" 
                type="url"
                placeholder="https://linkedin.com/in/yourprofile"
                :value="$aboutMe->linkedin"
            />
        </div>
        
        <div>
            <x-form-field 
                label="GitHub URL" 
                name="github" 
                type="url"
                placeholder="https://github.com/yourusername"
                :value="$aboutMe->github"
            />
        </div>
        
        <div>
            <x-form-field 
                label="Google Maps Embed Code" 
                name="map_embed_code" 
                type="textarea"
                placeholder="Paste your Google Maps embed iframe code here..."
                :value="$aboutMe->map_embed_code"
            />
            <p class="mt-1 text-sm text-gray-500">
                To get the embed code: Go to Google Maps, search for your location, click "Share", select "Embed a map", and copy the iframe code.
            </p>
        </div>
        
        <!-- Skills Section -->
        <div class="border-t border-gray-200 pt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Technical Skills</h3>
            <p class="text-sm text-gray-600 mb-4">Add your technical skills with proficiency percentages</p>
            
            <div id="skills-container" class="space-y-4">
                <!-- Skills will be added here dynamically -->
            </div>
            
            <button type="button" 
                    onclick="addSkill()" 
                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                + Add Skill
            </button>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Profile Image
            </label>
            
            @if($aboutMe->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Current Profile Image:</p>
                    <img src="{{ asset('storage/' . $aboutMe->image) }}" 
                         alt="Current profile image" 
                         class="w-40 h-auto border rounded shadow">
                </div>
            @endif
            
            <input type="file" 
                   name="image" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   accept="image/*">
            
            <p class="mt-1 text-sm text-gray-500">Upload a new profile image to replace the current one (JPG, PNG, GIF)</p>
        </div>
    </x-admin-form>

    <script>
        let skillCount = 0;
        
        function addSkill(name = '', percentage = '') {
            const container = document.getElementById('skills-container');
            const skillDiv = document.createElement('div');
            skillDiv.className = 'skill-row grid grid-cols-1 md:grid-cols-3 gap-4 items-end border border-gray-200 rounded-lg p-4 bg-gray-50';
            skillDiv.innerHTML = `
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Skill Name</label>
                    <input type="text" 
                           name="skills[${skillCount}][name]" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., HTML/CSS" required value="${name}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Percentage</label>
                    <input type="number" 
                           name="skills[${skillCount}][percentage]" 
                           min="0" max="100"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="85" required value="${percentage}">
                </div>
                <div class="flex items-center">
                    <button type="button" 
                            onclick="removeSkill(this)" 
                            class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
                        Remove
                    </button>
                </div>
            `;
            container.appendChild(skillDiv);
            skillCount++;
        }
        
        function removeSkill(button) {
            const skillRow = button.closest('.skill-row');
            if (skillRow) {
                skillRow.remove();
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