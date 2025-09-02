@extends('layouts.admin')
@section('title', 'Edit Page Banner')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="">
        <!-- Header Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">
            <div class="md:flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Page Banner</h1>
                            <p class="text-gray-600 text-lg">Update background media for the {{ ucfirst($banner->page) }} page</p>
                        </div>
                    </div>
                    
                    <!-- Page Info -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center bg-blue-50 px-5 py-3 rounded-xl border border-blue-200">
                            <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-blue-700 font-medium">{{ ucfirst($banner->page) }} Page Banner</span>
                        </div>
                        
                        @if($banner->background_media)
                            <div class="flex items-center bg-green-50 px-5 py-3 rounded-xl border border-green-200">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-green-700 font-medium">Banner configured</span>
                            </div>
                        @else
                            <div class="flex items-center bg-yellow-50 px-5 py-3 rounded-xl border border-yellow-200">
                                <svg class="w-5 h-5 mr-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <span class="text-yellow-700 font-medium">No banner set</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="flex space-x-4">
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-purple-600 mb-1">🎨</div>
                        <div class="text-sm text-gray-600 font-medium">Banner</div>
                    </div>
                    
                    <div class="text-center p-4 bg-white rounded-2xl shadow-lg border border-gray-200 min-w-[80px]">
                        <div class="text-3xl font-bold text-blue-600 mb-1">📱</div>
                        <div class="text-sm text-gray-600 font-medium">{{ ucfirst($banner->page) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <x-forms.admin-form 
            :action="route('admin.page-banners.update', $banner->page)" 
            method="PUT"
            title=""
            submit-text="Update Banner"
            :cancel-url="route('admin.page-banners.index')"
        >


            <!-- Banner Management -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 mb-8 border border-blue-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    Banner Management
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Upload Section -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            Upload New Banner
                        </label>
                        
                        <div class="space-y-4">
                            <input id="backgroundMediaInput" 
                                   type="file" 
                                   name="background_media" 
                                   accept="image/*,video/mp4,video/webm" 
                                   class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-gray-100">
                            
                            <div class="p-4 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-xl">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-semibold text-blue-800 mb-2">Media Requirements:</p>
                                        <ul class="text-sm text-blue-700 space-y-1">
                                            <li>• Images: JPG, PNG, GIF, WEBP</li>
                                            <li>• Videos: MP4, WEBM</li>
                                            <li>• Recommended: High resolution for best quality</li>
                                            <li>• No file size limit</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview Section -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                        <label class="block text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Banner Preview
                        </label>
                        
                        <!-- Current Banner Display -->
                        @if($banner->background_media)
                            @php
                                $ext = strtolower(pathinfo($banner->background_media, PATHINFO_EXTENSION));
                                $isVideo = in_array($ext, ['mp4','webm']);
                            @endphp
                            
                            <div class="mb-6">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                        <span class="text-sm font-semibold text-gray-700">Current Banner</span>
                                    </div>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ basename($banner->background_media) }}</span>
                                </div>
                                <div class="relative w-full h-80 rounded-xl overflow-hidden border-2 border-gray-200 bg-gray-100 shadow-sm hover:shadow-md transition-shadow duration-200">
                                    @if($isVideo)
                                        <video class="w-full h-full object-contain" muted loop playsinline>
                                            <source src="{{ asset('storage/' . $banner->background_media) }}" type="video/{{ $ext == 'webm' ? 'webm' : 'mp4' }}">
                                        </video>
                                        <div class="absolute top-3 left-3 bg-blue-600 text-white px-2 py-1 rounded-lg text-xs font-medium flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                            </svg>
                                            Video
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/' . $banner->background_media) }}" 
                                             class="w-full h-full object-contain" 
                                             alt="Current banner" />
                                        <div class="absolute top-3 left-3 bg-green-600 text-white px-2 py-1 rounded-lg text-xs font-medium flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                            </svg>
                                            Image
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        
                        <!-- New Upload Preview -->
                        <div id="mediaPreviewWrapper" class="hidden">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-semibold text-gray-700">New Upload Preview</span>
                                </div>
                                <span class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Preview</span>
                            </div>
                            <div class="relative w-full h-80 rounded-xl overflow-hidden border-2 border-blue-200 bg-gray-100 shadow-sm">
                                <div id="loadingOverlay" class="absolute inset-0 bg-black/40 flex items-center justify-center z-10">
                                    <div class="bg-white rounded-lg p-3 flex items-center">
                                        <svg class="animate-spin h-5 w-5 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-700">Loading preview...</span>
                                    </div>
                                </div>
                                <video id="videoPreview" class="w-full h-full object-contain hidden" autoplay muted loop playsinline></video>
                                <img id="imagePreview" class="w-full h-full object-contain hidden" alt="Selected preview" />
                            </div>
                        </div>
                        
                        <div id="noPreview" class="text-center py-6 text-gray-400 {{ $banner->background_media ? 'hidden' : '' }}">
                            <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-sm">Select a file to see preview</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner Tips -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-200 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    Banner Best Practices
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">1</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">High Resolution</p>
                                <p class="text-sm text-gray-600">Use high-quality images/videos for crisp display across all devices</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 text-sm font-bold">2</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Aspect Ratio</p>
                                <p class="text-sm text-gray-600">16:9 or 21:9 ratios work best for banner backgrounds</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                    <span class="text-purple-600 text-sm font-bold">3</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">File Size</p>
                                <p class="text-sm text-gray-600">Optimize files for web to ensure fast loading times</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span class="text-orange-600 text-sm font-bold">4</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900 mb-1">Content Overlay</p>
                                <p class="text-sm text-gray-600">Ensure text remains readable over your chosen background</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.admin-form>
    </div>
</div>
@endsection

@push('scripts')
<script>
  (function(){
    const input = document.getElementById('backgroundMediaInput');
    const wrapper = document.getElementById('mediaPreviewWrapper');
    const noPreview = document.getElementById('noPreview');
    const video = document.getElementById('videoPreview');
    const image = document.getElementById('imagePreview');
    const overlay = document.getElementById('loadingOverlay');

    function showOverlay(){ overlay.classList.remove('hidden'); }
    function hideOverlay(){ overlay.classList.add('hidden'); }
    function resetPreview(){
      video.classList.add('hidden');
      image.classList.add('hidden');
      video.removeAttribute('src');
      video.load();
      image.removeAttribute('src');
    }

    if (input) {
      input.addEventListener('change', function(e){
        const file = e.target.files && e.target.files[0];
        if (!file) { 
          wrapper.classList.add('hidden');
          // Only show noPreview if there's no current banner
          const hasCurrentBanner = {{ $banner->background_media ? 'true' : 'false' }};
          if (!hasCurrentBanner) {
            noPreview.classList.remove('hidden');
          }
          return; 
        }
        
        const url = URL.createObjectURL(file);
        wrapper.classList.remove('hidden');
        noPreview.classList.add('hidden');
        resetPreview();
        showOverlay();

        if (file.type && file.type.startsWith('video/')) {
          video.src = url;
          video.classList.remove('hidden');
          video.addEventListener('loadeddata', function onLoaded(){
            hideOverlay();
            video.removeEventListener('loadeddata', onLoaded);
          });
          video.addEventListener('error', function onErr(){
            hideOverlay();
            video.removeEventListener('error', onErr);
          });
        } else {
          image.src = url;
          image.classList.remove('hidden');
          image.onload = function(){ hideOverlay(); };
          image.onerror = function(){ hideOverlay(); };
        }
      });
    }
  })();
</script>
@endpush
