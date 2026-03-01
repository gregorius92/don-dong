<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'name_en' => 'nullable|string',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'price_display' => 'required|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active');
        
        try {
            $tr = new GoogleTranslate('en');
            $tr->setSource('id');
            if (empty($data['name_en'])) {
                $data['name_en'] = $tr->translate($data['name']);
            }
            if (empty($data['description_en'])) {
                $data['description_en'] = $tr->translate($data['description']);
            }
        } catch (\Exception $e) {
            \Log::error('Auto-translation failed for Product store: ' . $e->getMessage());
        }

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        \App\Models\Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(\App\Models\Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, \App\Models\Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'name_en' => 'nullable|string',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'price_display' => 'required|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['is_active'] = $request->has('is_active');

        try {
            $tr = new GoogleTranslate('en');
            $tr->setSource('id');
            if (empty($data['name_en'])) {
                $data['name_en'] = $tr->translate($data['name']);
            }
            if (empty($data['description_en'])) {
                $data['description_en'] = $tr->translate($data['description']);
            }
        } catch (\Exception $e) {
            \Log::error('Auto-translation failed for Product update: ' . $e->getMessage());
        }

        if ($request->hasFile('image')) {
            if ($product->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(\App\Models\Product $product)
    {
        if ($product->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
