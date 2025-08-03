@extends('layouts.admin')
@section('title', "Edit Service - {$service->title}")

@section('content')
    <x-admin-form 
        :action="route('admin.services.update', $service->id)" 
        title="Edit Service"
        submit-text="Update Service"
        method="PUT"
        :cancel-url="route('admin.services.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Service Title" 
                name="title" 
                required 
                placeholder="Enter service title"
                :value="$service->title"
            />
            
            <x-form-field 
                label="Service Icon" 
                name="icon" 
                placeholder="fas fa-code"
                help="FontAwesome icon class (e.g., fas fa-code, fas fa-mobile-alt)"
                :value="$service->icon"
            />
        </div>
        
        <x-form-field 
            label="Description" 
            name="description" 
            type="textarea" 
            required 
            placeholder="Describe your service..."
            :value="$service->description"
        />
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Service Image
            </label>
            
            @if($service->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Current Service Image:</p>
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         alt="Current service image" 
                         class="w-40 h-auto border rounded shadow">
                </div>
            @endif
            
            <input type="file" 
                   name="image" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   accept="image/*">
            
            <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one (JPG, PNG, GIF, max 2MB)</p>
        </div>
    </x-admin-form>
@endsection 