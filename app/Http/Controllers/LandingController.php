<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingController extends Controller
{
    public function index()
    {
        $localTailwind = public_path('js/tailwind.min.js');
        if (!file_exists($localTailwind) || filesize($localTailwind) < 1000) {
            $contextPath = '/home/fajar/.gemini/antigravity-ide/brain/d15de2de-5221-4580-97ce-e4c5f4ea1593/.system_generated/steps/372/content.md';
            if (file_exists($contextPath)) {
                $raw = file_get_contents($contextPath);
                $parts = explode("---\n\n", $raw, 2);
                $js = isset($parts[1]) ? $parts[1] : $raw;
                @file_put_contents($localTailwind, $js);
            }
            if (!file_exists($localTailwind) || filesize($localTailwind) < 1000) {
                $remote = @file_get_contents('https://cdn.tailwindcss.com');
                if ($remote) {
                    @file_put_contents($localTailwind, $remote);
                }
            }
        }

        try {
            $content = Cache::remember('landing_content', 3600, function () {
                return \App\Models\LandingPageContent::first() ?? new \App\Models\LandingPageContent();
            });

            $products = Cache::remember('landing_products', 3600, function () {
                return \App\Models\Product::where('is_active', true)->get();
            });

            $testimonials = Cache::remember('landing_testimonials', 3600, function () {
                return \App\Models\Testimonial::where('is_visible', true)->get();
            });

            $settings = Cache::remember('landing_settings', 3600, function () {
                return \App\Models\GlobalSetting::pluck('value', 'key');
            });
        } catch (\Throwable $e) {
            // Graceful fallback in case of remote DB timeout or network issue
            $content = new \App\Models\LandingPageContent();
            $products = collect();
            $testimonials = collect();
            $settings = collect();
        }

        return view('landing', compact('content', 'products', 'testimonials', 'settings'));
    }
}

