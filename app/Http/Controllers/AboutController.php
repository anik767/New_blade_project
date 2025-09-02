<?php

namespace App\Http\Controllers;

use App\Models\About as AboutMe;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Show the form for editing the about me content.
     */
    public function edit()
    {
        $aboutMe = AboutMe::first();

        if (! $aboutMe) {
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
                // Keep under 255 chars to fit current VARCHAR column
                'skills' => 'SKILLS:SKILL:HTML/CSS:85|SKILL:JavaScript:90',
            ]);
        }

        return view('admin.about.edit', ['about' => $aboutMe]);
    }

    /**
     * Update the about me content.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'map_embed_code' => 'nullable|string',
            'skills' => 'nullable|array',
            'skills.*.name' => 'nullable|string',
            'skills.*.percentage' => 'nullable|integer|min:0|max:100',
            'strengths' => 'nullable|array',
            'strengths.*.title' => 'nullable|string',
            'strengths.*.subtitle' => 'nullable|string',
            'strengths.*.description' => 'nullable|string',
        ]);

        $aboutMe = AboutMe::first();

        if (! $aboutMe) {
            $aboutMe = new AboutMe;
        }

        if ($request->hasFile('image')) {
            if ($aboutMe->image && Storage::disk('public')->exists($aboutMe->image)) {
                Storage::disk('public')->delete($aboutMe->image);
            }
            $imagePath = $request->file('image')->store('about', 'public');
        } else {
            $imagePath = $aboutMe->image;
        }

        // Build sections purely from the incoming request (no preservation of old data)
        $newSkillsSection = '';
        $newStrengthsSection = '';

        // Build skills section
        if ($request->has('skills')) {
            $skillParts = [];
            $skillsInput = $request->input('skills', []);
            if (! is_array($skillsInput)) {
                $skillsInput = [];
            }
        
            foreach ($skillsInput as $skill) {
                $name = isset($skill['name']) ? trim((string) $skill['name']) : '';
                $percentage = isset($skill['percentage']) && $skill['percentage'] !== '' ? (int) $skill['percentage'] : 0;
        
                $name = str_replace(['|', ':'], ['/', '-'], $name);
        
                // Only persist rows with a non-empty name
                if ($name !== '') {
                    $skillParts[] = 'SKILL:'.$name.':'.$percentage;
                }
            }
            $newSkillsSection = !empty($skillParts) ? 'SKILLS:'.implode('|', $skillParts) : '';
        }

        // Build strengths section
        if ($request->has('strengths')) {
            $strengthParts = [];
            $strengthsInput = is_array($request->strengths) ? $request->strengths : [];
            foreach ($strengthsInput as $strength) {
                $title = isset($strength['title']) ? trim((string) $strength['title']) : '';
                $subtitle = isset($strength['subtitle']) ? trim((string) $strength['subtitle']) : '';
                $description = isset($strength['description']) ? trim((string) $strength['description']) : '';

                $title = str_replace(['|', ':'], ['/', '-'], $title);
                $subtitle = str_replace(['|', ':'], ['/', '-'], $subtitle);
                // Allow ':' and '|' in description by replacing them to keep format safe
                $description = str_replace(['|', ':'], ['/', '-'], $description);

                if ($title !== '' && $subtitle !== '' && $description !== '') {
                    $strengthParts[] = $title.':'.$subtitle.':'.$description;
                }
            }
            $newStrengthsSection = !empty($strengthParts) ? 'STRENGTHS:'.implode('|', $strengthParts) : '';
        }

        // Combine (only non-empty sections)
        $finalSkillsSection = $newSkillsSection;
        $finalStrengthsSection = $newStrengthsSection;

        // Combine
        $combinedData = '';
        if ($finalSkillsSection !== '') {
            $combinedData .= $finalSkillsSection;
        }
        if ($finalStrengthsSection !== '') {
            if ($combinedData !== '') {
                $combinedData .= '||';
            }
            $combinedData .= $finalStrengthsSection;
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
            'skills' => $combinedData,
        ];

        $aboutMe = AboutMe::firstOrCreate([], $data);
        $aboutMe->update($data);

        return redirect()->route('admin.about.edit')
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
            if (! $aboutMe) {
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

            // Convert combined skills and strengths string back to array format for the view
            if ($aboutMe->skills) {
                $skillsArray = [];
                $strengthsArray = [];

                // Split by double pipe to separate skills and strengths sections
                $sections = explode('||', $aboutMe->skills);

                foreach ($sections as $section) {
                    if (strpos($section, 'SKILLS:') === 0) {
                        // Parse skills section (use correct prefix length)
                        $skillsData = substr($section, strlen('SKILLS:'));
                        $skillParts = explode('|', $skillsData);
                        foreach ($skillParts as $part) {
                            if (strpos($part, 'SKILL:') === 0) {
                                $skillData = substr($part, 6); // Remove 'SKILL:' prefix
                                if (strpos($skillData, ':') !== false) {
                                    [$name, $percentage] = explode(':', $skillData, 2);
                                    $skillsArray[] = [
                                        'name' => $name,
                                        'percentage' => (int) $percentage,
                                    ];
                                }
                            }
                        }
                    } elseif (strpos($section, 'STRENGTHS:') === 0) {
                        // Parse strengths section (use correct prefix length)
                        $strengthsData = substr($section, strlen('STRENGTHS:'));
                        $strengthParts = explode('|', $strengthsData);
                        foreach ($strengthParts as $part) {
                            if (substr_count($part, ':') >= 2) {
                                $parts = explode(':', $part, 3);
                                $strengthsArray[] = [
                                    'title' => $parts[0],
                                    'subtitle' => $parts[1],
                                    'description' => $parts[2],
                                ];
                            }
                        }
                    }
                }

                $aboutMe->skills_array = $skillsArray;
                $aboutMe->strengths_array = $strengthsArray;
            }

            return view('site.about.index', compact('aboutMe', 'banner', 'pageBanner'));
        } catch (\Exception $e) {
            // If there's an error, return the view with null
            $banner = HomeBanner::latest()->first();
            $pageBanner = \App\Models\PageBanner::where('page', 'about')->first();

            return view('site.about.index', ['aboutMe' => null, 'banner' => $banner, 'pageBanner' => $pageBanner]);
        }
    }
}
