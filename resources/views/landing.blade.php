<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth bg-[#fafaf6] text-slate-900 selection:bg-[#70b838] selection:text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() == 'en' ? 'NutriSari Dondong — The Freshness of Ambarella, Bringing You Back' : 'NutriSari Dondong — Segarnya Dondong, Bikin Balik Lagi' }}</title>
    <meta name="description" content="{{ app()->getLocale() == 'en' ? 'Experience the authentic, crisp sweet-and-sour taste of Indonesian ambarella fruit with NutriSari Dondong. Instant freshness in every chilled glass.' : 'Nikmati sensasi rasa dondong yang segar dan khas bersama NutriSari Dondong. Temukan rasa asam-manis otentik buah kedondong asli Indonesia di sini.' }}">

    <!-- Canonical & OpenGraph -->
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ app()->getLocale() == 'en' ? 'NutriSari Dondong — The Freshness of Ambarella, Bringing You Back' : 'NutriSari Dondong — Segarnya Dondong, Bikin Balik Lagi' }}">
    <meta property="og:description" content="{{ app()->getLocale() == 'en' ? 'Experience the authentic, crisp sweet-and-sour taste of Indonesian ambarella fruit with NutriSari Dondong.' : 'Nikmati sensasi rasa dondong yang segar dan khas bersama NutriSari Dondong.' }}">
    <meta property="og:site_name" content="NutriSari Dondong">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NutriSari Dondong — Segarnya Dondong, Bikin Balik Lagi">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">

    <!-- Google Fonts: Outfit (Display) & Plus Jakarta Sans (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        tropical: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534', // Signature DonDong Dark Green
                            900: '#14532d',
                            950: '#052e16',
                        },
                        citrus: {
                            300: '#fde047',
                            400: '#facc15', // Signature DonDong Sunny Yellow
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                        },
                        chilli: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            500: '#f43f5e',
                            600: '#e11d48', // Packaging "Perut Pedas Langsung Tuntas" Coral Red
                            700: '#be123c',
                            800: '#9f1239',
                        },
                        sun: {
                            bg: '#fffdf2', // Packaging Soft Sunny Lemon Yellow Backdrop
                            card: '#ffffff',
                            subtle: '#fefce8', // Creamy Yogurt Yellow
                            border: '#fef08a',
                            dark: '#14532d',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <!-- Structured Data JSON-LD -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "NutriSari Dondong",
            "image": "{{ asset('images/product.png') }}",
            "description": "Minuman serbuk sari buah kedondong asli Indonesia dengan rasa asam-manis menyegarkan dan tinggi Vitamin C.",
            "brand": {
                "@type": "Brand",
                "name": "NutriSari"
            },
            "offers": {
                "@type": "Offer",
                "priceCurrency": "IDR",
                "price": "15000",
                "availability": "https://schema.org/InStock"
            }
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-behavior: smooth;
            scroll-snap-type: y mandatory;
            height: 100%;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fffdf2;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .font-display {
            font-family: 'Outfit', sans-serif;
        }

        /* 100% Viewport Fullscreen Slide Section */
        .snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            height: 100dvh;
            min-height: 100dvh;
            max-height: 100dvh;
            box-sizing: border-box;
        }

        /* Ambient Sunlit Gradient Mesh matching packaging */
        .sun-mesh {
            background-color: #fffdf2;
            background-image:
                radial-gradient(at 0% 0%, rgba(254, 240, 138, 0.65) 0px, transparent 55%),
                radial-gradient(at 100% 0%, rgba(134, 239, 172, 0.35) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(253, 224, 71, 0.40) 0px, transparent 60%);
        }

        @keyframes floatGentle {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-8px) rotate(0.5deg);
            }
        }

        .animate-float-gentle {
            animation: floatGentle 5s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-sun-bg text-slate-800 antialiased overflow-x-hidden"
    x-data="{ 
          scrolled: false, 
          mobileNavOpen: false,
          activeStep: 1,
          openFaq: 1,
          openReviewModal: false,
          reviewRating: 5,
          reviewHoverRating: 5,
          currentSection: 'hero',
          init() {
              const sections = document.querySelectorAll('section[id]');
              const observer = new IntersectionObserver((entries) => {
                  entries.forEach(entry => {
                      if (entry.isIntersecting) {
                          this.currentSection = entry.target.id;
                      }
                  });
              }, { threshold: 0.5 });
              sections.forEach(s => observer.observe(s));
          }
      }">

    <!-- Fixed Header Navigation Bar (Fixed Top 0 - Ultra Clean) -->
    <header class="fixed top-0 left-0 right-0 z-50 w-full bg-white/90 backdrop-blur-md border-b border-sun-border shadow-xs py-2.5 sm:py-3 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 flex items-center justify-between">

            <!-- Official Brand Logo (Enlarged & Crisp) -->
            <a href="#hero" class="flex items-center gap-2.5 group py-1" aria-label="DonDong Home">
                <div class="h-12 sm:h-14 md:h-16 flex items-center overflow-hidden rounded-2xl bg-white border border-sun-border p-1 shadow-xs group-hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Logo Asli" class="h-full w-auto object-contain transform scale-110">
                </div>
                <div class="hidden lg:flex flex-col">
                    <span class="text-base font-display font-black tracking-tight text-tropical-950 leading-none">DonDong</span>
                    <span class="text-[10px] font-extrabold text-tropical-700 uppercase tracking-wider mt-0.5">Perut Pedas Langsung Tuntas</span>
                </div>
            </a>

            <!-- Desktop Navigation Menu (Streamlined & Clean) -->
            <nav class="hidden md:flex items-center gap-7 text-xs font-extrabold uppercase tracking-wider text-slate-700" aria-label="Primary Navigation">
                <a href="#hero" :class="currentSection === 'hero' ? 'text-tropical-700 font-black' : 'text-slate-600 hover:text-tropical-700'" class="transition-colors">Home</a>
                <a href="#rasa" :class="currentSection === 'rasa' ? 'text-tropical-700 font-black' : 'text-slate-600 hover:text-tropical-700'" class="transition-colors">{{ __('messages.nav_taste') }}</a>
                <a href="#ritual" :class="currentSection === 'ritual' ? 'text-tropical-700 font-black' : 'text-slate-600 hover:text-tropical-700'" class="transition-colors">{{ __('messages.nav_ritual') }}</a>
                <a href="#produk" :class="currentSection === 'produk' ? 'text-tropical-700 font-black' : 'text-slate-600 hover:text-tropical-700'" class="transition-colors">{{ __('messages.nav_product') }}</a>
                <a href="#testimoni" :class="currentSection === 'testimoni' ? 'text-tropical-700 font-black' : 'text-slate-600 hover:text-tropical-700'" class="transition-colors">{{ __('messages.nav_testimonials') }}</a>
                <a href="#faq" :class="currentSection === 'faq' ? 'text-tropical-700 font-black' : 'text-slate-600 hover:text-tropical-700'" class="transition-colors">FAQ</a>
            </nav>

            <!-- Language Switch & CTA -->
            <div class="hidden md:flex items-center gap-3">
                <div class="inline-flex rounded-xl border border-slate-200 p-0.5 text-xs font-bold bg-slate-50">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-2.5 py-1 rounded-lg transition {{ app()->getLocale() == 'id' ? 'bg-white text-tropical-950 shadow-xs font-black' : 'text-slate-500 hover:text-slate-900' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-2.5 py-1 rounded-lg transition {{ app()->getLocale() == 'en' ? 'bg-white text-tropical-950 shadow-xs font-black' : 'text-slate-500 hover:text-slate-900' }}">EN</a>
                </div>

                <a href="#channel"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-tropical-700 hover:bg-tropical-800 text-white text-xs font-extrabold uppercase tracking-wider shadow-xs transition-all transform hover:-translate-y-0.5">
                    <span>{{ __('messages.nav_order') }}</span>
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                    </svg>
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="mobileNavOpen = !mobileNavOpen" class="md:hidden p-2 rounded-xl text-slate-700 hover:bg-slate-100" aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileNavOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileNavOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileNavOpen" x-cloak class="md:hidden bg-white border-t border-sun-border px-6 py-5 space-y-3 shadow-lg">
            <a href="#hero" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">Home</a>
            <a href="#rasa" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">{{ __('messages.nav_taste') }}</a>
            <a href="#ritual" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">{{ __('messages.nav_ritual') }}</a>
            <a href="#produk" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">{{ __('messages.nav_product') }}</a>
            <a href="#cerita" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">{{ __('messages.nav_story') }}</a>
            <a href="#momen" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">{{ __('messages.nav_moments') }}</a>
            <a href="#testimoni" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">{{ __('messages.nav_testimonials') }}</a>
            <a href="#faq" @click="mobileNavOpen = false" class="block py-2 text-sm font-bold text-slate-800 hover:text-tropical-700">FAQ</a>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <div class="inline-flex rounded-lg border border-slate-200 p-1 text-xs bg-slate-50">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1 rounded-md {{ app()->getLocale() == 'id' ? 'bg-white text-slate-900 font-bold' : 'text-slate-500' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1 rounded-md {{ app()->getLocale() == 'en' ? 'bg-white text-slate-900 font-bold' : 'text-slate-500' }}">EN</a>
                </div>
                <a href="#channel" @click="mobileNavOpen = false" class="px-4 py-2 rounded-xl bg-tropical-700 text-white text-xs font-bold">
                    {{ __('messages.nav_order') }}
                </a>
            </div>
        </div>
    </header>

    <!-- Floating Fullscreen Section Dot Navigation with Interactive Tooltips (Desktop) -->
    <nav class="hidden lg:flex fixed right-6 top-1/2 -translate-y-1/2 z-50 flex-col items-center gap-3 bg-white/85 backdrop-blur-md border border-slate-200/80 p-2.5 rounded-full shadow-md" aria-label="Section Quick Nav">
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">01 &bull; Home</div>
            <a href="#hero" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'hero' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">02 &bull; Profil Rasa</div>
            <a href="#rasa" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'rasa' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">03 &bull; Cara Seduh</div>
            <a href="#ritual" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'ritual' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">04 &bull; Produk & Beli</div>
            <a href="#produk" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'produk' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">05 &bull; Cerita Buah</div>
            <a href="#cerita" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'cerita' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">06 &bull; Momen Segar</div>
            <a href="#momen" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'momen' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">07 &bull; Testimoni</div>
            <a href="#testimoni" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'testimoni' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
        <div class="relative flex items-center group">
            <div class="absolute right-full mr-3 px-2.5 py-1 rounded-lg bg-slate-900 text-white text-[10px] font-bold uppercase tracking-wider whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-150 pointer-events-none shadow-md">08 &bull; FAQ & Pesan</div>
            <a href="#faq" class="w-3 h-3 rounded-full transition-all duration-300" :class="currentSection === 'faq' ? 'bg-tropical-700 scale-125 ring-2 ring-tropical-700/30' : 'bg-slate-300 hover:bg-slate-500'"></a>
        </div>
    </nav>

    <main class="w-full">
        <!-- =========================================================================
             1. HERO SECTION — FULLSCREEN (100dvh)
             ========================================================================= -->
        <section id="hero" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border sun-mesh overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 items-center">

                    <!-- Left: Confident Commercial Typography -->
                    <div class="lg:col-span-7 text-center lg:text-left">

                        <!-- <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-tropical-100 border border-tropical-200 text-tropical-950 text-[10px] sm:text-xs font-extrabold uppercase tracking-wider mb-3 sm:mb-5 shadow-2xs">
                            <span class="w-2 h-2 rounded-full bg-tropical-600"></span>
                            <span>{{ __('messages.hero_eyebrow') }}</span>
                            <span class="bg-chilli-600 text-white text-[9px] font-black uppercase px-2 py-0.5 rounded-full">Perut Pedas Langsung Tuntas</span>
                        </div> -->

                        <h1 class="text-2xl sm:text-4xl lg:text-6xl xl:text-7xl font-display font-black tracking-tight leading-[1.1] text-slate-950 mb-3 sm:mb-5">
                            {{ !empty($content->translate('hero_title')) ? $content->translate('hero_title') : __('messages.hero_title') }}
                        </h1>

                        <p class="text-xs sm:text-base lg:text-lg text-slate-700 font-normal leading-relaxed max-w-2xl mx-auto lg:mx-0 mb-4 sm:mb-6">
                            {{ !empty($content->translate('hero_subtitle')) ? $content->translate('hero_subtitle') : __('messages.hero_lead') }}
                        </p>

                        <!-- CTAs -->
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-2.5 sm:gap-4 mb-5 sm:mb-6">
                            <a href="{{ !empty($content->hero_cta_link) ? $content->hero_cta_link : '#channel' }}"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-tropical-800 hover:bg-tropical-900 text-white font-display font-extrabold text-xs sm:text-sm uppercase tracking-wider shadow-sm hover:shadow-md transition-all transform hover:-translate-y-0.5">
                                <span>{{ !empty($content->translate('hero_cta_text')) ? $content->translate('hero_cta_text') : __('messages.hero_cta_primary') }}</span>
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                                </svg>
                            </a>

                            <a href="#rasa"
                                class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 rounded-xl bg-white hover:bg-tropical-50 border border-tropical-200 text-tropical-900 font-bold text-xs sm:text-sm tracking-wider uppercase transition-all shadow-2xs">
                                <span>{{ __('messages.hero_cta_secondary') }}</span>
                            </a>
                        </div>

                        <!-- Proof Points -->
                        <div class="pt-4 border-t border-sun-border grid grid-cols-3 gap-2 sm:gap-4 max-w-xl mx-auto lg:mx-0 text-left">
                            <div>
                                <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 block mb-0.5">{{ app()->getLocale() == 'en' ? 'Fruit Extract' : 'Bahan Baku' }}</span>
                                <span class="text-[11px] sm:text-sm font-extrabold text-tropical-950">{{ app()->getLocale() == 'en' ? 'Real Ambarella' : 'Kedondong Asli' }}</span>
                            </div>
                            <div>
                                <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 block mb-0.5">{{ app()->getLocale() == 'en' ? 'Preparation' : 'Penyajian' }}</span>
                                <span class="text-[11px] sm:text-sm font-extrabold text-tropical-950">{{ app()->getLocale() == 'en' ? 'Instant Cold' : 'Larut Air Es' }}</span>
                            </div>
                            <div>
                                <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 block mb-0.5">{{ app()->getLocale() == 'en' ? 'Nutrition' : 'Nutrisi' }}</span>
                                <span class="text-[11px] sm:text-sm font-extrabold text-chilli-600">{{ app()->getLocale() == 'en' ? 'High Vitamin C' : 'Tinggi Vitamin C' }}</span>
                            </div>
                        </div>

                    </div>

                    <!-- Right: Real Product Photograph -->
                    <div class="lg:col-span-5 flex flex-col items-center justify-center relative mt-2 lg:mt-0">
                        <div class="relative w-full max-w-[240px] sm:max-w-sm lg:max-w-[400px] rounded-3xl bg-white border border-sun-border p-2 sm:p-2.5 shadow-xl overflow-hidden group">

                            <!-- Ambient Glow -->
                            <div class="absolute -top-12 -right-12 w-48 h-48 bg-citrus-400/30 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-tropical-500/20 rounded-full blur-3xl pointer-events-none"></div>

                            <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-sun-subtle">
                                <img src="{{ !empty($content->hero_image) ? asset('storage/' . $content->hero_image) : asset('images/hero.png') }}"
                                    alt="NutriSari DonDong — Segarnya Kedondong Asli"
                                    class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700 ease-out"
                                    loading="eager">
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Scroll Down Indicator -->
            <a href="#rasa" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-slate-400 hover:text-tropical-700 transition-colors">
                <span class="text-[10px] font-bold uppercase tracking-widest">Scroll</span>
                <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </section>


        <!-- =========================================================================
             2. SECTION 2 — THE TASTE & SENSORY FLAVOR PROFILE METER (100dvh Fullscreen)
             ========================================================================= -->
        <section id="rasa" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 w-full">

                <div class="text-center max-w-3xl mx-auto mb-6 sm:mb-12">
                    <span class="text-xs font-extrabold tracking-widest text-tropical-700 uppercase block mb-1 sm:mb-2">
                        {{ __('messages.taste_eyebrow') }}
                    </span>
                    <h2 class="text-2xl sm:text-4xl lg:text-5xl font-display font-extrabold text-slate-950 mb-2 sm:mb-3 leading-tight">
                        {{ !empty($content->translate('benefits_title')) ? $content->translate('benefits_title') : __('messages.taste_title') }}
                    </h2>
                    <p class="text-base sm:text-lg font-medium text-tropical-800 leading-snug">
                        {{ !empty($content->translate('benefits_content')) ? $content->translate('benefits_content') : __('messages.taste_desc') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                    <!-- Left: Narrative & Sensory Characteristics -->
                    <div class="lg:col-span-6 space-y-5">
                        <div class="border-l-4 border-tropical-600 pl-5">
                            <span class="text-xs font-bold uppercase tracking-wider text-citrus-600 block mb-1">KARAKTER RASA ASLI</span>
                            <p class="text-base sm:text-lg font-display font-bold text-slate-900 leading-relaxed">
                                "{{ __('messages.taste_detail') }}"
                            </p>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Keseimbangan asam segar khas buah kedondong matang pohon berpadu manis gula tebu murni, memberikan ledakan kesegaran tanpa rasa getir di tenggorokan.
                        </p>
                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <div class="bg-tropical-50 border border-tropical-200 rounded-xl p-3 text-center">
                                <span class="text-[10px] font-extrabold uppercase text-tropical-800 block">KEDONDONG ASLI</span>
                                <span class="text-xs font-bold text-slate-900">100% Ekstrak Sari Buah</span>
                            </div>
                            <div class="bg-citrus-50 border border-citrus-200 rounded-xl p-3 text-center">
                                <span class="text-[10px] font-extrabold uppercase text-citrus-700 block">TANPA PENGAWET</span>
                                <span class="text-xs font-bold text-slate-900">Alami & Terpercaya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Flavor Balance Meter (Sensorik Bar) -->
                    <div class="lg:col-span-6">
                        <div class="rounded-3xl border border-sun-border bg-sun-subtle p-6 sm:p-8 shadow-xs">
                            <div class="mb-5">
                                <span class="text-xs font-extrabold uppercase tracking-widest text-tropical-800 block mb-1">{{ __('messages.flavor_meter_title') }}</span>
                                <p class="text-xs text-slate-500">{{ __('messages.flavor_meter_subtitle') }}</p>
                            </div>

                            <div class="space-y-4">
                                <!-- Stat 1: Asam Segar -->
                                <div>
                                    <div class="flex justify-between items-center text-xs font-bold text-slate-800 mb-1.5">
                                        <span class="flex items-center gap-1.5">
                                            <span class="text-sm">🍋</span>
                                            <span>{{ __('messages.flavor_stat_1_name') }}</span>
                                        </span>
                                        <span class="text-tropical-700 font-extrabold">{{ __('messages.flavor_stat_1_val') }}</span>
                                    </div>
                                    <div class="h-2.5 w-full rounded-full bg-slate-200 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-tropical-500 to-tropical-600 w-[90%] transition-all duration-500"></div>
                                    </div>
                                </div>

                                <!-- Stat 2: Manis Pas -->
                                <div>
                                    <div class="flex justify-between items-center text-xs font-bold text-slate-800 mb-1.5">
                                        <span class="flex items-center gap-1.5">
                                            <span class="text-sm">🍯</span>
                                            <span>{{ __('messages.flavor_stat_2_name') }}</span>
                                        </span>
                                        <span class="text-citrus-600 font-extrabold">{{ __('messages.flavor_stat_2_val') }}</span>
                                    </div>
                                    <div class="h-2.5 w-full rounded-full bg-slate-200 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-citrus-400 to-citrus-500 w-[70%] transition-all duration-500"></div>
                                    </div>
                                </div>

                                <!-- Stat 3: Dingin Nyes -->
                                <div>
                                    <div class="flex justify-between items-center text-xs font-bold text-slate-800 mb-1.5">
                                        <span class="flex items-center gap-1.5">
                                            <span class="text-sm">🧊</span>
                                            <span>{{ __('messages.flavor_stat_3_name') }}</span>
                                        </span>
                                        <span class="text-tropical-700 font-extrabold">{{ __('messages.flavor_stat_3_val') }}</span>
                                    </div>
                                    <div class="h-2.5 w-full rounded-full bg-slate-200 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-tropical-400 to-tropical-600 w-[100%] transition-all duration-500"></div>
                                    </div>
                                </div>

                                <!-- Stat 4: Aroma Buah -->
                                <div>
                                    <div class="flex justify-between items-center text-xs font-bold text-slate-800 mb-1.5">
                                        <span class="flex items-center gap-1.5">
                                            <span class="text-sm">🌿</span>
                                            <span>{{ __('messages.flavor_stat_4_name') }}</span>
                                        </span>
                                        <span class="text-tropical-700 font-extrabold">{{ __('messages.flavor_stat_4_val') }}</span>
                                    </div>
                                    <div class="h-2.5 w-full rounded-full bg-slate-200 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-tropical-500 to-citrus-500 w-[95%] transition-all duration-500"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- =========================================================================
             3. SECTION 3 — INTERACTIVE 3-STEP SERVING RITUAL (100dvh Fullscreen)
             ========================================================================= -->
        <section id="ritual" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border bg-sun-bg overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 w-full">

                <div class="max-w-3xl mb-6 sm:mb-10">
                    <span class="text-xs font-extrabold tracking-widest text-tropical-700 uppercase block mb-1 sm:mb-2">
                        {{ __('messages.ritual_eyebrow') }}
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-display font-extrabold text-slate-950 mb-1 sm:mb-2">
                        {{ __('messages.ritual_title') }}
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-sm">
                        {{ __('messages.ritual_subtitle') }}
                    </p>
                </div>

                <!-- 3 Steps Interactive Deck -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <!-- Step 01 -->
                    <div @click="activeStep = 1"
                        :class="activeStep === 1 ? 'border-tropical-600 bg-white shadow-md ring-2 ring-tropical-600/10' : 'border-sun-border bg-white/70 opacity-90'"
                        class="cursor-pointer rounded-3xl border p-6 sm:p-8 transition-all duration-300 group hover:border-tropical-400">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-10 h-10 rounded-2xl bg-tropical-100 text-tropical-800 font-display font-extrabold text-base flex items-center justify-center">
                                01
                            </div>
                            <span class="text-lg">✂️</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-950 mb-2">
                            {{ __('messages.ritual_step_1_title') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('messages.ritual_step_1_desc') }}
                        </p>
                    </div>

                    <!-- Step 02 -->
                    <div @click="activeStep = 2"
                        :class="activeStep === 2 ? 'border-citrus-500 bg-white shadow-md ring-2 ring-citrus-500/10' : 'border-sun-border bg-white/70 opacity-90'"
                        class="cursor-pointer rounded-3xl border p-6 sm:p-8 transition-all duration-300 group hover:border-citrus-400">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-10 h-10 rounded-2xl bg-citrus-100 text-citrus-700 font-display font-extrabold text-base flex items-center justify-center">
                                02
                            </div>
                            <span class="text-lg">💧</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-950 mb-2">
                            {{ __('messages.ritual_step_2_title') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('messages.ritual_step_2_desc') }}
                        </p>
                    </div>

                    <!-- Step 03 -->
                    <div @click="activeStep = 3"
                        :class="activeStep === 3 ? 'border-tropical-600 bg-white shadow-md ring-2 ring-tropical-600/10' : 'border-sun-border bg-white/70 opacity-90'"
                        class="cursor-pointer rounded-3xl border p-6 sm:p-8 transition-all duration-300 group hover:border-tropical-400">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-10 h-10 rounded-2xl bg-tropical-100 text-tropical-800 font-display font-extrabold text-base flex items-center justify-center">
                                03
                            </div>
                            <span class="text-lg">🧊</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-950 mb-2">
                            {{ __('messages.ritual_step_3_title') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('messages.ritual_step_3_desc') }}
                        </p>
                    </div>

                </div>

            </div>
        </section>


        <!-- =========================================================================
             4. SECTION 4 — PRODUCT LINEUP & OFFICIAL WHERE TO BUY HUB (100dvh Fullscreen)
             ========================================================================= -->
        <section id="produk" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 w-full">

                <div class="max-w-3xl mb-6 sm:mb-8">
                    <span class="text-xs font-extrabold tracking-widest text-tropical-700 uppercase block mb-1">
                        {{ __('messages.product_eyebrow') }}
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-display font-extrabold text-slate-950">
                        {{ __('messages.product_title') }}
                    </h2>
                </div>

                <!-- Packshot Card with Real Product Line Image -->
                <div class="rounded-3xl border border-sun-border bg-sun-subtle p-4 sm:p-6 lg:p-8 shadow-xs mb-6 sm:mb-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                        <!-- Real Product Lineup Image -->
                        <div class="lg:col-span-4 flex items-center justify-center">
                            <div class="relative w-full max-w-[320px] rounded-2xl bg-white p-2.5 border border-sun-border shadow-md overflow-hidden group">
                                <img src="{{ asset('images/product.png') }}"
                                    alt="Lineup Produk NutriSari DonDong — Sachet, Pouch, & Botol"
                                    class="w-full h-auto object-contain rounded-xl group-hover:scale-105 transition-transform duration-500">

                                <div class="absolute bottom-3 left-3 right-3 bg-white/95 backdrop-blur-md border border-slate-200 px-2.5 py-1 rounded-lg shadow-xs flex items-center justify-between text-[10px] font-extrabold text-tropical-900">
                                    <span>Sachet &bull; Pouch &bull; Botol</span>
                                    <span class="text-citrus-600">Lengkap</span>
                                </div>
                            </div>
                        </div>

                        <!-- Specifications -->
                        <div class="lg:col-span-8 space-y-4">
                            <div>
                                <span class="text-[11px] font-extrabold uppercase tracking-wider text-tropical-700 block mb-0.5">PRODUK UTAMA</span>
                                <h3 class="text-xl sm:text-2xl font-display font-extrabold text-slate-950">{{ __('messages.product_name') }}</h3>
                                <p class="text-citrus-600 font-bold text-xs sm:text-sm">{{ __('messages.product_flavor') }} &bull; {{ __('messages.product_format') }}</p>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                                {{ __('messages.product_desc') }}
                            </p>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                                <div class="bg-white border border-sun-border rounded-xl p-3 shadow-2xs">
                                    <span class="text-citrus-600 font-display font-extrabold text-sm block mb-0.5">01</span>
                                    <span class="text-[11px] font-bold text-slate-900 block">{{ __('messages.product_feature_1') }}</span>
                                </div>
                                <div class="bg-white border border-sun-border rounded-xl p-3 shadow-2xs">
                                    <span class="text-tropical-700 font-display font-extrabold text-sm block mb-0.5">02</span>
                                    <span class="text-[11px] font-bold text-slate-900 block">{{ __('messages.product_feature_2') }}</span>
                                </div>
                                <div class="bg-white border border-sun-border rounded-xl p-3 shadow-2xs">
                                    <span class="text-tropical-700 font-display font-extrabold text-sm block mb-0.5">03</span>
                                    <span class="text-[11px] font-bold text-slate-900 block">{{ __('messages.product_feature_3') }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Where to Buy Official Channels Section -->
                <div id="channel" class="rounded-3xl border border-sun-border bg-sun-subtle p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-2 mb-6">
                        <div>
                            <span class="text-xs font-extrabold tracking-widest text-tropical-800 uppercase block">{{ __('messages.channel_title') }}</span>
                            <p class="text-xs text-slate-600">Beli DonDong langsung di online shop resmi kami (Linktree: <a href="https://linktr.ee/dondongkedondong" target="_blank" class="text-tropical-700 font-bold underline">@dondongkedondong</a>)</p>
                        </div>
                        <a href="https://linktr.ee/dondongkedondong" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-tropical-800 text-white text-[11px] font-extrabold uppercase tracking-wider hover:bg-tropical-900 transition-colors shadow-2xs">
                            <span>🔗</span>
                            <span>Buka Linktree Resmi</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
                        <!-- Shopee -->
                        <a href="https://shopee.co.id/kedondongshop" target="_blank" class="rounded-2xl border border-orange-200 bg-white hover:border-[#ee4d2d] p-4 flex items-center justify-between transition-all group shadow-2xs hover:shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#ee4d2d]/10 text-[#ee4d2d] flex items-center justify-center font-black text-sm">
                                    S
                                </div>
                                <div>
                                    <span class="text-[10px] font-extrabold uppercase text-[#ee4d2d] block">Shopee Official</span>
                                    <span class="text-xs font-bold text-slate-900 group-hover:text-[#ee4d2d] transition-colors">kedondongshop</span>
                                </div>
                            </div>
                            <span class="text-slate-400 group-hover:text-[#ee4d2d] transition-colors font-bold">&rarr;</span>
                        </a>

                        <!-- Tokopedia -->
                        <a href="https://www.tokopedia.com/dondongkedondong" target="_blank" class="rounded-2xl border border-emerald-200 bg-white hover:border-[#03ac0e] p-4 flex items-center justify-between transition-all group shadow-2xs hover:shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#03ac0e]/10 text-[#03ac0e] flex items-center justify-center font-black text-sm">
                                    T
                                </div>
                                <div>
                                    <span class="text-[10px] font-extrabold uppercase text-[#03ac0e] block">Tokopedia Official</span>
                                    <span class="text-xs font-bold text-slate-900 group-hover:text-[#03ac0e] transition-colors">dondongkedondong</span>
                                </div>
                            </div>
                            <span class="text-slate-400 group-hover:text-[#03ac0e] transition-colors font-bold">&rarr;</span>
                        </a>

                        <!-- TikTok Shop -->
                        <a href="https://www.tiktok.com/@dondong_kedondong" target="_blank" class="rounded-2xl border border-slate-200 bg-white hover:border-slate-900 p-4 flex items-center justify-between transition-all group shadow-2xs hover:shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-slate-900 text-white flex items-center justify-center font-black text-sm">
                                    ♪
                                </div>
                                <div>
                                    <span class="text-[10px] font-extrabold uppercase text-slate-700 block">TikTok Official</span>
                                    <span class="text-xs font-bold text-slate-900 group-hover:text-slate-950 transition-colors">@dondong_kedondong</span>
                                </div>
                            </div>
                            <span class="text-slate-400 group-hover:text-slate-900 transition-colors font-bold">&rarr;</span>
                        </a>

                        <!-- Linktree Hub -->
                        <a href="https://linktr.ee/dondongkedondong" target="_blank" class="rounded-2xl bg-tropical-800 hover:bg-tropical-900 p-4 flex items-center justify-between transition-all group text-white shadow-xs hover:shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-white/20 text-white flex items-center justify-center font-black text-sm">
                                    🌴
                                </div>
                                <div>
                                    <span class="text-[9px] font-bold uppercase tracking-wider text-tropical-200 block">Official Hub</span>
                                    <span class="text-xs font-extrabold">Linktree DonDong</span>
                                </div>
                            </div>
                            <span class="font-bold">&rarr;</span>
                        </a>
                    </div>
                </div>

            </div>
        </section>


        <!-- =========================================================================
             5. SECTION 5 — WHY DONDONG? (100dvh Fullscreen)
             ========================================================================= -->
        <section id="cerita" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border bg-sun-bg overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 items-center">

                    <div class="lg:col-span-7 space-y-4 sm:space-y-5">
                        <span class="text-xs font-extrabold tracking-widest text-tropical-700 uppercase block">
                            {{ __('messages.story_eyebrow') }}
                        </span>

                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-display font-extrabold text-slate-950 tracking-tight leading-tight">
                            {{ !empty($content->translate('ingredients_title')) ? $content->translate('ingredients_title') : __('messages.story_title') }}
                        </h2>

                        <p class="text-base sm:text-lg font-display font-semibold text-tropical-800 leading-relaxed">
                            {{ !empty($content->translate('ingredients_content')) ? $content->translate('ingredients_content') : __('messages.story_p1') }}
                        </p>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('messages.story_p2') }}
                        </p>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('messages.story_p3') }}
                        </p>

                        <div class="pt-3 flex items-center gap-5">
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-tropical-100 text-tropical-800 font-extrabold text-xs flex items-center justify-center">✓</span>
                                <span class="text-[11px] font-bold text-slate-800 uppercase tracking-wider">Ekstrak Buah Asli</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-citrus-100 text-citrus-700 font-extrabold text-xs flex items-center justify-center">✓</span>
                                <span class="text-[11px] font-bold text-slate-800 uppercase tracking-wider">Higienis & Praktis</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Real Ingredients Photograph (Fresh Harvest) -->
                    <div class="lg:col-span-5">
                        <div class="rounded-3xl border border-sun-border bg-white p-3 shadow-md overflow-hidden group">
                            <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-slate-100">
                                <img src="{{ !empty($content->ingredients_image) ? asset('storage/' . $content->ingredients_image) : asset('images/ingredients.png') }}"
                                    alt="Buah Kedondong Segar Hasil Panen Kebun Indonesia"
                                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">

                                <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md border border-slate-200 px-3 py-1 rounded-full text-[10px] font-extrabold text-tropical-900 shadow-xs">
                                    🌿 BUAH KEDONDONG SEGAR
                                </div>
                            </div>

                            <div class="p-3.5 text-left">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider text-citrus-600 block mb-1">DIPETIK DARI KEBUN NUSANTARA</span>
                                <p class="text-xs text-slate-600 leading-relaxed">
                                    Diproses dari buah kedondong segar berstandar mutu tinggi untuk mengunci kesegaran alami dan nutrisi alaminya.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- =========================================================================
             6. SECTION 6 — MOMENT / LIFESTYLE (100dvh Fullscreen)
             ========================================================================= -->
        <section id="momen" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 w-full">

                <div class="max-w-3xl mb-6 sm:mb-8">
                    <span class="text-xs font-extrabold tracking-widest text-tropical-700 uppercase block mb-1">
                        {{ __('messages.moments_eyebrow') }}
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-display font-extrabold text-slate-950 mb-1 sm:mb-2">
                        {{ __('messages.moments_title') }}
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-sm">
                        {{ __('messages.moments_subtitle') }}
                    </p>
                </div>

                <!-- Lifestyle Banner + Moments Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center">

                    <!-- Lifestyle Real Photo -->
                    <div class="lg:col-span-5">
                        <div class="rounded-3xl border border-sun-border bg-white p-2.5 shadow-md overflow-hidden group">
                            <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden bg-slate-100">
                                <img src="{{ asset('images/lifestyle.png') }}"
                                    alt="Menikmati NutriSari DonDong Dingin Segar Kapan Saja"
                                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1 rounded-lg text-[10px] font-extrabold text-slate-900">
                                    ☀️ Segar di Tengah Hari Terik
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Moments 01, 02, 03 List -->
                    <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-3.5">
                        <!-- Moment 01 -->
                        <article class="rounded-2xl border border-sun-border bg-sun-subtle p-4 flex flex-col justify-between hover:border-tropical-300 transition-all group">
                            <div>
                                <span class="px-2.5 py-0.5 rounded-full bg-citrus-100 text-[9px] font-extrabold tracking-wider text-citrus-700 uppercase mb-2 inline-block">
                                    {{ __('messages.moment_1_tag') }}
                                </span>
                                <h3 class="text-xs sm:text-sm font-bold text-slate-950 mb-1">
                                    {{ __('messages.moment_1_title') }}
                                </h3>
                                <p class="text-[11px] text-slate-600 leading-relaxed">
                                    {{ __('messages.moment_1_desc') }}
                                </p>
                            </div>
                            <div class="mt-3 pt-2.5 border-t border-slate-200 text-[10px] font-bold text-tropical-700">
                                Dingin Maksimal
                            </div>
                        </article>

                        <!-- Moment 02 -->
                        <article class="rounded-2xl border border-sun-border bg-sun-subtle p-4 flex flex-col justify-between hover:border-citrus-300 transition-all group">
                            <div>
                                <span class="px-2.5 py-0.5 rounded-full bg-tropical-100 text-[9px] font-extrabold tracking-wider text-tropical-800 uppercase mb-2 inline-block">
                                    {{ __('messages.moment_2_tag') }}
                                </span>
                                <h3 class="text-xs sm:text-sm font-bold text-slate-950 mb-1">
                                    {{ __('messages.moment_2_title') }}
                                </h3>
                                <p class="text-[11px] text-slate-600 leading-relaxed">
                                    {{ __('messages.moment_2_desc') }}
                                </p>
                            </div>
                            <div class="mt-3 pt-2.5 border-t border-slate-200 text-[10px] font-bold text-citrus-600">
                                Penetral Begah
                            </div>
                        </article>

                        <!-- Moment 03 -->
                        <article class="rounded-2xl border border-sun-border bg-sun-subtle p-4 flex flex-col justify-between hover:border-tropical-300 transition-all group">
                            <div>
                                <span class="px-2.5 py-0.5 rounded-full bg-tropical-100 text-[9px] font-extrabold tracking-wider text-tropical-800 uppercase mb-2 inline-block">
                                    {{ __('messages.moment_3_tag') }}
                                </span>
                                <h3 class="text-xs sm:text-sm font-bold text-slate-950 mb-1">
                                    {{ __('messages.moment_3_title') }}
                                </h3>
                                <p class="text-[11px] text-slate-600 leading-relaxed">
                                    {{ __('messages.moment_3_desc') }}
                                </p>
                            </div>
                            <div class="mt-3 pt-2.5 border-t border-slate-200 text-[10px] font-bold text-tropical-700">
                                Seru Ramean
                            </div>
                        </article>
                    </div>

                </div>

            </div>
        </section>


        <!-- =========================================================================
             6B. SECTION 6B — TESTIMONI PEMBELI / EDITORIAL SOCIAL PROOF (100dvh Fullscreen)
             ========================================================================= -->
        <section id="testimoni" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-center relative pt-14 pb-4 sm:pt-16 sm:pb-6 border-b border-sun-border bg-gradient-to-b from-white via-sun-subtle to-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 w-full">

                <!-- Section Header with Trust Badges & Write Review CTA -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6 sm:mb-8">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-citrus-100 border border-citrus-200 text-citrus-800 text-[10px] font-extrabold uppercase tracking-wider mb-2">
                            <span>★ ★ ★ ★ ★</span>
                            <span>{{ __('messages.testimonials_eyebrow') }}</span>
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-display font-extrabold text-slate-950 tracking-tight leading-tight">
                            {{ __('messages.testimonials_title') }}
                        </h2>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="bg-white border border-sun-border px-4 py-2.5 rounded-2xl shadow-2xs text-left md:text-right hidden sm:block">
                            <span class="text-xs font-extrabold text-tropical-700 block">4.9 / 5.0 Rating Kepuasan</span>
                            <span class="text-[10px] text-slate-500 font-medium">{{ __('messages.testimonials_rating_summary') }}</span>
                        </div>
                        <button @click="openReviewModal = true"
                            type="button"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-tropical-700 hover:bg-tropical-800 text-white text-xs font-extrabold uppercase tracking-wider shadow-xs hover:shadow-md transition-all transform hover:-translate-y-0.5">
                            <span>✍️</span>
                            <span>Tulis Testimoni</span>
                        </button>
                    </div>
                </div>

                <!-- Success / Error Flash Alert -->
                @if(session('success_testimonial'))
                <div class="mb-6 p-4 rounded-2xl bg-tropical-100 border border-tropical-300 text-tropical-900 text-xs font-bold flex items-center justify-between shadow-xs animate-bounce">
                    <div class="flex items-center gap-2.5">
                        <span class="text-lg">🎉</span>
                        <span>{{ session('success_testimonial') }}</span>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs font-bold shadow-xs">
                    <span class="block mb-1">Mohon lengkapi formulir testimoni:</span>
                    <ul class="list-disc pl-5 font-medium">
                        @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Editorial Testimonials Asymmetric Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

                    <!-- Featured Hero Quote (Left Column - 5 cols) -->
                    <div class="lg:col-span-5 flex flex-col">
                        <div class="h-full rounded-3xl bg-gradient-to-br from-tropical-900 via-tropical-800 to-tropical-950 text-white p-7 sm:p-9 shadow-lg flex flex-col justify-between relative overflow-hidden group">

                            <!-- Ambient Light Accent -->
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-citrus-400/20 rounded-full blur-2xl pointer-events-none"></div>

                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-1 text-citrus-400 text-sm">
                                        ★★★★★
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full bg-tropical-700/80 border border-tropical-600 text-tropical-200 text-[9px] font-bold uppercase tracking-wider">
                                        Pilihan Favorit #1
                                    </span>
                                </div>

                                <div class="text-3xl sm:text-4xl font-display font-black text-citrus-400 mb-2 leading-none">“</div>
                                <p class="text-base sm:text-lg lg:text-xl font-display font-bold leading-snug text-white mb-6">
                                    "Rasa kedondongnya beneran kerasa, seger banget diminum siang-siang!"
                                </p>
                            </div>

                            <div class="pt-6 border-t border-tropical-700/60 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-citrus-400 to-tropical-600 flex items-center justify-center font-display font-black text-slate-950 text-sm shadow-xs">
                                        BS
                                    </div>
                                    <div>
                                        <span class="text-sm font-extrabold text-white block">Budi Santoso</span>
                                        <span class="text-[10px] text-tropical-300 font-semibold block">✓ Pembeli Terverifikasi &bull; Penikmat Segar</span>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-citrus-400 uppercase bg-tropical-950/60 px-2 py-1 rounded-md border border-tropical-800">
                                    Original Sachet
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Stacked Editorial Cards (Right Column - 7 cols) -->
                    <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <!-- Testimonial 02 -->
                        <div class="rounded-3xl border border-sun-border bg-white p-6 shadow-xs flex flex-col justify-between hover:border-tropical-300 hover:shadow-sm transition-all group">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-citrus-500 text-xs">★★★★★</div>
                                    <span class="px-2 py-0.5 rounded-full bg-tropical-50 text-tropical-800 text-[9px] font-extrabold uppercase">
                                        Bekal Sekolah
                                    </span>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-700 font-medium leading-relaxed mb-4">
                                    "Anak-anak suka banget varian yang less sugar. Praktis buat bekal sekolah dan sehat karena kaya vitamin C."
                                </p>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-tropical-100 text-tropical-800 font-bold text-xs flex items-center justify-center font-display">
                                    SA
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-slate-900 block">Siti Aminah</span>
                                    <span class="text-[9px] text-slate-400 block">Ibu Rumah Tangga &bull; Jakarta</span>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 03 -->
                        <div class="rounded-3xl border border-sun-border bg-white p-6 shadow-xs flex flex-col justify-between hover:border-citrus-300 hover:shadow-sm transition-all group">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-citrus-500 text-xs">★★★★★</div>
                                    <span class="px-2 py-0.5 rounded-full bg-citrus-50 text-citrus-700 text-[9px] font-extrabold uppercase">
                                        Stok Kantor
                                    </span>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-700 font-medium leading-relaxed mb-4">
                                    "Sering order yang family size buat stok di kantor. Ampuh banget buat balikin mata ngantuk abis makan siang."
                                </p>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-citrus-100 text-citrus-800 font-bold text-xs flex items-center justify-center font-display">
                                    AW
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-slate-900 block">Andi Wijaya</span>
                                    <span class="text-[9px] text-slate-400 block">Karyawan Swasta &bull; Surabaya</span>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 04 (Full width on sm grid) -->
                        <div class="sm:col-span-2 rounded-3xl border border-sun-border bg-white p-6 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 hover:border-tropical-300 hover:shadow-sm transition-all">
                            <div class="space-y-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="text-citrus-500 text-xs">★★★★★</div>
                                    <span class="text-[9px] font-extrabold uppercase text-slate-400">Mahasiswa Hemat</span>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-700 font-medium leading-relaxed">
                                    "Harganya lumayan terjangkau buat kantong mahasiswa. Paling suka dicampur es batu banyak-banyak pas siang terik."
                                </p>
                            </div>
                            <div class="flex items-center gap-2.5 shrink-0 pt-2 sm:pt-0 border-t sm:border-t-0 border-slate-100 w-full sm:w-auto">
                                <div class="w-8 h-8 rounded-full bg-tropical-100 text-tropical-800 font-bold text-xs flex items-center justify-center font-display">
                                    RK
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-slate-900 block">Rina Kartika</span>
                                    <span class="text-[9px] text-slate-400 block">Mahasiswa &bull; Bandung</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Verified Store Proof Ribbon -->
                <div class="mt-8 pt-6 border-t border-sun-border flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500 font-medium">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-tropical-500"></span>
                        <span>Ulasan terverifikasi otomatis dari Official Store e-Commerce</span>
                    </div>
                    <div class="flex items-center gap-4 text-[11px] font-bold text-slate-600">
                        <span>Shopee Mall ★ 4.9</span>
                        <span>&bull;</span>
                        <span>Tokopedia ★ 4.9</span>
                        <span>&bull;</span>
                        <span>TikTok Shop ★ 4.8</span>
                    </div>
                </div>

            </div>
        </section>


        <!-- =========================================================================
             7. SECTION 7 — FAQ & FINAL COMMERCIAL ORDER CTA (100dvh Fullscreen)
             ========================================================================= -->
        <section id="faq" class="snap-section w-full h-[100dvh] min-h-[100dvh] max-h-[100dvh] flex flex-col justify-between relative pt-14 pb-2 sm:pt-16 sm:pb-4 border-b border-sun-border bg-sun-bg overflow-hidden">
            <div class="max-w-4xl mx-auto px-4 sm:px-8 w-full my-auto">

                <div class="text-center mb-6 sm:mb-8">
                    <span class="text-xs font-extrabold tracking-widest text-tropical-700 uppercase block mb-1">{{ __('messages.faq_eyebrow') }}</span>
                    <h2 class="text-2xl sm:text-3xl font-display font-extrabold text-slate-950">{{ __('messages.faq_title') }}</h2>
                </div>

                <div class="space-y-3 mb-10">
                    <!-- FAQ 1 -->
                    <div class="rounded-2xl border border-sun-border bg-white overflow-hidden shadow-2xs">
                        <button @click="openFaq = openFaq === 1 ? null : 1" class="w-full px-5 py-3.5 text-left font-bold text-slate-950 flex justify-between items-center text-xs sm:text-sm focus:outline-none">
                            <span>{{ __('messages.faq_1_q') }}</span>
                            <span class="text-tropical-700 text-base font-bold" x-text="openFaq === 1 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 1" x-cloak class="px-5 pb-4 text-xs text-slate-600 leading-relaxed border-t border-sun-border pt-2.5">
                            {{ __('messages.faq_1_a') }}
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="rounded-2xl border border-sun-border bg-white overflow-hidden shadow-2xs">
                        <button @click="openFaq = openFaq === 2 ? null : 2" class="w-full px-5 py-3.5 text-left font-bold text-slate-950 flex justify-between items-center text-xs sm:text-sm focus:outline-none">
                            <span>{{ __('messages.faq_2_q') }}</span>
                            <span class="text-tropical-700 text-base font-bold" x-text="openFaq === 2 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 2" x-cloak class="px-5 pb-4 text-xs text-slate-600 leading-relaxed border-t border-sun-border pt-2.5">
                            {{ __('messages.faq_2_a') }}
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="rounded-2xl border border-sun-border bg-white overflow-hidden shadow-2xs">
                        <button @click="openFaq = openFaq === 3 ? null : 3" class="w-full px-5 py-3.5 text-left font-bold text-slate-950 flex justify-between items-center text-xs sm:text-sm focus:outline-none">
                            <span>{{ __('messages.faq_3_q') }}</span>
                            <span class="text-tropical-700 text-base font-bold" x-text="openFaq === 3 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 3" x-cloak class="px-5 pb-4 text-xs text-slate-600 leading-relaxed border-t border-sun-border pt-2.5">
                            {{ __('messages.faq_3_a') }}
                        </div>
                    </div>
                </div>

                <!-- Final CTA Box -->
                <div class="rounded-3xl border border-tropical-200 bg-tropical-50 p-6 sm:p-8 text-center shadow-xs">
                    <span class="text-[10px] font-extrabold tracking-widest text-tropical-800 uppercase block mb-1">
                        {{ __('messages.final_eyebrow') }}
                    </span>

                    <h2 class="text-xl sm:text-2xl font-display font-extrabold text-slate-950 mb-2">
                        {{ __('messages.final_title') }}
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-600 max-w-lg mx-auto mb-5 leading-relaxed">
                        {{ __('messages.final_subtitle') }}
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                        <a href="#channel"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-tropical-700 hover:bg-tropical-800 text-white font-display font-extrabold text-xs uppercase tracking-wider shadow-xs transition-all transform hover:-translate-y-0.5">
                            <span>{{ __('messages.final_cta') }}</span>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Minimalist Brand Footer (Integrated at bottom of Section 7) -->
            <footer class="bg-tropical-950 text-slate-400 py-6 text-xs border-t border-tropical-900 mt-8 w-full">
                <div class="max-w-7xl mx-auto px-5 sm:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-[11px] text-tropical-400/80 font-medium">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Logo Asli" class="h-6 w-auto rounded-sm object-contain">
                        <span>DonDong &bull; PT Heavenly Nutrition Indonesia</span>
                    </div>
                    <span>{{ __('messages.footer_copyright') }}</span>
                </div>
            </footer>
        </section>

    </main>

    <!-- =========================================================================
         EDITORIAL TESTIMONIAL SUBMISSION MODAL
         ========================================================================= -->
    <div x-show="openReviewModal"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <!-- Modal Box -->
        <div @click.away="openReviewModal = false"
            class="relative w-full max-w-lg rounded-3xl bg-white border border-sun-border p-6 sm:p-8 shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4">

            <!-- Ambient Glow Top -->
            <div class="absolute -top-10 -right-10 w-36 h-36 bg-citrus-400/20 rounded-full blur-2xl pointer-events-none"></div>

            <!-- Close Button -->
            <button @click="openReviewModal = false"
                type="button"
                class="absolute top-5 right-5 w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-900 flex items-center justify-center text-sm font-bold transition focus:outline-none"
                aria-label="Tutup Modal">
                ✕
            </button>

            <!-- Modal Header -->
            <div class="mb-6">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-tropical-700 block mb-1">
                    NUTRISARI DONDONG &bull; TESTIMONI
                </span>
                <h3 class="text-xl sm:text-2xl font-display font-extrabold text-slate-950 mb-1">
                    Bagikan Pengalaman Segar Anda
                </h3>
                <p class="text-xs text-slate-500">
                    Ceritakan bagaimana kesegaran NutriSari DonDong membuat hari Anda lebih bersemangat.
                </p>
            </div>

            <!-- Review Form -->
            <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="rating" :value="reviewRating">

                <!-- Interactive Star Rating Picker -->
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                        Beri Rating Kesegaran <span class="text-citrus-600">*</span>
                    </label>
                    <div class="flex items-center gap-2">
                        <template x-for="star in [1, 2, 3, 4, 5]">
                            <button type="button"
                                @click="reviewRating = star"
                                @mouseenter="reviewHoverRating = star"
                                @mouseleave="reviewHoverRating = reviewRating"
                                class="text-2xl sm:text-3xl transition-transform transform hover:scale-125 focus:outline-none"
                                :class="(reviewHoverRating >= star) ? 'text-citrus-400' : 'text-slate-200'">
                                ★
                            </button>
                        </template>
                        <span class="text-xs font-bold text-tropical-800 ml-2" x-text="reviewRating + ' dari 5 Bintang'"></span>
                    </div>
                </div>

                <!-- Author Name Input -->
                <div>
                    <label for="review-author" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Lengkap <span class="text-citrus-600">*</span>
                    </label>
                    <input type="text"
                        id="review-author"
                        name="author"
                        required
                        placeholder="Contoh: Budi Santoso / Siti A."
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-tropical-600 focus:ring-2 focus:ring-tropical-600/20 text-xs sm:text-sm text-slate-900 placeholder-slate-400 outline-none transition bg-slate-50/50">
                </div>

                <!-- Review Content Textarea -->
                <div>
                    <label for="review-content" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-1.5">
                        Ulasan / Cerita Kesegaran <span class="text-citrus-600">*</span>
                    </label>
                    <textarea id="review-content"
                        name="content"
                        rows="3"
                        required
                        placeholder="Contoh: Rasa asam manisnya pas banget, es batunya bikin tenggorokan plong abis makan siang terik..."
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-tropical-600 focus:ring-2 focus:ring-tropical-600/20 text-xs sm:text-sm text-slate-900 placeholder-slate-400 outline-none transition bg-slate-50/50 resize-none"></textarea>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <span class="text-[10px] text-slate-400 font-medium">
                        🛡️ Testimoni akan ditinjau tim sebelum tampil publik.
                    </span>

                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl bg-tropical-700 hover:bg-tropical-800 text-white font-display font-extrabold text-xs uppercase tracking-wider shadow-sm transition-all transform hover:-translate-y-0.5">
                        Kirim Ulasan Segar
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- Mobile Sticky Quick Buy Action Bar -->
    <div x-show="scrolled" x-cloak
        class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-sun-border p-2.5 px-4 flex items-center justify-between shadow-lg transition-all">
        <div class="flex items-center gap-2.5">
            <div class="w-10 h-10 rounded-xl bg-white border border-sun-border p-0.5 overflow-hidden flex items-center justify-center shadow-2xs">
                <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Logo Asli" class="w-full h-full object-contain transform scale-110">
            </div>
            <div>
                <span class="text-xs font-bold text-slate-900 block leading-tight">DonDong Kedondong</span>
                <span class="text-[10px] text-chilli-600 font-bold block">Tersedia di Shopee, Tokopedia & TikTok</span>
            </div>
        </div>
        <a href="#channel"
            class="px-4 py-2 rounded-xl bg-tropical-800 hover:bg-tropical-900 text-white text-xs font-extrabold shadow-xs">
            Beli
        </a>
    </div>

</body>

</html>