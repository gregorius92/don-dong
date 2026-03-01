<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $content = \App\Models\LandingPageContent::first();
        return view('admin.landing-page', compact('content'));
    }

    public function update(Request $request)
    {
        $content = \App\Models\LandingPageContent::first();
        
        $data = $request->validate([
            'hero_title' => 'required|string',
            'hero_title_en' => 'nullable|string',
            'hero_subtitle' => 'required|string',
            'hero_subtitle_en' => 'nullable|string',
            'hero_cta_text' => 'required|string',
            'hero_cta_text_en' => 'nullable|string',
            'hero_cta_link' => 'required|string',
            'benefits_title' => 'required|string',
            'benefits_title_en' => 'nullable|string',
            'benefits_content' => 'required|string',
            'benefits_content_en' => 'nullable|string',
            'ingredients_title' => 'required|string',
            'ingredients_title_en' => 'nullable|string',
            'ingredients_content' => 'required|string',
            'ingredients_content_en' => 'nullable|string',
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('images', 'public');
        }

        $content->update($data);

        return back()->with('success', 'Konten Home berhasil diperbarui!');
    }
}
