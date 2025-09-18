<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageBannerController extends Controller
{
    public function index()
    {
        $banners = PageBanner::orderBy('page')->get();

        return view('admin.page-banners.index', compact('banners'));
    }

    public function edit(string $page)
    {
        $banner = PageBanner::firstOrNew(['page' => $page]);

        return view('admin.page-banners.edit', compact('banner'));
    }

    public function update(Request $request, string $page)
    {
        $request->validate([
            'background_media' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,webm',
            'badge' => 'nullable|string|max:255',
            'badge_color' => 'nullable|string|in:blue,green,purple,orange,pink',
        ]);

        $banner = PageBanner::firstOrNew(['page' => $page]);

        if ($request->hasFile('background_media')) {
            if ($banner->background_media) {
                Storage::disk('public')->delete($banner->background_media);
            }
            $banner->background_media = $request->file('background_media')->store('page-banners', 'public');
        }

        $banner->page = $page;
        $banner->badge = $request->badge ?? '';
        $banner->badge_color = $request->badge_color ?? 'blue';
        $banner->save();

        return redirect()->route('admin.page-banners.index')->with('success', 'Page banner updated.');
    }
}
