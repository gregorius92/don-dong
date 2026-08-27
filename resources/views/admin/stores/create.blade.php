<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tambah Toko / Outlet Baru') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Masukkan rincian lokasi toko dan integrasi Google Maps
                </p>
            </div>
            <a href="{{ route('admin.stores.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-semibold flex items-center gap-1">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12"
         x-data="{
             storeName: '{{ old('name', '') }}',
             storeCity: '{{ old('city', '') }}',
             storeAddress: '{{ old('address', '') }}',
             embedCode: '{{ old('maps_embed', '') }}',
             get previewMapUrl() {
                 if (this.embedCode) {
                     let match = this.embedCode.match(/src=[\'\']([^\'\']+)[\'\']/);
                     if (match && match[1]) return match[1];
                     if (this.embedCode.startsWith('http')) return this.embedCode;
                 }
                 let query = (this.storeName + ' ' + this.storeAddress + ' ' + this.storeCity).trim();
                 if (!query) query = 'Indonesia';
                 return 'https://maps.google.com/maps?q=' + encodeURIComponent(query) + '&hl=id&z=15&output=embed';
             }
         }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.stores.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-6">
                    <h3 class="text-base font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span>🏬</span> Informasi Utama Toko
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Toko -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Nama Toko / Outlet <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   x-model="storeName"
                                   value="{{ old('name') }}"
                                   required
                                   placeholder="Contoh: DonDong Experience Store Grand Indonesia"
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            @error('name')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kota -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Kota <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="city"
                                   x-model="storeCity"
                                   value="{{ old('city') }}"
                                   required
                                   placeholder="Contoh: Jakarta Pusat, Bandung, Surabaya, Denpasar"
                                   list="city-suggestions"
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
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
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat Lengkap -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Alamat Lengkap <span class="text-red-500">*</span>
                            </label>
                            <textarea name="address"
                                      x-model="storeAddress"
                                      rows="3"
                                      required
                                      placeholder="Contoh: Mall Grand Indonesia East Mall Lantai LG No. 12, Jl. M.H. Thamrin No. 1, Menteng"
                                      class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No Kontak / WhatsApp -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Nomor Telepon / WhatsApp
                            </label>
                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="Contoh: 081234567890 atau (021) 23580001"
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <p class="text-[11px] text-gray-400 mt-1">Pengunjung dapat langsung mengklik tombol WhatsApp untuk menanyakan stok.</p>
                            @error('phone')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jam Operasional -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Jam Operasional
                            </label>
                            <input type="text"
                                   name="opening_hours"
                                   value="{{ old('opening_hours', '10:00 - 22:00 WIB') }}"
                                   placeholder="Contoh: 10:00 - 22:00 WIB (Buka Setiap Hari)"
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            @error('opening_hours')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Google Maps Integration Section -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-6">
                    <h3 class="text-base font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center justify-between">
                        <span class="flex items-center gap-2"><span>🗺️</span> Integrasi Google Maps</span>
                        <span class="text-xs font-normal text-green-600 bg-green-50 px-2.5 py-1 rounded-full">✨ Auto Live Preview</span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Direct Link Maps -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Link Langsung Google Maps (URL)
                            </label>
                            <input type="url"
                                   name="maps_url"
                                   value="{{ old('maps_url') }}"
                                   placeholder="https://maps.app.goo.gl/... atau https://maps.google.com/?q=..."
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <p class="text-[11px] text-gray-400 mt-1">Digunakan untuk tombol "Buka Petunjuk Arah" di smartphone user.</p>
                        </div>

                        <!-- Embed Code / URL -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Custom Google Maps Embed / Iframe (Opsional)
                            </label>
                            <input type="text"
                                   name="maps_embed"
                                   x-model="embedCode"
                                   value="{{ old('maps_embed') }}"
                                   placeholder='Paste iframe <iframe src="..."> atau biarkan kosong untuk auto-generate'
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <p class="text-[11px] text-gray-400 mt-1">Jika dikosongkan, peta akan otomatis di-generate dari Nama Toko & Alamat.</p>
                        </div>

                        <!-- Optional Coordinates -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Latitude (Opsional)
                            </label>
                            <input type="number"
                                   step="any"
                                   name="latitude"
                                   value="{{ old('latitude') }}"
                                   placeholder="-6.195123"
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Longitude (Opsional)
                            </label>
                            <input type="number"
                                   step="any"
                                   name="longitude"
                                   value="{{ old('longitude') }}"
                                   placeholder="106.823456"
                                   class="w-full text-sm rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Live Map Preview Box -->
                    <div class="pt-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2 flex items-center justify-between">
                            <span>Pratinjau Peta Google Maps</span>
                            <span class="text-[11px] font-normal text-gray-400">Peta otomatis sinkron dengan nama & alamat di atas</span>
                        </label>
                        <div class="w-full h-64 sm:h-72 rounded-xl overflow-hidden border border-gray-200 shadow-inner bg-gray-100 relative">
                            <iframe :src="previewMapUrl"
                                    class="w-full h-full border-0"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Status & Actions -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                               class="w-5 h-5 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <div>
                            <div class="text-sm font-bold text-gray-800">Tampilkan di Publik (Aktif)</div>
                            <div class="text-xs text-gray-400">Toko akan langsung terlihat pada halaman Store Locator publik.</div>
                        </div>
                    </label>

                    <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                        <a href="{{ route('admin.stores.index') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-600 hover:text-gray-800 transition">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-green-600 text-white font-bold text-sm rounded-xl hover:bg-green-700 transition shadow-md">
                            Simpan Toko
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
