<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    {{-- Container Width disamain kayak Event --}}
    <div class="max-w-6xl mx-auto">
        
        {{-- Tombol Kembali (UDAH DIPERBAIKI ROUTE-NYA) --}}
        <a href="{{ route('categories.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors mb-4">
            <button type="button" class="px-5 py-2 flex gap-2 items-center text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Kategori
            </button>    
        </a>

        {{-- Form Start --}}
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 space-y-6">
                    
                    {{-- Input Nama Kategori --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Kategori</label>
                        <input type="text" name="name" id="name" required placeholder="Masukkan nama kategori..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                    </div>

                </div>

                {{-- Footer Tombol --}}
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                    {{-- Tombol Reset --}}
                    <button type="reset" class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition shadow-sm">
                        Reset
                    </button>

                    {{-- Tombol Simpan --}}
                    <button type="submit" class="px-5 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan
                    </button>
                </div>
            </div>
        </form>

    </div>
</x-back-page.layout>