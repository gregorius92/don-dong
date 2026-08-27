<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manajemen Toko & Outlet') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Kelola lokasi toko resmi, filter kota, dan integrasi Google Maps
                </p>
            </div>
            <div class="flex items-center gap-2.5">
                <a href="{{ route('stores.index') }}" target="_blank" class="bg-gray-100 text-gray-700 hover:bg-gray-200 px-3.5 py-2 rounded-lg font-semibold text-xs sm:text-sm transition flex items-center gap-1.5 border border-gray-300">
                    <span>📍</span> Lihat Store Locator Publik
                </a>
                <a href="{{ route('admin.stores.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg font-bold text-xs sm:text-sm hover:bg-green-700 transition flex items-center gap-1.5 shadow-sm">
                    <span>+</span> Tambah Toko Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 bg-green-50 text-green-800 rounded-xl border border-green-200 text-sm flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-2">
                        <span class="text-base">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Summary Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Toko</div>
                        <div class="text-2xl font-black text-gray-800 mt-1">{{ $totalStores }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl font-bold">
                        🏬
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Toko Aktif</div>
                        <div class="text-2xl font-black text-green-600 mt-1">{{ $activeStores }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                        🟢
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Kota Terdaftar</div>
                        <div class="text-2xl font-black text-amber-600 mt-1">{{ count($cities) }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                        🗺️
                    </div>
                </div>
            </div>

            <!-- Filters & Search Bar -->
            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <form method="GET" action="{{ route('admin.stores.index') }}" class="flex flex-col md:flex-row items-center gap-3">
                    <!-- Search Input -->
                    <div class="relative flex-1 w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            🔍
                        </div>
                        <input type="text"
                               name="q"
                               value="{{ request('q') }}"
                               placeholder="Cari nama toko, alamat, atau no kontak..."
                               class="w-full pl-9 pr-4 py-2 text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                    </div>

                    <!-- City Filter Dropdown -->
                    <div class="w-full md:w-56">
                        <select name="city" class="w-full py-2 px-3 text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500" onchange="this.form.submit()">
                            <option value="all">📍 Semua Kota</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit & Reset -->
                    <div class="flex items-center gap-2 w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto px-4 py-2 bg-gray-800 text-white rounded-lg text-sm font-semibold hover:bg-gray-900 transition">
                            Filter
                        </button>
                        @if(request()->filled('q') || (request()->filled('city') && request('city') !== 'all'))
                            <a href="{{ route('admin.stores.index') }}" class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-lg text-sm transition">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Stores Table -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-xs font-bold uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-6 py-3.5 text-left">Nama Toko & Jam Buka</th>
                                <th class="px-6 py-3.5 text-left">Kota & Alamat</th>
                                <th class="px-6 py-3.5 text-left">Kontak / WhatsApp</th>
                                <th class="px-6 py-3.5 text-left">Google Maps</th>
                                <th class="px-6 py-3.5 text-center">Status</th>
                                <th class="px-6 py-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-sm">
                            @forelse($stores as $store)
                            <tr class="hover:bg-gray-50/70 transition">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">{{ $store->name }}</div>
                                    @if($store->opening_hours)
                                        <div class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                                            <span>🕒</span> <span>{{ $store->opening_hours }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-green-100 text-green-800 mb-1">
                                        {{ $store->city }}
                                    </span>
                                    <div class="text-xs text-gray-600 line-clamp-2 leading-relaxed">{{ $store->address }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($store->phone)
                                        <a href="{{ $store->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-700 hover:text-emerald-900 bg-emerald-50 px-2.5 py-1 rounded-md hover:bg-emerald-100 transition">
                                            <span>💬</span> {{ $store->phone }}
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ $store->google_maps_link }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:text-blue-800 bg-blue-50 px-2.5 py-1 rounded-md hover:bg-blue-100 transition">
                                        <span>📍</span> Buka Peta ↗
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('admin.stores.toggle', $store) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold transition cursor-pointer {{ $store->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}" title="Klik untuk ubah status">
                                            <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $store->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                            {{ $store->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-bold space-x-2">
                                    <a href="{{ route('admin.stores.edit', $store) }}" class="text-green-600 hover:text-green-900 bg-green-50 px-2.5 py-1.5 rounded-md hover:bg-green-100 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.stores.destroy', $store) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus toko {{ $store->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-2.5 py-1.5 rounded-md hover:bg-red-100 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    <div class="text-4xl mb-2">🏪</div>
                                    <div class="font-bold text-gray-700">Belum ada toko yang sesuai</div>
                                    <p class="text-xs text-gray-400 mt-1">Coba ubah kata kunci pencarian atau filter kota.</p>
                                    <a href="{{ route('admin.stores.create') }}" class="inline-block mt-4 text-xs font-bold text-green-600 hover:underline">
                                        + Tambah Toko Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($stores->hasPages())
                    <div class="p-4 border-t border-gray-100">
                        {{ $stores->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
