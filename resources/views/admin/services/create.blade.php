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
    </x-admin-form>
@endsection 