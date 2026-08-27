<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display font-black text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Katalog Produk DonDong!
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Kelola daftar varian rasa, harga display, komposisi gizi, dan status publikasi
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                <a href="{{ route('products.catalog') }}" target="_blank" class="w-full sm:w-auto justify-center bg-white text-slate-800 hover:bg-slate-50 hover:text-emerald-700 px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition flex items-center gap-2 border border-slate-200 shadow-xs">
                    <span>🧃</span> Lihat Katalog Publik ↗
                </a>
                <a href="{{ route('admin.products.create') }}" class="w-full sm:w-auto justify-center bg-emerald-600 text-white hover:bg-emerald-700 px-5 py-2.5 rounded-xl font-black text-xs sm:text-sm transition flex items-center gap-2 shadow-sm hover:shadow-md">
                    <span class="text-base font-black">+</span> Tambah Produk Baru
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

            <!-- Products Table Container -->
            <div class="bg-white overflow-hidden shadow-xs rounded-2xl border border-slate-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-100/80 text-xs font-black uppercase tracking-wider text-slate-700">
                            <tr>
                                <th class="px-6 py-4 text-left">Produk & Varian</th>
                                <th class="px-6 py-4 text-left">Harga / Display</th>
                                <th class="px-6 py-4 text-center">Status Landing Page</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200 text-sm">
                            @forelse($products as $product)
                            <tr class="hover:bg-slate-50/80 transition">
                                <!-- Image & Name -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-4">
                                        <div class="h-12 w-12 rounded-xl bg-slate-900/5 p-1 border border-slate-200 flex items-center justify-center shrink-0 shadow-xs">
                                            <img class="h-full w-full object-contain rounded-lg"
                                                 src="{{ asset('storage/' . ($product->image_path ?: 'images/product.png')) }}"
                                                 alt="{{ $product->name }}">
                                        </div>
                                        <div>
                                            <div class="font-black text-slate-900 text-base">{{ $product->name }}</div>
                                            @if($product->name_en)
                                                <div class="text-xs text-slate-500 italic">{{ $product->name_en }}</div>
                                            @endif
                                            <div class="text-[11px] text-emerald-700 font-bold mt-0.5">slug: {{ $product->slug }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-xl text-xs font-black bg-slate-100 text-slate-900 border border-slate-200">
                                        {{ $product->price_display }}
                                    </span>
                                </td>

                                <!-- Status Badge -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-black rounded-full border shadow-xs {{ $product->is_active ? 'bg-emerald-100 text-emerald-900 border-emerald-300' : 'bg-rose-100 text-rose-900 border-rose-300' }}">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 my-auto {{ $product->is_active ? 'bg-emerald-600' : 'bg-rose-600' }}"></span>
                                        {{ $product->is_active ? 'Aktif Tayang' : 'Nonaktif' }}
                                    </span>
                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-black space-x-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="inline-block bg-amber-50 text-amber-900 border border-amber-300 px-3.5 py-2 rounded-xl hover:bg-amber-100 transition shadow-xs">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus varian produk {{ $product->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-50 text-rose-800 border border-rose-300 px-3.5 py-2 rounded-xl hover:bg-rose-100 transition shadow-xs">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-14 text-center text-slate-500">
                                    <div class="text-5xl mb-3">🧃</div>
                                    <div class="text-base font-bold text-slate-800">Belum ada produk yang ditambahkan</div>
                                    <p class="text-xs text-slate-500 mt-1">Tambahkan varian sachet atau botol pertama Anda.</p>
                                    <a href="{{ route('admin.products.create') }}" class="inline-block mt-4 px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-black hover:bg-emerald-700 transition shadow-sm">
                                        + Tambah Produk Baru
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
