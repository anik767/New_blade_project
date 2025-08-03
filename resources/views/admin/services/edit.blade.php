@extends('layouts.admin')
@section('title', "Edit Service - {$service->title}")

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Service
                </h1>
                <p class="text-gray-600 mt-2">Update your service information and settings</p>
                <div class="mt-2 flex items-center space-x-4 text-sm text-gray-500">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Last updated: {{ $service->updated_at->diffForHumans() }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 4a2 2 0 012-2h4a2 2 0 012 2"></path>
                        </svg>
                        Order: {{ $service->order }}
                    </span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $service->is_active ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">Status</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $service->image ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">Image</div>
                </div>
            </div>
        </div>
    </div>

    <x-admin-form 
        :action="route('admin.services.update', $service->id)" 
        title="Service Information"
        submit-text="Update Service"
        method="PUT"
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
                :value="$service->title"
            />
            
            <x-form-field 
                label="Service Icon" 
                name="icon" 
                placeholder="fas fa-code"
                    help="FontAwesome icon class (e.g., fas fa-code, fas fa-mobile-alt, fas fa-paint-brush)"
                :value="$service->icon"
            />
        </div>
        
        <x-form-field 
                label="Service Description" 
            name="description" 
            type="textarea" 
            required 
                placeholder="Describe your service in detail. What problems does it solve? What value does it provide to clients?"
            :value="$service->description"
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
                Service Image
            </label>
            
            @if($service->image)
                        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <p class="text-sm font-medium text-gray-700 mb-3">Current Service Image:</p>
                            <div class="relative group">
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         alt="Current service image" 
                                     class="w-48 h-32 object-cover rounded-lg border border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                            </div>
                </div>
            @endif
            
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
                                    <li>Leave empty to keep current image</li>
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
                               value="{{ $service->order }}"
                               min="1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                               placeholder="1">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1" 
                               {{ $service->is_active ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 block text-sm text-gray-900">
                            Active Service
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Statistics -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Service Statistics
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Created</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $service->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Last Updated</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $service->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 4a2 2 0 012-2h4a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Display Order</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $service->order }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-form>
</div>
@endsection 