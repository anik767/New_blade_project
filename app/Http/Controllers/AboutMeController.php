<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutMeController extends Controller
{
    /**
     * Show the form for editing the about me content.
     */
    public function edit()
    {
        $aboutMe = AboutMe::first();
        
        if (!$aboutMe) {
            // Create a default about me entry if none exists
            $aboutMe = AboutMe::create([
                'name' => 'Your Full Name',
                'title' => 'Your Title',
                'content' => 'Tell visitors about yourself...',
                'email' => 'your.email@example.com',
                'phone' => '+971 50 123 4567',
                'location' => 'Dubai, UAE',
                'linkedin' => '',
                'github' => '',
            ]);
        }
        
        return view('admin.about-me.edit', compact('aboutMe'));
    }

    /**
     * Update the about me content.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'map_embed_code' => 'nullable|string',
            'skills' => 'nullable|array',
            'skills.*.name' => 'nullable|string|max:255',
            'skills.*.percentage' => 'nullable|integer|min:0|max:100',
        ]);

        $aboutMe = AboutMe::first();
        
        if (!$aboutMe) {
            $aboutMe = new AboutMe();
        }

        if ($request->hasFile('image')) {
            if ($aboutMe->image && Storage::disk('public')->exists($aboutMe->image)) {
                Storage::disk('public')->delete($aboutMe->image);
            }
            $imagePath = $request->file('image')->store('about-me', 'public');
        } else {
            $imagePath = $aboutMe->image;
        }

        // Process skills data - store as simple string format
        $skillsString = '';
        if ($request->has('skills')) {
            $skillParts = [];
            foreach ($request->skills as $skill) {
                if (!empty($skill['name']) && isset($skill['percentage'])) {
                    $skillParts[] = $skill['name'] . ':' . (int) $skill['percentage'];
                }
            }
            $skillsString = implode('|', $skillParts);
        }

        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'map_embed_code' => $request->map_embed_code,
            'skills' => $skillsString,
        ];

        $aboutMe = AboutMe::firstOrCreate([], $data);
        $aboutMe->update($data);

        return redirect()->route('admin.about-me.edit')
                         ->with('success', 'About Me updated successfully.');
    }

    // 🔓 Public: Show about me page
    public function publicShow()
    {
        try {
            $aboutMe = AboutMe::first();
            $banner = HomeBanner::latest()->first();
            $pageBanner = \App\Models\PageBanner::where('page', 'about')->first();
            
            // If no about me record exists, create a default one
            if (!$aboutMe) {
                $aboutMe = AboutMe::create([
                    'title' => 'About Me',
                    'content' => 'Tell visitors about yourself...',
                    'email' => 'your.email@example.com',
                    'phone' => '',
                    'location' => '',
                    'linkedin' => '',
                    'github' => '',
                ]);
            }
            
            // Convert skills string back to array format for the view
            if ($aboutMe->skills) {
                $skillsArray = [];
                $skillParts = explode('|', $aboutMe->skills);
                foreach ($skillParts as $part) {
                    if (strpos($part, ':') !== false) {
                        list($name, $percentage) = explode(':', $part, 2);
                        $skillsArray[] = [
                            'name' => $name,
                            'percentage' => (int) $percentage
                        ];
                    }
                }
                $aboutMe->skills_array = $skillsArray;
            }
            
            return view('site.about.index', compact('aboutMe', 'banner','pageBanner'));
        } catch (\Exception $e) {
            // If there's an error, return the view with null
            $banner = HomeBanner::latest()->first();
            $pageBanner = \App\Models\PageBanner::where('page', 'about')->first();
            return view('site.about.index', ['aboutMe' => null, 'banner' => $banner, 'pageBanner' => $pageBanner]);
        }
    }
}
