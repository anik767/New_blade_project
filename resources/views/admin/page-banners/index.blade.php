@extends('layouts.admin')
@section('title', 'Page Banners')

@section('content')
<div class="p-6">
  <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
    <h1 class="text-2xl font-bold mb-6">Page Banners</h1>
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="text-left p-2">Page</th>
          <th class="text-left p-2">Media</th>
          <th class="text-left p-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $pages = ['home','about','services','projects','blog','contact'];
        @endphp
        @foreach($pages as $page)
          @php $pb = $banners->firstWhere('page', $page); @endphp
          <tr class="border-t">
            <td class="p-2 font-medium">{{ ucfirst($page) }}</td>
            <td class="p-2">{{ $pb && $pb->background_media ? basename($pb->background_media) : '—' }}</td>
            <td class="p-2">
              <a href="{{ route('admin.page-banners.edit', $page) }}" class="px-3 py-1.5 bg-blue-600 text-white rounded text-sm">Edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

