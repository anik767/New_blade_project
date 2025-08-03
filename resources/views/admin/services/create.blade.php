@extends('layouts.admin')
@section('title', 'Create New Service')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Create New Service
                </h1>
                <p class="text-gray-600 mt-2">Add a new service to showcase your expertise and offerings</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">📝</div>
                    <div class="text-sm text-gray-500">New Service</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">⚡</div>
                    <div class="text-sm text-gray-500">Quick Setup</div>
                </div>
            </div>
        </div>
    </div>

    <x-admin-form 
        :action="route('admin.services.store')" 
        title="Service Information"
        submit-text="Create Service"
        :cancel-url="route('admin.services.index')"
    >
        <!-- Basic Service Information -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Basic Service Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Service Title" 
                    name="title" 
                    required 
                    placeholder="Web Development"
                />
                
                <x-form-field 
                    label="Service Icon" 
                    name="icon" 
                    placeholder="fas fa-code"
                    help="FontAwesome icon class (e.g., fas fa-code, fas fa-mobile-alt, fas fa-paint-brush)"
                />
            </div>
            
            <x-form-field 
                label="Service Description" 
                name="description" 
                type="textarea" 
                required 
                placeholder="Describe your service in detail. What problems does it solve? What value does it provide to clients?"
            />
        </div>

        <!-- Service Media & Settings -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Service Media & Settings
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Service Image <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="relative">
                        <input type="file" 
                               name="image" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                               accept="image/*">
                    </div>
                    
                    <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 text-blue-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Image Requirements:</p>
                                <ul class="text-sm text-blue-700 mt-1 list-disc list-inside space-y-1">
                                    <li>Recommended size: 800x600 pixels</li>
                                    <li>Formats: JPG, PNG, GIF</li>
                                    <li>Maximum file size: 2MB</li>
                                    <li>High-quality images work best</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number" 
                               name="order" 
                               value="1"
                               min="1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                               placeholder="1">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1" 
                               checked
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 block text-sm text-gray-900">
                            Active Service
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Tips -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                Service Creation Tips
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">1</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Clear Title</p>
                            <p class="text-sm text-gray-600">Use descriptive, professional titles that clearly communicate your service</p>
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
                            <p class="text-sm text-gray-600">Explain the value, benefits, and process of your service</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-600 text-xs font-bold">3</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Quality Image</p>
                            <p class="text-sm text-gray-600">Use high-quality, relevant images that represent your service</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 bg-orange-100 rounded-full flex items-center justify-center">
                                <span class="text-orange-600 text-xs font-bold">4</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Appropriate Icon</p>
                            <p class="text-sm text-gray-600">Choose FontAwesome icons that match your service type</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-form>
</div>
@endsection 