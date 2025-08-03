@extends('layouts.admin')
@section('title', 'Edit Contact Information')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Edit Contact Information
                </h1>
                <p class="text-gray-600 mt-2">Update your contact details and information for visitors</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $contact->email ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">Email Set</div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">{{ $contact->phone ? '✓' : '✗' }}</div>
                    <div class="text-sm text-gray-500">Phone Set</div>
                </div>
            </div>
        </div>
    </div>

    <x-admin-form 
        :action="route('admin.contacts.update')" 
        title="Contact Details"
        submit-text="Update Contact Info"
        method="POST"
    >
        <!-- Basic Contact Information -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Basic Contact Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Contact Title" 
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
                label="Contact Description" 
                name="content" 
                type="textarea" 
                required 
                placeholder="Get in touch with us for any inquiries or collaborations. We'd love to hear from you!"
                :value="$contact->content"
            />
        </div>

        <!-- Contact Details -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Contact Details
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form-field 
                    label="Phone Number" 
                    name="phone" 
                    placeholder="+1 (555) 123-4567"
                    :value="$contact->phone"
                />
                
                <x-form-field 
                    label="Physical Address" 
                    name="address" 
                    placeholder="123 Main Street, Suite 100, City, State 12345"
                    :value="$contact->address"
                />
            </div>
        </div>

        <!-- Social Media & Additional Links -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 4a2 2 0 012-2h4a2 2 0 012 2"></path>
                </svg>
                Social Media & Additional Links
            </h3>
            
            <x-form-field 
                label="Social Media Links" 
                name="social_links" 
                type="textarea" 
                placeholder="Enter your social media links or any additional contact information. You can include LinkedIn, Twitter, Instagram, etc."
                :value="$contact->social_links"
            />
            
            <div class="mt-4 p-4 bg-purple-50 border border-purple-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-purple-800">Social Media Tips:</p>
                        <ul class="text-sm text-purple-700 mt-1 list-disc list-inside space-y-1">
                            <li>Include your LinkedIn profile for professional networking</li>
                            <li>Add Twitter/Instagram for personal branding</li>
                            <li>Include GitHub for developers</li>
                            <li>Add any other relevant social platforms</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-form>
</div>
@endsection 