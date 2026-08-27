<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-display font-black text-2xl text-slate-900 leading-tight">
                    Edit Produk: <span class="text-emerald-700">{{ $product->name }}</span>
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Perbarui nama, harga display, komposisi nutrisi, atau ganti foto kemasan
                </p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="bg-white text-slate-800 hover:bg-slate-100 text-xs sm:text-sm font-bold px-4 py-2 rounded-xl border border-slate-200 shadow-xs transition flex items-center gap-1.5">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10"
         x-data="{
             imagePreviewUrl: '{{ $product->image_path ? asset('storage/' . $product->image_path) : '' }}',
             previewImage(event) {
                 const file = event.target.files[0];
                 if (file) {
                     this.imagePreviewUrl = URL.createObjectURL(file);
                 }
             }
         }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    <!-- Left Column: Product Info Fields (7 Cols) -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <!-- Main Names & Price Card -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6 sm:p-7 space-y-5">
                            <h2 class="text-base font-black text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <span>🧃</span> Informasi Utama Produk
                            </h2>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Nama Produk (Indonesia) <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name', $product->name) }}"
                                           required
                                           placeholder="Contoh: DonDong! Original Sachet"
                                           class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                    @error('name')
                                        <p class="text-xs font-bold text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Nama Produk (English)
                                    </label>
                                    <input type="text"
                                           name="name_en"
                                           value="{{ old('name_en', $product->name_en) }}"
                                           placeholder="Example: DonDong! Original Box"
                                           class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>

                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Harga / Display Teks <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text"
                                           name="price_display"
                                           value="{{ old('price_display', $product->price_display) }}"
                                           required
                                           placeholder="Contoh: Rp 25.000 / Box (10 Sachet)"
                                           class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                                </div>
                            </div>
                        </div>

                        <!-- Descriptions & Composition Card -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6 sm:p-7 space-y-5">
                            <h2 class="text-base font-black text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <span>📝</span> Deskripsi & Komposisi
                            </h2>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Deskripsi Varian (Indonesia)
                                    </label>
                                    <textarea name="description"
                                              rows="3"
                                              placeholder="Bubuk minuman kedondong asli kemasan sachet praktis..."
                                              class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Deskripsi Varian (English)
                                    </label>
                                    <textarea name="description_en"
                                              rows="3"
                                              placeholder="Enjoy the authentic and fresh taste of original ambarella..."
                                              class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ old('description_en', $product->description_en) }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                        Komposisi Bahan (Ingredients)
                                    </label>
                                    <textarea name="ingredients"
                                              rows="2"
                                              placeholder="Ekstrak Kedondong Alami, Gula Tebu Pilihan, Vitamin C..."
                                              class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ old('ingredients', $product->ingredients) }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Image & Status (5 Cols) -->
                    <div class="lg:col-span-5 space-y-6">
                        
                        <!-- Product Packshot Image Upload Card -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6 sm:p-7 space-y-4">
                            <h2 class="text-base font-black text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                                <span>🖼️</span> Foto Kemasan Produk
                            </h2>

                            <!-- Image Preview Box -->
                            <div class="w-full h-56 rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 flex items-center justify-center overflow-hidden relative shadow-inner p-3">
                                <template x-if="imagePreviewUrl">
                                    <img :src="imagePreviewUrl" alt="Pratinjau Foto" class="h-full w-full object-contain">
                                </template>
                                <template x-if="!imagePreviewUrl">
                                    <div class="text-center text-slate-400 p-4">
                                        <div class="text-4xl mb-2">📸</div>
                                        <div class="text-xs font-bold text-slate-600">Pratinjau Foto Produk</div>
                                    </div>
                                </template>
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                    Ganti Foto (Opsional)
                                </label>
                                <input type="file"
                                       name="image"
                                       accept="image/*"
                                       @change="previewImage"
                                       class="w-full text-xs text-slate-700 font-medium file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-emerald-100 file:text-emerald-800 hover:file:bg-emerald-200 cursor-pointer">
                                <p class="text-[11px] text-slate-500 mt-1 font-medium">Biarkan kosong jika tidak ingin mengubah foto saat ini.</p>
                            </div>
                        </div>

                        <!-- Visibility Card -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6 space-y-4">
                            <h2 class="text-xs font-black uppercase tracking-wider text-slate-500">Status Publikasi</h2>
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                       class="w-5 h-5 rounded border-2 border-slate-400 text-emerald-600 focus:ring-emerald-600">
                                <div>
                                    <div class="text-sm font-black text-slate-900">Aktif di Landing Page & Katalog</div>
                                    <div class="text-xs text-slate-500 font-medium">Varian ini akan langsung dapat dilihat oleh publik.</div>
                                </div>
                            </label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.products.index') }}" class="w-full text-center py-3 bg-slate-100 text-slate-800 hover:bg-slate-200 border border-slate-300 font-black text-xs uppercase tracking-wider rounded-xl transition shadow-xs">
                                Batal
                            </a>
                            <button type="submit" class="w-full py-3 bg-emerald-600 text-white font-black text-xs uppercase tracking-wider rounded-xl hover:bg-emerald-700 transition shadow-sm hover:shadow-md">
                                Simpan Perubahan
                            </button>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
</x-app-layout>
