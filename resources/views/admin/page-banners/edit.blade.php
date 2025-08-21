@extends('layouts.admin')
@section('title', 'Edit Page Banner')

@section('content')
<div class="p-6">
  <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
    <h1 class="text-2xl font-bold mb-4">Page Banner: {{ $banner->page }}</h1>
    <form id="pageBannerForm" method="POST" action="{{ route('admin.page-banners.update', $banner->page) }}" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('PUT')

      @if($banner->background_media)
        @php
          $ext = strtolower(pathinfo($banner->background_media, PATHINFO_EXTENSION));
          $isVideo = in_array($ext, ['mp4','webm']);
        @endphp
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Current Media</label>
          @if($isVideo)
            <video class="w-full max-w-xl rounded" autoplay muted loop playsinline>
              <source src="{{ asset('storage/' . $banner->background_media) }}" type="video/{{ $ext == 'webm' ? 'webm' : 'mp4' }}">
            </video>
          @else
            <img src="{{ asset('storage/' . $banner->background_media) }}" class="w-full max-w-xl rounded border" />
          @endif
        </div>
      @endif

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Background Media (Image/GIF/Video)</label>
        <input id="backgroundMediaInput" type="file" name="background_media" accept="image/*,video/mp4,video/webm" class="border rounded px-3 py-2 w-full" />
        <p class="text-xs text-gray-500 mt-2">Accepted: JPG, PNG, GIF, WEBP, MP4, WEBM</p>
      </div>

      <div id="mediaPreviewWrapper" class="hidden">
        <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
        <div class="relative w-full max-w-2xl rounded overflow-hidden border border-gray-200">
          <div id="loadingOverlay" class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <svg class="animate-spin h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
          </div>
          <div class="bg-gray-100">
            <video id="videoPreview" class="w-full h-auto hidden" autoplay muted loop playsinline></video>
            <img id="imagePreview" class="w-full h-auto hidden" alt="Selected preview" />
          </div>
        </div>
        <p class="text-xs text-gray-500 mt-2">A loading overlay appears until the media is ready.</p>
      </div>

      <div>
        <button id="submitBtn" class="px-4 py-2 bg-blue-600 text-white rounded inline-flex items-center gap-2">
          <svg id="submitSpinner" class="hidden animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
          </svg>
          <span id="submitText">Save</span>
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  (function(){
    const input = document.getElementById('backgroundMediaInput');
    const wrapper = document.getElementById('mediaPreviewWrapper');
    const video = document.getElementById('videoPreview');
    const image = document.getElementById('imagePreview');
    const overlay = document.getElementById('loadingOverlay');
    const form = document.getElementById('pageBannerForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitSpinner = document.getElementById('submitSpinner');
    const submitText = document.getElementById('submitText');

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
        if (!file) { return; }
        const url = URL.createObjectURL(file);
        wrapper.classList.remove('hidden');
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

    if (form) {
      form.addEventListener('submit', function(){
        submitBtn.setAttribute('disabled', 'disabled');
        submitSpinner.classList.remove('hidden');
        submitText.textContent = 'Saving...';
      });
    }
  })();
</script>
@endpush
