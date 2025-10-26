<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        
        // If no settings exist, create default
        if (!$settings) {
            $settings = Settings::create([
                'blog_name' => env('APP_NAME', 'My Blog'),
                'blog_description' => '',
                'blog_keywords' => '',
                'blog_author' => 'Admin',
            ]);
        }
        
        return view('admin.settings.index', compact('settings'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'blog_name' => 'required|max:255',
            'blog_description' => 'nullable|max:500',
            'blog_keywords' => 'nullable|max:500',
            'blog_author' => 'nullable|max:255',
        ]);

        $settings = Settings::firstOrNew([]);
        $settings->blog_name = $validated['blog_name'];
        $settings->blog_description = $validated['blog_description'] ?? '';
        $settings->blog_keywords = $validated['blog_keywords'] ?? '';
        $settings->blog_author = $validated['blog_author'] ?? '';
        $settings->save();

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully!');
    }
    
}
