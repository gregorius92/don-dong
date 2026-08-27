<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display font-black text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Manajemen Toko & Outlet
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Kelola lokasi toko resmi, filter kota, dan integrasi titik peta Google Maps
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                <a href="{{ route('stores.index') }}" target="_blank" class="w-full sm:w-auto justify-center bg-white text-slate-800 hover:bg-slate-50 hover:text-emerald-700 px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition flex items-center gap-2 border border-slate-200 shadow-xs">
                    <span>🗺️</span> Lihat Store Locator Publik ↗
                </a>
                <a href="{{ route('admin.stores.create') }}" class="w-full sm:w-auto justify-center bg-emerald-600 text-white hover:bg-emerald-700 px-5 py-2.5 rounded-xl font-black text-xs sm:text-sm transition flex items-center gap-2 shadow-sm hover:shadow-md">
                    <span class="text-base font-black">+</span> Tambah Toko Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 bg-emerald-50 text-emerald-900 rounded-2xl border border-emerald-300 text-sm font-semibold flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Summary Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-slate-500">Total Toko</div>
                        <div class="text-3xl font-display font-black text-slate-900 mt-1">{{ $totalStores }}</div>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center justify-center text-2xl font-bold">
                        🏬
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-emerald-700">Toko Aktif Tayang</div>
                        <div class="text-3xl font-display font-black text-emerald-700 mt-1">{{ $activeStores }}</div>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 border border-emerald-200 flex items-center justify-center text-2xl font-bold">
                        🟢
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-amber-700">Kota Terdaftar</div>
                        <div class="text-3xl font-display font-black text-amber-700 mt-1">{{ count($cities) }}</div>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 border border-amber-200 flex items-center justify-center text-2xl font-bold">
                        🗺️
                    </div>
                </div>
            </div>

            <!-- Filters & Search Bar -->
            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs">
                <form method="GET" action="{{ route('admin.stores.index') }}" class="flex flex-col md:flex-row items-center gap-3">
                    <!-- Search Input -->
                    <div class="relative flex-1 w-full">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            🔍
                        </div>
                        <input type="text"
                               name="q"
                               value="{{ request('q') }}"
                               placeholder="Cari nama toko, alamat, atau no kontak..."
                               class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl bg-white text-slate-900 placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 font-medium">
                    </div>

                    <!-- City Filter Dropdown -->
                    <div class="w-full md:w-64">
                        <select name="city" class="w-full py-2.5 px-3.5 text-sm rounded-xl bg-white text-slate-900 font-semibold border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600" onchange="this.form.submit()">
                            <option value="all">📍 Semua Kota ({{ $totalStores }})</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                    🏙️ {{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit & Reset -->
                    <div class="flex items-center gap-2 w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto px-5 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-black uppercase tracking-wider hover:bg-black transition shadow-xs">
                            Filter
                        </button>
                        @if(request()->filled('q') || (request()->filled('city') && request('city') !== 'all'))
                            <a href="{{ route('admin.stores.index') }}" class="px-4 py-2.5 bg-slate-100 text-slate-700 hover:bg-slate-200 rounded-xl text-xs font-bold transition border border-slate-300">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Stores Table -->
            <div class="bg-white overflow-hidden shadow-xs rounded-2xl border border-slate-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-100/80 text-xs font-black uppercase tracking-wider text-slate-700">
                            <tr>
                                <th class="px-6 py-4 text-left">Nama Toko & Jam Buka</th>
                                <th class="px-6 py-4 text-left">Kota & Alamat</th>
                                <th class="px-6 py-4 text-left">Kontak / WhatsApp</th>
                                <th class="px-6 py-4 text-left">Google Maps</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200 text-sm">
                            @forelse($stores as $store)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="px-6 py-4">
                                    <div class="font-black text-slate-900 text-base">{{ $store->name }}</div>
                                    @if($store->opening_hours)
                                        <div class="text-xs text-slate-500 font-medium flex items-center gap-1.5 mt-1">
                                            <span>🕒</span> <span>{{ $store->opening_hours }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-black bg-emerald-100 text-emerald-900 border border-emerald-300 mb-1">
                                        {{ $store->city }}
                                    </span>
                                    <div class="text-xs text-slate-600 font-normal line-clamp-2 leading-relaxed">{{ $store->address }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($store->phone)
                                        <a href="{{ $store->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-900 bg-emerald-50 border border-emerald-300 px-3 py-1.5 rounded-xl hover:bg-emerald-100 transition shadow-xs">
                                            <span>💬</span> {{ $store->phone }}
                                        </a>
                                    @else
                                        <span class="text-xs text-slate-400 font-semibold">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ $store->google_maps_link }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-900 bg-blue-50 border border-blue-300 px-3 py-1.5 rounded-xl hover:bg-blue-100 transition shadow-xs">
                                        <span>📍</span> Buka Peta ↗
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('admin.stores.toggle', $store) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black transition cursor-pointer border shadow-xs {{ $store->is_active ? 'bg-emerald-100 text-emerald-900 border-emerald-300 hover:bg-emerald-200' : 'bg-rose-100 text-rose-900 border-rose-300 hover:bg-rose-200' }}" title="Klik untuk ubah status aktif/nonaktif">
                                            <span class="w-2 h-2 rounded-full mr-1.5 {{ $store->is_active ? 'bg-emerald-600' : 'bg-rose-600' }}"></span>
                                            {{ $store->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-bold space-x-2">
                                    <a href="{{ route('admin.stores.edit', $store) }}" class="inline-block bg-amber-50 text-amber-900 border border-amber-300 px-3.5 py-2 rounded-xl hover:bg-amber-100 transition shadow-xs font-black">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.stores.destroy', $store) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus toko {{ $store->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-50 text-rose-800 border border-rose-300 px-3.5 py-2 rounded-xl hover:bg-rose-100 transition shadow-xs font-black">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-14 text-center text-slate-500">
                                    <div class="text-5xl mb-3">🏪</div>
                                    <div class="text-base font-bold text-slate-800">Belum ada toko yang sesuai</div>
                                    <p class="text-xs text-slate-500 mt-1">Coba ubah kata kunci pencarian atau filter kota.</p>
                                    <a href="{{ route('admin.stores.create') }}" class="inline-block mt-4 px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-black hover:bg-emerald-700 transition shadow-sm">
                                        + Tambah Toko Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($stores->hasPages())
                    <div class="p-4 border-t border-slate-200">
                        {{ $stores->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
