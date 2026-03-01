<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin DonDong!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Stat Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b-4 border-green-500">
                    <div class="text-gray-500 text-sm font-medium uppercase tracking-wider mb-2">Total Produk</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $productCount }}</div>
                </div>

                <!-- Stat Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b-4 border-yellow-500">
                    <div class="text-gray-500 text-sm font-medium uppercase tracking-wider mb-2">Testimonial</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $testimonialCount }}</div>
                </div>

                <!-- Action Card -->
                <div class="bg-green-600 overflow-hidden shadow-sm sm:rounded-lg p-6 text-white flex justify-between items-center transition-transform hover:scale-105">
                    <div>
                        <div class="text-green-100 text-sm font-medium uppercase tracking-wider mb-1">Live Website</div>
                        <div class="text-xl font-bold">DonDong! Public</div>
                    </div>
                    <a href="{{ route('home') }}" target="_blank" class="bg-white text-green-600 px-4 py-2 rounded-lg font-bold text-sm">Lihat Site</a>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="text-lg font-bold mb-4">Selamat Datang di CMS DonDong!</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Gunakan menu di atas untuk mengelola konten website, daftar produk, dan pengaturan global seperti SEO dan kontak WhatsApp.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.landing-page.index') }}" class="bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition">Edit Home</a>
                    <a href="{{ route('admin.settings.index') }}" class="bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition">Ubah SEO</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
