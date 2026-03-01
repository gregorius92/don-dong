<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() == 'en' ? ($settings['meta_title_en'] ?? $settings['meta_title'] ?? 'DonDong! - Fresh Authentic Ambarella') : ($settings['meta_title'] ?? 'DonDong! - Segarnya Kedondong Asli') }}</title>
    <meta name="description" content="{{ app()->getLocale() == 'en' ? ($settings['meta_description_en'] ?? $settings['meta_description'] ?? '') : ($settings['meta_description'] ?? '') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Outfit', sans-serif; }
        .bg-glass { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); }
        @media (min-width: 768px) {
            .mobile-only { display: none !important; }
        }
    </style>
</head>
<body class="bg-white text-gray-900 overflow-x-hidden">

    <!-- Header -->
    <header class="fixed w-full z-50 bg-glass border-b border-gray-100" x-data="{ mobileMenuOpen: false }">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-green-600 tracking-tighter">DonDong<span class="text-yellow-500">!</span></a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 font-medium items-center">
                <a href="#about" class="hover:text-green-600 transition">{{ __('messages.about') }}</a>
                <a href="#products" class="hover:text-green-600 transition">{{ __('messages.products') }}</a>
                <a href="#benefits" class="hover:text-green-600 transition">{{ __('messages.benefits') }}</a>
                <a href="#testimonials" class="hover:text-green-600 transition">{{ __('messages.testimonials') }}</a>
                <a href="#contact" class="px-5 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition shadow-lg shadow-green-200">{{ __('messages.buy_now') }}</a>
                
                <!-- Language Switcher -->
                <div class="flex items-center space-x-2 border-l border-gray-300 pl-4 ml-4">
                    <a href="{{ route('lang.switch', 'id') }}" class="{{ app()->getLocale() == 'id' ? 'text-green-600 font-bold' : 'text-gray-400 hover:text-green-600' }}">ID</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-green-600 font-bold' : 'text-gray-400 hover:text-green-600' }}">EN</a>
                </div>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center mobile-only">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 hover:text-green-600 focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white border-b border-gray-100 px-6 py-8 space-y-4 shadow-xl mobile-only"
             style="display: none;">
            <a href="#about" @click="mobileMenuOpen = false" class="block text-lg font-medium text-gray-700 hover:text-green-600">{{ __('messages.about') }}</a>
            <a href="#products" @click="mobileMenuOpen = false" class="block text-lg font-medium text-gray-700 hover:text-green-600">{{ __('messages.products') }}</a>
            <a href="#benefits" @click="mobileMenuOpen = false" class="block text-lg font-medium text-gray-700 hover:text-green-600">{{ __('messages.benefits') }}</a>
            <a href="#testimonials" @click="mobileMenuOpen = false" class="block text-lg font-medium text-gray-700 hover:text-green-600">{{ __('messages.testimonials') }}</a>
            <a href="#contact" @click="mobileMenuOpen = false" class="block px-6 py-4 bg-green-600 text-white text-center rounded-2xl font-bold text-lg">{{ __('messages.buy_now') }}</a>
            
            <div class="flex justify-center space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('lang.switch', 'id') }}" class="{{ app()->getLocale() == 'id' ? 'text-green-600 font-bold' : 'text-gray-400' }}">ID</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-green-600 font-bold' : 'text-gray-400' }}">EN</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/images/hero.png') }}" class="w-full h-full object-cover opacity-20" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <span class="inline-block px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6 uppercase tracking-wider">{{ __('messages.100_real_fruit') }}</span>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6 text-gray-900">
                    {{ $content->translate('hero_title') }}
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-10 leading-relaxed max-w-lg">
                    {{ $content->translate('hero_subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ $content->translate('hero_cta_link') }}" class="px-8 py-4 bg-green-600 text-white text-center rounded-2xl font-bold text-lg hover:bg-green-700 transition-all shadow-xl shadow-green-200 transform hover:-translate-y-1">
                        {{ $content->translate('hero_cta_text') }}
                    </a>
                    <a href="#products" class="px-8 py-4 bg-white border-2 border-green-600 text-green-600 text-center rounded-2xl font-bold text-lg hover:bg-green-50 transition-all">
                        {{ __('messages.see_products') }}
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="relative z-10 animate-float">
                    <img src="{{ asset('storage/images/product.png') }}" alt="DonDong Product" class="w-full max-w-md mx-auto drop-shadow-2xl">
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-yellow-400/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-green-400/20 rounded-full blur-3xl"></div>
            </div>
        </div>
    </section>

    <!-- Why DonDong Section -->
    <section id="benefits" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">{{ $content->translate('benefits_title') }}</h2>
                <div class="w-20 h-1.5 bg-green-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                @php
                    $benefits = [
                        ['icon' => '🌿', 'title' => __('messages.benefit_1_title'), 'desc' => __('messages.benefit_1_desc')],
                        ['icon' => '⚡', 'title' => __('messages.benefit_2_title'), 'desc' => __('messages.benefit_2_desc')],
                        ['icon' => '✨', 'title' => __('messages.benefit_3_title'), 'desc' => __('messages.benefit_3_desc')],
                        ['icon' => '💎', 'title' => __('messages.benefit_4_title'), 'desc' => __('messages.benefit_4_desc')],
                    ];
                @endphp
                @foreach($benefits as $benefit)
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group">
                    <div class="text-4xl mb-6 group-hover:scale-110 transition">{{ $benefit['icon'] }}</div>
                    <h3 class="text-xl font-bold mb-3">{{ $benefit['title'] }}</h3>
                    <p class="text-gray-600">{{ $benefit['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Ingredients Section -->
    <section id="about" class="py-24 overflow-hidden">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2">
                <img src="{{ asset('storage/images/ingredients.png') }}" alt="Ingredients" class="rounded-[4rem] shadow-2xl">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-4xl font-bold mb-8">{{ $content->translate('ingredients_title') }}</h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    {{ $content->translate('ingredients_content') }}
                </p>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">✓</div>
                        <span class="font-medium">{{ __('messages.ingredient_1') }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">✓</div>
                        <span class="font-medium">{{ __('messages.ingredient_2') }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">✓</div>
                        <span class="font-medium">{{ __('messages.ingredient_3') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Showcase -->
    <section id="products" class="py-24 bg-green-600 text-white rounded-[3rem] mx-6">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">{{ __('messages.choose_variant') }}</h2>
                <p class="text-green-100">{{ __('messages.find_freshness') }}</p>
            </div>
            <div x-data="{ 
                currentSlide: 0, 
                totalSlides: {{ count($products) }},
                interval: null,
                itemsPerPage() {
                    return window.innerWidth >= 1024 ? 4 : (window.innerWidth >= 768 ? 2 : 1);
                },
                get totalPages() {
                   return Math.ceil(this.totalSlides / Math.max(1, this.itemsPerPage()));
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
                    this.interval = setInterval(() => { 
                        this.currentSlide = (this.currentSlide + 1) % this.totalPages; 
                    }, 5000);
                },
                init() {
                    window.addEventListener('resize', () => { this.currentSlide = 0; });
                    this.resetInterval();
                }
            }" class="relative w-full">
                <!-- Carousel Wrapper -->
                <div class="overflow-hidden py-4 -mx-4 px-4">
                <!-- Carousel Container -->
                <div class="flex transition-transform duration-700 ease-in-out" 
                     :style="`transform: translateX(-${currentSlide * 100}%)`">
                    
                    @foreach($products as $product)
                    <div class="w-full md:w-1/2 lg:w-[25%] flex-shrink-0 px-4">
                        <div class="bg-white text-gray-900 rounded-[2.5rem] p-5 shadow-2xl h-full flex flex-col transform hover:-translate-y-2 transition-all">
                            <div class="aspect-square bg-gray-50 rounded-3xl mb-5 overflow-hidden flex items-center justify-center p-4">
                                <img src="{{ asset('storage/' . ($product->image_path ?: 'images/product.png')) }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain">
                            </div>
                            <h3 class="text-xl font-bold mb-2 line-clamp-2 h-14">{{ $product->translate('name') }}</h3>
                            <p class="text-gray-500 mb-4 text-sm leading-relaxed line-clamp-3 h-16">{{ $product->translate('description') }}</p>
                            <div class="flex justify-between items-center bg-gray-50 p-3 rounded-2xl mt-auto">
                                <span class="text-green-600 font-bold text-lg">{{ $product->price_display }}</span>
                                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" class="p-2 px-4 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-medium text-sm">
                                    {{ __('messages.buy') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                
                <!-- Navigation Arrows -->
                <button @click="prev()" class="hidden md:block absolute -left-8 lg:-left-12 top-1/2 -translate-y-1/2 bg-white text-green-600 rounded-full p-4 shadow-xl border border-gray-100 hover:bg-green-50 transition z-10 focus:outline-none translate-x-1/2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" class="hidden md:block absolute -right-8 lg:-right-12 top-1/2 -translate-y-1/2 bg-white text-green-600 rounded-full p-4 shadow-xl border border-gray-100 hover:bg-green-50 transition z-10 focus:outline-none -translate-x-1/2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <!-- Pagination Dots -->
                <div class="flex justify-center mt-8 space-x-2">
                    <template x-for="i in totalPages" :key="i">
                        <button @click="goTo(i - 1)" 
                                :class="{'bg-green-900 w-8': currentSlide === i - 1, 'bg-green-400 w-3 hover:bg-green-300': currentSlide !== i - 1}"
                                class="h-3 rounded-full transition-all duration-300 focus:outline-none"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">{{ __('messages.what_they_say') }}</h2>
                <div class="w-20 h-1.5 bg-yellow-400 mx-auto rounded-full"></div>
            </div>

            <div x-data="{ 
                currentSlide: 0, 
                totalSlides: {{ $testimonials->count() }},
                interval: null,
                itemsPerPage() {
                    return window.innerWidth >= 1024 ? 4 : (window.innerWidth >= 768 ? 2 : 1);
                },
                get totalPages() {
                   return Math.ceil(this.totalSlides / Math.max(1, this.itemsPerPage()));
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
                        }, 5000);
                    }
                },
                init() {
                    window.addEventListener('resize', () => { this.currentSlide = 0; });
                    this.resetInterval();
                }
            }" class="relative w-full mb-16">
                <!-- Carousel Wrapper -->
                <div class="overflow-hidden py-8 -mx-4 px-4 -my-4">
                <!-- Carousel Container -->
                <div class="flex transition-transform duration-700 ease-in-out"
                     :style="`transform: translateX(-${currentSlide * 100}%)`">
                    
                    @forelse($testimonials as $testimonial)
                    <div class="w-full md:w-1/2 lg:w-[25%] flex-shrink-0 px-4">
                        <div class="bg-gray-50 h-full p-6 rounded-[2.5rem] shadow-sm hover:shadow-md transition-all flex flex-col">
                            <div class="text-yellow-400 mb-3 flex">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endfor
                            </div>
                            <p class="text-gray-600 mb-8 italic flex-grow">"{{ $testimonial->translate('content') }}"</p>
                            <div class="flex items-center mt-auto">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold mr-3 flex-shrink-0">
                                    {{ substr($testimonial->author_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">{{ $testimonial->author_name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="w-full text-center text-gray-500 py-12 px-4 bg-gray-50 rounded-3xl flex-shrink-0">
                        <p class="text-xl">{{ __('messages.be_first_testimonial') }}</p>
                    </div>
                    @endforelse
                    
                </div>

                <!-- Pagination Dots -->
                <div class="flex justify-center mt-4 space-x-2">
                    <template x-for="i in totalPages" :key="i">
                        <button @click="goTo(i - 1)" 
                                :class="{'bg-yellow-400 w-8': currentSlide === i - 1, 'bg-gray-300 w-3 hover:bg-gray-400': currentSlide !== i - 1}"
                                class="h-3 rounded-full transition-all duration-300 focus:outline-none"></button>
                    </template>
                </div>
            </div>

            <!-- Testimonial Form -->
            <div class="max-w-2xl mx-auto bg-green-50 p-8 md:p-12 rounded-[3rem] border border-green-100 shadow-xl shadow-green-100/20">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-green-800">{{ __('messages.share_experience') }}</h3>
                    <p class="text-green-600">{{ __('messages.tell_us') }}</p>
                </div>

                @if(session('success_testimonial'))
                    <div class="mb-6 p-6 bg-green-100 text-green-700 rounded-2xl border border-green-200 text-center font-bold">
                        {{ session('success_testimonial') }}
                    </div>
                @endif

                <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="author" placeholder="{{ __('messages.full_name') }}" required class="w-full px-6 py-4 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-green-500 text-lg">
                    </div>
                    <div>
                        <select name="rating" required class="w-full px-6 py-4 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-green-500 text-lg appearance-none">
                            <option value="5" selected>⭐⭐⭐⭐⭐ (5/5 {{ __('messages.rating_5') }})</option>
                            <option value="4">⭐⭐⭐⭐ (4/5 {{ __('messages.rating_4') }})</option>
                            <option value="3">⭐⭐⭐ (3/5 {{ __('messages.rating_3') }})</option>
                            <option value="2">⭐⭐ (2/5 {{ __('messages.rating_2') }})</option>
                            <option value="1">⭐ (1/5 {{ __('messages.rating_1') }})</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="content" rows="4" placeholder="{{ __('messages.what_you_like') }}" required class="w-full px-6 py-4 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-green-500 text-lg"></textarea>
                    </div>
                    <button type="submit" class="w-full py-5 bg-green-600 text-white rounded-2xl font-bold text-xl hover:bg-green-700 transition shadow-xl shadow-green-200 transform hover:-translate-y-1">
                        {{ __('messages.send_testimonial') }}
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Lifestyle/CTA Section -->
    <section id="contact" class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="bg-yellow-400 rounded-[3rem] p-12 md:p-24 flex flex-col md:flex-row items-center gap-12 shadow-2xl shadow-yellow-200">
                <div class="md:w-1/2 text-center md:text-left">
                    <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-8 leading-tight">{{ __('messages.start_refreshing') }}</h2>
                    <p class="text-xl text-yellow-900 mb-12">{{ __('messages.contact_admin') }}</p>
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" class="inline-flex items-center px-10 py-5 bg-gray-900 text-white rounded-2xl font-bold text-xl hover:bg-gray-800 transition shadow-xl">
                        {{ __('messages.whatsapp_us') }}
                        <svg class="w-6 h-6 ml-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.765-5.764-5.765zm3.392 7.624c-.131.374-.757.701-1.045.741-.283.04-.551.05-.884-.04-.203-.053-.473-.131-.806-.271-1.428-.596-2.352-2.049-2.423-2.144-.071-.095-.572-.765-.572-1.458 0-.693.363-1.033.493-1.173.132-.14.286-.174.382-.174.095 0 .191.002.274.005.086.002.202-.033.315.24.116.279.399.972.434 1.044.036.071.06.155.012.251-.048.096-.1.173-.18.251-.081.079-.17.176-.242.235-.081.066-.165.138-.07.301.096.162.427.705.917 1.141.63.563 1.161.738 1.326.823.165.084.263.07.362-.047.099-.117.432-.505.548-.678.116-.174.232-.146.39-.088.158.058 1.001.472 1.174.558.173.088.29.131.332.205.04.07.04.407-.091.782z"/></svg>
                    </a>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/images/lifestyle.png') }}" alt="Lifestyle" class="rounded-[4rem] shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12 bg-white border-t border-gray-100">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-center md:text-left">
                <a href="#" class="text-3xl font-bold text-green-600 mb-4 block">DonDong!</a>
                <p class="text-gray-500">Copyright © 2026 DonDong! Brand. <br>{{ __('messages.all_rights_reserved') }}</p>
            </div>
            <div class="flex space-x-6">
                <!-- Instagram -->
                <a href="{{ $settings['instagram_url'] ?? '#' }}" class="flex items-center space-x-2 text-gray-400 hover:text-green-600 transition" target="_blank" title="Follow us on Instagram">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span class="font-medium text-lg">Instagram</span>
                </a>
                <!-- TikTok -->
                <a href="{{ $settings['tiktok_url'] ?? '#' }}" class="flex items-center space-x-2 text-gray-400 hover:text-green-600 transition" target="_blank" title="Follow us on TikTok">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.86-.6-4.12-1.31a8.6 8.6 0 01-1.21-.83v9.42c0 2.14-.54 4.54-2.51 5.85-2.26 1.51-5.54 1.34-7.5-1-1.1-1.31-1.41-3.13-1.07-4.78.36-1.78 1.61-3.4 3.32-4.05.77-.3 1.59-.44 2.41-.43l.01 4.12c-.75-.01-1.53.11-2.13.58a2.53 2.53 0 00-.91 2.23c.12 1.23.95 2.16 2.16 2.37 1.5.26 3.03-.76 3.14-2.27.01-1 .01-2 0-3V0l.02.02z"/>
                    </svg>
                    <span class="font-medium text-lg">TikTok</span>
                </a>
                <!-- YouTube -->
                <a href="{{ $settings['youtube_url'] ?? '#' }}" class="flex items-center space-x-2 text-gray-400 hover:text-green-600 transition" target="_blank" title="Subscribe to our YouTube Channel">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    <span class="font-medium text-lg">YouTube</span>
                </a>
            </div>
        </div>
    </footer>

    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
    </style>

</body>
</html>
