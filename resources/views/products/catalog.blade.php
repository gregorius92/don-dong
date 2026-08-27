<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-[#051108] text-slate-100 antialiased selection:bg-[#22c55e] selection:text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ app()->getLocale() == 'en' ? 'Product Catalog — NutriSari DonDong' : 'Katalog Produk — NutriSari DonDong' }}</title>
    <meta name="description" content="{{ app()->getLocale() == 'en' ? 'Explore all variants and packaging options of NutriSari DonDong authentic ambarella drink.' : 'Jelajahi semua varian dan pilihan kemasan minuman kedondong asli NutriSari DonDong.' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">

    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS Local Engine -->
    <script>
        const _origWarn = console.warn;
        console.warn = function(...args) {
            if (args[0] && typeof args[0] === 'string' && (args[0].includes('cdn.tailwindcss.com') || args[0].includes('should not be used in production'))) return;
            _origWarn.apply(console, args);
        };
    </script>
    <script src="{{ file_exists(public_path('js/tailwind.min.js')) ? asset('js/tailwind.min.js') : 'https://cdn.tailwindcss.com' }}"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        tropical: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052310',
                        },
                        citrus: {
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #051108; }
        .font-display { font-family: 'Outfit', sans-serif; }
        .glass-panel {
            background: rgba(10, 29, 13, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(134, 239, 172, 0.15);
        }
        .glass-panel-subtle {
            background: rgba(15, 38, 20, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body class="min-h-screen bg-[#051108] text-slate-100 flex flex-col justify-between"
    x-data="{
        searchQuery: '{{ request('q') }}',
        activeFilter: 'all',
        openModal: false,
        selectedProduct: null
    }">

    <!-- Background Ambient Aura -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-[600px] h-[600px] rounded-full bg-tropical-500/10 blur-[130px]"></div>
        <div class="absolute top-1/2 -right-40 w-[500px] h-[500px] rounded-full bg-citrus-400/8 blur-[130px]"></div>
    </div>

    <!-- Header Navigation -->
    <header class="relative z-50 w-full px-4 sm:px-8 py-4 bg-black/40 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="h-10 w-10 sm:h-11 sm:w-11 rounded-xl bg-black/40 backdrop-blur-md border border-white/15 p-0.5 flex items-center justify-center overflow-hidden group-hover:border-tropical-400/50 transition shadow-md">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Emblem" class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition-transform">
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] sm:text-xs font-extrabold uppercase tracking-[0.2em] text-tropical-400">NutriSari</span>
                    <span class="text-sm sm:text-base font-display font-black tracking-tight text-white group-hover:text-citrus-300 transition-colors">DONDONG</span>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full bg-white/5 hover:bg-white/15 border border-white/10 text-xs sm:text-sm font-display font-bold text-slate-300 hover:text-white transition flex items-center gap-2">
                    <span>&larr;</span>
                    <span>{{ app()->getLocale() == 'en' ? 'Back to Experience' : 'Kembali ke Beranda' }}</span>
                </a>

                <div class="inline-flex rounded-full bg-black/40 backdrop-blur-md border border-white/10 p-0.5 text-xs font-bold">
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() == 'id' ? 'bg-tropical-600 text-white font-extrabold' : 'text-slate-400 hover:text-white' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() == 'en' ? 'bg-tropical-600 text-white font-extrabold' : 'text-slate-400 hover:text-white' }}">EN</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Catalog Body -->
    <main class="relative z-10 flex-1 max-w-7xl mx-auto w-full px-4 sm:px-8 py-8 sm:py-12">

        <!-- Title & Subtitle Banner -->
        <div class="text-center mb-8 sm:mb-12">
            <span class="text-tropical-400 text-xs sm:text-sm font-extrabold uppercase tracking-[0.25em] block mb-2">
                {{ app()->getLocale() == 'en' ? 'Authentic Product Lineup' : 'Katalog Pilihan Produk Asli' }}
            </span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-display font-black tracking-tight text-white mb-3">
                {{ app()->getLocale() == 'en' ? 'Explore All DonDong Variants' : 'Koleksi Kemasan NutriSari DonDong' }}
            </h1>
            <p class="text-sm sm:text-base lg:text-lg text-slate-300 font-light max-w-2xl mx-auto">
                {{ app()->getLocale() == 'en' 
                    ? 'Find your favorite packaging, from portable single sachets to family value packs with 100% natural ambarella freshness.' 
                    : 'Temukan pilihan kemasan favorit Anda, dari sachet praktis hingga pouch keluarga dengan kesegaran kedondong asli.' }}
            </p>
        </div>

        <!-- Search Bar & Filters Form -->
        <form method="GET" action="{{ route('products.catalog') }}" class="mb-8 sm:mb-10">
            <div class="rounded-2xl glass-panel p-4 sm:p-5 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-4">
                
                <!-- Search Input Field -->
                <div class="relative w-full md:w-2/3">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="{{ app()->getLocale() == 'en' ? 'Search by product name or ingredient...' : 'Cari nama produk atau bahan kemasan...' }}"
                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-black/40 border border-white/15 focus:border-tropical-400 text-sm text-white placeholder-slate-500 outline-none transition">
                </div>

                <!-- Sort Filter & Submit -->
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <select name="sort"
                        onchange="this.form.submit()"
                        class="w-full md:w-auto px-4 py-3 rounded-xl bg-black/40 border border-white/15 focus:border-tropical-400 text-xs sm:text-sm font-semibold text-slate-200 outline-none transition">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>{{ app()->getLocale() == 'en' ? 'Latest Added' : 'Produk Terbaru' }}</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>{{ app()->getLocale() == 'en' ? 'Name (A - Z)' : 'Nama (A - Z)' }}</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>{{ app()->getLocale() == 'en' ? 'Name (Z - A)' : 'Nama (Z - A)' }}</option>
                    </select>

                    <button type="submit"
                        class="px-6 py-3 rounded-xl bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs sm:text-sm uppercase tracking-wider transition shadow-md shrink-0">
                        {{ app()->getLocale() == 'en' ? 'Filter' : 'Cari' }}
                    </button>

                    @if(request()->filled('q') || request()->filled('sort'))
                        <a href="{{ route('products.catalog') }}"
                            class="px-4 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-slate-300 text-xs sm:text-sm font-bold transition shrink-0">
                            ✕ Reset
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <!-- Product Cards Grid -->
        @if($products->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($products as $product)
                    <div class="rounded-2xl glass-panel p-5 sm:p-6 shadow-2xl flex flex-col justify-between group hover:border-tropical-400/50 transition-all duration-300">
                        <div>
                            <!-- Product Image Canvas -->
                            <div class="relative w-full aspect-square rounded-xl bg-black/40 border border-white/10 p-6 flex items-center justify-center overflow-hidden mb-5 group-hover:bg-black/60 transition">
                                <img src="{{ !empty($product->image_path) ? asset('storage/' . $product->image_path) : asset('images/product.png') }}"
                                    alt="{{ $product->translate('name') }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="w-full h-full object-contain drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                
                                <div class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-tropical-500/20 backdrop-blur-md border border-tropical-400/40 text-[10px] sm:text-xs font-black uppercase text-tropical-300">
                                    {{ app()->getLocale() == 'en' ? 'Original Ambarella' : 'Kedondong Asli' }}
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="flex items-baseline justify-between gap-2 mb-2">
                                <h3 class="text-lg sm:text-xl font-display font-black text-white group-hover:text-citrus-300 transition-colors">
                                    {{ $product->translate('name') }}
                                </h3>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-300 line-clamp-3 mb-4 leading-relaxed font-light">
                                {{ $product->translate('description') }}
                            </p>

                            @if(!empty($product->nutrition_highlights) || !empty($product->ingredients))
                                <div class="p-3 rounded-lg glass-panel-subtle mb-4 text-[11px] text-slate-400 leading-snug">
                                    <span class="text-tropical-300 font-bold block mb-0.5">🌿 {{ app()->getLocale() == 'en' ? 'Highlights:' : 'Keunggulan:' }}</span>
                                    <span>{{ $product->nutrition_highlights ?? $product->ingredients }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer: Price & Order Action -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-3">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider block font-bold">{{ app()->getLocale() == 'en' ? 'Packaging / Price' : 'Harga / Kemasan' }}</span>
                                <span class="text-sm sm:text-base font-display font-black text-citrus-400">
                                    {{ $product->price_display ?? 'Rp 25.000 / Box' }}
                                </span>
                            </div>

                            <a href="{{ route('home') }}#channel"
                                class="px-4 sm:px-5 py-2 rounded-full bg-gradient-to-r from-tropical-500 to-tropical-600 hover:from-tropical-400 hover:to-tropical-500 text-slate-950 font-display font-black text-xs uppercase tracking-wider transition transform hover:scale-105 shadow-md">
                                {{ app()->getLocale() == 'en' ? 'Order &rarr;' : 'Pesan &rarr;' }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="rounded-3xl glass-panel p-12 text-center max-w-lg mx-auto my-12">
                <span class="text-4xl sm:text-5xl block mb-3">🔍</span>
                <h3 class="text-xl sm:text-2xl font-display font-black text-white mb-2">
                    {{ app()->getLocale() == 'en' ? 'No products matched your search' : 'Tidak ada produk yang cocok' }}
                </h3>
                <p class="text-sm text-slate-400 mb-6">
                    {{ app()->getLocale() == 'en' ? 'Try searching with another keyword or reset the filter.' : 'Coba gunakan kata kunci lain atau reset filter pencarian.' }}
                </p>
                <a href="{{ route('products.catalog') }}"
                    class="inline-block px-6 py-2.5 rounded-full bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs uppercase tracking-wider transition">
                    {{ app()->getLocale() == 'en' ? 'View All Products' : 'Lihat Semua Produk' }}
                </a>
            </div>
        @endif

    </main>

    <!-- Footer -->
    <footer class="relative z-10 w-full px-4 sm:px-8 py-6 bg-black/60 border-t border-white/10 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} NutriSari DonDong. {{ app()->getLocale() == 'en' ? 'All rights reserved.' : 'Hak Cipta Dilindungi.' }}</p>
    </footer>

</body>
</html>
