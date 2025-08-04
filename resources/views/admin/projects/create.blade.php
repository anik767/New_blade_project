@extends('layouts.admin')
@section('title', 'Create New Project')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Create New Project
                </h1>
                <p class="text-gray-600 mt-2">Add a new project to showcase your work and skills</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">🚀</div>
                    <div class="text-sm text-gray-500">New Project</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">💻</div>
                    <div class="text-sm text-gray-500">Portfolio</div>
                </div>
            </div>
        </div>
    </div>

    <x-admin-form 
        :action="route('admin.projects.store')" 
        title=""
        submit-text="Create Project"
        :cancel-url="route('admin.projects.index')"
    >
        <!-- Basic Project Information -->
        <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Basic Project Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Project Title" 
                    name="title" 
                    required 
                    placeholder="E-commerce Website"
                />
                
                <x-form-field 
                    label="GitHub Repository" 
                    name="github_link" 
                    type="url" 
                    placeholder="https://github.com/username/repo"
                    help="Optional: Link to the project's GitHub repository"
                />
            </div>
            
            <x-form-field 
                label="Project Description" 
                name="description" 
                type="textarea" 
                required 
                placeholder="Describe your project in detail. What technologies did you use? What problems did you solve? What are the key features?"
            />
        </div>

        <!-- Project Media -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Project Media
            </h3>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Project Image <span class="text-red-500">*</span>
                </label>
                
                <div class="relative">
                    <input type="file" 
                           name="image" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                           accept="image/*">
                </div>
                
                <div class="mt-2 p-3 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 text-green-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-green-800">Image Requirements:</p>
                            <ul class="text-sm text-green-700 mt-1 list-disc list-inside space-y-1">
                                <li>Recommended size: 1200x800 pixels</li>
                                <li>Formats: JPG, PNG, GIF</li>
                                <li>No file size limit</li>
                                <li>Screenshots or mockups work best</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Creation Tips -->
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                Project Creation Tips
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-600 text-xs font-bold">1</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Clear Title</p>
                            <p class="text-sm text-gray-600">Use descriptive titles that clearly communicate what the project does</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-green-600 text-xs font-bold">2</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Detailed Description</p>
                            <p class="text-sm text-gray-600">Explain the technologies used, challenges solved, and key features</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">3</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Quality Screenshots</p>
                            <p class="text-sm text-gray-600">Use high-quality screenshots or mockups that showcase your work</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-orange-100 rounded-full flex items-center justify-center">
                                <span class="text-orange-600 text-xs font-bold">4</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">GitHub Link</p>
                            <p class="text-sm text-gray-600">Include GitHub links to show your code and development process</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-form>
</div>
@endsection
