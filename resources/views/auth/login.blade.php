<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden bg-[#051108]">
        
        <!-- Ambient Glow Background -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-tropical-500/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-tropical-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-md relative z-10 space-y-6">

            <!-- Brand Header -->
            <div class="text-center space-y-3">
                <a href="{{ route('home') }}" class="inline-flex flex-col items-center group">
                    <div class="h-16 w-16 rounded-2xl bg-black/60 backdrop-blur-md border border-white/20 p-1 flex items-center justify-center shadow-2xl group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Official Logo" class="h-full w-full object-cover rounded-xl">
                    </div>
                    <div class="mt-3 flex flex-col items-center">
                        <span class="text-xs font-extrabold uppercase tracking-[0.25em] text-tropical-400">NutriSari</span>
                        <span class="text-2xl font-display font-black text-white tracking-tight group-hover:text-tropical-300 transition-colors">DONDONG</span>
                    </div>
                </a>
                <div>
                    <h1 class="text-lg font-bold text-white tracking-tight">Portal Administrasi</h1>
                    <p class="text-xs text-slate-400">Kelola katalog produk, lokasi outlet toko, dan konten website</p>
                </div>
            </div>

            <!-- Login Card -->
            <div class="bg-black/60 backdrop-blur-xl rounded-3xl p-6 sm:p-8 border border-white/15 shadow-2xl space-y-5"
                 x-data="{ showPassword: false }">

                <!-- Session Status / Errors -->
                @if(session('status'))
                    <div class="p-3.5 bg-emerald-950/80 border border-emerald-500/40 rounded-xl text-emerald-300 text-xs font-semibold flex items-center gap-2">
                        <span>ℹ️</span>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="p-3.5 bg-rose-950/80 border border-rose-500/40 rounded-xl text-rose-300 text-xs font-medium space-y-1">
                        <div class="font-bold flex items-center gap-1.5 text-rose-200">
                            <span>⚠️</span> Terjadi kesalahan:
                        </div>
                        <ul class="list-disc list-inside space-y-0.5 text-[11px]">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-1.5">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                ✉️
                            </div>
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   placeholder="admin@dondong.id"
                                   class="auth-input">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300">
                                Kata Sandi
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[11px] font-bold text-tropical-400 hover:text-tropical-300 transition">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                🔒
                            </div>
                            <input id="password"
                                   :type="showPassword ? 'text' : 'password'"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="••••••••"
                                   class="auth-input !pr-16">
                            <button type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-white transition text-xs font-bold"
                                    tabindex="-1">
                                <span x-text="showPassword ? 'Sembunyi' : 'Lihat'"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="w-4 h-4 rounded border-white/20 bg-white/5 text-tropical-500 focus:ring-tropical-400 focus:ring-offset-0">
                            <span class="ml-2 text-xs text-slate-300 font-medium">Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-tropical-500 to-tropical-600 hover:from-tropical-400 hover:to-tropical-500 text-slate-950 font-display font-black text-sm uppercase tracking-wider transition duration-200 shadow-lg shadow-tropical-500/20 active:scale-[0.99] flex items-center justify-center gap-2">
                            <span>Masuk ke Dashboard</span>
                            <span>&rarr;</span>
                        </button>
                    </div>
                </form>

            </div>

            <!-- Footer Link -->
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-tropical-300 font-bold transition">
                    <span>&larr;</span> <span>Kembali ke Website Utama DonDong!</span>
                </a>
            </div>

        </div>

    </div>
</x-guest-layout>
