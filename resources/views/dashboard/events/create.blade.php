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

    <form action="{{ route('dashboard.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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

                            <img id="preview-image" class="absolute inset-0 w-full h-full object-cover z-10"
                                src="#" alt="Preview" />

                            <div id="hover-overlay"
                                class="absolute inset-0 bg-black/40 z-20 items-center justify-center transition opacity-0 hover:opacity-100">
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
                    <input type="text" name="title" id="title" required value="{{ old('title') }}"
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
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
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
                            <input type="number" name="price" id="price" required value="{{ old('harga') }}"
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
                        <div class="relative">
                            <input type="text" name="location" id="location" required value="{{ old('location') }}"
                                placeholder="Cari alamat (OpenStreetMap)..." autocomplete="off"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                            <div id="location-suggestions"
                                class="absolute z-[2000] mt-2 w-full rounded-lg border border-gray-200 bg-white shadow-lg overflow-hidden hidden">
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">Atau pilih titik lokasi lewat peta.</p>
                        <div id="location-map" class="mt-3 h-64 rounded-lg border border-gray-200 overflow-hidden">
                        </div>
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
                            value="{{ old('start_date_time') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        @error('start_date_time')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Akhir
                            Event</label>
                        <input type="datetime-local" name="end_date_time" id="date" required
                            value="{{ old('end_date_time') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm shadow-sm transition">
                        @error('end_date_time')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- event status --}}
                <input type="hidden" name="status" value="scheduled">
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
                    <button type="submit" np
                        class="px-5 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Buat Event
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

    (function initNominatimLocationAutocomplete() {
        const input = document.getElementById('location');
        const box = document.getElementById('location-suggestions');
        if (!input || !box) return;

        let debounceId = null;
        let aborter = null;

        function hide() {
            box.classList.add('hidden');
            box.innerHTML = '';
        }

        function showLoading() {
            box.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">Mencari alamat...</div>';
            box.classList.remove('hidden');
        }

        function render(items) {
            if (!items || items.length === 0) {
                box.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">Alamat tidak ditemukan.</div>';
                box.classList.remove('hidden');
                return;
            }

            box.innerHTML = items.map((it) => {
                const name = (it.display_name || '').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                return `
                    <button type="button" data-name="${encodeURIComponent(it.display_name || '')}"
                        class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                        ${name}
                    </button>
                `;
            }).join('');
            box.classList.remove('hidden');

            box.querySelectorAll('button[data-name]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    input.value = decodeURIComponent(btn.getAttribute('data-name') || '');
                    hide();
                });
            });
        }

        async function search(q) {
            if (aborter) aborter.abort();
            aborter = new AbortController();

            showLoading();
            const url = `/api/geocoding/nominatim/search?q=${encodeURIComponent(q)}`;
            const res = await fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                },
                signal: aborter.signal,
            });
            if (!res.ok) {
                render([]);
                return;
            }
            const data = await res.json().catch(() => []);
            render(Array.isArray(data) ? data : []);
        }

        input.addEventListener('input', () => {
            const q = (input.value || '').trim();
            if (q.length < 3) {
                if (aborter) aborter.abort();
                hide();
                return;
            }
            if (debounceId) clearTimeout(debounceId);
            debounceId = setTimeout(() => {
                search(q).catch(() => render([]));
            }, 350);
        });

        input.addEventListener('blur', () => {
            setTimeout(hide, 150);
        });
    })();
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    (function initLocationMapPicker() {
        const mapEl = document.getElementById('location-map');
        const input = document.getElementById('location');
        if (!mapEl || !input || typeof L === 'undefined') return;

        const defaultCenter = [-6.200000, 106.816666];
        const map = L.map(mapEl).setView(defaultCenter, 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker(defaultCenter, {
            draggable: false
        }).addTo(map);

        async function reverseToAddress(lat, lon) {
            const url =
                `/api/geocoding/nominatim/reverse?lat=${encodeURIComponent(lat)}&lon=${encodeURIComponent(lon)}`;
            const res = await fetch(url, {
                headers: {
                    'Accept': 'application/json'
                }
            });
            if (!res.ok) return;
            const data = await res.json().catch(() => null);
            if (data && data.display_name) {
                input.value = data.display_name;
            }
        }

        map.on('click', (e) => {
            const lat = e.latlng.lat;
            const lon = e.latlng.lng;
            marker.setLatLng([lat, lon]);
            reverseToAddress(lat, lon).catch(() => {});
        });
    })();
</script>
