@extends('layouts.admin')
@section('title', 'Create New Service')

@section('content')
    <x-admin-form 
        :action="route('admin.services.store')" 
        title="Create New Service"
        submit-text="Create Service"
        :cancel-url="route('admin.services.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Service Title" 
                name="title" 
                required 
                placeholder="Enter service title"
            />
            
            <x-form-field 
                label="Service Icon" 
                name="icon" 
                placeholder="fas fa-code"
                help="FontAwesome icon class (e.g., fas fa-code, fas fa-mobile-alt)"
            />
        </div>
        
        <x-form-field 
            label="Description" 
            name="description" 
            type="textarea" 
            required 
            placeholder="Describe your service..."
        />
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Service Image
            </label>
            
            <input type="file" 
                   name="image" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   accept="image/*">
            
            <p class="mt-1 text-sm text-gray-500">Upload an image for this service (JPG, PNG, GIF, max 2MB)</p>
        </div>
    </x-admin-form>
@endsection 