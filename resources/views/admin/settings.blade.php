<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display font-black text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Pengaturan Global & SEO
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Kelola metadata pencarian Google, nomor hotline WhatsApp, tautan marketplace, dan konfigurasi brand
                </p>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="bg-white text-slate-800 hover:bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-xl font-bold text-xs transition shadow-xs flex items-center gap-1.5">
                <span>🌐</span> Buka Website ↗
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-50 text-emerald-900 rounded-2xl border border-emerald-300 font-bold shadow-xs flex items-center gap-2 text-sm">
                    <span class="text-lg">✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8 space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <h2 class="text-base font-black text-slate-900 flex items-center gap-2">
                        <span>⚙️</span> Konfigurasi Parameter Website
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Nilai parameter di bawah digunakan pada header SEO, tombol beli sekarang, dan informasi footer.</p>
                </div>

                <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-5">
                        @foreach($settings as $setting)
                        <div class="bg-slate-50/60 p-4 sm:p-5 rounded-2xl border border-slate-200/80 space-y-2">
                            <label class="block text-xs font-black uppercase tracking-wider text-slate-900 capitalize flex items-center justify-between">
                                <span>{{ str_replace('_', ' ', $setting->key) }}</span>
                                <span class="text-[10px] font-bold text-slate-400 bg-white px-2 py-0.5 rounded border border-slate-200">key: {{ $setting->key }}</span>
                            </label>

                            @if(strlen($setting->value) > 60 || str_contains($setting->key, 'description') || str_contains($setting->key, 'keywords'))
                                <textarea name="{{ $setting->key }}"
                                          rows="3"
                                          class="w-full rounded-xl bg-white text-slate-900 font-medium text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600 leading-relaxed">{{ $setting->value }}</textarea>
                            @else
                                <input type="text"
                                       name="{{ $setting->key }}"
                                       value="{{ $setting->value }}"
                                       class="w-full rounded-xl bg-white text-slate-900 font-semibold text-sm border-slate-300 shadow-xs focus:border-emerald-600 focus:ring-emerald-600">
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end">
                        <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-slate-900 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-md hover:bg-black transition duration-200">
                            Simpan Seluruh Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
