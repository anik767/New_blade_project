<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    // Show banner edit form (assuming only one banner)
    public function edit()
    {
        $banner = HomeBanner::latest()->first();

        if (!$banner) {
            $banner = new HomeBanner(); // empty banner instance
        }

        return view('admin.home-banner.edit', compact('banner'));
    }

    // Update banner data
    public function update(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'title_line1'       => 'required|string|max:255',
            'title_line2'       => 'required|string|max:255',
            'subtitle'          => 'required|string',

            'background_image'  => 'nullable|image|max:2048',
            'person_image'      => 'nullable|image|max:2048',
            'cv_file'           => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Retrieve existing banner or create new
        $banner = HomeBanner::latest()->first() ?? new HomeBanner();

        // Update text fields
        $banner->title_line1 = $request->title_line1;
        $banner->title_line2 = $request->title_line2;
        $banner->subtitle = $request->subtitle;

        // Handle background image upload & delete old if exists
        if ($request->hasFile('background_image')) {
            if ($banner->background_image && Storage::disk('public')->exists($banner->background_image)) {
                Storage::disk('public')->delete($banner->background_image);
            }
            $banner->background_image = $request->file('background_image')->store('banners', 'public');
        }

        // Handle person image upload & delete old if exists
        if ($request->hasFile('person_image')) {
            if ($banner->person_image && Storage::disk('public')->exists($banner->person_image)) {
                Storage::disk('public')->delete($banner->person_image);
            }
            $banner->person_image = $request->file('person_image')->store('banners', 'public');
        }

        // Handle CV file upload & delete old if exists
        if ($request->hasFile('cv_file')) {
            if ($banner->cv_file && Storage::disk('public')->exists($banner->cv_file)) {
                Storage::disk('public')->delete($banner->cv_file);
            }
            $banner->cv_file = $request->file('cv_file')->store('cv', 'public');
        }

        // Save banner to DB
        $banner->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Home banner updated successfully.');
    }
}
