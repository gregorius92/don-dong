<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreLocatorController extends Controller
{
    /**
     * Display public store locator with interactive city filter and Google Maps.
     */
    public function index(Request $request)
    {
        $query = Store::active();

        $selectedCity = $request->input('city', 'all');
        $searchQuery = trim($request->input('q', ''));

        if ($request->filled('city') && $selectedCity !== 'all') {
            $query->where('city', $selectedCity);
        }

        if (!empty($searchQuery)) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('name', 'like', "%{$searchQuery}%")
                  ->orWhere('city', 'like', "%{$searchQuery}%")
                  ->orWhere('address', 'like', "%{$searchQuery}%");
            });
        }

        $stores = $query->orderBy('city')->orderBy('name')->get();
        $cities = Store::active()->select('city')->distinct()->orderBy('city')->pluck('city');
        $totalCount = Store::active()->count();
        $settings = GlobalSetting::pluck('value', 'key');

        return view('stores.index', compact('stores', 'cities', 'selectedCity', 'searchQuery', 'totalCount', 'settings'));
    }
}
