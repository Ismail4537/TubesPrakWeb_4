<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>   
        <a href="{{ route('dashboard.events.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors mb-4">
            <button type="reset" class="px-5 py-2 flex gap-2 items-center text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            Kembali ke Daftar Event
            </button>    
        </a>
        <form action="{{ route('dashboard.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 space-y-6">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Poster / Banner Event</label>
                        <div class="relative w-full h-64 border-2 border-gray-300 border-dashed rounded-xl overflow-hidden bg-gray-50 group hover:border-blue-400 transition">
                            <input id="image_upload" name="image" type="file" class="hidden" accept="image/*" onchange="previewFile()" />
                            
                            <label for="image_upload" class="cursor-pointer">
                                <div id="placeholder-upload" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center transition-opacity duration-300">
                                    <div class="p-3 bg-blue-50 rounded-full mb-3 group-hover:scale-110 transition">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-700">Klik untuk upload foto event</p>
                                    <p class="text-xs text-gray-400 mt-1">PNG, JPG atau JPEG (Rekomendasi 16:9)</p>
                                </div>

                                <img id="preview-image" class="absolute inset-0 w-full h-full object-cover hidden z-10" src="#" alt="Preview" />

                                <div id="hover-overlay" class="absolute inset-0 bg-black/40 hidden z-20 items-center justify-center transition opacity-0 hover:opacity-100">
                                    <span class="text-white text-xs font-semibold bg-black/50 px-3 py-1 rounded-full">Ganti Foto</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul Event</label>
                        <input type="text" name="title" id="title" required placeholder="Contoh: Digital Marketing Seminar 2025"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                            <select name="category_id" id="category_id" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm appearance-none bg-white">
                                <option value="">Pilih Kategori</option>
                                <option value="seminar">Seminar</option>
                                <option value="workshop">Workshop</option>
                                <option value="expo">Expo</option>
                            </select>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga (IDR)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-sm">Rp</span>
                                <input type="number" name="price" id="price" required placeholder="0"
                                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="location" class="block text-sm font-semibold text-gray-700 mb-1">Lokasi (Tempat)</label>
                            <input type="text" name="location" id="location" required placeholder="Nama Gedung / Hotel"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Event</label>
                            <input type="datetime-local" name="date" id="date" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" required placeholder="Detail acara..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition"></textarea>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea name="address" id="address" rows="2" required placeholder="Jl. Raya No. 123..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition"></textarea>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                    <button type="reset" class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition shadow-sm">
                        Reset
                    </button>
                    <button type="submit" class="px-5 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Event
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

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.classList.remove('hidden'); // Tampilkan gambar
                placeholder.classList.add('hidden'); // Sembunyikan ikon upload
                overlay.classList.remove('hidden'); // Aktifkan overlay ganti foto
                overlay.classList.add('flex');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
            }
        }
    </script>