@extends('layouts.admin')
@section('title', 'Create New Service')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Create New Service</h1>
                            <p class="text-gray-600 text-lg">Add a new service to showcase your expertise and offerings</p>
                        </div>
                    </div>
                    
                    <!-- Service Status -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                            <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-blue-700 font-medium">New service - will be created when saved</span>
                        </div>
                    </div>
                </div>
                
                <!-- Service Stats Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-blue-600 mb-1">📝</div>
                        <div class="text-sm text-gray-600 font-medium">New Service</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-green-600 mb-1">⚡</div>
                        <div class="text-sm text-gray-600 font-medium">Quick Setup</div>
                    </div>
                </div>
            </div>
        </div>

        <x-forms.admin-form 
            :action="route('admin.services.store')" 
            title=""
            submit-text="Create Service"
            :cancel-url="route('admin.services.index')"
        >
            <!-- Basic Service Information -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 mb-8 border border-blue-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    Basic Service Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-forms.form-field 
                        label="Service Title" 
                        name="title" 
                        required 
                        placeholder="Web Development"
                    />
                    
                    <x-forms.form-field 
                        label="Service Icon" 
                        name="icon" 
                        placeholder="fas fa-code"
                        help="FontAwesome icon class (e.g., fas fa-code, fas fa-mobile-alt, fas fa-paint-brush)"
                    />
                </div>
                
                <div class="mt-6">
                    <x-forms.form-field 
                        label="Service Description" 
                        name="description" 
                        type="textarea" 
                        required 
                        placeholder="Describe your service in detail. What problems does it solve? What value does it provide to clients?"
                    />
                </div>
            </div>

            <!-- Service Media & Settings -->
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-3xl p-8 mb-8 border border-green-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    Service Media & Settings
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Service Image
                        </label>
                        
                        <div class="space-y-4">
                            <input type="file" 
                                   name="image" 
                                   class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-gray-100"
                                   accept="image/*">
                            
                            <div class="p-4 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-xl">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-semibold text-blue-800 mb-2">Image Requirements:</p>
                                        <ul class="text-sm text-blue-700 space-y-1">
                                            <li>• Recommended size: 800x600 pixels</li>
                                            <li>• Formats: JPG, PNG, GIF</li>
                                            <li>• No file size limit</li>
                                            <li>• High-quality images work best</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Service Settings
                        </label>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Display Order
                                </label>
                                <input type="number" 
                                       name="order" 
                                       value="1"
                                       min="1"
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 bg-white shadow-sm"
                                       placeholder="1">
                                <p class="mt-2 text-sm text-gray-600">Lower numbers appear first</p>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <input type="checkbox" 
                                       name="is_active" 
                                       value="1" 
                                       checked
                                       class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label class="ml-3 block text-sm font-semibold text-gray-900">
                                    Active Service
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Tips -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    Service Creation Tips
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">1</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Clear Title</p>
                                <p class="text-sm text-gray-600">Use descriptive, professional titles that clearly communicate your service</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 text-sm font-bold">2</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Detailed Description</p>
                                <p class="text-sm text-gray-600">Explain the value, benefits, and process of your service</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                    <span class="text-purple-600 text-sm font-bold">3</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Quality Image</p>
                                <p class="text-sm text-gray-600">Use high-quality, relevant images that represent your service</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span class="text-orange-600 text-sm font-bold">4</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Appropriate Icon</p>
                                <p class="text-sm text-gray-600">Choose FontAwesome icons that match your service type</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.admin-form>
    </div>
</div>
@endsection 
