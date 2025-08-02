@extends('layouts.admin')
@section('title', 'Edit Contact Information')

@section('content')
    <x-admin-form 
        :action="route('admin.contacts.update')" 
        title="Edit Contact Information"
        submit-text="Update Contact Info"
        method="POST"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Email Address" 
                name="email" 
                type="email"
                required 
                placeholder="your.email@example.com"
                :value="$contact->email"
            />
            
            <x-form-field 
                label="Phone Number" 
                name="phone" 
                placeholder="+1 (555) 123-4567"
                :value="$contact->phone"
            />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Address" 
                name="address" 
                placeholder="123 Main Street, Suite 100"
                :value="$contact->address"
            />
            
            <x-form-field 
                label="City" 
                name="city" 
                placeholder="New York, NY"
                :value="$contact->city"
            />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="LinkedIn URL" 
                name="linkedin" 
                type="url"
                placeholder="https://linkedin.com/in/yourprofile"
                :value="$contact->linkedin"
            />
            
            <x-form-field 
                label="GitHub URL" 
                name="github" 
                type="url"
                placeholder="https://github.com/yourusername"
                :value="$contact->github"
            />
        </div>
        
        <x-form-field 
            label="Additional Information" 
            name="additional_info" 
            type="textarea" 
            placeholder="Any additional contact information or instructions for visitors..."
            :value="$contact->additional_info"
        />
    </x-admin-form>
@endsection 