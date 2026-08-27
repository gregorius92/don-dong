<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-display font-black text-2xl text-slate-900 leading-tight">
                    Tambah Toko / Outlet Baru
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Masukkan rincian lokasi toko dan koordinat integrasi Google Maps
                </p>
            </div>
            <a href="{{ route('admin.stores.index') }}" class="bg-white text-slate-800 hover:bg-slate-100 text-xs sm:text-sm font-bold px-4 py-2 rounded-xl border border-slate-200 shadow-xs transition flex items-center gap-1.5">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10"
         x-data="{
             storeName: '{{ old('name', '') }}',
             storeCity: '{{ old('city', '') }}',
             storeAddress: '{{ old('address', '') }}',
             storeLat: '{{ old('latitude', '') }}',
             storeLng: '{{ old('longitude', '') }}',
             embedCode: '{{ old('maps_embed', '') }}',
             zoomLevel: 16,
             get currentQueryText() {
                 if (this.storeLat && this.storeLng) {
                     return this.storeLat + ', ' + this.storeLng;
                 }
                 let parts = [];
                 if (this.storeName) parts.push(this.storeName);
                 if (this.storeAddress) parts.push(this.storeAddress);
                 if (this.storeCity) parts.push(this.storeCity);
                 return parts.length > 0 ? parts.join(', ') : 'Indonesia';
             },
             get previewMapUrl() {
                 if (this.embedCode) {
                     let match = this.embedCode.match(/src=[\'\']([^\'\']+)[\'\']/);
                     if (match && match[1]) return match[1];
                     if (this.embedCode.startsWith('http')) return this.embedCode;
                 }
                 if (this.storeLat && this.storeLng) {
                     return 'https://maps.google.com/maps?q=' + encodeURIComponent(this.storeLat + ',' + this.storeLng) + '&hl=id&z=' + this.zoomLevel + '&output=embed';
                 }
                 return 'https://maps.google.com/maps?q=' + encodeURIComponent(this.currentQueryText) + '&hl=id&z=' + this.zoomLevel + '&output=embed';
             },
             get directMapsUrl() {
                 return 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(this.currentQueryText);
             }
         }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.stores.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    <!-- Left Column: Form Fields (7 Cols) -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <!-- Primary Store Details Card -->
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-7 space-y-5">
                            <h2 class="text-base font-black text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <span>🏬</span> Informasi Utama Toko
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Nama Toko -->
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Nama Toko / Outlet <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text"
                                           name="name"
                                           x-model="storeName"
                                           value="{{ old('name') }}"
                                           required
                                           placeholder="Contoh: DonDong Experience Store Grand Indonesia"
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-semibold placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                    @error('name')
                                        <p class="text-xs font-bold text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kota -->
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Kota <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text"
                                           name="city"
                                           x-model="storeCity"
                                           value="{{ old('city') }}"
                                           required
                                           placeholder="Contoh: Jakarta Pusat, Bandung, Surabaya"
                                           list="city-suggestions"
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-semibold placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                    <datalist id="city-suggestions">
                                        <option value="Jakarta Pusat">
                                        <option value="Jakarta Selatan">
                                        <option value="Jakarta Barat">
                                        <option value="Jakarta Utara">
                                        <option value="Jakarta Timur">
                                        <option value="Bandung">
                                        <option value="Surabaya">
                                        <option value="Yogyakarta">
                                        <option value="Semarang">
                                        <option value="Denpasar">
                                        <option value="Medan">
                                        <option value="Makassar">
                                    </datalist>
                                    @error('city')
                                        <p class="text-xs font-bold text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Jam Operasional -->
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Jam Operasional
                                    </label>
                                    <input type="text"
                                           name="opening_hours"
                                           value="{{ old('opening_hours', '10:00 - 22:00 WIB') }}"
                                           placeholder="Contoh: 10:00 - 22:00 WIB"
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-semibold placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>

                                <!-- Alamat Lengkap -->
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Alamat Lengkap <span class="text-red-600">*</span>
                                    </label>
                                    <textarea name="address"
                                              x-model="storeAddress"
                                              rows="3"
                                              required
                                              placeholder="Contoh: Mall Grand Indonesia East Mall Lantai LG No. 12, Jl. M.H. Thamrin No. 1, Menteng"
                                              class="w-full text-sm rounded-xl bg-white text-slate-900 font-medium placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="text-xs font-bold text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- No WhatsApp -->
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Nomor Telepon / WhatsApp
                                    </label>
                                    <input type="text"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           placeholder="Contoh: 081234567890"
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-semibold placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                    <p class="text-[11px] text-slate-500 font-medium mt-1">Pengunjung dapat langsung mengklik tombol WhatsApp untuk chat toko.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Google Maps Parameters Card -->
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-7 space-y-5">
                            <h2 class="text-base font-black text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <span>📍</span> Koordinat & URL Google Maps
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Latitude -->
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                        <span>Latitude</span>
                                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Presisi GPS</span>
                                    </label>
                                    <input type="number"
                                           step="any"
                                           name="latitude"
                                           x-model="storeLat"
                                           value="{{ old('latitude') }}"
                                           placeholder="Contoh: -6.195123"
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-semibold placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>

                                <!-- Longitude -->
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                        <span>Longitude</span>
                                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Presisi GPS</span>
                                    </label>
                                    <input type="number"
                                           step="any"
                                           name="longitude"
                                           x-model="storeLng"
                                           value="{{ old('longitude') }}"
                                           placeholder="Contoh: 106.823456"
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-semibold placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>

                                <!-- Direct Link Maps -->
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Link Langsung Google Maps (URL Rute)
                                    </label>
                                    <input type="url"
                                           name="maps_url"
                                           value="{{ old('maps_url') }}"
                                           placeholder="https://maps.app.goo.gl/... atau https://maps.google.com/?q=..."
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-medium placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>

                                <!-- Custom Embed Iframe -->
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Custom Iframe Embed (Opsional)
                                    </label>
                                    <input type="text"
                                           name="maps_embed"
                                           x-model="embedCode"
                                           value="{{ old('maps_embed') }}"
                                           placeholder='<iframe src="..."></iframe> atau biarkan kosong'
                                           class="w-full text-sm rounded-xl bg-white text-slate-900 font-medium placeholder-slate-400 border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>
                            </div>
                        </div>

                        <!-- Status Toggle & Submit Card -->
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       checked
                                       class="w-5 h-5 rounded border-2 border-slate-400 text-emerald-600 focus:ring-emerald-600">
                                <div>
                                    <div class="text-sm font-black text-slate-900">Tampilkan di Publik (Aktif)</div>
                                    <div class="text-xs text-slate-500 font-medium">Toko akan langsung terlihat pada Store Locator.</div>
                                </div>
                            </label>

                            <div class="flex items-center gap-3 w-full sm:w-auto">
                                <a href="{{ route('admin.stores.index') }}" class="w-full sm:w-auto text-center px-6 py-2.5 bg-slate-100 text-slate-800 hover:bg-slate-200 border border-slate-300 font-black text-xs uppercase tracking-wider rounded-xl transition shadow-xs">
                                    Batal
                                </a>
                                <button type="submit" class="w-full sm:w-auto px-7 py-2.5 bg-emerald-600 text-white font-black text-xs uppercase tracking-wider rounded-xl hover:bg-emerald-700 transition shadow-sm hover:shadow-md">
                                    Simpan Toko
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Sticky Live Map Preview (5 Cols) -->
                    <div class="lg:col-span-5 lg:sticky lg:top-24 space-y-4">
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-5 sm:p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-base font-black text-slate-900 flex items-center gap-1.5">
                                        <span>🗺️</span> Pratinjau Google Maps
                                    </h2>
                                    <p class="text-[11px] text-slate-500 truncate max-w-[240px]">
                                        Fokus: <strong class="text-emerald-700" x-text="currentQueryText"></strong>
                                    </p>
                                </div>
                                
                                <!-- Zoom Controls -->
                                <div class="inline-flex items-center rounded-xl border border-slate-200 bg-slate-100 p-1 text-xs shadow-inner">
                                    <button type="button" @click="if (zoomLevel > 10) zoomLevel--" class="px-2 py-0.5 rounded-lg bg-white hover:bg-slate-200 text-slate-900 font-black border border-slate-200">-</button>
                                    <span class="px-2 font-black text-slate-800" x-text="zoomLevel"></span>
                                    <button type="button" @click="if (zoomLevel < 20) zoomLevel++" class="px-2 py-0.5 rounded-lg bg-white hover:bg-slate-200 text-slate-900 font-black border border-slate-200">+</button>
                                </div>
                            </div>

                            <!-- Map Frame Container -->
                            <div class="w-full h-80 sm:h-96 lg:h-[420px] rounded-2xl overflow-hidden border border-slate-200 shadow-inner bg-slate-100 relative">
                                <iframe :src="previewMapUrl"
                                        class="w-full h-full border-0"
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                            <div class="flex items-center justify-between pt-1">
                                <span class="text-[11px] text-slate-400 font-medium">✨ Real-time interaktif</span>
                                <a :href="directMapsUrl" target="_blank" class="text-xs font-black text-blue-800 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 border border-blue-200 px-3 py-1.5 rounded-xl transition shadow-xs">
                                    Uji di Google Maps ↗
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</x-app-layout>
