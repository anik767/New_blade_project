@extends('layouts.admin')
@section('title', "Edit Service - {$service->title}")

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="md:flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Service</h1>
                            <p class="text-gray-600 text-lg">Update your service information and settings</p>
                        </div>
                    </div>
                    
                    <!-- Service Status -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-gray-700 font-medium">Last updated: {{ $service->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Service Status Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold {{ $service->is_active ? 'text-green-600' : 'text-red-500' }} mb-1">
                            {{ $service->is_active ? '✓' : '✗' }}
                        </div>
                        <div class="text-sm text-gray-600 font-medium">Status</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold {{ $service->image ? 'text-green-600' : 'text-red-500' }} mb-1">
                            {{ $service->image ? '✓' : '✗' }}
                        </div>
                        <div class="text-sm text-gray-600 font-medium">Image</div>
                    </div>
                </div>
            </div>
        </div>

        <x-forms.admin-form 
            :action="route('admin.services.update', $service->id)" 
            title=""
            submit-text="Update Service"
            method="PUT"
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
                        placeholder="Web Development"
                        :value="$service->title"
                    />
                    
                    <x-forms.form-field 
                        label="Service Icon" 
                        name="icon" 
                        placeholder="fas fa-code"
                        help="FontAwesome icon class (e.g., fas fa-code, fas fa-mobile-alt, fas fa-paint-brush)"
                        :value="$service->icon"
                    />
                </div>
                
                <div class="mt-6">
                                    <x-forms.form-field 
                    label="Service Description" 
                    name="description" 
                    type="textarea" 
                    placeholder="Describe your service in detail. What problems does it solve? What value does it provide to clients?"
                    :value="$service->description"
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
                
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Service Image
                        </label>
                        
                        <x-forms.image-upload 
                            name="image"
                            label="Service Image"
                            :currentImage="$service->image"
                            accept="image/*"
                            helpText="Recommended size: 800x600 pixels (service optimized). Formats: JPG, PNG, GIF. No file size limit. Leave empty to keep current image."
                            previewHeight="h-48"
                            previewWidth="w-full"
                            previewShape="rounded-xl"
                        />
                    </div>
                    
                    <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-200">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1" 
                                   {{ $service->is_active ? 'checked' : '' }}
                                   class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label class="ml-3 block text-sm font-semibold text-gray-900">
                                Active Service
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Statistics -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    Service Statistics
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Created</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $service->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Last Updated</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $service->updated_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.admin-form>
    </div>
</div>
@endsection 
