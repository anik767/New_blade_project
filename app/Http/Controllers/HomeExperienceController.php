<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeExperienceController extends Controller
{
    // Show experience edit form
    public function edit()
    {
        $banner = HomeBanner::latest()->first();

        if (! $banner) {
            $banner = new HomeBanner; // empty banner instance
        }

        return view('admin.home.experience.edit', compact('banner'));
    }

    // Update experience data
    public function update(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'experience' => 'nullable|array',
            'experience.*.title' => 'nullable|string|max:255',
            'experience.*.company' => 'nullable|string|max:255',
            'experience.*.period' => 'nullable|string|max:100',
            'experience.*.description' => 'nullable|string',
        ]);

        // Retrieve existing banner or create new
        $banner = HomeBanner::latest()->first() ?? new HomeBanner;

        // Update experience
        $banner->experience = $request->experience ?? [];

        // Save banner to DB
        $banner->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Experience updated successfully.');
    }
}
