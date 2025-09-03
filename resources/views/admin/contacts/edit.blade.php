@extends('layouts.admin')
@section('title', 'Edit Contact Information')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Contact Information</h1>
                            <p class="text-gray-600 text-lg">Update your contact details and information for visitors</p>
                        </div>
                    </div>
                    
                    <!-- Contact Status -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-gray-700 font-medium">Contact information updated</span>
                        </div>
                        
                        <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                            <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Contact details available</span>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Status Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold {{ $contact->email ? 'text-green-600' : 'text-red-500' }} mb-1">
                            {{ $contact->email ? '✓' : '✗' }}
                        </div>
                        <div class="text-sm text-gray-600 font-medium">Email</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold {{ $contact->phone ? 'text-green-600' : 'text-red-500' }} mb-1">
                            {{ $contact->phone ? '✓' : '✗' }}
                        </div>
                        <div class="text-sm text-gray-600 font-medium">Phone</div>
                    </div>
                </div>
            </div>
        </div>

        <x-forms.admin-form 
            :action="route('admin.contacts.update')" 
            title=""
            submit-text="Update Contact Info"
            method="POST"
        >
            <!-- Basic Contact Information -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 mb-8 border border-blue-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    Basic Contact Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-forms.form-field 
                        label="Contact Title" 
                        name="title" 
                        required 
                        placeholder="Contact Information"
                        :value="$contact->title"
                    />
                    
                    <x-forms.form-field 
                        label="Email Address" 
                        name="email" 
                        type="email"
                        required 
                        placeholder="your.email@example.com"
                        :value="$contact->email"
                    />
                </div>
                
                <div class="mt-6">
                    <x-forms.form-field 
                        label="Contact Description" 
                        name="content" 
                        type="textarea" 
                        required 
                        placeholder="Get in touch with us for any inquiries or collaborations. We'd love to hear from you!"
                        :value="$contact->content"
                    />
                </div>
            </div>

            <!-- Contact Details -->
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-3xl p-8 mb-8 border border-green-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    Contact Details
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-forms.form-field 
                        label="Phone Number" 
                        name="phone" 
                        placeholder="+1 (555) 123-4567"
                        :value="$contact->phone"
                    />
                    
                    <x-forms.form-field 
                        label="Physical Address" 
                        name="address" 
                        placeholder="123 Main Street, Suite 100, City, State 12345"
                        :value="$contact->address"
                    />
                </div>
            </div>

            <!-- Social Media & Additional Links -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 4a2 2 0 012-2h4a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    Social Media & Additional Links
                </h3>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                    <x-forms.form-field 
                        label="Social Media Links" 
                        name="social_links" 
                        type="textarea" 
                        placeholder="Enter your social media links or any additional contact information. You can include LinkedIn, Twitter, Instagram, etc."
                        :value="$contact->social_links"
                    />
                    
                    <div class="mt-4 p-4 bg-gradient-to-r from-purple-50 to-purple-100 border border-purple-200 rounded-xl">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-purple-800 mb-2">Social Media Tips:</p>
                                <ul class="text-sm text-purple-700 space-y-1">
                                    <li>• Include your LinkedIn profile for professional networking</li>
                                    <li>• Add Twitter/Instagram for personal branding</li>
                                    <li>• Include GitHub for developers</li>
                                    <li>• Add any other relevant social platforms</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.admin-form>
    </div>
</div>
@endsection 
