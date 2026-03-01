<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function toggleVisibility(Testimonial $testimonial)
    {
        $testimonial->is_visible = !$testimonial->is_visible;
        $testimonial->save();

        return back()->with('success', 'Status testimoni berhasil diubah!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
