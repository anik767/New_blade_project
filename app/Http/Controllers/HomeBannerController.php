<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    // Show banner edit form (assuming only one banner)
    public function edit()
    {
        $banner = HomeBanner::latest()->first();

        if (! $banner) {
            $banner = new HomeBanner; // empty banner instance
        }

        return view('admin.home.banner.edit', compact('banner'));
    }

    // Update banner data
    public function update(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'title_line1' => 'nullable|string|max:255',
            'title_line2' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'badge' => 'nullable|string|max:255',
            'badge_color' => 'nullable|string|in:blue,green,purple,orange,pink',
            'background_image' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,webm',
            'person_image' => 'nullable|image',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Retrieve existing banner or create new
        $banner = HomeBanner::latest()->first() ?? new HomeBanner;

        // Update text fields with default values if null
        $banner->title_line1 = $request->title_line1 ?? '';
        $banner->title_line2 = $request->title_line2 ?? '';
        $banner->subtitle = $request->subtitle ?? '';
        $banner->badge = $request->badge ?? '';
        $banner->badge_color = $request->badge_color ?? 'blue';

        // Handle background image upload & delete old if exists
        if ($request->hasFile('background_image')) {
            Log::info('Background image file detected', [
                'filename' => $request->file('background_image')->getClientOriginalName(),
                'size' => $request->file('background_image')->getSize(),
                'mime' => $request->file('background_image')->getMimeType(),
            ]);

            if ($banner->background_image && Storage::disk('public')->exists($banner->background_image)) {
                Storage::disk('public')->delete($banner->background_image);
            }
            $banner->background_image = $request->file('background_image')->store('banners', 'public');
            Log::info('Background image stored', ['path' => $banner->background_image]);
        }

        // Handle person image upload & delete old if exists
        if ($request->hasFile('person_image')) {
            Log::info('Person image file detected', [
                'filename' => $request->file('person_image')->getClientOriginalName(),
                'size' => $request->file('person_image')->getSize(),
                'mime' => $request->file('person_image')->getMimeType(),
            ]);

            if ($banner->person_image && Storage::disk('public')->exists($banner->person_image)) {
                Storage::disk('public')->delete($banner->person_image);
            }
            $banner->person_image = $request->file('person_image')->store('banners', 'public');
            Log::info('Person image stored', ['path' => $banner->person_image]);
        }

        // Handle CV file upload & delete old if exists
        if ($request->hasFile('cv_file')) {
            Log::info('CV file detected', [
                'filename' => $request->file('cv_file')->getClientOriginalName(),
                'size' => $request->file('cv_file')->getSize(),
                'mime' => $request->file('cv_file')->getMimeType(),
            ]);

            if ($banner->cv_file && Storage::disk('public')->exists($banner->cv_file)) {
                Storage::disk('public')->delete($banner->cv_file);
            }
            $banner->cv_file = $request->file('cv_file')->store('cv', 'public');
            Log::info('CV file stored', ['path' => $banner->cv_file]);
        }

        // Save banner to DB
        $banner->save();
        Log::info('Banner saved', ['id' => $banner->id]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Home banner updated successfully.');
    }
}
