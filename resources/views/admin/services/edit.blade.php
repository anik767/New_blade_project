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
    </x-admin-form>
@endsection 