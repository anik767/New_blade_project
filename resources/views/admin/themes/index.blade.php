@extends('layouts.admin')
@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <h1 class="text-3xl font-extrabold mb-8 text-gray-900">Theme Manager</h1>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6 shadow">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.themes.setActive') }}" class="mb-10 flex flex-col sm:flex-row items-center gap-4 bg-white p-6 rounded-xl shadow">
        @csrf
        <label for="theme_id" class="font-semibold text-lg text-gray-700">Select Theme:</label>
        <select name="theme_id" id="theme_id" class="border border-gray-300 p-3 rounded-lg text-lg flex-1 focus:ring-2 focus:ring-accent focus:border-accent transition" required>
            @foreach($themes as $theme)
                <option value="{{ $theme->id }}" {{ $selected == $theme->id ? 'selected' : '' }}>
                    {{ $theme->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-accent text-background px-6 py-3 rounded-lg font-bold text-lg shadow hover:bg-accent/90 transition">Update</button>
    </form>

    <h2 class="text-2xl font-bold mb-6 text-gray-800">All Themes</h2>
    <div class="grid md:grid-cols-2 gap-6">
        @foreach($themes as $theme)
            <div class="rounded-2xl p-6 shadow-lg border transition-all duration-200
                {{ $selected == $theme->id ? 'border-accent ring-2 ring-accent bg-accent/5' : 'border-gray-200 bg-white hover:shadow-xl' }}">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="text-xl font-semibold text-gray-900">{{ $theme->name }}</div>
                        <div class="text-xs text-muted">Slug: {{ $theme->slug }}</div>
                    </div>
                    @if($selected == $theme->id)
                        <span class="inline-block px-3 py-1 bg-accent text-background rounded-full text-xs font-bold shadow">Active</span>
                    @endif
                </div>
                <div class="text-xs text-gray-500 break-all mb-4">
                    <span class="font-semibold text-gray-700">Colors:</span>
                    {{ Str::limit(json_encode($theme->colors), 120) }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection