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

    <x-forms.admin-form 
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
                                    <x-forms.form-field 
                        label="Project Title" 
                        name="title" 
                        placeholder="E-commerce Website"
                    />
                
                <x-forms.form-field 
                    label="GitHub Repository" 
                    name="github_link" 
                    type="url" 
                    placeholder="https://github.com/username/repo"
                    help="Optional: Link to the project's GitHub repository"
                />
            </div>
            
            <x-forms.form-field 
                label="Project Description" 
                name="description" 
                type="textarea" 
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
            
            <x-forms.image-upload 
                name="image"
                label="Project Image"
                accept="image/*"
                helpText="Recommended size: 1200x800 pixels (portfolio optimized). Formats: JPG, PNG, GIF. No file size limit. High-quality screenshots or mockups work best."
                previewHeight="h-48"
                previewWidth="w-full"
                previewShape="rounded-xl"
                required="true"
            />
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
    </x-forms.admin-form>
</div>


@endsection
