<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display font-black text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Dashboard Administrasi
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Ringkasan performa dan manajemen konten website NutriSari DonDong
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('stores.index') }}" target="_blank" class="px-4 py-2 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs font-bold transition shadow-xs flex items-center gap-1.5">
                    <span>📍</span> Store Locator ↗
                </a>
                <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black transition shadow-sm flex items-center gap-1.5">
                    <span>🌐</span> Buka Website ↗
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Hero Welcome Card -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-emerald-900 via-emerald-950 to-slate-950 p-6 sm:p-8 text-white shadow-xl border border-emerald-800/40">
                <div class="relative z-10 max-w-2xl space-y-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-extrabold uppercase tracking-wider">
                        <span>👋</span> <span>Selamat Datang Kembali, {{ Auth::user()->name }}!</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-display font-black text-white leading-tight">
                        Pusat Kontrol & Manajemen Resmi DonDong!
                    </h2>
                    <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed font-light">
                        Kelola katalog produk minuman kedondong asli, titik lokasi outlet toko resmi di berbagai kota dengan integrasi Google Maps, kurasi testimoni pelanggan, dan optimasi SEO.
                    </p>
                </div>
                <!-- Background Decoration Emblem -->
                <div class="absolute -right-8 -bottom-8 w-48 h-48 opacity-20 pointer-events-none">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="Watermark" class="w-full h-full object-cover rounded-full">
                </div>
            </div>

            <!-- 4 Metrics Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Stat 1: Produk -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between hover:border-emerald-300 transition-all group">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-slate-500">Katalog Produk</div>
                        <div class="text-3xl font-display font-black text-slate-900 mt-1">{{ $productCount }}</div>
                        <a href="{{ route('admin.products.index') }}" class="text-[11px] font-bold text-emerald-600 group-hover:underline mt-1.5 inline-block">
                            Kelola Produk &rarr;
                        </a>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-2xl font-bold border border-emerald-200">
                        📦
                    </div>
                </div>

                <!-- Stat 2: Toko & Outlet -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between hover:border-emerald-300 transition-all group">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-slate-500">Toko & Outlet</div>
                        <div class="text-3xl font-display font-black text-emerald-700 mt-1">{{ \App\Models\Store::count() }}</div>
                        <a href="{{ route('admin.stores.index') }}" class="text-[11px] font-bold text-emerald-600 group-hover:underline mt-1.5 inline-block">
                            Kelola Toko &rarr;
                        </a>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-2xl font-bold border border-emerald-200">
                        🏬
                    </div>
                </div>

                <!-- Stat 3: Kota Jangkauan -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between hover:border-amber-300 transition-all group">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-slate-500">Kota Jangkauan</div>
                        <div class="text-3xl font-display font-black text-amber-700 mt-1">{{ \App\Models\Store::select('city')->distinct()->count() }}</div>
                        <a href="{{ route('admin.stores.index') }}" class="text-[11px] font-bold text-amber-600 group-hover:underline mt-1.5 inline-block">
                            Filter Kota &rarr;
                        </a>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center text-2xl font-bold border border-amber-200">
                        🗺️
                    </div>
                </div>

                <!-- Stat 4: Testimoni -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs flex items-center justify-between hover:border-purple-300 transition-all group">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-slate-500">Ulasan & Rating</div>
                        <div class="text-3xl font-display font-black text-purple-700 mt-1">{{ $testimonialCount }}</div>
                        <a href="{{ route('admin.testimonials.index') }}" class="text-[11px] font-bold text-purple-600 group-hover:underline mt-1.5 inline-block">
                            Moderasi Ulasan &rarr;
                        </a>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-700 flex items-center justify-center text-2xl font-bold border border-purple-200">
                        💬
                    </div>
                </div>
            </div>

            <!-- Quick Management Navigation Cards -->
            <div class="space-y-4">
                <h3 class="text-base font-black text-slate-900 tracking-tight flex items-center gap-2">
                    <span>⚡</span> Menu Manajemen Cepat
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                    <!-- Card 1: Toko -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl font-bold mb-4">
                                🏪
                            </div>
                            <h4 class="font-bold text-base text-slate-900 mb-1">Manajemen Toko</h4>
                            <p class="text-xs text-slate-500 leading-relaxed mb-4">
                                Tambah lokasi toko baru, sinkronkan Google Maps & koordinat, serta atur nomor kontak WhatsApp.
                            </p>
                        </div>
                        <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
                            <a href="{{ route('admin.stores.index') }}" class="flex-1 text-center py-2 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold rounded-xl transition">
                                Daftar Toko
                            </a>
                            <a href="{{ route('admin.stores.create') }}" class="px-3 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black rounded-xl transition shadow-xs">
                                + Tambah
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Produk -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-800 flex items-center justify-center text-xl font-bold mb-4">
                                🧃
                            </div>
                            <h4 class="font-bold text-base text-slate-900 mb-1">Katalog Produk</h4>
                            <p class="text-xs text-slate-500 leading-relaxed mb-4">
                                Kelola varian rasa sachet, botol, deskripsi komposisi gizi (ID/EN), dan upload packshot produk.
                            </p>
                        </div>
                        <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
                            <a href="{{ route('admin.products.index') }}" class="flex-1 text-center py-2 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold rounded-xl transition">
                                Daftar Produk
                            </a>
                            <a href="{{ route('admin.products.create') }}" class="px-3 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black rounded-xl transition shadow-xs">
                                + Tambah
                            </a>
                        </div>
                    </div>

                    <!-- Card 3: Landing Page -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl font-bold mb-4">
                                ✨
                            </div>
                            <h4 class="font-bold text-base text-slate-900 mb-1">Konten Landing Page</h4>
                            <p class="text-xs text-slate-500 leading-relaxed mb-4">
                                Sesuaikan headline hero banner, cerita buah kedondong, manfaat nutrisi, dan teks tombol CTA.
                            </p>
                        </div>
                        <div class="pt-2 border-t border-slate-100">
                            <a href="{{ route('admin.landing-page.index') }}" class="block w-full text-center py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black rounded-xl transition shadow-xs">
                                Edit Konten &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- Card 4: Pengaturan & SEO -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center text-xl font-bold mb-4">
                                ⚙️
                            </div>
                            <h4 class="font-bold text-base text-slate-900 mb-1">Pengaturan & SEO</h4>
                            <p class="text-xs text-slate-500 leading-relaxed mb-4">
                                Atur meta title, deskripsi SEO Google, link official store Shopee & Tokopedia, serta hotline WhatsApp.
                            </p>
                        </div>
                        <div class="pt-2 border-t border-slate-100">
                            <a href="{{ route('admin.settings.index') }}" class="block w-full text-center py-2 bg-slate-800 hover:bg-slate-900 text-white text-xs font-black rounded-xl transition shadow-xs">
                                Buka Pengaturan &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
