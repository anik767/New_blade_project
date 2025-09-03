@extends('layouts.admin')
@section('title', 'Edit About')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
        <div class="">
            <!-- Header Section -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
                <div class="md:flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="p-4 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl mr-6 shadow-lg">
                                <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit About Me</h1>
                                <p class="text-gray-600 text-lg">Update your personal information and professional details
                                </p>
                            </div>
                        </div>

                        <!-- Profile Status -->
                        <div class="flex flex-col md:flex-row items-center gap-4">
                            <div class="flex items-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-gray-700 font-medium">Profile information updated</span>
                            </div>

                            <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                                <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                    </path>
                                </svg>
                                <span
                                    class="text-gray-700 font-medium">{{ $about->skills ? count(explode('|', $about->skills)) : 0 }}
                                    skills added</span>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Stats Cards -->
                    <div class="flex space-x-4">
                        <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                            <div class="text-3xl font-bold text-indigo-600 mb-1">
                                {{ $about->skills ? count(explode('|', $about->skills)) : 0 }}
                            </div>
                            <div class="text-sm text-gray-600 font-medium">Skills</div>
                        </div>

                        <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                            <div class="text-3xl font-bold {{ $about->image ? 'text-green-600' : 'text-red-500' }} mb-1">
                                {{ $about->image ? '✓' : '✗' }}
                            </div>
                            <div class="text-sm text-gray-600 font-medium">Photo</div>
                        </div>
                    </div>
                </div>
            </div>

            <x-forms.admin-form :action="route('admin.about.update')" title="" submit-text="Update Profile" method="POST">
                <!-- Basic Information Section -->
                <div
                    class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 mb-8 border border-blue-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        Basic Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-forms.form-field label="Full Name" name="name" placeholder="Enter your full name"
                            :value="$about->name" />

                        <x-forms.form-field label="Professional Title" name="title"
                            placeholder="e.g., Full Stack Developer, UI/UX Designer" :value="$about->title" />
                    </div>

                    <div class="mt-6">
                        <x-forms.form-field label="About Me Content" name="content" type="textarea"
                            placeholder="Tell visitors about yourself, your experience, skills, and what you do. You can use HTML formatting..."
                            :value="$about->content" />
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div
                    class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-3xl p-8 mb-8 border border-green-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        Contact Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-forms.form-field label="Email Address" name="email" type="email"
                            placeholder="your.email@example.com" :value="$about->email" />

                        <x-forms.form-field label="Phone Number" name="phone" placeholder="+1 (555) 123-4567"
                            :value="$about->phone" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <x-forms.form-field label="Location" name="location" placeholder="City, Country"
                            :value="$about->location" />

                        <x-forms.form-field label="LinkedIn Profile" name="linkedin" type="url"
                            placeholder="https://linkedin.com/in/yourprofile" :value="$about->linkedin" />
                    </div>

                    <div class="mt-6">
                        <x-forms.form-field label="GitHub Profile" name="github" type="url"
                            placeholder="https://github.com/yourusername" :value="$about->github" />
                    </div>
                </div>

                <!-- Experience & Education Section -->
                <div
                    class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-3xl p-8 mb-8 border border-indigo-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                        </div>
                        Experience & Education
                    </h3>

                    <div class="grid grid-cols-1 gap-6">
                        <x-forms.form-field 
                            label="Professional Experience"
                            name="experience"
                            type="textarea"
                            placeholder="Describe your work experience, roles, responsibilities, and achievements..."
                            :value="$about->experience"
                        />

                        <x-forms.form-field 
                            label="Education Background"
                            name="education"
                            type="textarea"
                            placeholder="List your educational qualifications, degrees, certifications, and academic achievements..."
                            :value="$about->education"
                        />
                    </div>
                </div>

                <!-- Profile Image Section -->
                <div
                    class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 mb-8 border border-purple-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        Profile Image
                    </h3>

                    <x-forms.image-upload 
                        name="image"
                        label="Profile Image"
                        :currentImage="$about->image"
                        accept="image/*"
                        helpText="Recommended: Square image, 400x400 or larger (JPG, PNG, GIF, WEBP)"
                        previewHeight="h-80"
                        previewWidth="w-full"
                        previewShape="rounded-xl"
                        currentImageClass="mx-auto"
                    />
                </div>

                <!-- Strengths Section -->
                <div
                    class="bg-gradient-to-r from-pink-50 to-rose-50 rounded-3xl p-6 mb-6 border border-pink-200 shadow-lg">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <div
                            class="w-8 h-8 bg-gradient-to-r from-pink-500 to-rose-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </div>
                        My Strengths
                    </h3>

                    <div class="bg-white rounded-xl p-4 shadow-lg border border-gray-200 mb-4">
                        <p class="text-xs text-gray-600 mb-3">Add your key strengths and qualities that make you stand out
                            as a developer.</p>

                        <div id="strengths-container" class="space-y-3">
                            <!-- Strengths will be added here dynamically -->
                        </div>

                        <button type="button" onclick="addStrength()"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-600 text-white text-sm font-semibold rounded-lg hover:from-pink-600 hover:to-rose-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Strength
                        </button>
                    </div>
                </div>

                <!-- Skills Section (Fresh Minimal) -->
                <div
                    class="bg-gradient-to-r from-orange-50 to-yellow-50 rounded-3xl p-8 mb-8 border border-orange-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-orange-500 to-yellow-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        Technical Skills
                    </h3>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200 mb-6">
                        <div id="skills-container" class="space-y-4"></div>

                        <button type="button" onclick="addSkill()"
                            class="mt-6 inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-yellow-600 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-yellow-700 transition-all duration-200 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Skill
                        </button>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-3xl p-8 border border-teal-200 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        Location & Map
                    </h3>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <x-forms.form-field label="Google Maps Embed Code" name="map_embed_code" type="textarea"
                            placeholder="Paste your Google Maps embed iframe code here..." :value="$about->map_embed_code" />

                        <!-- Map Preview Section -->
                        @if($about->map_embed_code)
                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3"></path>
                                    </svg>
                                    Map Preview
                                </h4>
                                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-lg">
                                    {!! $about->map_embed_code !!}
                                </div>
                            </div>
                        @endif

                        <div class="mt-4 p-4 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-xl">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-blue-800 mb-2">How to get the embed code:</p>
                                    <ol class="text-sm text-blue-700 space-y-1">
                                        <li>1. Go to Google Maps and search for your location</li>
                                        <li>2. Click "Share" and select "Embed a map"</li>
                                        <li>3. Copy the iframe code and paste it here</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-forms.admin-form>
        </div>
    </div>

    <script>
        let skillCount = 0;
        let strengthCount = 0;

        function addSkill(name = '', percentage = '') {
            const container = document.getElementById('skills-container');
            const skillDiv = document.createElement('div');
            skillDiv.className =
                'skill-row bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-all duration-200';
            skillDiv.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Skill Name</label>
                    <input type="text" 
                           name="skills[${skillCount}][name]" 
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200 bg-white shadow-sm"
                           placeholder="e.g., HTML/CSS, JavaScript, React" value="${name}">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Proficiency (%)</label>
                    <div class="flex items-center gap-3">
                        <input type="range"
                               name="skills[${skillCount}][percentage]"
                               min="0" max="100"
                               value="${percentage !== '' ? percentage : 0}"
                               class="w-full"
                               oninput="this.nextElementSibling.value = this.value">
                        <output class="px-3 py-1.5 bg-gray-100 border border-gray-200 rounded-lg text-gray-700 font-semibold">${percentage !== '' ? percentage : 0}</output>
                    </div>
                </div>
                <div class="flex items-center">
                    <button type="button" 
                            onclick="removeSkill(this)" 
                            class="inline-flex items-center px-4 py-3 bg-red-100 text-red-700 rounded-xl hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
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

        function addStrength(title = '', subtitle = '', description = '') {
    const container = document.getElementById('strengths-container');
    const strengthDiv = document.createElement('div');
    strengthDiv.className =
        'strength-row bg-gradient-to-r from-pink-50 via-rose-50 to-pink-100 rounded-xl border border-pink-200 p-4 shadow-sm hover:shadow-md transition-all duration-300 ease-in-out mb-3';

    strengthDiv.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
            
            <!-- Title -->
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Title</label>
                <input type="text" 
                       name="strengths[${strengthCount}][title]" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition-all duration-300 bg-white shadow-sm hover:shadow-md text-sm"
                       placeholder="e.g., Problem Solver" 
                       value="${title}">
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Subtitle</label>
                <input type="text" 
                       name="strengths[${strengthCount}][subtitle]" 
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition-all duration-300 bg-white shadow-sm hover:shadow-md text-sm"
                       placeholder="e.g., Creative Thinker" 
                       value="${subtitle}">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Description</label>
                <textarea name="strengths[${strengthCount}][description]" 
                          rows="2"
                          class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition-all duration-300 bg-white shadow-sm hover:shadow-md text-sm"
                          placeholder="Describe this strength...">${description}</textarea>
            </div>
        </div>

        <!-- Remove Button -->
        <div class="flex justify-end mt-3">
            <button type="button" 
                    onclick="removeStrength(this)" 
                    class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-red-400 to-red-500 text-white text-xs font-medium rounded-lg hover:from-red-500 hover:to-red-600 shadow-sm hover:shadow-md transition-all duration-300 ease-in-out">
                <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
                Remove
            </button>
        </div>
    `;

    container.appendChild(strengthDiv);
    strengthCount++;
}


        function removeStrength(button) {
            const strengthRow = button.closest('.strength-row');
            if (strengthRow) {
                strengthRow.style.opacity = '0';
                strengthRow.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    strengthRow.remove();
                }, 200);
            }
        }

        // Load existing data on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Debug: Add form submit logging
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const formData = new FormData(form);
                console.log('Form data being submitted:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, ':', value);
                }
            });


            // Load existing skills and strengths using model accessors
            @php
                $existingSkills = $about->skills_array ?? [];
                $existingStrengths = $about->strengths_array ?? [];
            @endphp

            const existingSkills = @json($existingSkills);
            const existingStrengths = @json($existingStrengths);
            
            // Debug: Log what we're loading
            console.log('Existing skills:', existingSkills);
            console.log('Existing strengths:', existingStrengths);

            if (existingSkills.length > 0) {
                existingSkills.forEach(skill => {
                    addSkill(skill.name, skill.percentage);
                });
            } else {
                // Ensure at least one empty row is visible
                addSkill('', 0);
            }

            if (existingStrengths.length > 0) {
                existingStrengths.forEach(strength => {
                    addStrength(strength.title, strength.subtitle, strength.description);
                });
            }

            // No client-side reindexing; server handles sparse indices and ignores empty names
        });
    </script>

    
@endsection
