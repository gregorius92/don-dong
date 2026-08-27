<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of stores with search and city filter.
     */
    public function index(Request $request)
    {
        $query = Store::query();

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('city') && $request->input('city') !== 'all') {
            $query->where('city', $request->input('city'));
        }

        $stores = $query->latest()->paginate(15);
        $stores->appends($request->query());
        $cities = Store::select('city')->distinct()->orderBy('city')->pluck('city');
        $totalStores = Store::count();
        $activeStores = Store::where('is_active', true)->count();

        return view('admin.stores.index', compact('stores', 'cities', 'totalStores', 'activeStores'));
    }

    /**
     * Show the form for creating a new store.
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created store in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:50',
            'opening_hours' => 'nullable|string|max:100',
            'maps_url' => 'nullable|string',
            'maps_embed' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Store::create($validated);

        return redirect()->route('admin.stores.index')->with('success', 'Toko baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified store.
     */
    public function edit(Store $store)
    {
        return view('admin.stores.edit', compact('store'));
    }

    /**
     * Update the specified store in database.
     */
    public function update(Request $request, Store $store)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:50',
            'opening_hours' => 'nullable|string|max:100',
            'maps_url' => 'nullable|string',
            'maps_embed' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $store->update($validated);

        return redirect()->route('admin.stores.index')->with('success', 'Informasi toko berhasil diperbarui.');
    }

    /**
     * Toggle active/inactive status of a store.
     */
    public function toggle(Store $store)
    {
        $store->is_active = !$store->is_active;
        $store->save();

        $status = $store->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Status toko '{$store->name}' berhasil {$status}.");
    }

    /**
     * Remove the specified store from database.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('admin.stores.index')->with('success', 'Toko berhasil dihapus.');
    }
}
