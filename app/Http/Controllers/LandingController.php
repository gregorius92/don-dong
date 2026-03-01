<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $content = \App\Models\LandingPageContent::first();
        $products = \App\Models\Product::where('is_active', true)->get();
        $testimonials = \App\Models\Testimonial::where('is_visible', true)->get();
        $settings = \App\Models\GlobalSetting::pluck('value', 'key');

        return view('landing', compact('content', 'products', 'testimonials', 'settings'));
    }
}
