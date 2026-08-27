<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display font-black text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Moderasi Ulasan & Testimoni
                </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">
                    Kelola ulasan pengunjung website, rating bintang, dan persetujuan tayang di landing page
                </p>
            </div>
            <a href="{{ route('home') }}#reviews" target="_blank" class="bg-white text-slate-800 hover:bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-xl font-bold text-xs transition shadow-xs flex items-center gap-1.5">
                <span>💬</span> Lihat Testimoni Publik ↗
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-50 text-emerald-900 rounded-2xl border border-emerald-300 font-bold shadow-xs flex items-center gap-2 text-sm">
                    <span class="text-lg">✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Summary Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-slate-500">Total Ulasan</div>
                        <div class="text-2xl font-display font-black text-slate-900 mt-1">{{ count($testimonials) }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center text-xl font-bold">
                        💬
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-emerald-700">Ditampilkan di Web</div>
                        <div class="text-2xl font-display font-black text-emerald-700 mt-1">{{ $testimonials->where('is_visible', true)->count() }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl font-bold">
                        🟢
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <div class="text-xs font-black uppercase tracking-wider text-amber-700">Rata-Rata Rating</div>
                        <div class="text-2xl font-display font-black text-amber-700 mt-1">
                            {{ count($testimonials) > 0 ? number_format($testimonials->avg('rating'), 1) : '5.0' }} / 5.0 ⭐
                        </div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center text-xl font-bold">
                        ⭐
                    </div>
                </div>
            </div>

            <!-- Testimonials Table -->
            <div class="bg-white overflow-hidden shadow-xs rounded-2xl border border-slate-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-100/80 text-xs font-black uppercase tracking-wider text-slate-700">
                            <tr>
                                <th class="px-6 py-4 text-left">Pengirim & Tanggal</th>
                                <th class="px-6 py-4 text-left">Isi Ulasan Testimoni</th>
                                <th class="px-6 py-4 text-center">Rating</th>
                                <th class="px-6 py-4 text-center">Status Tayang</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200 text-sm">
                            @forelse($testimonials as $testimonial)
                            <tr class="hover:bg-slate-50/80 transition">
                                <!-- Author -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-900 font-black text-xs flex items-center justify-center border border-emerald-300">
                                            {{ substr($testimonial->author_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-extrabold text-slate-900 text-sm">{{ $testimonial->author_name }}</div>
                                            <div class="text-[11px] text-slate-400 font-medium">{{ $testimonial->created_at ? $testimonial->created_at->format('d M Y') : 'Baru' }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Content -->
                                <td class="px-6 py-4 max-w-md">
                                    <div class="text-xs text-slate-700 font-medium leading-relaxed italic bg-slate-50/80 p-3 rounded-xl border border-slate-100">
                                        "{{ $testimonial->content }}"
                                    </div>
                                </td>

                                <!-- Rating Stars -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="inline-flex items-center gap-1 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-xl text-xs font-black text-amber-800">
                                        <span>{{ str_repeat('⭐', $testimonial->rating) }}</span>
                                        <span>({{ $testimonial->rating }})</span>
                                    </div>
                                </td>

                                <!-- Status Badge -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-black rounded-full border shadow-xs {{ $testimonial->is_visible ? 'bg-emerald-100 text-emerald-900 border-emerald-300' : 'bg-slate-200 text-slate-700 border-slate-300' }}">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 my-auto {{ $testimonial->is_visible ? 'bg-emerald-600' : 'bg-slate-500' }}"></span>
                                        {{ $testimonial->is_visible ? 'Ditampilkan' : 'Disembunyikan' }}
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-black space-x-2">
                                    <form action="{{ route('admin.testimonials.toggle', $testimonial) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-block px-3 py-1.5 rounded-xl border transition shadow-xs {{ $testimonial->is_visible ? 'bg-slate-100 text-slate-800 border-slate-300 hover:bg-slate-200' : 'bg-emerald-50 text-emerald-900 border-emerald-300 hover:bg-emerald-100' }}">
                                            {{ $testimonial->is_visible ? '👁️ Sembunyikan' : '✅ Tayangkan' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni dari {{ $testimonial->author_name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-50 text-rose-800 border border-rose-300 px-3 py-1.5 rounded-xl hover:bg-rose-100 transition shadow-xs">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-14 text-center text-slate-500">
                                    <div class="text-5xl mb-3">💬</div>
                                    <div class="text-base font-bold text-slate-800">Belum ada testimoni masuk</div>
                                    <p class="text-xs text-slate-500 mt-1">Ulasan dari formulir landing page akan muncul di sini.</p>
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
