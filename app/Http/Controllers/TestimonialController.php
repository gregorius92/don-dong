<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $content_en = null;
        try {
            $tr = new GoogleTranslate('en');
            $tr->setSource('id');
            $content_en = $tr->translate($request->content);
        } catch (\Exception $e) {
            \Log::error('Auto-translation failed: ' . $e->getMessage());
        }

        $data = [
            'author_name' => $request->author,
            'content' => $request->content,
            'content_en' => $content_en,
            'rating' => $request->rating,
            'is_visible' => false, // Requires approval
        ];

        Testimonial::create($data);

        return back()->with('success_testimonial', 'Terima kasih! Testimoni Anda telah terkirim dan akan ditampilkan setelah disetujui admin.')->withFragment('testimonials');
    }
}
