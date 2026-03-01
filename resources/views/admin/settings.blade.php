<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Global & SEO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    @foreach($settings as $setting)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 capitalize">{{ str_replace('_', ' ', $setting->key) }}</label>
                        @if(strlen($setting->value) > 50)
                            <textarea name="{{ $setting->key }}" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ $setting->value }}</textarea>
                        @else
                            <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @endif
                    </div>
                    @endforeach

                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="bg-gray-900 text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-gray-800 transition">
                            Update Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
