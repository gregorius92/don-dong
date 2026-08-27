<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() == 'en' ? ($settings['meta_title_en'] ?? $settings['meta_title'] ?? 'DonDong! - Fresh Authentic Ambarella') : ($settings['meta_title'] ?? 'DonDong! - Segarnya Kedondong Asli & Ekstrak Alami') }}</title>
    <meta name="description" content="{{ app()->getLocale() == 'en' ? ($settings['meta_description_en'] ?? $settings['meta_description'] ?? 'Experience the pure tropical sensation of authentic Ambarella fruit juice and powder.') : ($settings['meta_description'] ?? 'Sensasi kesegaran buah kedondong asli pilihan. Nikmati minuman dingin segar dan serbuk buah alami DonDong!') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        [x-cloak] { display: none !important; }
        
        /* Particle canvas background */
        #bubblesCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        /* Subtle mesh background */
        .tropical-radial-glow {
            background: radial-gradient(circle at 50% 20%, rgba(34, 197, 94, 0.15) 0%, rgba(245, 158, 11, 0.08) 35%, rgba(255, 255, 255, 0) 70%);
        }

        .ambient-mesh {
            background: 
                radial-gradient(at 0% 0%, rgba(34, 197, 94, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(245, 158, 11, 0.12) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(16, 185, 129, 0.08) 0px, transparent 50%);
        }

        .glass-pill {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .product-card-shine {
            position: relative;
            overflow: hidden;
        }
        .product-card-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(60deg, transparent 40%, rgba(255, 255, 255, 0.4) 50%, transparent 60%);
            transform: translateX(-100%);
            transition: transform 0.8s ease;
        }
        .product-card-shine:hover::after {
            transform: translateX(100%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased overflow-x-hidden selection:bg-green-500 selection:text-white" x-data="{ mobileMenuOpen: false, activeTab: 'all' }">

    <!-- Top Glow Effect -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-green-300/20 via-yellow-200/10 to-transparent blur-3xl pointer-events-none -z-10"></div>

    <!-- Floating Navigation Bar -->
    <header class="fixed top-4 left-0 right-0 z-50 px-4 md:px-8 max-w-7xl mx-auto">
        <nav class="glass-pill rounded-full px-6 py-3.5 flex items-center justify-between shadow-lg shadow-green-950/5 border border-white/60 transition-all duration-300">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center space-x-2 group">
                <span class="w-9 h-9 rounded-2xl bg-gradient-to-tr from-green-600 to-yellow-400 flex items-center justify-center text-white shadow-md shadow-green-600/30 group-hover:scale-105 transition transform">
                    🍃
                </span>
                <span class="text-2xl font-black tracking-tight text-slate-900">
                    DonDong<span class="text-yellow-500 animate-pulse">!</span>
                </span>
            </a>
            
            <!-- Desktop Menu Links -->
            <div class="hidden md:flex items-center space-x-1 font-semibold text-sm text-slate-600 bg-white/50 p-1.5 rounded-full border border-slate-200/50">
                <a href="#about" class="px-4 py-2 rounded-full hover:text-green-700 hover:bg-white/80 transition">{{ __('messages.about') }}</a>
                <a href="#products" class="px-4 py-2 rounded-full hover:text-green-700 hover:bg-white/80 transition">{{ __('messages.products') }}</a>
                <a href="#benefits" class="px-4 py-2 rounded-full hover:text-green-700 hover:bg-white/80 transition">{{ __('messages.benefits') }}</a>
                <a href="#testimonials" class="px-4 py-2 rounded-full hover:text-green-700 hover:bg-white/80 transition">{{ __('messages.testimonials') }}</a>
            </div>

            <!-- Right Action & Language Switcher -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Language Selector -->
                <div class="flex items-center bg-white/70 rounded-full p-1 border border-slate-200/60 text-xs font-bold shadow-inner">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-2.5 py-1 rounded-full transition {{ app()->getLocale() == 'id' ? 'bg-green-600 text-white shadow-sm' : 'text-slate-500 hover:text-green-600' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-2.5 py-1 rounded-full transition {{ app()->getLocale() == 'en' ? 'bg-green-600 text-white shadow-sm' : 'text-slate-500 hover:text-green-600' }}">EN</a>
                </div>

                <!-- Direct WhatsApp CTA -->
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo%20DonDong!%20Saya%20ingin%20pesan%20produk%20segar%20DonDong." 
                   target="_blank"
                   class="px-5 py-2.5 rounded-full bg-gradient-to-r from-green-600 via-green-500 to-emerald-600 text-white font-bold text-sm shadow-md shadow-green-600/25 hover:shadow-lg hover:shadow-green-600/40 hover:-translate-y-0.5 transition-all flex items-center space-x-2">
                    <span>{{ __('messages.buy_now') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center space-x-2">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="w-10 h-10 rounded-full bg-white/80 border border-slate-200/60 flex items-center justify-center text-slate-700 hover:text-green-600 focus:outline-none shadow-sm" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileMenuOpen" 
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
             class="md:hidden mt-3 bg-white/95 backdrop-blur-2xl rounded-3xl p-6 shadow-2xl border border-white/80 space-y-4">
            <div class="flex flex-col space-y-2 font-semibold text-slate-700">
                <a href="#about" @click="mobileMenuOpen = false" class="px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-green-600 transition">{{ __('messages.about') }}</a>
                <a href="#products" @click="mobileMenuOpen = false" class="px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-green-600 transition">{{ __('messages.products') }}</a>
                <a href="#benefits" @click="mobileMenuOpen = false" class="px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-green-600 transition">{{ __('messages.benefits') }}</a>
                <a href="#testimonials" @click="mobileMenuOpen = false" class="px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-green-600 transition">{{ __('messages.testimonials') }}</a>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center space-x-1 bg-slate-100 rounded-full p-1 text-xs font-bold">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1.5 rounded-full {{ app()->getLocale() == 'id' ? 'bg-green-600 text-white' : 'text-slate-600' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1.5 rounded-full {{ app()->getLocale() == 'en' ? 'bg-green-600 text-white' : 'text-slate-600' }}">EN</a>
                </div>
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" @click="mobileMenuOpen = false" class="px-6 py-3 bg-green-600 text-white rounded-full font-bold text-sm shadow-lg shadow-green-600/30">
                    {{ __('messages.buy_now') }}
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section with Dynamic Bubbles Canvas & Mesh Background -->
    <section class="relative min-h-[92vh] flex items-center pt-32 pb-20 overflow-hidden ambient-mesh">
        <!-- Interactive HTML5 Canvas Particle Engine -->
        <canvas id="bubblesCanvas"></canvas>

        <!-- Ambient Background Glows -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-3xl animate-blob -z-0 pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-400/20 rounded-full blur-3xl animate-blob [animation-delay:4s] -z-0 pointer-events-none"></div>
        
        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                
                <!-- Left Hero Copy -->
                <div class="lg:w-7/12 text-center lg:text-left">
                    <!-- Fresh Status Pill -->
                    <div class="inline-flex items-center space-x-2.5 px-4 py-2 rounded-full bg-white/80 backdrop-blur-md border border-green-200/80 text-green-800 text-xs md:text-sm font-bold mb-6 shadow-sm shadow-green-900/5 animate-pulse-slow">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                        <span class="w-2 h-2 rounded-full bg-emerald-600 -ml-4"></span>
                        <span class="tracking-wide uppercase font-black text-emerald-700">{{ __('messages.100_real_fruit') }}</span>
                        <span class="text-slate-300">•</span>
                        <span class="text-slate-600 font-medium">Fresh Cold-Pressed & Pure Extract</span>
                    </div>

                    <!-- Main Dynamic Headline -->
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight text-slate-900 leading-[1.08] mb-6">
                        {{ $content->translate('hero_title') }}
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg sm:text-xl text-slate-600 mb-10 leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                        {{ $content->translate('hero_subtitle') }}
                    </p>

                    <!-- Interactive Dual CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ $content->translate('hero_cta_link') ?: 'https://wa.me/' . ($settings['whatsapp_number'] ?? '') }}" 
                           target="_blank"
                           class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-green-600 via-emerald-600 to-green-700 text-white rounded-2xl font-bold text-lg hover:shadow-2xl hover:shadow-green-600/40 transform hover:-translate-y-1 transition-all flex items-center justify-center space-x-3 group">
                            <span>{{ $content->translate('hero_cta_text') }}</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#products" 
                           class="w-full sm:w-auto px-8 py-4 bg-white/80 backdrop-blur-md border-2 border-slate-200/80 text-slate-800 rounded-2xl font-bold text-lg hover:bg-white hover:border-green-600 hover:text-green-700 transition-all flex items-center justify-center space-x-2">
                            <span>{{ __('messages.see_products') }}</span>
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Micro Feature Highlights -->
                    <div class="mt-12 pt-8 border-t border-slate-200/60 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-sm font-semibold text-slate-600">
                        <div class="flex items-center space-x-2">
                            <span class="w-5 h-5 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-xs font-black">✓</span>
                            <span>Tanpa Pemanis Buatan</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-5 h-5 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-xs font-black">✓</span>
                            <span>Kaya Vitamin C Alami</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-5 h-5 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-xs font-black">✓</span>
                            <span>Dipetik dari Kebun Lokal</span>
                        </div>
                    </div>
                </div>

                <!-- Right Hero 3D Bento Glass Card -->
                <div class="lg:w-5/12 relative w-full max-w-lg mx-auto">
                    <!-- Glass Spotlight Background -->
                    <div class="relative bg-gradient-to-b from-white/90 via-white/50 to-white/30 backdrop-blur-2xl rounded-[3rem] p-8 md:p-10 border border-white/90 shadow-2xl shadow-green-950/10">
                        
                        <!-- Floating Fruit Product Image -->
                        <div class="relative z-10 py-6 animate-float flex justify-center items-center">
                            <img src="{{ asset('storage/' . ($content->hero_image_path ?? 'images/product.png')) }}" 
                                 alt="DonDong Juice & Powder" 
                                 class="max-h-[380px] w-auto object-contain drop-shadow-[0_35px_35px_rgba(22,163,74,0.3)] hover:scale-105 transition-transform duration-500">
                        </div>

                        <!-- Floating Micro Badge 1 (Top Left) -->
                        <div class="absolute -top-4 -left-4 bg-white/95 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 flex items-center space-x-2.5 animate-float-delayed">
                            <span class="text-xl">⚡</span>
                            <div>
                                <div class="text-[10px] uppercase tracking-wider font-extrabold text-slate-400">Immune Boost</div>
                                <div class="text-xs font-bold text-slate-800">Tinggi Vitamin C</div>
                            </div>
                        </div>

                        <!-- Floating Micro Badge 2 (Bottom Right) -->
                        <div class="absolute -bottom-4 -right-4 bg-white/95 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-xl shadow-slate-900/5 border border-slate-100 flex items-center space-x-2.5 animate-float">
                            <span class="text-xl">🌿</span>
                            <div>
                                <div class="text-[10px] uppercase tracking-wider font-extrabold text-slate-400">100% Pure</div>
                                <div class="text-xs font-bold text-slate-800">Kedondong Pilihan</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Why DonDong Section (Modern Bento Grid) -->
    <section id="benefits" class="py-24 relative bg-white border-y border-slate-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-green-600 font-extrabold text-sm uppercase tracking-widest">{{ __('messages.benefits') }}</span>
                <h2 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2 mb-4 tracking-tight">
                    {{ $content->translate('benefits_title') }}
                </h2>
                <p class="text-slate-600 text-lg">Setiap tetes dan butiran DonDong menghadirkan kebaikan alami buah kedondong tropis untuk tubuh bertenaga sepanjang hari.</p>
            </div>

            <!-- Modern 4-Card Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Bento Card 1: 100% Organik & Alami -->
                <div class="group bg-gradient-to-br from-emerald-500/10 via-emerald-500/5 to-transparent p-8 rounded-3xl border border-emerald-500/20 hover:border-emerald-500/50 hover:shadow-xl hover:shadow-emerald-950/5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-emerald-600/30 mb-6 group-hover:scale-110 transition-transform">
                            🌿
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('messages.benefit_1_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">{{ __('messages.benefit_1_desc') }}</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-emerald-200/50 text-xs font-bold text-emerald-700 flex items-center space-x-1">
                        <span>Alami Tanpa Pengawet</span>
                    </div>
                </div>

                <!-- Bento Card 2: Kesegaran Instan -->
                <div class="group bg-gradient-to-br from-amber-500/10 via-amber-500/5 to-transparent p-8 rounded-3xl border border-amber-500/20 hover:border-amber-500/50 hover:shadow-xl hover:shadow-amber-950/5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-amber-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-amber-500/30 mb-6 group-hover:scale-110 transition-transform">
                            ⚡
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('messages.benefit_2_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">{{ __('messages.benefit_2_desc') }}</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-amber-200/50 text-xs font-bold text-amber-700 flex items-center space-x-1">
                        <span>Energy & Mood Booster</span>
                    </div>
                </div>

                <!-- Bento Card 3: Praktis Siap Seduh -->
                <div class="group bg-gradient-to-br from-lime-500/10 via-lime-500/5 to-transparent p-8 rounded-3xl border border-lime-500/20 hover:border-lime-500/50 hover:shadow-xl hover:shadow-lime-950/5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-lime-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-lime-600/30 mb-6 group-hover:scale-110 transition-transform">
                            ✨
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('messages.benefit_3_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">{{ __('messages.benefit_3_desc') }}</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-lime-200/50 text-xs font-bold text-lime-800 flex items-center space-x-1">
                        <span>Mudah Dibawa Kapan Saja</span>
                    </div>
                </div>

                <!-- Bento Card 4: Kualitas & Higienitas -->
                <div class="group bg-gradient-to-br from-teal-500/10 via-teal-500/5 to-transparent p-8 rounded-3xl border border-teal-500/20 hover:border-teal-500/50 hover:shadow-xl hover:shadow-teal-950/5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-teal-600/30 mb-6 group-hover:scale-110 transition-transform">
                            💎
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('messages.benefit_4_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">{{ __('messages.benefit_4_desc') }}</p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-teal-200/50 text-xs font-bold text-teal-800 flex items-center space-x-1">
                        <span>Standar Mutu Terjamin</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Ingredients & Story Section -->
    <section id="about" class="py-24 overflow-hidden relative ambient-mesh">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Left Image Showcase with Glass Frame -->
                <div class="lg:w-1/2 relative">
                    <div class="relative z-10 bg-white/70 backdrop-blur-xl p-4 rounded-[3rem] shadow-2xl border border-white/90">
                        <img src="{{ asset('storage/' . ($content->ingredients_image_path ?? 'images/ingredients.png')) }}" 
                             alt="DonDong Natural Ingredients" 
                             class="rounded-[2.5rem] w-full h-auto object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-40 h-40 bg-green-400/20 rounded-full blur-2xl -z-0"></div>
                </div>

                <!-- Right Story Content -->
                <div class="lg:w-1/2">
                    <span class="text-green-600 font-extrabold text-sm uppercase tracking-widest">{{ __('messages.about') }}</span>
                    <h2 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2 mb-6 tracking-tight">
                        {{ $content->translate('ingredients_title') }}
                    </h2>
                    <p class="text-lg text-slate-600 leading-relaxed mb-8">
                        {{ $content->translate('ingredients_content') }}
                    </p>

                    <!-- Key Health Checkpoints -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-slate-200/60 shadow-sm">
                            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center font-black flex-shrink-0">
                                🍊
                            </div>
                            <span class="font-bold text-slate-800">{{ __('messages.ingredient_1') }}</span>
                        </div>

                        <div class="flex items-center space-x-4 bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-slate-200/60 shadow-sm">
                            <div class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-700 flex items-center justify-center font-black flex-shrink-0">
                                🥗
                            </div>
                            <span class="font-bold text-slate-800">{{ __('messages.ingredient_2') }}</span>
                        </div>

                        <div class="flex items-center space-x-4 bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-slate-200/60 shadow-sm">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-black flex-shrink-0">
                                🌿
                            </div>
                            <span class="font-bold text-slate-800">{{ __('messages.ingredient_3') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Showcase Section (Dynamic Variant Showcase) -->
    <section id="products" class="py-24 bg-gradient-to-b from-slate-900 via-emerald-950 to-slate-950 text-white relative overflow-hidden rounded-[3rem] mx-3 md:mx-6 my-10 shadow-2xl">
        <!-- Background Ambient Lights -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-green-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-yellow-400 font-extrabold text-sm uppercase tracking-widest">Koleksi Produk</span>
                <h2 class="text-3xl sm:text-5xl font-black mt-2 mb-4 tracking-tight">
                    {{ __('messages.choose_variant') }}
                </h2>
                <p class="text-emerald-200/80 text-lg">{{ __('messages.find_freshness') }}</p>
            </div>

            <!-- Product Carousel Container with Alpine -->
            <div x-data="{ 
                currentSlide: 0, 
                totalSlides: {{ count($products) }},
                interval: null,
                itemsPerPage() {
                    return window.innerWidth >= 1024 ? 4 : (window.innerWidth >= 768 ? 2 : 1);
                },
                get totalPages() {
                    return Math.max(1, Math.ceil(this.totalSlides / Math.max(1, this.itemsPerPage())));
                },
                prev() {
                    this.currentSlide = (this.currentSlide - 1 + this.totalPages) % this.totalPages;
                    this.resetInterval();
                },
                next() { 
                    this.currentSlide = (this.currentSlide + 1) % this.totalPages; 
                    this.resetInterval();
                },
                goTo(index) {
                    this.currentSlide = index;
                    this.resetInterval();
                },
                resetInterval() {
                    clearInterval(this.interval);
                    if (this.totalSlides > 0) {
                        this.interval = setInterval(() => { 
                            this.currentSlide = (this.currentSlide + 1) % this.totalPages; 
                        }, 6000);
                    }
                },
                init() {
                    window.addEventListener('resize', () => { this.currentSlide = 0; });
                    this.resetInterval();
                }
            }" class="relative w-full">
                
                <!-- Carousel Track Wrapper -->
                <div class="overflow-hidden py-6 -mx-4 px-4">
                    <div class="flex transition-transform duration-700 ease-out" 
                         :style="`transform: translateX(-${currentSlide * 100}%)`">
                        
                        @forelse($products as $product)
                        <div class="w-full md:w-1/2 lg:w-[25%] flex-shrink-0 px-3">
                            <div class="bg-white/10 backdrop-blur-xl border border-white/15 rounded-[2.5rem] p-6 h-full flex flex-col justify-between hover:bg-white/15 hover:border-green-400/50 hover:shadow-2xl hover:shadow-green-500/20 transform hover:-translate-y-2 transition-all duration-300 product-card-shine group">
                                
                                <div>
                                    <!-- Image Container -->
                                    <div class="aspect-square bg-white/5 rounded-3xl mb-6 overflow-hidden flex items-center justify-center p-6 border border-white/10 group-hover:border-white/20 transition-all relative">
                                        <img src="{{ asset('storage/' . ($product->image_path ?: 'images/product.png')) }}" 
                                             alt="{{ $product->name }}" 
                                             class="max-w-full max-h-full object-contain drop-shadow-xl group-hover:scale-110 transition-transform duration-500">
                                        
                                        <!-- Best Seller Micro Badge -->
                                        <span class="absolute top-3 left-3 bg-yellow-400/90 text-slate-900 text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow">
                                            100% Asli
                                        </span>
                                    </div>

                                    <!-- Product Info -->
                                    <h3 class="text-xl font-bold mb-2 line-clamp-2 text-white group-hover:text-yellow-300 transition-colors">
                                        {{ $product->translate('name') }}
                                    </h3>
                                    <p class="text-slate-300 text-sm leading-relaxed mb-6 line-clamp-3">
                                        {{ $product->translate('description') }}
                                    </p>
                                </div>

                                <!-- Price & Action CTA -->
                                <div class="pt-4 border-t border-white/10 flex items-center justify-between mt-auto">
                                    <div>
                                        <div class="text-[10px] uppercase tracking-wider text-emerald-300 font-bold">Harga</div>
                                        <div class="text-xl font-black text-yellow-400">{{ $product->price_display }}</div>
                                    </div>

                                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text={{ urlencode('Halo DonDong! Saya tertarik untuk memesan: ' . $product->name . ' (' . $product->price_display . ')') }}" 
                                       target="_blank"
                                       class="px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-400 hover:to-green-500 text-white rounded-2xl font-bold text-sm shadow-lg shadow-green-600/30 transition-all flex items-center space-x-1.5">
                                        <span>{{ __('messages.buy') }}</span>
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.765-5.764-5.765zm3.392 7.624c-.131.374-.757.701-1.045.741-.283.04-.551.05-.884-.04-.203-.053-.473-.131-.806-.271-1.428-.596-2.352-2.049-2.423-2.144-.071-.095-.572-.765-.572-1.458 0-.693.363-1.033.493-1.173.132-.14.286-.174.382-.174.095 0 .191.002.274.005.086.002.202-.033.315.24.116.279.399.972.434 1.044.036.071.06.155.012.251-.048.096-.1.173-.18.251-.081.079-.17.176-.242.235-.081.066-.165.138-.07.301.096.162.427.705.917 1.141.63.563 1.161.738 1.326.823.165.084.263.07.362-.047.099-.117.432-.505.548-.678.116-.174.232-.146.39-.088.158.058 1.001.472 1.174.558.173.088.29.131.332.205.04.07.04.407-.091.782z"/></svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                        @empty
                        <div class="w-full text-center py-16 px-6 bg-white/5 rounded-3xl">
                            <p class="text-xl text-slate-400">Produk DonDong akan segera hadir kembali!</p>
                        </div>
                        @endforelse

                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button @click="prev()" 
                        class="hidden md:flex items-center justify-center absolute -left-5 lg:-left-7 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white text-slate-900 shadow-2xl hover:bg-yellow-400 transition-all z-20 focus:outline-none"
                        aria-label="Previous Products">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" 
                        class="hidden md:flex items-center justify-center absolute -right-5 lg:-right-7 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white text-slate-900 shadow-2xl hover:bg-yellow-400 transition-all z-20 focus:outline-none"
                        aria-label="Next Products">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <!-- Pagination Dots -->
                <div class="flex justify-center mt-8 space-x-2">
                    <template x-for="i in totalPages" :key="i">
                        <button @click="goTo(i - 1)" 
                                :class="{'bg-yellow-400 w-8': currentSlide === i - 1, 'bg-white/30 w-2.5 hover:bg-white/60': currentSlide !== i - 1}"
                                class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"></button>
                    </template>
                </div>
            </div>

        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 bg-slate-50 relative">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-green-600 font-extrabold text-sm uppercase tracking-widest">{{ __('messages.testimonials') }}</span>
                <h2 class="text-3xl sm:text-5xl font-black text-slate-900 mt-2 mb-4 tracking-tight">
                    {{ __('messages.what_they_say') }}
                </h2>
                <p class="text-slate-600 text-lg">Cerita nyata dari sahabat DonDong yang telah merasakan sensasi asam-manis menyegarkan setiap hari.</p>
            </div>

            <!-- Testimonial Carousel -->
            <div x-data="{ 
                currentSlide: 0, 
                totalSlides: {{ $testimonials->count() }},
                interval: null,
                itemsPerPage() {
                    return window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
                },
                get totalPages() {
                    return Math.max(1, Math.ceil(this.totalSlides / Math.max(1, this.itemsPerPage())));
                },
                prev() {
                    this.currentSlide = (this.currentSlide - 1 + this.totalPages) % this.totalPages;
                },
                next() { 
                    this.currentSlide = (this.currentSlide + 1) % this.totalPages; 
                },
                goTo(index) {
                    this.currentSlide = index;
                }
            }" class="relative w-full mb-16">
                <div class="overflow-hidden py-4 -mx-3 px-3">
                    <div class="flex transition-transform duration-700 ease-out"
                         :style="`transform: translateX(-${currentSlide * 100}%)`">
                        
                        @forelse($testimonials as $testimonial)
                        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
                            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm hover:shadow-xl border border-slate-100 h-full flex flex-col justify-between transition-all duration-300">
                                <div>
                                    <!-- Star Ratings -->
                                    <div class="text-amber-400 mb-4 flex items-center space-x-1">
                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        @endfor
                                    </div>
                                    <p class="text-slate-700 text-base leading-relaxed italic mb-8">
                                        "{{ $testimonial->translate('content') }}"
                                    </p>
                                </div>

                                <div class="flex items-center pt-4 border-t border-slate-100">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-green-600 to-yellow-400 flex items-center justify-center text-white font-extrabold text-lg mr-4 shadow-md shadow-green-600/20 flex-shrink-0">
                                        {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900">{{ $testimonial->author_name }}</div>
                                        <div class="text-xs text-green-700 font-semibold flex items-center">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                            Verified Buyer
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="w-full text-center text-slate-500 py-16 px-6 bg-white rounded-3xl border border-slate-100">
                            <p class="text-lg">{{ __('messages.be_first_testimonial') }}</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Pagination Dots -->
                <div class="flex justify-center mt-6 space-x-2">
                    <template x-for="i in totalPages" :key="i">
                        <button @click="goTo(i - 1)" 
                                :class="{'bg-green-600 w-8': currentSlide === i - 1, 'bg-slate-300 w-2.5 hover:bg-slate-400': currentSlide !== i - 1}"
                                class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"></button>
                    </template>
                </div>
            </div>

            <!-- Submit Testimonial Form Card -->
            <div class="max-w-2xl mx-auto bg-gradient-to-b from-white to-green-50/50 p-8 sm:p-12 rounded-[3rem] border border-green-100 shadow-xl shadow-green-950/5">
                <div class="text-center mb-8">
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900">{{ __('messages.share_experience') }}</h3>
                    <p class="text-slate-600 mt-2">{{ __('messages.tell_us') }}</p>
                </div>

                @if(session('success_testimonial'))
                    <div class="mb-6 p-5 bg-emerald-100 text-emerald-800 rounded-2xl border border-emerald-200 text-center font-bold">
                        {{ session('success_testimonial') }}
                    </div>
                @endif

                <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">{{ __('messages.full_name') }}</label>
                        <input type="text" name="author" placeholder="{{ __('messages.full_name') }}" required 
                               class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-base shadow-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Rating</label>
                        <select name="rating" required class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-base shadow-sm">
                            <option value="5" selected>⭐⭐⭐⭐⭐ (5/5 {{ __('messages.rating_5') }})</option>
                            <option value="4">⭐⭐⭐⭐ (4/5 {{ __('messages.rating_4') }})</option>
                            <option value="3">⭐⭐⭐ (3/5 {{ __('messages.rating_3') }})</option>
                            <option value="2">⭐⭐ (2/5 {{ __('messages.rating_2') }})</option>
                            <option value="1">⭐ (1/5 {{ __('messages.rating_1') }})</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Ulasan Anda</label>
                        <textarea name="content" rows="4" placeholder="{{ __('messages.what_you_like') }}" required 
                                  class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-base shadow-sm"></textarea>
                    </div>
                    <button type="submit" 
                            class="w-full py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-2xl font-bold text-lg hover:shadow-xl hover:shadow-green-600/30 transform hover:-translate-y-0.5 transition-all">
                        {{ __('messages.send_testimonial') }}
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Lifestyle & Direct Call-to-Action Banner -->
    <section id="contact" class="py-24 relative overflow-hidden bg-white">
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="bg-gradient-to-br from-amber-400 via-yellow-400 to-amber-500 rounded-[3rem] p-8 sm:p-14 lg:p-20 flex flex-col lg:flex-row items-center gap-12 shadow-2xl shadow-yellow-500/20 relative overflow-hidden">
                
                <!-- Decorative Circles -->
                <div class="absolute -top-20 -right-20 w-80 h-80 bg-white/20 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-amber-600/20 rounded-full blur-2xl pointer-events-none"></div>

                <div class="lg:w-1/2 text-center lg:text-left relative z-10">
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950 mb-6 leading-tight tracking-tight">
                        {{ __('messages.start_refreshing') }}
                    </h2>
                    <p class="text-lg sm:text-xl text-amber-950/80 mb-10 font-medium">
                        {{ __('messages.contact_admin') }}
                    </p>
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo%20Admin%20DonDong!%20Saya%20ingin%20info%20pemesanan%20/%20kemitraan." 
                       target="_blank"
                       class="inline-flex items-center px-10 py-5 bg-slate-950 text-white rounded-2xl font-black text-lg hover:bg-slate-800 transition shadow-2xl shadow-slate-950/30 transform hover:-translate-y-1">
                        <span>{{ __('messages.whatsapp_us') }}</span>
                        <svg class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.765-5.764-5.765zm3.392 7.624c-.131.374-.757.701-1.045.741-.283.04-.551.05-.884-.04-.203-.053-.473-.131-.806-.271-1.428-.596-2.352-2.049-2.423-2.144-.071-.095-.572-.765-.572-1.458 0-.693.363-1.033.493-1.173.132-.14.286-.174.382-.174.095 0 .191.002.274.005.086.002.202-.033.315.24.116.279.399.972.434 1.044.036.071.06.155.012.251-.048.096-.1.173-.18.251-.081.079-.17.176-.242.235-.081.066-.165.138-.07.301.096.162.427.705.917 1.141.63.563 1.161.738 1.326.823.165.084.263.07.362-.047.099-.117.432-.505.548-.678.116-.174.232-.146.39-.088.158.058 1.001.472 1.174.558.173.088.29.131.332.205.04.07.04.407-.091.782z"/></svg>
                    </a>
                </div>

                <div class="lg:w-1/2 relative z-10 flex justify-center">
                    <img src="{{ asset('storage/' . ($content->lifestyle_image_path ?? 'images/lifestyle.png')) }}" 
                         alt="DonDong Lifestyle" 
                         class="rounded-[3rem] shadow-2xl border-4 border-white/40 max-h-[380px] w-auto object-cover">
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-14 bg-slate-950 text-slate-400 border-t border-slate-900 pb-28 md:pb-14">
        <div class="container mx-auto px-6 max-w-7xl flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-center md:text-left">
                <a href="#" class="text-3xl font-black text-white tracking-tight block mb-2">
                    DonDong<span class="text-yellow-400">!</span>
                </a>
                <p class="text-sm text-slate-500">Copyright © 2026 DonDong! Authentic Ambarella.<br>{{ __('messages.all_rights_reserved') }}</p>
            </div>

            <!-- Social Media Channels -->
            <div class="flex items-center space-x-6">
                <!-- Instagram -->
                <a href="{{ $settings['instagram_url'] ?? '#' }}" target="_blank" class="w-11 h-11 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-green-400 hover:bg-white/10 transition shadow-sm" title="Instagram">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <!-- TikTok -->
                <a href="{{ $settings['tiktok_url'] ?? '#' }}" target="_blank" class="w-11 h-11 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-green-400 hover:bg-white/10 transition shadow-sm" title="TikTok">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.86-.6-4.12-1.31a8.6 8.6 0 01-1.21-.83v9.42c0 2.14-.54 4.54-2.51 5.85-2.26 1.51-5.54 1.34-7.5-1-1.1-1.31-1.41-3.13-1.07-4.78.36-1.78 1.61-3.4 3.32-4.05.77-.3 1.59-.44 2.41-.43l.01 4.12c-.75-.01-1.53.11-2.13.58a2.53 2.53 0 00-.91 2.23c.12 1.23.95 2.16 2.16 2.37 1.5.26 3.03-.76 3.14-2.27.01-1 .01-2 0-3V0l.02.02z"/>
                    </svg>
                </a>
                <!-- YouTube -->
                <a href="{{ $settings['youtube_url'] ?? '#' }}" target="_blank" class="w-11 h-11 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-green-400 hover:bg-white/10 transition shadow-sm" title="YouTube">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    <!-- Mobile Sticky Quick-Order Thumb Bar -->
    <div class="md:hidden fixed bottom-4 left-4 right-4 z-50">
        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo%20DonDong!%20Saya%20ingin%20pesan%20sekarang." 
           target="_blank"
           class="w-full py-4 px-6 bg-gradient-to-r from-green-600 via-emerald-600 to-green-700 text-white font-black text-base rounded-2xl shadow-2xl shadow-green-900/40 border border-white/20 flex items-center justify-between">
            <div class="flex items-center space-x-2.5">
                <span class="w-3 h-3 rounded-full bg-yellow-400 animate-ping"></span>
                <span>Pesan DonDong Sekarang</span>
            </div>
            <div class="bg-white/20 px-3 py-1 rounded-xl text-xs flex items-center space-x-1">
                <span>WhatsApp</span>
                <span>→</span>
            </div>
        </a>
    </div>

    <!-- High-Performance Interactive Bubbles Particle Engine -->
    <script>
        (function() {
            const canvas = document.getElementById('bubblesCanvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];
            const particleCount = 28;

            function resize() {
                width = canvas.width = canvas.parentElement.offsetWidth;
                height = canvas.height = canvas.parentElement.offsetHeight;
            }
            window.addEventListener('resize', resize);
            resize();

            // Particle Class (Rising Fizzy Bubbles & Green Dew Drops)
            class Bubble {
                constructor() {
                    this.reset(true);
                }

                reset(initial = false) {
                    this.x = Math.random() * width;
                    this.y = initial ? Math.random() * height : height + 20;
                    this.radius = Math.random() * 8 + 3;
                    this.speedY = Math.random() * 0.8 + 0.3;
                    this.wobble = Math.random() * Math.PI * 2;
                    this.wobbleSpeed = Math.random() * 0.02 + 0.01;
                    this.wobbleAmp = Math.random() * 1.5 + 0.5;
                    this.opacity = Math.random() * 0.45 + 0.15;
                    // Color variety (emerald dew, lime fizz, golden bubble)
                    const colors = [
                        'rgba(34, 197, 94, ',   // Green
                        'rgba(16, 185, 129, ',  // Emerald
                        'rgba(245, 158, 11, ',  // Amber Gold
                        'rgba(132, 204, 22, '   // Lime
                    ];
                    this.color = colors[Math.floor(Math.random() * colors.length)];
                }

                update() {
                    this.y -= this.speedY;
                    this.wobble += this.wobbleSpeed;
                    this.x += Math.sin(this.wobble) * this.wobbleAmp;

                    if (this.y < -30) {
                        this.reset();
                    }
                }

                draw() {
                    ctx.save();
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                    ctx.fillStyle = this.color + this.opacity + ')';
                    ctx.fill();

                    // Bubble highlight ring
                    ctx.lineWidth = 1;
                    ctx.strokeStyle = 'rgba(255, 255, 255, ' + (this.opacity * 0.7) + ')';
                    ctx.stroke();
                    ctx.restore();
                }
            }

            for (let i = 0; i < particleCount; i++) {
                particles.push(new Bubble());
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);
                for (let i = 0; i < particles.length; i++) {
                    particles[i].update();
                    particles[i].draw();
                }
                requestAnimationFrame(animate);
            }
            animate();
        })();
    </script>
</body>
</html>
