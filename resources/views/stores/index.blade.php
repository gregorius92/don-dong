<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-[#051108] text-slate-100 antialiased selection:bg-[#22c55e] selection:text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ app()->getLocale() == 'en' ? 'Store Locations — Dong' : 'Lokasi Toko & Outlet — Dong' }}</title>
    <meta name="description" content="{{ app()->getLocale() == 'en' ? 'Find official Dong store locations and retailers in your city.' : 'Temukan lokasi toko resmi, outlet, dan distributor Dong terdekat di kotamu.' }}">

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

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        
        body {
            background-color: #051108;
            color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'Outfit', sans-serif;
        }

        .glass-panel {
            background: rgba(10, 25, 14, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .glass-panel-subtle {
            background: rgba(15, 38, 20, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glow-text-green {
            text-shadow: 0 0 35px rgba(74, 222, 128, 0.4);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col justify-between"
      x-data="{
          mobileNavOpen: false,
          activeStoreId: {{ $stores->isNotEmpty() ? $stores->first()->id : 'null' }},
          activeStoreName: '{{ $stores->isNotEmpty() ? addslashes($stores->first()->name) : 'Dong Store' }}',
          activeAddress: '{{ $stores->isNotEmpty() ? addslashes($stores->first()->address) : '' }}',
          activePhone: '{{ $stores->isNotEmpty() ? $stores->first()->phone : '' }}',
          activeGmapsUrl: '{{ $stores->isNotEmpty() ? $stores->first()->gmaps_url : '' }}',
          activeMapEmbedUrl: '{{ $stores->isNotEmpty() ? $stores->first()->map_embed_url : '' }}',
          selectStore(store) {
              this.activeStoreId = store.id;
              this.activeStoreName = store.name;
              this.activeAddress = store.address;
              this.activePhone = store.phone || '';
              this.activeGmapsUrl = store.gmaps_url || '';
              this.activeMapEmbedUrl = store.map_embed_url || '';
              
              // Scroll to map preview smoothly on mobile
              if (window.innerWidth < 1024) {
                  document.getElementById('map-preview-panel')?.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
              }
          }
      }">

    <!-- =========================================================================
         TOP NAVIGATION BAR
         ========================================================================= -->
    <header class="sticky top-0 z-50 w-full px-4 sm:px-8 py-3.5 bg-black/60 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Brand -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="h-10 w-10 sm:h-11 sm:w-11 rounded-xl bg-white p-0.5 flex items-center justify-center overflow-hidden group-hover:ring-2 group-hover:ring-tropical-400 transition duration-300 shadow-md">
                    <img src="{{ asset('images/logo_dondong_official_asli.svg') }}" alt="Dong Emblem" class="h-full w-full object-contain group-hover:scale-110 transition-transform">
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] sm:text-xs font-extrabold uppercase tracking-[0.2em] text-tropical-400">Kedondong Asli</span>
                    <span class="text-base sm:text-lg lg:text-xl font-display font-black tracking-wider text-white group-hover:text-citrus-300 transition-colors">DONG</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-6 lg:gap-7 text-xs sm:text-sm font-extrabold uppercase tracking-[0.16em] text-slate-300">
                <a href="{{ route('home') }}" class="hover:text-tropical-400 transition-colors">Home</a>
                <a href="{{ route('home') }}#scene-2" class="hover:text-tropical-400 transition-colors">Sensasi Rasa</a>
                <a href="{{ route('home') }}#scene-4" class="hover:text-tropical-400 transition-colors">Produk</a>
                <a href="{{ route('stores.index') }}" class="text-tropical-400 font-black border-b-2 border-tropical-400 pb-0.5">Toko</a>
                <a href="{{ route('home') }}#scene-5" class="hover:text-tropical-400 transition-colors">Testimoni</a>
                <a href="{{ route('home') }}#channel" class="hover:text-tropical-400 transition-colors">Order Hub</a>
            </nav>

            <!-- Quick Action & Lang Switcher -->
            <div class="flex items-center gap-3">
                <div class="inline-flex rounded-full bg-black/40 backdrop-blur-md border border-white/10 p-0.5 text-xs font-bold">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() == 'id' ? 'bg-tropical-600 text-white font-extrabold' : 'text-slate-400 hover:text-white' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() == 'en' ? 'bg-tropical-600 text-white font-extrabold' : 'text-slate-400 hover:text-white' }}">EN</a>
                </div>

                <a href="{{ route('home') }}#channel" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs uppercase tracking-wider transition">
                    <span>Pesan Online</span>
                </a>

                <button @click="mobileNavOpen = !mobileNavOpen" class="md:hidden p-2 rounded-xl bg-black/40 border border-white/10 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileNavOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                        <path x-show="mobileNavOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileNavOpen" x-cloak @click.away="mobileNavOpen = false" x-transition class="md:hidden mt-2 max-w-7xl mx-auto rounded-2xl glass-panel p-5 space-y-3 shadow-2xl">
            <a href="{{ route('home') }}" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Home</a>
            <a href="{{ route('home') }}#scene-2" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Sensasi Rasa</a>
            <a href="{{ route('home') }}#scene-4" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Produk</a>
            <a href="{{ route('stores.index') }}" class="block text-sm font-bold text-tropical-400">Toko</a>
            <a href="{{ route('home') }}#scene-5" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Testimoni</a>
            <a href="{{ route('home') }}#channel" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Order Hub</a>
        </div>
    </header>

    <!-- =========================================================================
         HERO & FILTER SECTION
         ========================================================================= -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="relative z-10">
            <!-- Header Breadcrumb & Title -->
            <div class="text-center max-w-3xl mx-auto mb-8">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-tropical-500/10 border border-tropical-400/20 text-tropical-300 text-xs font-black uppercase tracking-wider mb-3">
                    <span>📍</span> <span>{{ app()->getLocale() == 'en' ? 'Store & Retailer Locator' : 'Temukan Toko Terdekat' }}</span>
                </div>
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-display font-black tracking-tight text-white glow-text-green uppercase mb-3">
                    {{ app()->getLocale() == 'en' ? 'Official Dong Outlets' : 'Lokasi Toko & Outlet Resmi' }}
                </h1>
                <p class="text-sm sm:text-base lg:text-lg text-slate-300 font-light leading-relaxed">
                    {{ app()->getLocale() == 'en' ? 'Discover official retail stores, experience hubs, and partner supermarkets in your area.' : 'Kunjungi toko resmi, supermarket rekanan, dan hub kesegaran Dong di berbagai kota Indonesia.' }}
                </p>
            </div> </div>

            <!-- Search & City Filter Bar -->
            <div class="glass-panel rounded-2xl p-4 sm:p-5 shadow-2xl mb-8 border border-white/15">
                <form method="GET" action="{{ route('stores.index') }}" class="flex flex-col lg:flex-row items-center gap-3.5">
                    
                    <!-- Search Input -->
                    <div class="relative w-full lg:flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-tropical-400">
                            🔍
                        </div>
                        <input type="text"
                               name="q"
                               value="{{ $searchQuery }}"
                               placeholder="{{ app()->getLocale() == 'en' ? 'Search store name, street, or area...' : 'Cari nama toko, jalan, atau area...' }}"
                               style="padding-left: 2.75rem !important;"
                               class="w-full pr-4 py-2.5 rounded-xl bg-black/40 border border-white/20 text-white placeholder-slate-400 text-xs sm:text-sm focus:border-tropical-400 outline-none transition">
                    </div>

                    <!-- City Select Filter -->
                    <div class="w-full lg:w-64">
                        <select name="city"
                                onchange="this.form.submit()"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-black/40 border border-white/20 text-white text-xs sm:text-sm focus:border-tropical-400 outline-none transition">
                            <option value="all" {{ $selectedCity == 'all' ? 'selected' : '' }}>
                                📍 {{ app()->getLocale() == 'en' ? 'All Cities' : 'Semua Kota' }} ({{ $totalCount }})
                            </option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ $selectedCity == $city ? 'selected' : '' }}>
                                    🏙️ {{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit & Reset -->
                    <div class="flex items-center gap-2 w-full lg:w-auto">
                        <button type="submit"
                                class="w-full lg:w-auto px-6 py-2.5 rounded-xl bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs sm:text-sm uppercase tracking-wider transition shadow-md">
                            {{ app()->getLocale() == 'en' ? 'Search' : 'Cari Lokasi' }}
                        </button>
                        @if(!empty($searchQuery) || ($selectedCity !== 'all'))
                            <a href="{{ route('stores.index') }}"
                               class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-slate-300 text-xs sm:text-sm font-semibold transition">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>

                <!-- City Pills for Quick Selection (Desktop) -->
                @if($cities->isNotEmpty())
                    <div class="hidden sm:flex items-center gap-2 mt-3.5 pt-3.5 border-t border-white/10 overflow-x-auto no-scrollbar pb-1">
                        <span class="text-[11px] font-extrabold uppercase tracking-wider text-slate-400 shrink-0 mr-1">Kota Cepat:</span>
                        <a href="{{ route('stores.index', ['city' => 'all', 'q' => $searchQuery]) }}"
                           class="px-3 py-1 rounded-full text-xs font-bold transition shrink-0 {{ $selectedCity == 'all' ? 'bg-tropical-500 text-slate-950' : 'bg-white/5 hover:bg-white/15 text-slate-300' }}">
                            Semua Kota
                        </a>
                        @foreach($cities as $city)
                            <a href="{{ route('stores.index', ['city' => $city, 'q' => $searchQuery]) }}"
                               class="px-3 py-1 rounded-full text-xs font-bold transition shrink-0 {{ $selectedCity == $city ? 'bg-tropical-500 text-slate-950' : 'bg-white/5 hover:bg-white/15 text-slate-300' }}">
                                {{ $city }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- =========================================================================
                 2-COLUMN INTERACTIVE STORE FINDER (STORE LIST + GOOGLE MAPS)
                 ========================================================================= -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-start">

                <!-- Left Column: Store Cards List (7 Cols) -->
                <div class="lg:col-span-6 space-y-4">
                    <div class="flex items-center justify-between px-1">
                        <span class="text-xs sm:text-sm font-extrabold uppercase tracking-wider text-tropical-300">
                            Ditemukan {{ $stores->count() }} Toko
                            @if($selectedCity !== 'all')
                                di <span class="text-white">{{ $selectedCity }}</span>
                            @endif
                        </span>
                        <span class="text-[11px] text-slate-400">Klik toko untuk melihat di peta</span>
                    </div>

                    @forelse($stores as $store)
                        <div @click="selectStore({{ $store->id }}, '{{ addslashes($store->name) }}', '{{ addslashes($store->address) }}', '{{ $store->embed_src }}', '{{ $store->google_maps_link }}')"
                             class="rounded-2xl glass-panel p-5 shadow-xl transition-all duration-300 cursor-pointer group hover:bg-white/[0.08]"
                             :class="selectedStoreId === {{ $store->id }} ? 'border-tropical-400 bg-tropical-950/40 ring-1 ring-tropical-400/50' : 'border-white/10'">
                            
                            <div class="flex items-start justify-between gap-3 mb-2">
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-tropical-500/20 text-tropical-300 border border-tropical-400/30 mb-1.5">
                                        🏙️ {{ $store->city }}
                                    </span>
                                    <h3 class="text-base sm:text-lg font-display font-black text-white group-hover:text-citrus-300 transition-colors">
                                        {{ $store->name }}
                                    </h3>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-lg bg-black/40 border border-white/10 text-tropical-400 font-bold shrink-0"
                                      x-show="selectedStoreId === {{ $store->id }}">
                                    📍 Terpilih
                                </span>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-3.5 font-light">
                                {{ $store->address }}
                            </p>

                            @if($store->opening_hours)
                                <div class="flex items-center gap-1.5 text-xs text-slate-400 mb-4 font-medium">
                                    <span>🕒</span>
                                    <span>{{ $store->opening_hours }}</span>
                                </div>
                            @endif

                            <div class="pt-3 border-t border-white/10 flex flex-wrap items-center justify-between gap-2.5">
                                <div class="flex items-center gap-2">
                                    @if($store->phone)
                                        <a href="{{ $store->whatsapp_url }}"
                                           target="_blank"
                                           @click.stop
                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 border border-emerald-400/40 text-emerald-300 text-xs font-bold transition">
                                            <span>💬</span> <span>WhatsApp</span>
                                        </a>
                                    @endif

                                    <a href="{{ $store->google_maps_link }}"
                                       target="_blank"
                                       @click.stop
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-500/20 hover:bg-blue-500/30 border border-blue-400/40 text-blue-300 text-xs font-bold transition">
                                        <span>🗺️</span> <span>Petunjuk Arah</span>
                                    </a>
                                </div>

                                <button type="button"
                                        class="text-xs font-bold text-tropical-400 hover:text-tropical-300 flex items-center gap-1">
                                    <span>Lihat di Peta</span> <span>&rarr;</span>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-2xl glass-panel p-10 text-center text-slate-400 space-y-3">
                            <div class="text-5xl">🏪</div>
                            <h3 class="text-lg font-bold text-white">Tidak ada toko yang ditemukan</h3>
                            <p class="text-xs sm:text-sm text-slate-400 max-w-sm mx-auto">
                                Belum ada toko terdaftar untuk pencarian atau filter kota ini. Coba pilih kota lain atau pesan online langsung.
                            </p>
                            <a href="{{ route('stores.index') }}" class="inline-block mt-2 px-5 py-2 rounded-xl bg-tropical-500 text-slate-950 font-bold text-xs uppercase tracking-wider">
                                Tampilkan Semua Toko
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Right Column: Interactive Google Maps Frame (6 Cols - Sticky) -->
                <div id="interactive-map-view" class="lg:col-span-6 lg:sticky lg:top-24 space-y-3">
                    <div class="rounded-2xl glass-panel overflow-hidden p-2 shadow-2xl border border-tropical-400/30">
                        <div class="relative w-full h-[380px] sm:h-[480px] lg:h-[540px] rounded-xl overflow-hidden bg-black/60">
                            <!-- Map Iframe -->
                            <iframe :src="activeMapSrc"
                                    class="w-full h-full border-0"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                            <!-- Floating Map Badge Overlay -->
                            <div class="absolute bottom-3 left-3 right-3 p-3 rounded-xl bg-black/85 backdrop-blur-md border border-white/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2.5 shadow-2xl">
                                <div class="overflow-hidden">
                                    <div class="text-xs font-extrabold text-tropical-400 uppercase tracking-wider flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-tropical-400 animate-ping"></span>
                                        <span x-text="activeStoreName"></span>
                                    </div>
                                    <div class="text-[11px] text-slate-300 truncate max-w-xs sm:max-w-sm mt-0.5" x-text="activeStoreAddress"></div>
                                </div>
                                <a :href="activeStoreMapsUrl"
                                   target="_blank"
                                   class="px-3.5 py-1.5 rounded-lg bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs uppercase tracking-wider transition shrink-0">
                                    Buka Google Maps ↗
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- =========================================================================
         FOOTER
         ========================================================================= -->
    <footer class="w-full pt-6 pb-6 px-4 sm:px-8 border-t border-white/10 bg-black/40 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Logo" class="h-6 w-auto rounded object-contain">
                <span class="text-slate-300 font-semibold">{{ __('messages.company_name') }}</span>
            </div>
            <span>{{ __('messages.footer_copyright') }}</span>
        </div>
    </footer>

</body>

</html>
