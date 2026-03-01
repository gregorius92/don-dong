<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = \App\Models\Product::count();
        $testimonialCount = \App\Models\Testimonial::count();
        
        return view('admin.dashboard', compact('productCount', 'testimonialCount'));
    }
}
