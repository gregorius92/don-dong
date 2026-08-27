<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Left: Brand & Navigation Links -->
            <div class="flex items-center gap-6 lg:gap-8">
                <!-- Brand Emblem -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 group shrink-0">
                    <div class="h-9 w-9 rounded-xl bg-white border border-slate-200 p-0.5 flex items-center justify-center overflow-hidden group-hover:ring-2 group-hover:ring-emerald-500 transition-all shadow-xs">
                        <img src="{{ asset('images/logo_dondong_official_asli.svg') }}" alt="Dong Emblem" class="h-full w-full object-contain">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black uppercase tracking-[0.2em] text-emerald-600">Kedondong Asli</span>
                        <span class="text-sm font-display font-black text-slate-900 leading-tight">DONG <span class="text-xs font-bold text-slate-400">CMS</span></span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center gap-1.5">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-800 border border-emerald-300/80 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <span>📊</span> <span>Dashboard</span>
                    </a>

                    <!-- Landing Page -->
                    <a href="{{ route('admin.landing-page.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.landing-page.*') ? 'bg-emerald-50 text-emerald-800 border border-emerald-300/80 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <span>✨</span> <span>Landing Page</span>
                    </a>

                    <!-- Produk -->
                    <a href="{{ route('admin.products.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.products.*') ? 'bg-emerald-50 text-emerald-800 border border-emerald-300/80 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <span>📦</span> <span>Produk</span>
                    </a>

                    <!-- Toko -->
                    <a href="{{ route('admin.stores.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.stores.*') ? 'bg-emerald-50 text-emerald-800 border border-emerald-300/80 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <span>🏬</span> <span>Toko</span>
                    </a>

                    <!-- Pengaturan -->
                    <a href="{{ route('admin.settings.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-50 text-emerald-800 border border-emerald-300/80 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <span>⚙️</span> <span>Pengaturan</span>
                    </a>

                    <!-- Testimoni -->
                    <a href="{{ route('admin.testimonials.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.testimonials.*') ? 'bg-emerald-50 text-emerald-800 border border-emerald-300/80 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <span>💬</span> <span>Testimoni</span>
                    </a>
                </div>
            </div>

            <!-- Right: Quick Live Site & User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:gap-3">
                <!-- Live Site Link -->
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition border border-slate-200 shadow-xs">
                    <span>🌐</span> <span>Live Site</span> <span>↗</span>
                </a>

                <!-- User Dropdown (Alpine) -->
                <div class="relative" x-data="{ userMenuOpen: false }">
                    <button @click="userMenuOpen = !userMenuOpen"
                            class="flex items-center gap-2.5 p-1.5 pr-3 rounded-xl hover:bg-slate-100 border border-transparent hover:border-slate-200 transition">
                        <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shadow-xs">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="text-left hidden md:block">
                            <div class="text-xs font-bold text-slate-900 leading-tight">{{ Auth::user()->name }}</div>
                            <div class="text-[10px] text-slate-500">Administrator</div>
                        </div>
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Content -->
                    <div x-show="userMenuOpen"
                         x-cloak
                         @click.away="userMenuOpen = false"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-200 py-2 z-50 space-y-1">
                        
                        <div class="px-4 py-2 border-b border-slate-100">
                            <div class="text-xs font-black text-slate-900">{{ Auth::user()->name }}</div>
                            <div class="text-[11px] text-slate-500 truncate">{{ Auth::user()->email }}</div>
                        </div>

                        <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 hover:text-emerald-700">
                            <span>🌐</span> Buka Website Utama
                        </a>
                        <a href="{{ route('stores.index') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 hover:text-emerald-700">
                            <span>📍</span> Buka Store Locator
                        </a>

                        <div class="border-t border-slate-100 pt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-xs font-black text-rose-600 hover:bg-rose-50 transition">
                                    <span>🚪</span> {{ __('Keluar (Log Out)') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile Drawer) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-4 space-y-1 shadow-lg">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-700 hover:bg-slate-50' }}">
            <span>📊</span> Dashboard
        </a>
        <a href="{{ route('admin.landing-page.index') }}"
           class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('admin.landing-page.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-700 hover:bg-slate-50' }}">
            <span>✨</span> Landing Page
        </a>
        <a href="{{ route('admin.products.index') }}"
           class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('admin.products.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-700 hover:bg-slate-50' }}">
            <span>📦</span> Produk
        </a>
        <a href="{{ route('admin.stores.index') }}"
           class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('admin.stores.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-700 hover:bg-slate-50' }}">
            <span>🏬</span> Toko / Outlet
        </a>
        <a href="{{ route('admin.settings.index') }}"
           class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-700 hover:bg-slate-50' }}">
            <span>⚙️</span> Pengaturan
        </a>
        <a href="{{ route('admin.testimonials.index') }}"
           class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('admin.testimonials.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-700 hover:bg-slate-50' }}">
            <span>💬</span> Testimoni
        </a>

        <!-- Mobile User Info & Logout -->
        <div class="pt-4 border-t border-slate-100 mt-3 space-y-2">
            <div class="flex items-center gap-2.5 px-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <div class="text-xs font-black text-slate-900">{{ Auth::user()->name }}</div>
                    <div class="text-[10px] text-slate-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full mt-2 py-2.5 text-center bg-rose-50 text-rose-700 rounded-xl text-xs font-black hover:bg-rose-100 transition">
                    🚪 Keluar (Log Out)
                </button>
            </form>
        </div>
    </div>
</nav>
