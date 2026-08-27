<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display font-black text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Konten Landing Page
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Kustomisasi narasi promosi, headline hero, manfaat vitamin kedondong, dan komposisi gizi
                </p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-800 text-xs font-bold transition shadow-xs flex items-center gap-1.5">
                    <span>🌐</span> Pratinjau Landing Page ↗
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 text-emerald-900 rounded-2xl border border-emerald-300 font-bold shadow-xs flex items-center gap-2 text-sm">
                    <span class="text-lg">✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.landing-page.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- Section 1: Hero Banner -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-black text-slate-900 flex items-center gap-2.5">
                            <span class="p-2 rounded-xl bg-amber-100 text-amber-800 text-base">✨</span>
                            <span>1. Hero Banner Utama</span>
                        </h2>
                        <span class="text-xs font-bold text-slate-400">Bagian paling atas website</span>
                    </div>
                    
                    <div class="space-y-5">
                        <!-- Hero Titles (ID & EN) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Hero Title (Indonesia)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇮🇩 ID</span>
                                </label>
                                <input type="text"
                                       name="hero_title"
                                       value="{{ $content->hero_title }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Hero Title (English)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇬🇧 EN</span>
                                </label>
                                <input type="text"
                                       name="hero_title_en"
                                       value="{{ $content->hero_title_en }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                        </div>

                        <!-- Hero Subtitles (ID & EN) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Hero Subtitle (Indonesia)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇮🇩 ID</span>
                                </label>
                                <textarea name="hero_subtitle"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $content->hero_subtitle }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Hero Subtitle (English)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇬🇧 EN</span>
                                </label>
                                <textarea name="hero_subtitle_en"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $content->hero_subtitle_en }}</textarea>
                            </div>
                        </div>

                        <!-- CTA Configuration -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                    Teks Tombol CTA (ID)
                                </label>
                                <input type="text"
                                       name="hero_cta_text"
                                       value="{{ $content->hero_cta_text }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                    Teks Tombol CTA (EN)
                                </label>
                                <input type="text"
                                       name="hero_cta_text_en"
                                       value="{{ $content->hero_cta_text_en }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5">
                                    Link / URL Tujuan CTA
                                </label>
                                <input type="text"
                                       name="hero_cta_link"
                                       value="{{ $content->hero_cta_link }}"
                                       placeholder="#products atau https://..."
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Manfaat & Keunggulan -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-black text-slate-900 flex items-center gap-2.5">
                            <span class="p-2 rounded-xl bg-emerald-100 text-emerald-800 text-base">🌟</span>
                            <span>2. Manfaat & Khasiat Kedondong</span>
                        </h2>
                        <span class="text-xs font-bold text-slate-400">Nutrisi Vitamin C & Antioksidan</span>
                    </div>
                    
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Judul Manfaat (Indonesia)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇮🇩 ID</span>
                                </label>
                                <input type="text"
                                       name="benefits_title"
                                       value="{{ $content->benefits_title }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Judul Manfaat (English)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇬🇧 EN</span>
                                </label>
                                <input type="text"
                                       name="benefits_title_en"
                                       value="{{ $content->benefits_title_en }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Deskripsi Ringkas Manfaat (Indonesia)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇮🇩 ID</span>
                                </label>
                                <textarea name="benefits_content"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $content->benefits_content }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Deskripsi Ringkas Manfaat (English)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇬🇧 EN</span>
                                </label>
                                <textarea name="benefits_content_en"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $content->benefits_content_en }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Ingredients & Alami -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-black text-slate-900 flex items-center gap-2.5">
                            <span class="p-2 rounded-xl bg-green-100 text-green-800 text-base">🍃</span>
                            <span>3. Komposisi Alami (Ingredients)</span>
                        </h2>
                        <span class="text-xs font-bold text-slate-400">Buah Asli & Kemurnian Rasa</span>
                    </div>
                    
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Judul Komposisi (Indonesia)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇮🇩 ID</span>
                                </label>
                                <input type="text"
                                       name="ingredients_title"
                                       value="{{ $content->ingredients_title }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Judul Komposisi (English)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇬🇧 EN</span>
                                </label>
                                <input type="text"
                                       name="ingredients_title_en"
                                       value="{{ $content->ingredients_title_en }}"
                                       class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Penjelasan Komposisi (Indonesia)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇮🇩 ID</span>
                                </label>
                                <textarea name="ingredients_content"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $content->ingredients_content }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-900 mb-1.5 flex items-center justify-between">
                                    <span>Penjelasan Komposisi (English)</span>
                                    <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">🇬🇧 EN</span>
                                </label>
                                <textarea name="ingredients_content_en"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $content->ingredients_content_en }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky Action Footer Bar -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 sm:p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-slate-500 font-medium">
                        Perubahan akan langsung terlihat di landing page resmi DonDong.
                    </p>
                    <button type="submit"
                            class="w-full sm:w-auto px-8 py-3 bg-emerald-600 text-white font-black text-xs uppercase tracking-wider rounded-xl hover:bg-emerald-700 transition shadow-sm hover:shadow-md">
                        Simpan Semua Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
