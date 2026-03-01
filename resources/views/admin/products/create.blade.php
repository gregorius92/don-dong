<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Produk (ID)</label>
                                <input type="text" name="name" placeholder="Contoh: DonDong! Original Box" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Produk (EN)</label>
                                <input type="text" name="name_en" placeholder="Example: DonDong! Original Box" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Harga / Unit Display</label>
                            <input type="text" name="price_display" placeholder="Contoh: Rp 50.000 / Box (10 Sachet)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Deskripsi (ID)</label>
                                <textarea name="description" rows="4" placeholder="Jelaskan keunggulan varian ini..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Deskripsi (EN)</label>
                                <textarea name="description_en" rows="4" placeholder="Explain the benefits of this variant..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Komposisi (Ingredients)</label>
                            <textarea name="ingredients" rows="3" placeholder="Gula, Kedondong Asli, Ekstrak Buah..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                            <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" checked class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label class="ml-2 block text-sm text-gray-900">Aktifkan Produk di Landing Page</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 text-gray-600 font-medium">Batal</a>
                    <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-green-700 transition">
                        Tambah Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
