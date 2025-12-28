<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <a href="{{ route('dashboard.events.index') }}" class="inline-flex items-center mb-6">
        <button type="button"
            class="px-5 py-2 flex gap-2 items-center text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar Event
        </button>
    </a>

    <form action="{{ route('dashboard.events.update', $event['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 space-y-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Poster / Banner Event</label>
                    <div
                        class="relative w-full h-64 border-2 border-gray-300 border-dashed rounded-xl overflow-hidden bg-gray-50 group hover:border-blue-400 transition">
                        <input id="image_upload" name="image_path" type="file" class="hidden" accept="image/*"
                            onchange="previewFile()" />

                        <label for="image_upload" class="cursor-pointer">
                            <div id="placeholder-upload"
                                class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center transition-opacity duration-300 {{ isset($event['foto']) ? 'hidden' : '' }}">
                                <div class="p-3 bg-blue-50 rounded-full mb-3 group-hover:scale-110 transition">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Klik untuk ganti foto event</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG atau JPEG</p>
                            </div>

                            <img id="preview-image"
                                class="absolute inset-0 w-full h-full object-cover {{ isset($event['image_path']) ? '' : 'hidden' }} z-10"
                                src="{{ isset($event['image_path']) ? asset('storage/' . $event['image_path']) : '#' }}"
                                alt="Preview" />

                            <div id="hover-overlay"
                                class="absolute inset-0 bg-black/40 {{ isset($event['image_path']) ? 'flex' : 'hidden' }} z-20 items-center justify-center transition opacity-0 hover:opacity-100">
                                <span
                                    class="text-white text-xs font-semibold bg-black/50 px-4 py-2 rounded-full backdrop-blur-sm">Ganti
                                    Foto</span>
                            </div>
                        </label>
                    </div>
                    @error('image_path')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul Event</label>
                    <input type="text" name="title" id="title" required
                        value="{{ old('title', $event['title'] ?? '') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                    @error('title')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                        <select name="category" id="category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm appearance-none bg-white">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category', $event['category_id'] ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga (IDR)</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-sm">Rp</span>
                            <input type="number" name="price" id="price" required
                                value="{{ old('harga', $event['price'] ?? '') }}"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        </div>
                        @error('price')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 mb-1">Lokasi
                            (Tempat)</label>
                        <input type="text" name="location" id="location" required
                            value="{{ old('location', $event['location'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        @error('location')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Mulai
                            Event</label>
                        <input type="datetime-local" name="start_date_time" id="date" required
                            value="{{ old('start_date_time', $event['start_date_time'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        @error('start_date_time')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Akhir
                            Event</label>
                        <input type="datetime-local" name="end_date_time" id="date" required
                            value="{{ old('end_date_time', $event['end_date_time'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        @error('end_date_time')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- event status --}}
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status Event</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm appearance-none bg-white">
                        <option value="scheduled"
                            {{ old('status', $event['status'] ?? '') == 'scheduled' ? 'selected' : '' }}>
                            Scheduled</option>
                        <option value="ongoing"
                            {{ old('status', $event['status'] ?? '') == 'ongoing' ? 'selected' : '' }}>
                            Ongoing</option>
                        <option value="completed"
                            {{ old('status', $event['status'] ?? '') == 'completed' ? 'selected' : '' }}>
                            Completed</option>
                        <option value="cancelled"
                            {{ old('status', $event['status'] ?? '') == 'cancelled' ? 'selected' : '' }}>
                            Cancelled</option>
                    </select>
                    @error('status')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">{{ old('deskripsi', $event['description'] ?? '') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                    <a href="{{ route('dashboard.events.index') }}"
                        class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition shadow-sm">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Update Event
                    </button>
                </div>
            </div>
    </form>
</x-back-page.layout>

<script>
    function previewFile() {
        const preview = document.getElementById('preview-image');
        const placeholder = document.getElementById('placeholder-upload');
        const overlay = document.getElementById('hover-overlay');
        const file = document.getElementById('image_upload').files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
