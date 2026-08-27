<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class ProductCatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true);

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('name_en', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('description_en', 'like', "%{$search}%");
            });
        }

        if ($request->input('sort') === 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($request->input('sort') === 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->get();
        $totalCount = Product::where('is_active', true)->count();
        $settings = GlobalSetting::pluck('value', 'key');

        return view('products.catalog', compact('products', 'settings', 'totalCount'));
    }
}
