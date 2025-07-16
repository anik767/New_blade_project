@extends('layouts.admin')

@section('title', 'Edit Home Banner')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-[#59C378] mb-6">Edit Home Banner</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.home-banner.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Title Line 1</label>
            <input type="text" name="title_line1" value="{{ old('title_line1', $banner->title_line1) }}" required class="w-full border px-4 py-2 rounded" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Title Line 2</label>
            <input type="text" name="title_line2" value="{{ old('title_line2', $banner->title_line2) }}" required class="w-full border px-4 py-2 rounded" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Subtitle</label>
            <textarea name="subtitle" rows="3" required class="w-full border px-4 py-2 rounded">{{ old('subtitle', $banner->subtitle) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">CV File (PDF/DOC)</label>
            <input type="file" name="cv_file" class="w-full border px-4 py-2 rounded" />
            @if ($banner->cv_file)
                <p class="mt-2 text-sm text-gray-600">Current: <a href="{{ asset('storage/' . $banner->cv_file) }}" target="_blank" class="text-blue-600 underline">View CV</a></p>
            @endif
        </div>

        <div>
            <label class="block font-semibold mb-1">Background Image</label>
            <input type="file" name="background_image" class="w-full border px-4 py-2 rounded" />
            @if ($banner->background_image)
                <p class="mt-2">
                    <img src="{{ asset('storage/' . $banner->background_image) }}" alt="Background Image" class="h-32 rounded border">
                </p>
            @endif
        </div>

        <div>
            <label class="block font-semibold mb-1">Person Image</label>
            <input type="file" name="person_image" class="w-full border px-4 py-2 rounded" />
            @if ($banner->person_image)
                <p class="mt-2">
                    <img src="{{ asset('storage/' . $banner->person_image) }}" alt="Person Image" class="h-32 rounded border">
                </p>
            @endif
        </div>

        <button type="submit" class="bg-[#59C378] text-white px-6 py-2 rounded hover:bg-green-600 transition">
            Update Banner
        </button>
    </form>
</div>
@endsection
