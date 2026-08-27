<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingController extends Controller
{
    public function index()
    {
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

