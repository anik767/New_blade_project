<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'name',
        'title',
        'content',
        'image',
        'email',
        'phone',
        'location',
        'linkedin',
        'github',
        'map_embed_code',
        'skills',
        'experience',
        'education',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Accessor for skills array
    public function getSkillsArrayAttribute()
    {
        if (!$this->skills) return [];
        
        $parts = explode('||', $this->skills);
        if (count($parts) < 2) return [];
        
        $skillsPart = $parts[0];
        if (strpos($skillsPart, 'SKILLS:') !== 0) return [];
        
        $skills = substr($skillsPart, 8); // Remove 'SKILLS:' prefix
        $skillArray = [];
        
        foreach (explode('|', $skills) as $skill) {
            if (strpos($skill, 'SKILL:') === 0) {
                $skillData = substr($skill, 6); // Remove 'SKILL:' prefix
                $parts = explode(':', $skillData);
                if (count($parts) >= 2) {
                    $skillArray[] = [
                        'name' => $parts[0],
                        'percentage' => $parts[1] ?? 0
                    ];
                }
            }
        }
        
        return $skillArray;
    }

    // Accessor for strengths array
    public function getStrengthsArrayAttribute()
    {
        if (!$this->skills) return [];
        
        $parts = explode('||', $this->skills);
        if (count($parts) < 2) return [];
        
        $strengthsPart = $parts[1];
        if (strpos($strengthsPart, 'STRENGTHS:') !== 0) return [];
        
        $strengths = substr($strengthsPart, 10); // Remove 'STRENGTHS:' prefix
        $strengthArray = [];
        
        foreach (explode('|', $strengths) as $strength) {
            $parts = explode(':', $strength, 2);
            if (count($parts) >= 2) {
                $strengthArray[] = [
                    'title' => trim($parts[0]),
                    'subtitle' => trim($parts[1])
                ];
            }
        }
        
        return $strengthArray;
    }
}

