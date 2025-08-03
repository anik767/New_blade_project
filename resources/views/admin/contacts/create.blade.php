@extends('layouts.admin')
@section('title', 'Create Contact Information')

@section('content')
<div class="p-6">
    <x-admin-form 
        :action="route('admin.contacts.store')" 
        title="Create Contact Information"
        submit-text="Create Contact"
        :cancel-url="route('admin.contacts.index')"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Email" 
                name="email" 
                type="email" 
                required 
                placeholder="your.email@example.com"
            />
            
            <x-form-field 
                label="Phone" 
                name="phone" 
                placeholder="+1 234 567 8900"
            />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Address" 
                name="address" 
                placeholder="Your full address"
            />
            
            <x-form-field 
                label="City" 
                name="city" 
                placeholder="City name"
            />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="LinkedIn" 
                name="linkedin" 
                type="url" 
                placeholder="https://linkedin.com/in/yourprofile"
            />
            
            <x-form-field 
                label="GitHub" 
                name="github" 
                type="url" 
                placeholder="https://github.com/yourusername"
            />
        </div>
        
        <x-form-field 
            label="Additional Information" 
            name="additional_info" 
            type="textarea" 
            placeholder="Any additional contact information or notes..."
            help="Optional: Additional contact details or special instructions"
        />
    </x-admin-form>
</div>
@endsection 