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
                label="Title" 
                name="title" 
                required 
                placeholder="Contact Information"
                :value="$contact->title"
            />
            
            <x-form-field 
                label="Email Address" 
                name="email" 
                type="email"
                required 
                placeholder="your.email@example.com"
                :value="$contact->email"
            />
        </div>
        
        <x-form-field 
            label="Content" 
            name="content" 
            type="textarea" 
            required 
            placeholder="Get in touch with us for any inquiries or collaborations..."
            :value="$contact->content"
        />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-field 
                label="Phone Number" 
                name="phone" 
                placeholder="+1 (555) 123-4567"
                :value="$contact->phone"
            />
            
            <x-form-field 
                label="Address" 
                name="address" 
                placeholder="123 Main Street, Suite 100"
                :value="$contact->address"
            />
        </div>
        
        <x-form-field 
            label="Social Links" 
            name="social_links" 
            type="textarea" 
            placeholder="Enter your social media links or any additional contact information..."
            :value="$contact->social_links"
        />
    </x-admin-form>
@endsection 