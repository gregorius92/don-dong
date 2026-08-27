<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-[#051108] text-slate-100 antialiased selection:bg-[#22c55e] selection:text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ app()->getLocale() == 'en' ? 'NutriSari DonDong — The Authentic Ambarella Experience' : 'NutriSari DonDong — Segarnya Kedondong Asli, Bikin Balik Lagi' }}</title>
    <meta name="description" content="{{ app()->getLocale() == 'en' ? 'Experience the authentic, crisp sweet-and-sour taste of Indonesian ambarella fruit with NutriSari DonDong. Cinematic instant freshness in every chilled glass.' : 'Nikmati sensasi kesegaran buah kedondong asli Indonesia bersama NutriSari DonDong. Kesegaran alami instan dalam setiap tegukan dingin.' }}">

    <!-- Canonical & OpenGraph -->
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ app()->getLocale() == 'en' ? 'NutriSari DonDong — The Authentic Ambarella Experience' : 'NutriSari DonDong — Segarnya Kedondong Asli' }}">
    <meta property="og:description" content="{{ app()->getLocale() == 'en' ? 'Experience the crisp, iconic sweet-and-sour taste of Indonesian ambarella fruit.' : 'Nikmati sensasi rasa kedondong asli Indonesia yang segar dan tak terlupakan.' }}">
    <meta property="og:site_name" content="NutriSari DonDong">
    <meta property="og:image" content="{{ asset('images/product.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NutriSari DonDong — Segarnya Kedondong Asli">
    <meta name="twitter:image" content="{{ asset('images/product.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">

    <!-- Google Fonts: Outfit (Display & Editorial) & Plus Jakarta Sans (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Preload Hero Poster for Instant First Paint -->
    <link rel="preload" as="image" href="{{ asset('images/hero.png') }}" fetchpriority="high">

    <!-- Tailwind CSS Local Engine -->
    <script>
        // Suppress dev notice in console
        const _origWarn = console.warn;
        console.warn = function(...args) {
            if (args[0] && typeof args[0] === 'string' && (args[0].includes('cdn.tailwindcss.com') || args[0].includes('should not be used in production'))) return;
            _origWarn.apply(console, args);
        };
    </script>
    <script src="{{ file_exists(public_path('js/tailwind.min.js')) ? asset('js/tailwind.min.js') : 'https://cdn.tailwindcss.com' }}"></script>
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
                            800: '#166534',
                            900: '#14532d',
                            950: '#052310',
                        },
                        citrus: {
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Lenis Smooth Scroll (Non-blocking) -->
    <script defer src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

    <!-- GSAP & ScrollTrigger (Non-blocking) -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- Alpine.js for lightweight UI state -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        html, body {
            width: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #051108;
            color: #f1f5f9;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'Outfit', sans-serif;
        }

        /* Responsive Scene Container: Natural Flow with Generous Spacing on Mobile, Strict Fullscreen on Desktop */
        .scene-container {
            position: relative;
            z-index: 10;
            width: 100%;
            min-height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 5.5rem;
            padding-bottom: 5.5rem;
            box-sizing: border-box;
            overflow: visible;
        }

        #scene-1 {
            min-height: 100vh;
            min-height: 100dvh;
            padding-top: 6rem;
            padding-bottom: 3rem;
        }

        @media (min-width: 1024px) {
            .scene-container {
                min-height: 100dvh;
                height: 100dvh;
                max-height: 100dvh;
                padding-top: 4.5rem;
                padding-bottom: 2rem;
                overflow: hidden;
            }
            #scene-1 {
                padding-top: 4.5rem;
                padding-bottom: 2rem;
            }
        }

        /* Cinematic Fixed Video Stage */
        #cinematic-video-stage {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            height: 100svh;
            height: 100dvh;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        #cinematic-video-stage video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transform: translate3d(0, 0, 0) scale(1.04);
            -webkit-transform: translate3d(0, 0, 0) scale(1.04);
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            will-change: transform;
            transition: opacity 0.5s ease-out;
        }

        /* High-Performance Atmospheric Overlay without heavy blend modes */
        .cinematic-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 45%, rgba(5, 17, 8, 0.4) 0%, rgba(5, 17, 8, 0.78) 65%, rgba(5, 17, 8, 0.96) 100%),
                        linear-gradient(180deg, rgba(5, 17, 8, 0.85) 0%, transparent 20%, transparent 75%, rgba(5, 17, 8, 0.96) 100%);
            pointer-events: none;
        }

        .cinematic-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% 20%, rgba(74, 222, 128, 0.1) 0%, transparent 60%);
            pointer-events: none;
        }

        /* Frosted Glass UI */
        .glass-panel {
            background: rgba(10, 29, 13, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(134, 239, 172, 0.15);
        }

        .glass-panel-subtle {
            background: rgba(15, 38, 20, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Kinetic Text Styling */
        .text-outline-light {
            -webkit-text-stroke: 1.5px rgba(255, 255, 255, 0.25);
            color: transparent;
        }

        .text-outline-green {
            -webkit-text-stroke: 1.5px rgba(74, 222, 128, 0.4);
            color: transparent;
        }

        .glow-text-green {
            text-shadow: 0 0 40px rgba(74, 222, 128, 0.45);
        }

        .glow-text-gold {
            text-shadow: 0 0 40px rgba(250, 204, 21, 0.45);
        }

        /* Hide scrollbars */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body class="bg-[#051108] text-slate-100 overflow-x-hidden"
    x-data="{
        mobileNavOpen: false,
        openReviewModal: false,
        openFaqModal: false,
        openFaq: 1,
        reviewRating: 5,
        reviewHoverRating: 5
    }">

    <!-- =========================================================================
         CINEMATIC PRELOADER SCREEN (Wait until video & assets ready)
         ========================================================================= -->
    <div id="cinematic-preloader"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-[#051108] transition-all duration-700 select-none overflow-hidden">
        <!-- Ambient background aura -->
        <div class="absolute w-[350px] h-[350px] sm:w-[450px] sm:h-[450px] rounded-full bg-tropical-500/15 blur-[90px] animate-pulse"></div>
        
        <div class="relative z-10 flex flex-col items-center text-center px-6">
            <!-- Glowing Brand Emblem with pulsing rings -->
            <div class="relative mb-6">
                <div class="absolute -inset-3 rounded-2xl bg-gradient-to-tr from-tropical-500/40 to-citrus-400/30 blur-md animate-ping opacity-60"></div>
                <div class="relative h-20 w-20 sm:h-24 sm:w-24 rounded-2xl bg-black/60 backdrop-blur-xl border border-tropical-400/40 p-1 shadow-2xl flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}"
                        alt="DonDong Logo"
                        loading="eager"
                        decoding="async"
                        class="h-full w-full object-cover rounded-xl shadow-inner">
                </div>
            </div>

            <!-- Kinetic Brand Subtitle -->
            <span class="text-[11px] sm:text-xs font-extrabold uppercase tracking-[0.3em] text-tropical-400 mb-1.5">
                NutriSari DonDong
            </span>
            <h2 class="text-xl sm:text-2xl font-display font-black tracking-tight text-white mb-6">
                {{ app()->getLocale() == 'en' ? 'The Authentic Ambarella Experience' : 'Sensasi Kesegaran Kedondong Asli' }}
            </h2>

            <!-- Modern Slim Progress Track -->
            <div class="w-48 sm:w-56 h-1.5 rounded-full bg-white/10 overflow-hidden relative shadow-inner mb-3">
                <div id="preloader-bar"
                    class="h-full w-0 bg-gradient-to-r from-tropical-400 via-tropical-500 to-citrus-400 rounded-full transition-all duration-300 shadow-[0_0_12px_rgba(74,222,128,0.8)]">
                </div>
            </div>

            <!-- Dynamic Status Text -->
            <div class="flex items-center gap-2 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">
                <span class="w-1.5 h-1.5 rounded-full bg-tropical-400 animate-ping"></span>
                <span id="preloader-text">{{ app()->getLocale() == 'en' ? 'Preparing experience...' : 'Menyiapkan kesegaran...' }}</span>
            </div>
        </div>
    </div>

    <!-- =========================================================================
         CINEMATIC BACKGROUND VIDEO STAGE (Fixed Living Environment)
         ========================================================================= -->
    <div id="cinematic-video-stage" aria-hidden="true">
        <video id="bg-hero-video"
            autoplay
            muted
            loop
            playsinline
            preload="none"
            disablePictureInPicture
            disableRemotePlayback
            poster="{{ asset('images/hero.png') }}"
            class="transition-opacity duration-1000">
            <source src="{{ asset('Green_fruit_floating_in_water_202608272024.mp4') }}" type="video/mp4">
        </video>
        <div class="cinematic-overlay"></div>
        <div class="cinematic-glow"></div>
    </div>

    <!-- =========================================================================
         MINIMALIST FLOATING HEADER (Understated Brand Navigation)
         ========================================================================= -->
    <header class="fixed top-0 left-0 right-0 z-50 w-full px-4 sm:px-8 py-3.5 transition-all duration-300 bg-black/40 backdrop-blur-md border-b border-white/5"
        id="main-nav">
        <div class="max-w-7xl mx-auto flex items-center justify-between">

            <!-- Brand Identifier -->
            <a href="#scene-1" class="flex items-center gap-3 group" aria-label="NutriSari DonDong Homepage">
                <div class="h-10 w-10 sm:h-11 sm:w-11 rounded-xl bg-black/40 backdrop-blur-md border border-white/15 p-0.5 flex items-center justify-center overflow-hidden group-hover:border-tropical-400/50 transition-all duration-300 shadow-md">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}"
                        alt="DonDong Official Emblem"
                        loading="eager"
                        decoding="async"
                        class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] sm:text-xs font-extrabold uppercase tracking-[0.2em] text-tropical-400">NutriSari</span>
                    <span class="text-sm sm:text-base lg:text-lg font-display font-black tracking-tight text-white group-hover:text-citrus-300 transition-colors">DONDONG</span>
                </div>
            </a>

            <!-- Desktop Scene Links (Clean & Number-Free) -->
            <nav class="hidden md:flex items-center gap-7 lg:gap-9 text-xs lg:text-sm font-extrabold uppercase tracking-[0.16em] text-slate-300" aria-label="Navigation">
                <a href="#scene-1" class="hover:text-tropical-400 transition-colors">Home</a>
                <a href="#scene-2" class="hover:text-tropical-400 transition-colors">{{ __('messages.nav_taste') }}</a>
                <a href="#scene-3" class="hover:text-tropical-400 transition-colors">{{ __('messages.nav_story') }}</a>
                <a href="#scene-4" class="hover:text-tropical-400 transition-colors">{{ __('messages.nav_product') }}</a>
                <a href="#scene-5" class="hover:text-tropical-400 transition-colors">{{ __('messages.nav_testimonials') }}</a>
                <a href="#scene-6" class="hover:text-tropical-400 transition-colors">Order Hub</a>
            </nav>

            <!-- Language Switcher & Quick Order CTA -->
            <div class="flex items-center gap-3">
                <div class="inline-flex rounded-full bg-black/40 backdrop-blur-md border border-white/10 p-0.5 text-xs font-bold">
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() == 'id' ? 'bg-tropical-600 text-white font-extrabold' : 'text-slate-400 hover:text-white' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() == 'en' ? 'bg-tropical-600 text-white font-extrabold' : 'text-slate-400 hover:text-white' }}">EN</a>
                </div>

                <a href="#channel"
                    class="hidden sm:inline-flex items-center gap-2 px-5 py-2 rounded-full bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs lg:text-sm uppercase tracking-wider transition-all duration-300 shadow-md">
                    <span>{{ __('messages.nav_order') }}</span>
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                </a>

                <button @click="mobileNavOpen = !mobileNavOpen"
                    class="md:hidden p-2 rounded-xl bg-black/40 backdrop-blur-md border border-white/10 text-white hover:bg-white/10 transition"
                    aria-label="Toggle Menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileNavOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                        <path x-show="mobileNavOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileNavOpen"
            x-cloak
            @click.away="mobileNavOpen = false"
            x-transition
            class="md:hidden mt-2 max-w-7xl mx-auto rounded-2xl glass-panel p-5 space-y-3 shadow-2xl border border-white/15">
            <a href="#scene-1" @click="mobileNavOpen = false" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Home</a>
            <a href="#scene-2" @click="mobileNavOpen = false" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">{{ __('messages.nav_taste') }}</a>
            <a href="#scene-3" @click="mobileNavOpen = false" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">{{ __('messages.nav_story') }}</a>
            <a href="#scene-4" @click="mobileNavOpen = false" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">{{ __('messages.nav_product') }}</a>
            <a href="#scene-5" @click="mobileNavOpen = false" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">{{ __('messages.nav_testimonials') }}</a>
            <a href="#scene-6" @click="mobileNavOpen = false" class="block text-sm font-bold text-slate-200 hover:text-tropical-400">Order Hub</a>
            <div class="pt-2 border-t border-white/10">
                <a href="#channel" @click="mobileNavOpen = false" class="block w-full text-center py-2.5 rounded-xl bg-tropical-500 text-slate-950 font-black text-xs uppercase tracking-wider">
                    {{ __('messages.nav_order') }}
                </a>
            </div>
        </div>
    </header>



    <!-- =========================================================================
         MAIN 6-SCENE FULLSCREEN CONTAINER
         ========================================================================= -->
    <main class="relative z-10 w-full">

        <!-- =========================================================================
             SCENE 01: THE ARRIVAL (Strict 100dvh Fullscreen)
             ========================================================================= -->
        <section id="scene-1" class="scene-container text-center px-4 sm:px-8">
            <div class="max-w-6xl mx-auto w-full flex flex-col items-center justify-center my-auto py-2">

                <div id="hero-label" class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-black/50 backdrop-blur-md border border-tropical-400/30 text-tropical-300 text-xs sm:text-sm md:text-base font-extrabold uppercase tracking-[0.22em] mb-4 shadow-lg opacity-0 transform translate-y-4">
                    <span class="w-2 h-2 rounded-full bg-tropical-400 animate-pulse"></span>
                    <span>{{ __('messages.scene1_label') }}</span>
                    <span class="text-white/30">&bull;</span>
                    <span class="text-citrus-300 font-semibold">{{ __('messages.hero_badge_spicy') }}</span>
                </div>

                <div class="relative mb-3 sm:mb-4 select-none max-w-full">
                    <h1 id="hero-title" class="text-5xl sm:text-7xl md:text-8xl lg:text-[9.5rem] xl:text-[11.5rem] font-display font-black uppercase tracking-tight leading-none text-white glow-text-green opacity-0 transform scale-95 break-words">
                        {{ __('messages.scene1_title') }}
                    </h1>
                </div>

                <p id="hero-sub" class="text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-light text-slate-200 tracking-wide max-w-2xl mx-auto mb-6 sm:mb-8 leading-relaxed opacity-0 transform translate-y-4 px-2">
                    {{ !empty($content->translate('hero_title')) ? $content->translate('hero_title') : __('messages.scene1_emotion') }}
                </p>

                <div id="hero-actions" class="w-full sm:w-auto flex flex-col sm:flex-row items-center justify-center gap-3.5 sm:gap-5 opacity-0 transform translate-y-4">
                    <a href="{{ (!empty($content->hero_cta_link) && $content->hero_cta_link !== '#contact') ? $content->hero_cta_link : '#channel' }}"
                        class="w-full sm:w-auto justify-center inline-flex items-center gap-2.5 px-7 sm:px-8 py-3.5 sm:py-4 rounded-full bg-gradient-to-r from-tropical-500 to-tropical-600 hover:from-tropical-400 hover:to-tropical-500 text-slate-950 font-display font-black text-xs sm:text-sm lg:text-base uppercase tracking-widest transition-all duration-300 transform hover:scale-105 shadow-[0_0_30px_rgba(74,222,128,0.4)]">
                        <span>{{ !empty($content->translate('hero_cta_text')) ? $content->translate('hero_cta_text') : __('messages.hero_cta_primary') }}</span>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                        </svg>
                    </a>

                    <button type="button"
                        id="start-tour-btn"
                        class="w-full sm:w-auto justify-center inline-flex items-center gap-2 px-6 sm:px-7 py-3.5 sm:py-4 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white font-bold text-xs sm:text-sm lg:text-base uppercase tracking-widest transition-all duration-300">
                        <span>{{ __('messages.hero_cta_secondary') }}</span>
                    </button>
                </div>

            </div>

            <!-- Scroll Cue Indicator -->
            <button type="button"
                id="cue-tour-btn"
                class="mt-6 lg:mt-auto mb-2 flex flex-col items-center gap-1.5 text-slate-400 hover:text-tropical-400 transition-colors cursor-pointer focus:outline-none"
                aria-label="{{ app()->getLocale() == 'en' ? 'Discover the Freshness' : 'Jelajahi Kesegaran' }}">
                <span class="text-[10px] sm:text-xs lg:text-sm font-extrabold uppercase tracking-[0.25em]">{{ app()->getLocale() == 'en' ? 'Discover the Freshness' : 'Jelajahi Kesegaran' }}</span>
                <div class="w-4 h-7 sm:w-5 sm:h-8 rounded-full border-2 border-white/30 flex items-start justify-center p-0.5">
                    <div class="w-1.5 h-2.5 rounded-full bg-tropical-400 animate-bounce"></div>
                </div>
            </button>
        </section>


        <!-- =========================================================================
             SCENE 02: THE TASTE (Strict 100dvh Fullscreen)
             ========================================================================= -->
        <section id="scene-2" class="scene-container px-4 sm:px-8">
            <div class="max-w-7xl mx-auto w-full my-auto py-4 lg:py-0">

                <!-- Kinetic Sensory Word Row -->
                <div class="kinetic-words-wrap flex items-center justify-between gap-3 sm:gap-6 mb-6 sm:mb-8 overflow-x-auto lg:overflow-hidden no-scrollbar select-none opacity-90 w-full py-2">
                    <span class="text-2xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-black text-outline-green uppercase tracking-tighter kinetic-word whitespace-nowrap leading-none shrink-0" data-speed="1.2">{{ __('messages.scene2_word_1') }}</span>
                    <span class="text-2xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-black text-white glow-text-green uppercase tracking-tighter kinetic-word whitespace-nowrap leading-none shrink-0" data-speed="0.8">{{ __('messages.scene2_word_2') }}</span>
                    <span class="text-2xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-black text-outline-light uppercase tracking-tighter kinetic-word whitespace-nowrap leading-none shrink-0" data-speed="1.4">{{ __('messages.scene2_word_3') }}</span>
                    <span class="text-2xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-black text-citrus-400 glow-text-gold uppercase tracking-tighter kinetic-word whitespace-nowrap leading-none shrink-0" data-speed="0.9">{{ __('messages.scene2_word_4') }}</span>
                </div>

                <!-- 2-Column Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                    <div class="lg:col-span-6 space-y-4">
                        <div class="inline-flex items-center gap-2 text-tropical-400 text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.2em]">
                            <span class="w-8 h-[2px] bg-tropical-400"></span>
                            <span>{{ __('messages.taste_eyebrow') }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-4xl lg:text-5xl xl:text-6xl font-display font-black tracking-tight text-white leading-tight">
                            {{ !empty($content->translate('benefits_title')) ? $content->translate('benefits_title') : __('messages.taste_title') }}
                        </h2>

                        <p class="text-sm sm:text-base lg:text-lg xl:text-xl text-slate-300 font-light leading-relaxed">
                            {{ !empty($content->translate('benefits_content')) ? $content->translate('benefits_content') : __('messages.taste_desc') }}
                        </p>

                        <div class="p-4 sm:p-5 rounded-xl glass-panel-subtle border-l-4 border-tropical-400">
                            <p class="text-xs sm:text-sm lg:text-base xl:text-lg text-slate-200 italic font-serif leading-relaxed">
                                "{{ __('messages.taste_detail') }}"
                            </p>
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="rounded-2xl glass-panel p-5 sm:p-7 shadow-xl space-y-4">
                            <div>
                                <span class="text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.2em] text-tropical-300 block mb-1">
                                    {{ __('messages.flavor_meter_title') }}
                                </span>
                                <p class="text-xs sm:text-sm text-slate-300 font-medium">
                                    {{ __('messages.flavor_meter_subtitle') }}
                                </p>
                            </div>

                            <div class="space-y-3.5">
                                <div>
                                    <div class="flex justify-between items-center text-xs sm:text-sm lg:text-base font-bold text-slate-200 mb-1.5">
                                        <span class="flex items-center gap-2"><span>🍋</span><span>{{ __('messages.flavor_stat_1_name') }}</span></span>
                                        <span class="text-tropical-400 font-mono font-black text-xs sm:text-sm lg:text-base">{{ __('messages.flavor_stat_1_val') }}</span>
                                    </div>
                                    <div class="h-2 sm:h-2.5 w-full rounded-full bg-white/10 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-tropical-500 to-tropical-400 w-[90%]"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between items-center text-xs sm:text-sm lg:text-base font-bold text-slate-200 mb-1.5">
                                        <span class="flex items-center gap-2"><span>🍯</span><span>{{ __('messages.flavor_stat_2_name') }}</span></span>
                                        <span class="text-citrus-300 font-mono font-black text-xs sm:text-sm lg:text-base">{{ __('messages.flavor_stat_2_val') }}</span>
                                    </div>
                                    <div class="h-2 sm:h-2.5 w-full rounded-full bg-white/10 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-citrus-400 to-citrus-300 w-[70%]"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between items-center text-xs sm:text-sm lg:text-base font-bold text-slate-200 mb-1.5">
                                        <span class="flex items-center gap-2"><span>🧊</span><span>{{ __('messages.flavor_stat_3_name') }}</span></span>
                                        <span class="text-tropical-400 font-mono font-black text-xs sm:text-sm lg:text-base">{{ __('messages.flavor_stat_3_val') }}</span>
                                    </div>
                                    <div class="h-2 sm:h-2.5 w-full rounded-full bg-white/10 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-tropical-400 to-cyan-400 w-[100%]"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between items-center text-xs sm:text-sm lg:text-base font-bold text-slate-200 mb-1.5">
                                        <span class="flex items-center gap-2"><span>🌿</span><span>{{ __('messages.flavor_stat_4_name') }}</span></span>
                                        <span class="text-tropical-300 font-mono font-black text-xs sm:text-sm lg:text-base">{{ __('messages.flavor_stat_4_val') }}</span>
                                    </div>
                                    <div class="h-2 sm:h-2.5 w-full rounded-full bg-white/10 overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-tropical-500 to-citrus-400 w-[95%]"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- =========================================================================
             SCENE 03: THE FRUIT (Strict 100dvh Fullscreen)
             ========================================================================= -->
        <section id="scene-3" class="scene-container px-4 sm:px-8">
            <div class="max-w-7xl mx-auto w-full my-auto py-4 lg:py-0">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                    <div class="lg:col-span-5 flex justify-center">
                        <div class="relative w-full max-w-xs sm:max-w-md rounded-2xl overflow-hidden glass-panel p-2.5 shadow-2xl group">
                            <div class="relative aspect-square rounded-xl overflow-hidden bg-black/60">
                                <img src="{{ !empty($content->ingredients_image) ? asset('storage/' . $content->ingredients_image) : asset('images/ingredients.png') }}"
                                    alt="Buah Kedondong Tropis Nusantara Segar"
                                    loading="lazy"
                                    decoding="async"
                                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                                <div class="absolute bottom-3.5 left-3.5 right-3.5 flex items-center justify-between text-xs sm:text-sm font-bold text-white">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/70 backdrop-blur-md border border-white/20">
                                        <span class="w-2 h-2 rounded-full bg-tropical-400"></span>
                                        <span>{{ __('messages.fruit_tag_1') }}</span>
                                    </span>
                                    <span class="text-tropical-300">{{ __('messages.fruit_tag_2') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7 space-y-4">
                        <div class="inline-flex items-center gap-2 text-tropical-400 text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.2em]">
                            <span class="w-8 h-[2px] bg-tropical-400"></span>
                            <span>{{ __('messages.story_eyebrow') }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-4xl lg:text-5xl xl:text-6xl font-display font-black tracking-tight text-white leading-tight">
                            {{ !empty($content->translate('ingredients_title')) ? $content->translate('ingredients_title') : __('messages.story_title') }}
                        </h2>

                        <p class="text-sm sm:text-base lg:text-lg xl:text-xl text-slate-300 font-light leading-relaxed">
                            {{ !empty($content->translate('ingredients_content')) ? $content->translate('ingredients_content') : __('messages.story_p1') }}
                        </p>

                        <p class="text-xs sm:text-sm lg:text-base text-slate-400 leading-relaxed">
                            {{ __('messages.story_p2') }}
                        </p>

                        <div class="pt-3 grid grid-cols-1 sm:grid-cols-2 gap-3.5 sm:gap-4">
                            <div class="p-4 rounded-xl glass-panel-subtle text-left">
                                <span class="text-xs sm:text-sm lg:text-base font-extrabold uppercase text-tropical-300 block mb-1">{{ __('messages.fruit_feature_1_title') }}</span>
                                <span class="text-xs sm:text-sm lg:text-base text-slate-300">{{ __('messages.fruit_feature_1_desc') }}</span>
                            </div>
                            <div class="p-4 rounded-xl glass-panel-subtle text-left">
                                <span class="text-xs sm:text-sm lg:text-base font-extrabold uppercase text-citrus-300 block mb-1">{{ __('messages.fruit_feature_2_title') }}</span>
                                <span class="text-xs sm:text-sm lg:text-base text-slate-300">{{ __('messages.fruit_feature_2_desc') }}</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- =========================================================================
             SCENE 04: THE PRODUCT SHOWCASE (Strict 100dvh Fullscreen - 3 Cards Grid)
             ========================================================================= -->
        <section id="scene-4" class="scene-container px-4 sm:px-8">
            <div class="max-w-7xl mx-auto w-full my-auto py-4 lg:py-0">

                <div class="text-center mb-6 sm:mb-8">
                    <span class="text-tropical-400 text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.25em] block mb-1.5">
                        {{ __('messages.product_scene_eyebrow') }}
                    </span>
                    <h2 class="text-2xl sm:text-4xl lg:text-5xl font-display font-black text-white tracking-tight leading-tight">
                        {{ __('messages.product_scene_title') }}
                    </h2>
                </div>

                <!-- 3-Product Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6 mb-6 sm:mb-7">
                    @php
                        $displayProducts = (isset($products) && $products->isNotEmpty()) ? $products->take(3) : collect([
                            (object)[
                                'name' => 'DonDong! Original Sachet',
                                'description' => 'Bubuk minuman sari kedondong asli kemasan sachet isi 10. Praktis larut seketika di air es.',
                                'price_display' => 'Rp 25.000 / Box (10s)',
                                'image_path' => null
                            ],
                            (object)[
                                'name' => 'DonDong! Less Sugar',
                                'description' => 'Varian rendah gula dengan pemanis alami, sensasi segar ekstra dingin tetap maksimal.',
                                'price_display' => 'Rp 28.000 / Box (10s)',
                                'image_path' => null
                            ],
                            (object)[
                                'name' => 'DonDong! Family Pouch',
                                'description' => 'Kemasan hemat 500g untuk dinikmati bersama seluruh anggota keluarga setiap saat.',
                                'price_display' => 'Rp 85.000 / Pouch (500g)',
                                'image_path' => null
                            ],
                        ]);
                    @endphp

                    @foreach($displayProducts as $index => $prod)
                        <div class="rounded-2xl glass-panel p-5 sm:p-6 shadow-2xl flex flex-col justify-between group hover:border-tropical-400/50 transition-all duration-300">
                            <div>
                                <!-- Packshot Canvas -->
                                <div class="relative w-full h-[130px] sm:h-[140px] rounded-xl bg-black/40 border border-white/10 p-3 flex items-center justify-center overflow-hidden mb-3.5 group-hover:bg-black/60 transition">
                                    <img src="{{ !empty($prod->image_path) ? asset('storage/' . $prod->image_path) : asset('images/product.png') }}"
                                        alt="{{ is_object($prod) && method_exists($prod, 'translate') ? $prod->translate('name') : $prod->name }}"
                                        loading="lazy"
                                        decoding="async"
                                        class="w-full h-full object-contain drop-shadow-xl group-hover:scale-105 transition-transform duration-300">

                                    <div class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-full bg-tropical-500/20 backdrop-blur-md border border-tropical-400/30 text-[10px] font-black uppercase text-tropical-300">
                                        {{ $index === 0 ? '✨ Best Seller' : ($index === 1 ? '🍃 Low Sugar' : '🏡 Family Size') }}
                                    </div>
                                </div>

                                <h3 class="text-base sm:text-lg font-display font-black text-white group-hover:text-citrus-300 transition-colors mb-1.5 truncate">
                                    {{ is_object($prod) && method_exists($prod, 'translate') ? $prod->translate('name') : $prod->name }}
                                </h3>

                                <p class="text-xs sm:text-sm text-slate-300 line-clamp-2 mb-3 leading-relaxed font-light">
                                    {{ is_object($prod) && method_exists($prod, 'translate') ? $prod->translate('description') : $prod->description }}
                                </p>
                            </div>

                            <div class="pt-3 border-t border-white/10 flex items-center justify-between gap-2">
                                <div>
                                    <span class="text-xs sm:text-sm font-display font-black text-citrus-400 block">
                                        {{ $prod->price_display ?? 'Rp 25.000' }}
                                    </span>
                                </div>
                                <a href="#channel"
                                    class="px-3.5 sm:px-4 py-1.5 rounded-full bg-tropical-500 hover:bg-tropical-400 text-slate-950 text-xs font-display font-black uppercase tracking-wider transition transform hover:scale-105 shadow-md">
                                    {{ __('messages.order_now') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Catalog Link CTA -->
                <div class="text-center pt-2">
                    <a href="{{ route('products.catalog') }}"
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-white/10 hover:bg-tropical-500/20 border border-white/15 hover:border-tropical-400/50 text-xs sm:text-sm font-display font-bold text-slate-200 hover:text-white transition transform hover:scale-105 shadow-lg">
                        <span>🛍️</span>
                        <span>{{ __('messages.view_all_products') }}</span>
                        <span class="text-tropical-300 font-extrabold">&rarr;</span>
                    </a>
                </div>

            </div>
        </section>


        <!-- =========================================================================
             SCENE 05: THE TESTIMONIALS & MOMENTS (Strict 100dvh Fullscreen)
             ========================================================================= -->
        <section id="scene-5" class="scene-container px-4 sm:px-8">
            <div class="max-w-7xl mx-auto w-full my-auto py-4 lg:py-0">

                @if(session('success_testimonial'))
                    <div class="mb-4 p-3.5 rounded-xl bg-tropical-500/20 border border-tropical-400 text-tropical-300 text-xs sm:text-sm text-center font-bold">
                        🎉 {{ session('success_testimonial') }}
                    </div>
                @endif

                <div class="text-center mb-6 sm:mb-8">
                    <span class="text-citrus-300 text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.25em] block mb-1">
                        {{ __('messages.testimonials_eyebrow') }}
                    </span>
                    <h2 class="text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-display font-black text-white tracking-tight leading-tight">
                        {{ __('messages.testimonials_title') }}
                    </h2>
                    <p class="text-xs sm:text-sm lg:text-base text-tropical-300 font-light mt-1.5">
                        {{ __('messages.testimonials_rating_summary') }}
                    </p>
                </div>

                <!-- Testimonials Grid (3 Verified Buyer Cards) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 mb-6">
                    @forelse($testimonials->take(3) as $testimonial)
                        <div class="p-5 rounded-2xl glass-panel flex flex-col justify-between shadow-xl border border-white/10 hover:border-tropical-400/40 transition group">
                            <div>
                                <div class="flex items-center justify-between mb-2.5">
                                    <div class="text-citrus-400 text-sm sm:text-base tracking-wider">
                                        @for($i = 0; $i < ($testimonial->rating ?? 5); $i++) ★ @endfor
                                    </div>
                                    <span class="px-2 py-0.5 rounded-full bg-tropical-500/20 text-tropical-300 text-[10px] font-extrabold uppercase tracking-wider">
                                        {{ __('messages.verified_badge') }}
                                    </span>
                                </div>
                                <p class="text-xs sm:text-sm lg:text-base text-slate-200 font-medium leading-relaxed italic mb-3">
                                    "{{ $testimonial->translate('content') }}"
                                </p>
                            </div>
                            <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-tropical-500/20 border border-tropical-400/40 flex items-center justify-center font-bold text-xs text-tropical-300 shrink-0">
                                    {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-white leading-none">{{ $testimonial->author_name }}</h4>
                                    <span class="text-[10px] sm:text-xs text-slate-400">{{ $testimonial->author_title ?? (app()->getLocale() == 'en' ? 'NutriSari DonDong Customer' : 'Pembeli NutriSari DonDong') }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-5 rounded-2xl glass-panel flex flex-col justify-between shadow-xl border border-white/10 hover:border-tropical-400/40 transition">
                            <div>
                                <div class="flex items-center justify-between mb-2.5">
                                    <div class="text-citrus-400 text-sm sm:text-base">★★★★★</div>
                                    <span class="px-2 py-0.5 rounded-full bg-tropical-500/20 text-tropical-300 text-[10px] font-extrabold uppercase">{{ __('messages.verified_badge') }}</span>
                                </div>
                                <p class="text-xs sm:text-sm lg:text-base text-slate-200 font-medium leading-relaxed italic mb-3">
                                    "{{ app()->getLocale() == 'en' ? 'The genuine sweet-sour ambarella flavor is spot on! Especially revitalizing served cold on a hot afternoon.' : 'Rasa asam manis kedondongnya beneran otentik! Pas banget diminum dingin pas siang hari terik.' }}"
                                </p>
                            </div>
                            <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-tropical-500/20 text-tropical-300 font-bold text-xs flex items-center justify-center shrink-0">B</div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-white">Budi Santoso</h4>
                                    <span class="text-[10px] sm:text-xs text-slate-400">{{ app()->getLocale() == 'en' ? 'Fruit Drink Lover • Jakarta' : 'Pecinta Minuman Buah • Jakarta' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 rounded-2xl glass-panel flex flex-col justify-between shadow-xl border border-white/10 hover:border-tropical-400/40 transition">
                            <div>
                                <div class="flex items-center justify-between mb-2.5">
                                    <div class="text-citrus-400 text-sm sm:text-base">★★★★★</div>
                                    <span class="px-2 py-0.5 rounded-full bg-tropical-500/20 text-tropical-300 text-[10px] font-extrabold uppercase">{{ __('messages.verified_badge') }}</span>
                                </div>
                                <p class="text-xs sm:text-sm lg:text-base text-slate-200 font-medium leading-relaxed italic mb-3">
                                    "{{ app()->getLocale() == 'en' ? 'Incredible freshness! Never imagined enjoying authentic ambarella drink this easily without any harsh sourness.' : 'Seger parah! Gak nyangka kedondong bisa diseduh sepraktis ini dan gak asam berlebihan di lambung.' }}"
                                </p>
                            </div>
                            <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-citrus-500/20 text-citrus-300 font-bold text-xs flex items-center justify-center shrink-0">S</div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-white">Siti Rahmawati</h4>
                                    <span class="text-[10px] sm:text-xs text-slate-400">{{ app()->getLocale() == 'en' ? 'Homemaker • Surabaya' : 'Ibu Rumah Tangga • Surabaya' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 rounded-2xl glass-panel flex flex-col justify-between shadow-xl border border-white/10 hover:border-tropical-400/40 transition">
                            <div>
                                <div class="flex items-center justify-between mb-2.5">
                                    <div class="text-citrus-400 text-sm sm:text-base">★★★★★</div>
                                    <span class="px-2 py-0.5 rounded-full bg-tropical-500/20 text-tropical-300 text-[10px] font-extrabold uppercase">{{ __('messages.verified_badge') }}</span>
                                </div>
                                <p class="text-xs sm:text-sm lg:text-base text-slate-200 font-medium leading-relaxed italic mb-3">
                                    "{{ app()->getLocale() == 'en' ? 'Right after spicy meals, a glass of cold NutriSari DonDong cleanses the palate completely!' : 'Habis makan pedas langsung minum NutriSari DonDong dingin, langsung seger tuntas!' }}"
                                </p>
                            </div>
                            <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-tropical-500/20 text-tropical-300 font-bold text-xs flex items-center justify-center shrink-0">R</div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-white">Reza Pratama</h4>
                                    <span class="text-[10px] sm:text-xs text-slate-400">{{ app()->getLocale() == 'en' ? 'Student • Bandung' : 'Mahasiswa • Bandung' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Action Bar & Review Invitation -->
                <div class="rounded-2xl glass-panel p-4 sm:p-5 flex flex-col sm:flex-row items-center justify-between gap-3.5 text-center sm:text-left">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-tropical-400 animate-pulse"></span>
                        <span class="text-xs sm:text-sm lg:text-base text-slate-200 font-medium">
                            {{ __('messages.testimonial_invite') }}
                        </span>
                    </div>
                    <button @click="openReviewModal = true"
                        type="button"
                        class="w-full sm:w-auto px-6 py-2.5 rounded-full bg-tropical-500 hover:bg-tropical-400 text-slate-950 text-xs sm:text-sm font-display font-black uppercase tracking-wider transition transform hover:scale-105 shadow-md shrink-0">
                        ✍️ {{ __('messages.testimonial_cta') }}
                    </button>
                </div>

            </div>
        </section>


        <!-- =========================================================================
             SCENE 06: THE FINAL REVEAL & ORDER HUB (Strict 100dvh Fullscreen)
             ========================================================================= -->
        <section id="scene-6" class="scene-container px-4 sm:px-8 justify-between">
            <div class="max-w-6xl mx-auto w-full my-auto text-center py-4 lg:py-0">

                <!-- Grand Title -->
                <div class="mb-6 sm:mb-8">
                    <span class="text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.25em] text-tropical-400 block mb-1.5">
                        {{ __('messages.final_eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-display font-black text-white tracking-tight leading-tight mb-2.5">
                        {{ __('messages.final_title') }}
                    </h2>
                    <p class="text-sm sm:text-lg md:text-xl lg:text-2xl text-slate-300 font-light max-w-2xl mx-auto mb-6">
                        {{ __('messages.final_subtitle') }}
                    </p>

                    <a href="#channel"
                        class="inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-gradient-to-r from-tropical-500 to-tropical-600 hover:from-tropical-400 hover:to-tropical-500 text-slate-950 font-display font-black text-xs sm:text-sm lg:text-base uppercase tracking-widest transition-all duration-300 transform hover:scale-105 shadow-[0_0_30px_rgba(74,222,128,0.4)]">
                        <span>{{ __('messages.scene6_try_now') }}</span>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                        </svg>
                    </a>
                </div>

                <!-- Official Channels Hub Grid -->
                <div id="channel" class="rounded-2xl glass-panel p-5 sm:p-7 shadow-xl mb-6">
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="text-xs sm:text-sm lg:text-base font-extrabold uppercase tracking-[0.2em] text-tropical-400">{{ __('messages.channel_title') }}</span>
                        <a href="https://linktr.ee/dondongkedondong" target="_blank"
                            class="text-xs sm:text-sm font-extrabold text-tropical-300 hover:underline">
                            🌴 Linktree Hub &rarr;
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4">
                        <a href="https://shopee.co.id/kedondongshop" target="_blank"
                            class="p-4 rounded-xl bg-white/5 border border-orange-500/30 hover:border-orange-500 hover:bg-orange-500/10 transition group flex items-center justify-between">
                            <div class="flex items-center gap-3 text-left">
                                <div class="w-10 h-10 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center font-black text-sm sm:text-base shrink-0">S</div>
                                <div>
                                    <span class="text-[10px] sm:text-xs font-extrabold uppercase text-orange-400 block">Shopee Mall</span>
                                    <span class="text-xs sm:text-sm lg:text-base font-bold text-white">kedondongshop</span>
                                </div>
                            </div>
                        </a>

                        <a href="https://www.tokopedia.com/dondongkedondong" target="_blank"
                            class="p-4 rounded-xl bg-white/5 border border-emerald-500/30 hover:border-emerald-500 hover:bg-emerald-500/10 transition group flex items-center justify-between">
                            <div class="flex items-center gap-3 text-left">
                                <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black text-sm sm:text-base shrink-0">T</div>
                                <div>
                                    <span class="text-[10px] sm:text-xs font-extrabold uppercase text-emerald-400 block">Tokopedia</span>
                                    <span class="text-xs sm:text-sm lg:text-base font-bold text-white">dondongkedondong</span>
                                </div>
                            </div>
                        </a>

                        <a href="https://www.tiktok.com/@dondong_kedondong" target="_blank"
                            class="p-4 rounded-xl bg-white/5 border border-white/20 hover:border-white hover:bg-white/10 transition group flex items-center justify-between">
                            <div class="flex items-center gap-3 text-left">
                                <div class="w-10 h-10 rounded-lg bg-white/20 text-white flex items-center justify-center font-black text-sm sm:text-base shrink-0">♪</div>
                                <div>
                                    <span class="text-[10px] sm:text-xs font-extrabold uppercase text-slate-300 block">TikTok Shop</span>
                                    <span class="text-xs sm:text-sm lg:text-base font-bold text-white">@dondong</span>
                                </div>
                            </div>
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20NutriSari%20DonDong%2C%20saya%20ingin%20pesan" target="_blank"
                            class="p-4 rounded-xl bg-tropical-600/20 border border-tropical-400/40 hover:border-tropical-400 hover:bg-tropical-600/30 transition group flex items-center justify-between">
                            <div class="flex items-center gap-3 text-left">
                                <div class="w-10 h-10 rounded-lg bg-tropical-500 text-slate-950 flex items-center justify-center font-black text-sm sm:text-base shrink-0">WA</div>
                                <div>
                                    <span class="text-[10px] sm:text-xs font-extrabold uppercase text-tropical-300 block">WhatsApp</span>
                                    <span class="text-xs sm:text-sm lg:text-base font-bold text-white">{{ __('messages.order_direct') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-3 mb-6">
                    <button @click="openFaqModal = true"
                        type="button"
                        class="text-xs sm:text-sm lg:text-base text-slate-400 hover:text-tropical-300 transition underline font-medium">
                        ❓ {{ __('messages.faq_btn') }}
                    </button>
                </div>

            </div>

            <!-- Minimalist Footer -->
            <footer class="w-full pt-4 pb-2 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs sm:text-sm text-slate-400 mt-6 lg:mt-auto">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="DonDong Logo" loading="lazy" decoding="async" class="h-6 w-auto rounded object-contain">
                    <span class="text-slate-300 font-semibold">{{ __('messages.company_name') }}</span>
                </div>
                <span>{{ __('messages.footer_copyright') }}</span>
            </footer>
        </section>

    </main>

    <!-- =========================================================================
         MODAL: FAQ MODAL
         ========================================================================= -->
    <div x-show="openFaqModal"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/80 backdrop-blur-md"
        x-transition>
        <div @click.away="openFaqModal = false"
            class="relative w-full max-w-2xl rounded-2xl glass-panel p-6 sm:p-8 shadow-2xl border border-white/20">
            <button @click="openFaqModal = false"
                type="button"
                class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-slate-300 flex items-center justify-center text-sm font-bold transition">
                ✕
            </button>
            <div class="mb-5">
                <span class="text-xs sm:text-sm font-extrabold uppercase tracking-[0.2em] text-tropical-400 block mb-1">{{ __('messages.faq_eyebrow') }}</span>
                <h3 class="text-xl sm:text-2xl font-display font-black text-white">{{ __('messages.faq_title') }}</h3>
            </div>
            <div class="space-y-3">
                <div class="rounded-xl glass-panel-subtle overflow-hidden">
                    <button @click="openFaq = openFaq === 1 ? null : 1" class="w-full px-5 py-3.5 text-left font-bold text-white flex justify-between items-center text-xs sm:text-sm lg:text-base">
                        <span>{{ __('messages.faq_1_q') }}</span>
                        <span class="text-tropical-400 text-base" x-text="openFaq === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="openFaq === 1" class="px-5 pb-4 text-xs sm:text-sm lg:text-base text-slate-300 leading-relaxed border-t border-white/10 pt-2.5">
                        {{ __('messages.faq_1_a') }}
                    </div>
                </div>
                <div class="rounded-xl glass-panel-subtle overflow-hidden">
                    <button @click="openFaq = openFaq === 2 ? null : 2" class="w-full px-5 py-3.5 text-left font-bold text-white flex justify-between items-center text-xs sm:text-sm lg:text-base">
                        <span>{{ __('messages.faq_2_q') }}</span>
                        <span class="text-tropical-400 text-base" x-text="openFaq === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="openFaq === 2" class="px-5 pb-4 text-xs sm:text-sm lg:text-base text-slate-300 leading-relaxed border-t border-white/10 pt-2.5">
                        {{ __('messages.faq_2_a') }}
                    </div>
                </div>
                <div class="rounded-xl glass-panel-subtle overflow-hidden">
                    <button @click="openFaq = openFaq === 3 ? null : 3" class="w-full px-5 py-3.5 text-left font-bold text-white flex justify-between items-center text-xs sm:text-sm lg:text-base">
                        <span>{{ __('messages.faq_3_q') }}</span>
                        <span class="text-tropical-400 text-base" x-text="openFaq === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="openFaq === 3" class="px-5 pb-4 text-xs sm:text-sm lg:text-base text-slate-300 leading-relaxed border-t border-white/10 pt-2.5">
                        {{ __('messages.faq_3_a') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =========================================================================
         MODAL: TULIS ULASAN / TESTIMONIAL
         ========================================================================= -->
    <div x-show="openReviewModal"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/80 backdrop-blur-md"
        x-transition>
        <div @click.away="openReviewModal = false"
            class="relative w-full max-w-2xl rounded-2xl glass-panel p-6 sm:p-8 shadow-2xl border border-white/20">

            <button @click="openReviewModal = false"
                type="button"
                class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-slate-300 flex items-center justify-center text-sm font-bold transition">
                ✕
            </button>

            <div class="mb-5">
                <span class="text-xs sm:text-sm font-extrabold uppercase tracking-[0.2em] text-tropical-400 block mb-1">
                    {{ __('messages.review_modal_eyebrow') }}
                </span>
                <h3 class="text-xl sm:text-2xl font-display font-black text-white">
                    {{ __('messages.review_modal_title') }}
                </h3>
            </div>

            <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="rating" :value="reviewRating">

                <div>
                    <label class="block text-xs sm:text-sm font-extrabold uppercase tracking-wider text-slate-300 mb-1.5">
                        {{ __('messages.review_modal_rating_label') }} <span class="text-citrus-400">*</span>
                    </label>
                    <div class="flex items-center gap-2">
                        <template x-for="star in [1, 2, 3, 4, 5]">
                            <button type="button"
                                @click="reviewRating = star"
                                @mouseenter="reviewHoverRating = star"
                                @mouseleave="reviewHoverRating = reviewRating"
                                class="text-2xl sm:text-3xl transition-transform transform hover:scale-125 focus:outline-none"
                                :class="(reviewHoverRating >= star) ? 'text-citrus-400' : 'text-white/20'">
                                ★
                            </button>
                        </template>
                        <span class="text-sm font-bold text-tropical-300 ml-2" x-text="reviewRating + ' / 5'"></span>
                    </div>
                </div>

                <div>
                    <label for="review-author" class="block text-xs sm:text-sm font-extrabold uppercase tracking-wider text-slate-300 mb-1.5">
                        {{ __('messages.review_modal_author_label') }} <span class="text-citrus-400">*</span>
                    </label>
                    <input type="text"
                        id="review-author"
                        name="author"
                        required
                        placeholder="{{ __('messages.review_modal_author_placeholder') }}"
                        class="w-full px-4 py-3 rounded-xl border border-white/20 bg-black/40 focus:border-tropical-400 text-xs sm:text-sm text-white placeholder-slate-500 outline-none transition">
                </div>

                <div>
                    <label for="review-content" class="block text-xs sm:text-sm font-extrabold uppercase tracking-wider text-slate-300 mb-1.5">
                        {{ __('messages.review_modal_content_label') }} <span class="text-citrus-400">*</span>
                    </label>
                    <textarea id="review-content"
                        name="content"
                        rows="3"
                        required
                        placeholder="{{ __('messages.review_modal_content_placeholder') }}"
                        class="w-full px-4 py-3 rounded-xl border border-white/20 bg-black/40 focus:border-tropical-400 text-xs sm:text-sm text-white placeholder-slate-500 outline-none transition resize-none"></textarea>
                </div>

                <div class="pt-2 flex items-center justify-between">
                    <span class="text-xs text-slate-400">🛡️ {{ __('messages.review_modal_verified_note') }}</span>
                    <button type="submit"
                        class="px-6 py-3 rounded-full bg-tropical-500 hover:bg-tropical-400 text-slate-950 font-display font-black text-xs sm:text-sm uppercase tracking-wider transition">
                        {{ __('messages.review_modal_submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- =========================================================================
         CINEMATIC SCRIPT ENGINE: LENIS + GSAP SCROLLTRIGGER + AUTO TOUR
         ========================================================================= -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Initialize Lenis Smooth Scrolling
            let lenis = null;
            try {
                if (typeof Lenis !== 'undefined') {
                    lenis = new Lenis({
                        duration: 1.2,
                        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                        smoothWheel: true,
                        smoothTouch: false
                    });

                    lenis.on('scroll', ScrollTrigger.update);
                    gsap.ticker.add((time) => {
                        lenis.raf(time * 1000);
                    });
                    gsap.ticker.lagSmoothing(500, 33);
                }
            } catch (err) {
                console.warn('Lenis init skipped, using native scrolling:', err);
            }

            // Universal Scroll Helper
            window.smoothScrollTo = function(targetSelector, onComplete) {
                const target = document.querySelector(targetSelector);
                if (!target) return;

                if (lenis) {
                    lenis.scrollTo(target, {
                        duration: 1.5,
                        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                        onComplete: () => {
                            if (typeof onComplete === 'function') onComplete();
                        }
                    });
                } else {
                    target.scrollIntoView({ behavior: 'smooth' });
                    if (typeof onComplete === 'function') {
                        setTimeout(onComplete, 1200);
                    }
                }
            };

            // 2. Smooth Scroll for all in-page anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href && href !== '#' && document.querySelector(href)) {
                        e.preventDefault();
                        if (isTourActive) stopAutoTour();
                        window.smoothScrollTo(href);
                    }
                });
            });

            // Preloader Controller: Instant, Smooth Reveal
            const preloader = document.getElementById('cinematic-preloader');
            const preloaderBar = document.getElementById('preloader-bar');
            const preloaderText = document.getElementById('preloader-text');
            const heroVideo = document.getElementById('bg-hero-video');

            let isRevealed = false;
            let heroTl = null;

            function finishAndReveal() {
                if (isRevealed) return;
                isRevealed = true;

                if (preloaderBar) preloaderBar.style.width = '100%';
                if (preloaderText) {
                    preloaderText.innerText = "{{ app()->getLocale() == 'en' ? 'Ready!' : 'Kesegaran Siap!' }}";
                }

                setTimeout(() => {
                    if (preloader) {
                        preloader.classList.add('opacity-0', 'pointer-events-none');
                        setTimeout(() => {
                            preloader.remove();
                        }, 400);
                    }

                    // Trigger Hero GSAP entrance animation
                    if (heroTl) {
                        heroTl.play();
                    }
                }, 80);
            }

            // Immediately reveal without artificial delays
            setTimeout(finishAndReveal, 120);

            if (heroVideo) {
                // Request video playback in background gently
                heroVideo.play().catch(() => {});
            }

            // 3. Register GSAP Plugins
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);

                // Hero Intro Animation Timeline (Paused until preloader reveals)
                const heroLabel = document.getElementById('hero-label');
                const heroTitle = document.getElementById('hero-title');
                const heroSub = document.getElementById('hero-sub');
                const heroActions = document.getElementById('hero-actions');

                if (heroLabel && heroTitle && heroSub && heroActions) {
                    heroTl = gsap.timeline({ paused: true, defaults: { ease: 'power3.out', duration: 1.2 } });
                    heroTl
                        .to(heroLabel, { opacity: 1, y: 0, delay: 0.1 })
                        .to(heroTitle, { opacity: 1, scale: 1, duration: 1.3, ease: 'power4.out' }, '-=0.8')
                        .to(heroSub, { opacity: 1, y: 0 }, '-=0.9')
                        .to(heroActions, { opacity: 1, y: 0 }, '-=0.9');
                }

                // Background Atmospheric Overlay Depth (Zero Video Decoder Overhead)
                const bgOverlay = document.querySelector('.cinematic-overlay');
                if (bgOverlay) {
                    gsap.to(bgOverlay, {
                        opacity: 0.92,
                        ease: 'none',
                        scrollTrigger: {
                            trigger: 'body',
                            start: 'top top',
                            end: 'bottom bottom',
                            scrub: 1
                        }
                    });
                }

                // Kinetic Words Parallax
                const kineticWords = document.querySelectorAll('.kinetic-word');
                kineticWords.forEach((word, i) => {
                    const speed = parseFloat(word.getAttribute('data-speed')) || 1;
                    const direction = (i % 2 === 0) ? -35 : 35;
                    gsap.to(word, {
                        x: direction * speed,
                        ease: 'none',
                        scrollTrigger: {
                            trigger: '#scene-2',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1
                        }
                    });
                });

                // Scene Transitions
                const scenes = ['#scene-2', '#scene-3', '#scene-4', '#scene-5', '#scene-6'];
                scenes.forEach(sceneId => {
                    const sceneElem = document.querySelector(sceneId);
                    if (!sceneElem) return;
                    const contentWrap = sceneElem.querySelector('.max-w-7xl, .max-w-6xl, .w-full');
                    if (contentWrap) {
                        gsap.from(contentWrap, {
                            opacity: 0,
                            y: 30,
                            duration: 1.1,
                            ease: 'power3.out',
                            scrollTrigger: {
                                trigger: sceneElem,
                                start: 'top 75%',
                                toggleActions: 'play none none reverse'
                            }
                        });
                    }
                });
            }

            // 4. Guided Story Auto-Tour Engine with Section Pauses
            const isEn = "{{ app()->getLocale() }}" === "en";
            const tourSections = [
                { id: '#scene-2', name: isEn ? "Taste Profile" : "Sensasi Rasa" },
                { id: '#scene-3', name: isEn ? "Fruit Story" : "Cerita Buah" },
                { id: '#scene-4', name: isEn ? "Product & Ritual" : "Produk & Cara Seduh" },
                { id: '#scene-5', name: isEn ? "Testimonials" : "Testimoni & Ulasan" },
                { id: '#scene-6', name: isEn ? "Order Hub" : "Pesan DonDong" }
            ];
            let isTourActive = false;
            let tourTimeout = null;
            let tourStartTime = 0;

            const tourBadge = document.getElementById('tour-badge');
            const stopTourBtn = document.getElementById('stop-tour-btn');

            function showTourBadge(index) {
                if (tourBadge) {
                    tourBadge.classList.remove('opacity-0', 'pointer-events-none');
                    tourBadge.classList.add('opacity-100', 'pointer-events-auto');
                    const textElem = tourBadge.querySelector('.tour-text');
                    if (textElem && tourSections[index]) {
                        textElem.innerText = tourSections[index].name;
                    }
                }
            }

            function hideTourBadge() {
                if (tourBadge) {
                    tourBadge.classList.add('opacity-0', 'pointer-events-none');
                    tourBadge.classList.remove('opacity-100', 'pointer-events-auto');
                }
            }

            function stopAutoTour() {
                if (!isTourActive) return;
                isTourActive = false;
                if (tourTimeout) {
                    clearTimeout(tourTimeout);
                    tourTimeout = null;
                }
                hideTourBadge();
            }

            function runTourStep(index) {
                if (!isTourActive) return;
                if (index >= tourSections.length) {
                    stopAutoTour();
                    return;
                }

                const targetSection = tourSections[index].id;
                showTourBadge(index);

                window.smoothScrollTo(targetSection, () => {
                    if (!isTourActive) return;
                    tourTimeout = setTimeout(() => {
                        runTourStep(index + 1);
                    }, 4000);
                });
            }

            function startAutoTour(e) {
                if (e) e.preventDefault();
                stopAutoTour();
                isTourActive = true;
                tourStartTime = Date.now();
                runTourStep(0);
            }

            const startTourBtn = document.getElementById('start-tour-btn');
            const cueTourBtn = document.getElementById('cue-tour-btn');
            if (startTourBtn) startTourBtn.addEventListener('click', startAutoTour);
            if (cueTourBtn) cueTourBtn.addEventListener('click', startAutoTour);
            if (stopTourBtn) stopTourBtn.addEventListener('click', (e) => { e.preventDefault(); stopAutoTour(); });

            // Ignore cancel events within 600ms of clicking start
            function canInterruptTour() {
                return isTourActive && (Date.now() - tourStartTime > 600);
            }

            window.addEventListener('wheel', () => { if (canInterruptTour()) stopAutoTour(); }, { passive: true });
            window.addEventListener('touchmove', () => { if (canInterruptTour()) stopAutoTour(); }, { passive: true });
            window.addEventListener('keydown', (e) => {
                if (['ArrowDown', 'ArrowUp', 'PageDown', 'PageUp', 'Space'].includes(e.code)) {
                    if (canInterruptTour()) stopAutoTour();
                }
            });
        });
    </script>

    <!-- Floating Auto-Tour Control Badge -->
    <div id="tour-badge"
        class="fixed bottom-5 left-1/2 -translate-x-1/2 z-50 px-4 py-2 rounded-full bg-black/85 backdrop-blur-md border border-tropical-400/50 text-white text-xs font-bold shadow-2xl flex items-center gap-2.5 transition-all duration-300 opacity-0 pointer-events-none transform -translate-y-1">
        <span class="w-2 h-2 rounded-full bg-tropical-400 animate-ping"></span>
        <span class="text-tropical-300 font-extrabold uppercase tracking-wider text-[10px]">{{ app()->getLocale() == 'en' ? 'Exploring:' : 'Menjelajah:' }}</span>
        <span class="tour-text text-white font-bold text-[11px]">Sensasi Rasa</span>
        <button type="button"
            id="stop-tour-btn"
            class="ml-1.5 px-2.5 py-0.5 rounded-full bg-white/15 hover:bg-white/30 text-[9px] uppercase tracking-wider font-black text-slate-200 transition focus:outline-none">
            {{ app()->getLocale() == 'en' ? 'Stop' : 'Berhenti' }}
        </button>
    </div>

</body>

</html>